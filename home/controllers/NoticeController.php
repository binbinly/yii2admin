<?php
namespace home\controllers;

use home\models\Order;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class NoticeController extends Controller{

    public function actionWxNotify(){
        $notify = new \PayNotifyCallBack();
    }

    public function actionAliNotify(){
        $alipay = new \AlipayPay();
        $verify_result = $alipay->verifyNotify();

        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代


            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——

            //获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表

            //商户订单号
            $out_trade_no = $_POST['out_trade_no'];

            //支付宝交易号
            $trade_no = $_POST['trade_no'];

            //交易状态
            $trade_status = $_POST['trade_status'];

            $body = $_POST['body'];


            if($_POST['trade_status'] == 'TRADE_FINISHED') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");

                $data['out_trade_no'] = $out_trade_no;
                $data['trade_no'] = $trade_no;
                $data['trade_status'] = $trade_status;
                $data['total_fee'] = $_POST['total_fee'];
                $data['pay_type'] = 2;
                $data['body'] = $body;
                Order::orderPayCallback($data);
            }
            else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //请务必判断请求时的total_fee、seller_id与通知时获取的total_fee、seller_id为一致的
                //如果有做过处理，不执行商户的业务程序

                //注意：
                //付款完成后，支付宝系统发送该交易状态通知

                //调试用，写文本函数记录程序运行情况是否正常
                //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
                $data['out_trade_no'] = $out_trade_no;
                $data['trade_no'] = $trade_no;
                $data['trade_status'] = $trade_status;
                $data['total_fee'] = $_POST['total_fee'];
                $data['pay_type'] = 2;
                $data['body'] = $body;
                Order::orderPayCallback($data);
            }

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            echo "success";		//请不要修改或删除

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            echo "fail";

            //调试用，写文本函数记录程序运行情况是否正常
            //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
        }
    }

    public function actionAliReturn(){
        $alipay = new \AlipayPay();
        $verify_result = $alipay->verifyReturn();
        //var_dump($verify_result);
        //file_put_contents('./log.txt', 'start->>'.json_encode($_POST), FILE_APPEND);

        if($verify_result) {//验证成功
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //请在这里加上商户的业务逻辑程序代码

            //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
            //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表

            //商户订单号
            $out_trade_no = $_GET['out_trade_no'];

            //支付宝交易号
            $trade_no = $_GET['trade_no'];

            //交易状态
            $trade_status = $_GET['trade_status'];

            $body = $_GET['body'];

            if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
                //判断该笔订单是否在商户网站中已经做过处理
                //如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
                //如果有做过处理，不执行商户的业务程序
                $data['out_trade_no'] = $out_trade_no;
                $data['trade_no'] = $trade_no;
                $data['trade_status'] = $trade_status;
                $data['total_fee'] = $_GET['total_fee'];
                $data['pay_type'] = 2;
                $data['body'] = $body;
                Order::orderPayCallback($data);
            }
            else {
                //echo "trade_status=".$_GET['trade_status'];
            }

            Yii::$app->getSession()->setFlash('success', '交易成功!');
            $this->redirect(Url::to(['/train/index']));
            Yii::$app->end();

            //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——

            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        }
        else {
            //验证失败
            //如要调试，请看alipay_notify.php页面的verifyReturn函数
            //echo "验证失败";
            Yii::$app->getSession()->setFlash('error', '验证失败，请联系管理员');
            $this->redirect(Url::to(['/train/index']));
            Yii::$app->end();
        }
    }

    public function actionUnion(){

    }
}