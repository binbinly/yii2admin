<?php

namespace home\controllers;

use common\models\Order;
use common\models\OrderExtend;
use home\models\Shop;
use home\models\ShopGroup;
use home\models\ShopPrice;
use home\models\Train;
use Yii;
use common\helpers\FuncHelper;
use yii\helpers\Url;

class OrderController extends \yii\web\Controller
{
    /*
     * ---------------------------------------
     * 结算
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 判断是否登录 */
        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::toRoute(['/index/index']));
            Yii::$app->end();
        }

        $cart = Yii::$app->session->get('cart',[]);//Yii::$app->session->set('cart',[]);
        $price = [
            'total' => 0, //优惠前费用
            'discount' => 0, // 优惠多少元
            'price' => 0 //实际支付费用
        ];//var_dump(Yii::$app->session);
        /* 普通商品 */
        if ($cart) {
            foreach ($cart as $key => &$value) {
                if ($value['type'] == 'shop') {
                    $value['goods'] = Shop::info($value['aid']);
                }else{
                    $value['goods'] = Train::info($value['aid']);
                }
                /* 时间差判断 */
                $hour = ceil((strtotime($value['etime']) - strtotime($value['stime']))/(60 * 60));
                $days = ceil($hour/24);
                $value['days'] = $days; // 天数
                $value['hour'] = $hour; // 小时

                if ($value['goods']['type'] == 1) {
                    $price_info = ShopPrice::getNickPrice($value['stime'], $days, $value['aid']);
                    if($price_info && !$value['taocan']) {
                        $value['price_to'] = $price_info['price'];
                        $value['day_to'] = $price_info['n'].'天';
                        $price['total'] += $value['num'] * ($price_info['total'] + $value['goods']['price'] * ($days-$price_info['n']));
                    }else {
                        $price['total'] += $value['num'] * $value['goods']['price'] * $days;
                    }
                } else {
                    $price_info = ShopPrice::getNickPriceHour($value['stime'], $value['aid']);
                    if($price_info && !$value['taocan']) {
                        $value['price_to'] = $price_info->price;
                        $price['total'] += $value['num'] * $value['price_to'] * $hour;
                        $value['day_to'] = '当天';
                    }else {
                        $price['total'] += $value['num'] * $value['goods']['price'] * $hour;
                    }
                }
                
                /* 套餐判断 */
                if ($value['taocan'] > 0) {
                    $shopGroup = ShopGroup::info($value['taocan']);
                    $price_info = ShopPrice::getNickPriceHour($value['stime'], $value['taocan'], 2);
                    if($price_info) {
                        $price['price_to'] = $price_info->price;
                    }else {
                        $price['discount'] = $shopGroup['total'] - $shopGroup['price'];
                    }
                }

            }
        }
        /* 套餐商品 */


        /*  判断套餐优惠 */
        $price['price'] = $price['total'] - $price['discount'];//var_dump($cart);var_dump($price);exit();
        return $this->render('index',[
            'cart' => $cart,
            'price' => $price,
        ]);
    }

    /*
     * ---------------------------------------
     * 购物车
     * ---------------------------------------
     */
    public function actionView(){
        /* 判断是否登录 */
        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::toRoute(['/index/index']));
            Yii::$app->end();
        }

        $price = [
            'total' => 0,
            'discount' => 0,
            'price' => 0
        ];
        $cart = Yii::$app->session->get('cart',[]);//Yii::$app->session->set('cart',[]);
        if ($cart) {
            foreach ($cart as $key => &$value) {
                if ($value['type'] == 'shop') {
                    $value['goods'] = Shop::info($value['aid']);
                }else{
                    $value['goods'] = Train::info($value['aid']);
                }
                /* 时间差判断 */
                $hour = ceil((strtotime($value['etime']) - strtotime($value['stime']))/(60 * 60));
                $days = ceil($hour/24);
                $value['days'] = $days; // 天数
                $value['hour'] = $hour; // 小时

                $price['total'] += $value['num'] * $value['goods']['price'] * $days;
            } //var_dump($cart);exit();
        }
        return $this->render('view', [
            'cart' => $cart,
            'price' => $price,
        ]);
    }
    
    /*
     * ---------------------------------------
     * 提交订单
     * ---------------------------------------
     */
    public function actionSubmit(){
        /* 判断是否登录 */
        if (Yii::$app->user->isGuest) {
            FuncHelper::ajaxReturn(0, '您未登录');
        }

        $name = Yii::$app->request->get('name'); //姓名
        $tel  = Yii::$app->request->get('tel');  //电话
        $sfz  = Yii::$app->request->get('sfz');  //身份证
        $pay_type = Yii::$app->request->get('pay_type'); // 支付类型

        $cart = Yii::$app->session->get('cart',[]);
        if ($cart) {
            $shop_total = 0;
            $taocan_id = 0;
            $data = null;
            $data['order_sn'] = 'S'.time().rand(1000,9999); //订单号
            $data['uid'] = Yii::$app->user->identity->getId();
            $data['name'] = $name;
            $data['tel']  = $tel;
            $data['sfz']  = $sfz;
            $data['type'] = 'shop'; //商品类型
            $data['pay_status'] = 0; //未支付，支付成功后的回调修改
            $data['pay_time'] = 0; //支付时间，支付成功后的回调修改
            $data['pay_type'] = 0; // 支付类型
            $data['pay_source'] = 1; // 支付途径-网站
            $data['create_time'] = time();
            $data['status'] = 1;
            $data['aid'] = 0;
            $data['title'] = '套餐';
            $data['start_time'] = 0;
            $data['end_time'] = 0;
            $data['num'] = 1;
            $data['total'] = 0;
            $model = new Order();
            $model->setAttributes($data);
            if (!$model->save()) {
                //var_dump($model->getErrors());
                FuncHelper::ajaxReturn(1, '下单失败哦');
            }
            $order_id = $model->primaryKey;
            foreach ($cart as $key => &$value) {
                $value['goods'] = Shop::info($value['aid']);

                $data = [];
                $data['aid'] = $aid = $value['aid']; //商品id
                $data['title'] = $title = $value['goods']['title']; //商品标题
                $data['start_time'] = $start_time  = strtotime($value['stime']); // 起租时间
                $data['end_time'] = $end_time = strtotime($value['etime']); //退租时间
                $data['num'] = $num = $value['num'];

                /* 时间差判断 */
                $hour = ceil((strtotime($value['etime']) - strtotime($value['stime']))/(60 * 60));
                $days = ceil($hour/24);
                $value['days'] = $days; // 天数
                $value['hour'] = $hour; // 小时
                if ($value['goods']['type'] == 1) {
                    $price_info = ShopPrice::getNickPrice($value['stime'], $days, $value['aid']);
                    if($price_info && !$value['taocan']) {
                        $data['total'] = $value['num'] * ($price_info['total'] + $value['goods']['price'] * ($days-$price_info['n']));
                    }else {
                        $data['total'] = $value['num'] * $value['goods']['price'] * $days;
                    }
                }else{
                    $price_info = ShopPrice::getNickPriceHour($value['stime'], $value['aid']);
                    if($price_info && !$value['taocan']) {
                        $data['total'] = $value['num'] * $price_info->price * $hour;
                    }else {
                        $data['total'] = $value['num'] * $value['goods']['price'] * $hour;
                    }
                }

                if ($value['taocan'] > 0) {
                    $group = ShopGroup::info($value['taocan']);
                    $price_info = ShopPrice::getNickPriceHour($value['stime'], $value['taocan'], 2);
                    $data['taocan'] = $taocan_id = $value['taocan'];
                    $data['title'] = $title = $group['title']; //套餐标题
                    if($price_info) {
                        $shop_total = $price_info->price;
                    }else {
                        $shop_total = $group['price'];
                    }
                }else{
                    $shop_total += $data['total'];
                }
                $data['create_time'] = time();
                $data['pid'] = $order_id;

                $title .= $data['title'];
                $model = new OrderExtend();
                $model->setAttributes($data);
                if (!$model->save()) {
                    //var_dump($model->getErrors());
                    FuncHelper::ajaxReturn(1, '下单失败哦');
                }
            }
            $model = Order::findOne($order_id);
            $model->aid = $aid;
            $model->title = $title;
            $model->start_time = $start_time;
            $model->end_time = $end_time;
            $model->num = $num;
            $model->total = $shop_total;
            if($taocan_id) {
                $model->taocan = $taocan_id;
            }
            if (!$model->save()) {
                //var_dump($model->getErrors());
                FuncHelper::ajaxReturn(1, '下单失败');
            }
            FuncHelper::ajaxReturn(0, '下单成功', $model->order_sn);
        } else {
            FuncHelper::ajaxReturn(1, '订单数据为空');
        }
    }

    /*
     * ---------------------------------------
     * ajax添加/编辑 商品到购物车
     * ---------------------------------------
     */
    public function actionCart(){
        /* 判断是否登录 */
        if (Yii::$app->user->isGuest) {
            FuncHelper::ajaxReturn(1, '您未登录');
        }
        if (Yii::$app->request->isAjax) {
            $data['type']  = Yii::$app->request->get('type', 'shop'); // 商品类型，默认：shop
            $data['aid']   = Yii::$app->request->get('aid'); //商品ID
            $data['num']   = Yii::$app->request->get('num', 1); //商品ID
            $data['stime'] = Yii::$app->request->get('stime'); //起租时间
            $data['etime'] = Yii::$app->request->get('etime'); //退租时间
            $data['taocan'] = Yii::$app->request->get('taochan', 0); //判断是否属于套餐，及套餐id

            if (!$data['aid'] || !$data['stime']) {
                FuncHelper::ajaxReturn(1, '参数错误');
            }
            /* 获取购物车 */
            $cart = Yii::$app->session->get('cart',[]);
            /* 修改购物车内容 */
            $cart[$data['type'].$data['aid']] = $data;
            /* 保存购物车 */
            Yii::$app->session->set('cart',$cart);
            FuncHelper::ajaxReturn(0, '');
        }

    }

    /*
     * ---------------------------------------
     * 删除购物车
     * ---------------------------------------
     */
    public function actionDelCart(){
        /* 判断是否登录 */
        if (Yii::$app->user->isGuest) {
            FuncHelper::ajaxReturn(1, '您未登录');
        }
        if (Yii::$app->request->isAjax) {
            $keys  = Yii::$app->request->get('keys'); // shop1
            //$data['aid']   = Yii::$app->request->get('aid'); //商品ID

            if (!$keys) {
                FuncHelper::ajaxReturn(1, '参数错误');
            }
            /* 获取购物车 */
            $cart = Yii::$app->session->get('cart',[]);
            /* 删除购物车 */
            if(isset($keys)){
                unset($cart[$keys]);
            }
            /* 保存购物车 */
            Yii::$app->session->set('cart',$cart);
            FuncHelper::ajaxReturn(0, '');
        }
    }

    /*
     * ---------------------------------------
     * 清空购物车
     * ---------------------------------------
     */
    public function actionClear(){
        Yii::$app->session->set('cart',[]);
    }

}
