<?php
namespace home\controllers;

use common\models\RechargeLog;
use common\models\ScoreLog;
use home\models\Order;
use home\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class PayController extends Controller{

    public function unionPay(){

    }

    public function actionWalletPay($order_sn, $employ_score, $pay_pwd){
        $user_model = User::findIdentity(Yii::$app->user->identity->getId());
        if($employ_score <= $user_model->score && $user_model->score>=100 && $employ_score>=100) {
            $score_log_model = new ScoreLog();
            $score_log_model->add($employ_score, $order_sn);
        }
        $succ = \home\models\Order::onlinePay($order_sn, $pay_pwd);
        if($succ['code']==1) {
            Yii::$app->getSession()->setFlash('success', '支付成功');
            $this->redirect(Url::to(['/']));
            Yii::$app->end();
        }else{
            Yii::$app->getSession()->setFlash('error', $succ['msg']);
            $this->redirect(Url::to(['/']));
            Yii::$app->end();
        }
    }

    public function actionAliPay($order_sn){
        $order_info = $this->checkOrder($order_sn);
        $show_url = 'http://ddd.huanglongfei.cn';
        $alipay = new \AlipayPay();
        $html = $alipay->requestPay($order_sn, $order_info->title, $order_info->total, $order_sn, $show_url);
        echo $html;
    }

    public function actionWxPay($order_sn){
        //echo '<meta http-equiv="content-type" content="text/html;charset=utf-8"/>';
        //模式二
        /**
         * 流程：
         * 1、调用统一下单，取得code_url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、支付完成之后，微信服务器会通知支付成功
         * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
        $order_info = $this->checkOrder($order_sn);
        $total = $order_info->total * 100;
        $notify = new \NativePay();
        $input = new \WxPayUnifiedOrder();
        $input->SetBody($order_info->title);
        $input->SetAttach($order_sn);
        $input->SetOut_trade_no($order_sn);
        $input->SetTotal_fee($total);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag($order_info->title);
        $input->SetNotify_url("http://ddd.huanglongfei.cn/notice/wx-notify");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id($order_sn);

        $result = $notify->GetPayUrl($input);

        $pay_code_url = $result["code_url"];
        return $this->render('wx-pay', ['pay_code_url'=>$pay_code_url, 'order_sn'=>$order_sn]);
    }

    public function actionAjaxPayStatus($order_sn){
        $info = Order::findOne(['order_sn' => $order_sn, 'pay_status'=>1]);
        if($info) {
            echo json_encode(['stat'=>1]);exit;
        }
        echo json_encode(['stat'=>0]);
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

    private function checkOrder($order_sn) {
        if(substr($order_sn, 0, 1) == 'R') {//充值订单
            $order_info = RechargeLog::findOne(['order_sn'=>$order_sn]);
            if($order_info) {
                $order_info->title = '充值';
            }
            return $order_info;
        }
        $order_info = Order::findOne(['order_sn' => $order_sn]);
        if(!$order_info) {
            Yii::$app->getSession()->setFlash('error', '该订单不存在!');
            $this->redirect(Url::to(['/']));
            Yii::$app->end();
        }
        if ($order_info->pay_status == 1 && $order_info->pay_time > 0) {
            Yii::$app->getSession()->setFlash('error', '该订单已经支付了哦!');
            $this->redirect(Url::to(['/']));
            Yii::$app->end();
        }
        return $order_info;
    }
}