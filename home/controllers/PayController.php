<?php
namespace home\controllers;

use Yii;
use yii\web\Controller;

class PayController extends Controller{

    public function unionPay(){

    }

    public function aLiPay(){

    }

    public function actionWxPay($order_sn){
        //模式二
        /**
         * 流程：
         * 1、调用统一下单，取得code_url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、支付完成之后，微信服务器会通知支付成功
         * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("蝶讯服装商品");
        $input->SetAttach($order_sn);
        $input->SetOut_trade_no($order_sn);
        $input->SetTotal_fee(1);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("蝶讯服装商品");
        $input->SetNotify_url('http://www.test.lo/WxPayNotify/index');
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($order_sn);
        $result = $notify->GetPayUrl($input);
        $url2 = $result["code_url"];
        $pay_code_url = "http://paysdk.weixin.qq.com/example/qrcode.php?data=" . urlencode($url2);
        return $this->render('wx-pay', ['pay_code_url', $pay_code_url]);
    }

    /**
     * 银联支付测试
     * @author Alan51
     * @access public
     * @since 1.0
     */
    public function actionUnionpay() {
        $params = Yii::$app->params;
        $wxPay = new \WechatPay($params['mchId'], $params['app_id'], $params['mchKey']);
        $tool = new \tools();
        $order_id = $tool->generateuuid_no(1);
        $notify_url = Yii::$app->request->hostInfo.'/'.Yii::$app->params['unionPayBackReceive'];
        //$package = $wxPay->createJsBizPackage('open_id', 100, $order_id, '测试订单名称', $notify_url, time());
        $package = '';
        return $this->render('index', array('package'=>$package));
    }

    /**
     * 去支付
     * @author Alan51
     * @access public
     * @since 1.0
     */
    public function actionGetunionpay() {
        $orderId = Yii::$app->request->post('orderId', date('YmdHis'));
        $txnTime = Yii::$app->request->post('txnTime', date('YmdHis'));
        $txnAmt = Yii::$app->request->post('txnAmt');
        $backUrl = Yii::$app->request->hostInfo.'/'.Yii::$app->params['unionPayBackReceive'];
        $merId = Yii::$app->params['merId'];
        $html = \AcpService::createFormatHtml(compact('merId', 'orderId', 'txnTime', 'txnAmt', 'backUrl'));
        echo $html;die;
    }

    /**
     * 回调通知
     * @author Alan51
     * @access public
     * @since 1.0
     */
    public function actionBackreceive (){

    }
}