<?php

namespace backend\controllers;

use backend\models\Order;
use backend\models\search\OrderSearch;
use backend\models\Shop;
use backend\models\Train;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use common\models\TradeRecord;
use common\models\TrainCertificate;
use Yii;


/*
 * 订单控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class OrderController extends BaseController
{
    /*
     * ---------------------------------------
     * 列表页
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();//phpinfo();

        $params = Yii::$app->request->getQueryParams();


        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($params); //var_dump($dataProvider->query->all());exit();
        if (isset($params['action']) && $params['action'] == 'export') {
            $this->export($dataProvider->query->all());
            return false;
        }

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Order();
        $type = Yii::$app->request->get('type','shop');
        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Order');
            $data['order_money'] && $data['total'] = $data['order_money'];
            $data['create_time'] = time();
            $data['type'] = $type;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            $data['pay_time'] = time();
            if ($type == 'shop') {
                $shang = Shop::info($data['aid']);
                $data['title'] = $shang['title'];
            } else {
                $id_arr = explode('-', $data['aid']);
                $data['cid'] = $id_arr[0];
                $data['aid'] = $id_arr[1];
                $shang = Train::info($data['aid']);
                $centif = TrainCertificate::getInfo($id_arr[0]);
                $data['title'] = $centif['title'].$shang['title'];
            }
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->addRow('\backend\models\Order', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        /* 获取模型默认数据 */
        $model->loadDefaultValues();
        $model->order_sn = strtoupper(substr($type,0,1)).time().rand(1000,9999);
        $model->pay_type = 5;
        $model->pay_source = 3;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 编辑
     * ---------------------------------------
     */
    public function actionEdit(){
        $id = Yii::$app->request->get('id',0);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('Order');//print_r($data);exit();
            $data['order_money'] && $data['total'] = $data['order_money'];
            $data['update_time'] = time();
            $data['id'] = $id;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time']  = strtotime($data['end_time']);
            $data['pay_time']  = strtotime($data['pay_time']);
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            $model = Order::findOne($id);
            if($model->aid != $data['aid']) {
                if ($model->type == 'shop') {
                    $shang = Shop::info($data['aid']);
                    $data['title'] = $shang['title'];
                } else {
                    $id_arr = explode('-', $data['aid']);
                    $data['cid'] = $id_arr[0];
                    $data['aid'] = $id_arr[1];
                    $shang = Train::info($data['aid']);
                    $centif = TrainCertificate::getInfo($id_arr[0]);
                    $data['title'] = $centif['title'] . $shang['title'];
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Order', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Order::findOne($id);
        $model->start_time = date('Y-m-d H:i',$model->start_time);
        $model->end_time   = date('Y-m-d H:i',$model->end_time);
        if($model->type == 'train')
        $model->aid= $model->cid.'-'.$model->aid;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\backend\models\Order', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /*
     * ---------------------------------------
     * 导出excel
     * ---------------------------------------
     */
    public function export($data){
        /*$data = Order::find()->where(['pay_status' => 1])
            ->andWhere(['status'=>1])
            ->orderBy('order_id DESC')
            ->asArray()->all();*/
        $arr = [];
        $title = ['order_id','订单号','用户ID','姓名','电话','身份证','商品类型','套餐ID','商品ID','商品名','起租时间','退租时间',
            '数量','价格','支付状态','支付时间','支付类型','支付途径','下单时间','状态'];
        if ($data) {
            foreach ($data as $key => $value) {
                $arr[$key] = $value;
                $arr[$key]['start_time'] = date('Y-m-d H:i', $value['start_time']);
                $arr[$key]['end_time'] = date('Y-m-d H:i', $value['end_time']);
                $arr[$key]['pay_time'] = $value['pay_time'] ? date('Y-m-d H:i', $value['end_time']):0;
                $arr[$key]['create_time'] = $value['create_time'] ? date('Y-m-d H:i', $value['create_time']):0;
                $arr[$key]['pay_status'] = Yii::$app->params['pay_status'][$value['pay_status']];
                $arr[$key]['pay_type'] = $value['pay_type'] ? Yii::$app->params['pay_type'][$value['pay_type']] : '未支付';
                $arr[$key]['pay_source'] = Yii::$app->params['pay_source'][$value['pay_source']];
                $arr[$key]['status'] = '订单正常';
            }
        }

        FuncHelper::exportexcel($arr,$title);
    }

    public function actionRefund($id) {
        $order_info = Order::findOne($id);
        if($order_info->pay_type == 1) {
            //$this->_refundWx($order_info);
        }else if ($order_info->pay_type == 2) {

        }else if ($order_info->pay_type == 4) {

        }
    }

    /**
     * 微信退款
     */
    private function _refundWx($order_info, $refund_money=0)
    {
        //第三方交易号
        $trade_info = TradeRecord::findOne(['order_sn'=>$order_info['order_sn']]);
        if(!$trade_info){
            $this->error('交易号不存在哦!');
        }
        $transaction_id = $trade_info->third_trade_num;
        $total_fee = $trade_info['amount'] * 100;
        $refund_fee = $trade_info['amount'] * 100;
        $input = new \WxPayRefund();
        $input->SetTransaction_id($transaction_id);
        $input->SetTotal_fee($total_fee);
        $input->SetRefund_fee($refund_fee);
        $input->SetOut_refund_no($order_info['order_sn']);
        $input->SetOp_user_id(\WxPayConfig::MCHID);
        $rs_arr = \WxPayApi::refund($input);

        /*        {
                    "appid": "wx0be3294ad35e7e5c",
            "err_code": "TRADE_STATE_ERROR",
            "err_code_des": "订单状态错误",
            "mch_id": "1280814101",
            "nonce_str": "greYAwoi6uZcpxkc",
            "result_code": "FAIL",
            "return_code": "SUCCESS",
            "return_msg": "OK",
            "sign": "7056A20B4D339E3E9F8222D30F0A0CEB"
        }*/
        /*        {
                    "appid": "wx0be3294ad35e7e5c",
            "cash_fee": "150",
            "cash_refund_fee": "150",
            "coupon_refund_count": "0",
            "coupon_refund_fee": "0",
            "mch_id": "1280814101",
            "nonce_str": "dt8Hvceiyht6vnn2",
            "out_refund_no": "128081410120160603141634",
            "out_trade_no": "128081410120160519195629",
            "refund_channel": [],
            "refund_fee": "150",
            "refund_id": "2002832001201606030263476378",
            "result_code": "SUCCESS",
            "return_code": "SUCCESS",
            "return_msg": "OK",
            "sign": "2B09CF7B3B661C0D6B92D9B13B7D98FA",
            "total_fee": "150",
            "transaction_id": "4002832001201605196042760929"
        }*/
        if ($rs_arr['return_code'] == 'SUCCESS') {
            if(isset($rs_arr['err_code'])) {
                $this->error($rs_arr['err_code_des']);
            }
            $refund_info['out_refund_id'] = $rs_arr['refund_id'];
            $refund_info['out_refund_money'] = $rs_arr['refund_fee']/100;
            $refund_info['trade_type'] = 2;
            $refund_info['order_sn'] = $rs_arr['out_refund_no'];
            $refund_info['pay_type'] = 1;
            $rs = \home\models\Order::orderAfterRefund($refund_info);
            if($rs) {
                $this->success('退款成功!');
            }else{
                $this->error("退款失败!");
            }
        }else{
            $this->error($rs_arr['return_msg']);
        }
    }

    /**
     * 支付宝退款
     */
    protected function _refundAli($refund_info) {
        //第三方交易号
        $trade_no = $this->trade_record_model->getThirdTradeNum($refund_info['order_num']);
        if(!$trade_no){
            $this->error('交易号不存在哦!');
        }
        require_once("./Addons/pay/ali_batch_trans_notify/alipay.config.php");
        require_once("./Addons/pay/ali_batch_trans_notify/lib/alipay_submit.class.php");
        /*         * ************************请求参数************************* */

        //服务器异步通知页面路径
        $notify_url = C('ADMIN_BASE_URL').U('NotifyUrl/refundNotifyUrl');

        //必填，个人支付宝账号是真实姓名公司支付宝账号是公司名称
        //付款当天日期
        $pay_date = date("Y-m-d H:i:s",time());
        //必填，格式：年[4位]月[2位]日[2位]，如：20100801
        //批次号
        $batch_no = date("YmdHis").rand(100000,999999);

        //必填，即参数detail_data的值中所有金额的总和
        //付款笔数
        $batch_num = 1;
        //必填，即参数detail_data的值中，“|”字符出现的数量加1，最大支持1000笔（即“|”字符出现的数量999个）
        //付款详细数据
        $detail_data = $trade_no.'^'.$refund_info['refund_money'].'^'.$refund_info['refund_reason'];

        header("content-type:text/html;charset=utf-8");
        $parameter = array(
            "service" => "refund_fastpay_by_platform_nopwd",
            "partner" => trim($alipay_config['partner']),
            "notify_url" => $notify_url,
            "seller_user_id"	=> trim($alipay_config['partner']),
            "refund_date"	=> $pay_date,
            "batch_no"	=> $batch_no,
            "batch_num"	=> $batch_num,
            "detail_data"	=> $detail_data,
            "_input_charset"	=> trim(strtolower($alipay_config['input_charset']))
        );
        //建立请求
        $alipaySubmit = new \AlipaySubmit($alipay_config);
        $html_text = $alipaySubmit->buildRequestForm($parameter,"get", "确认");
        echo $html_text;
    }

}
