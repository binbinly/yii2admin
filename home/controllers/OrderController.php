<?php

namespace home\controllers;

use home\models\Shop;
use home\models\Train;
use Yii;

class OrderController extends \yii\web\Controller
{
    /* 显示购物车 */
    public function actionIndex()
    {
        $cart = Yii::$app->session->get('cart',[]);//Yii::$app->session->set('cart',[]);
        $price = [
            'total' => 0,
            'discount' => 0,
            'price' => 0
        ];
        if ($cart) {
            foreach ($cart as $key => &$value) {
                if ($value['type'] == 'shop') {
                    $value['goods'] = Shop::info($value['aid']);
                }else{
                    $value['goods'] = Train::info($value['aid']);
                }
                /* 时间差判断 */
                $time = ceil((strtotime($value['etime']) - strtotime($value['stime']))/(60 * 60 * 24));
                $price['total'] += $value['num'] * $value['goods']['price'] * $time;
            } //var_dump($cart);exit();
        }

        /*  判断套餐优惠 */
        $price['price'] = $price['total'];
        return $this->render('index',[
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

    }

    /*
     * ---------------------------------------
     * ajax添加/编辑 商品到购物车
     * ---------------------------------------
     */
    public function actionCart(){
        if (Yii::$app->request->isAjax) {
            $data['type']  = Yii::$app->request->get('type', 'shop'); // 商品类型，默认：shop
            $data['aid']   = Yii::$app->request->get('aid'); //商品ID
            $data['num']   = Yii::$app->request->get('num', 1); //商品ID
            $data['stime'] = Yii::$app->request->get('stime'); //起租时间
            $data['etime'] = Yii::$app->request->get('etime'); //退租时间

            if (!$data['aid'] || !$data['stime']) {
                exit('0');
            }
            /* 获取购物车 */
            $cart = Yii::$app->session->get('cart',[]);
            /* 修改购物车内容 */
            $cart[$data['type'].$data['aid']] = $data;
            /* 保存购物车 */
            Yii::$app->session->set('cart',$cart);
            exit('1');
        }

    }
}
