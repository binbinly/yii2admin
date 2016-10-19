<?php

namespace home\models;

use common\models\RechargeLog;
use common\models\ScoreLog;
use Yii;

/**
 * 订单前端模型
 */
class Order extends \common\models\Order
{

    public static function orderPayCallback($data){
        $info = static::findOne(['order_sn'=>$data['out_trade_no'], 'pay_status'=>0]);
        if($info) {
            if($data['pay_type'] == 4) {
                $is_succ = User::updateUserAmount($info->uid, $info->total);
                if(!$is_succ) {
                    return false;
                }
            }
            //用户积分使用
            $score_model = ScoreLog::findOne(['order_sn'=>$data['out_trade_no'], 'status'=>0]);
            if($score_model) {
                $score_model -> status = 1;
                $score_model->save();
                //用户积分修改
                User::updateUserScore($info->uid, $score_model->score);
            }
            $info->pay_time = time();
            $info->pay_type = $data['pay_type'];
            $info->pay_source = 1;
            $info->pay_status = 1;
            if($data['pay_type'] == 4) {//钱包
                $total_fee = $score_model ? $info->total-abs($score_model->score/100) : $info->total;
                $data['total_fee'] = $total_fee;
            }
            $info->order_money = $data['total_fee'];
            $succ = $info->save();
            if($succ) {
                //支付记录
                $trade_type = 1;
                if(substr($data['out_trade_no'], 0, 1) == 'R') {
                    $trade_type = 2;
                    //用户表金额修改
                    $recharge_model = RechargeLog::findOne(['order_sn'=>$data['out_trade_no']]);
                    $user_model = User::findIdentity($recharge_model->uid);
                    $user_model->amount += $data['total_fee'];
                    $user_model->save();
                }
                $trade['trade_type'] = $trade_type;//支付
                $trade['third_trade_num'] = $data['trade_no'];
                $trade['order_sn'] = $data['out_trade_no'];
                $trade['pay_type'] = $data['pay_type'];
                $trade['amount'] = '+'.$data['total_fee'];
                $trade['add_time'] = time();
                $trade['remark'] = '';
                $trade['uid'] = $info->uid;
                $model = new TradeRecord();
                $model->setAttributes($trade);
                $model->save();

                //用户积分修改
                User::updateUserScore($info->uid, intval($data['total_fee']));

                //积分记录
                $score['order_sn'] = $data['out_trade_no'];
                $score['score'] = intval($data['total_fee']);
                $score['create_time'] = time();
                $score['uid'] = $info->uid;
                $score['status'] = 1;
                $score_model = new ScoreLog();
                $score_model->setAttributes($score);
                $score_model->save();
                return true;
            }
        }
        return false;
    }

    public static function orderAfterRefund($refund_info) {
        $info = static::findOne(['order_sn'=>$refund_info['order_sn'], 'pay_status'=>1]);
        if($info) {
            //修改订单状态为已退款
            $info->pay_status = 3;
            $info->save();

            if($refund_info['pay_type'] == 4) {
                $is_succ = User::updateUserAmount($info->uid, -$refund_info['out_refund_money']);
                if(!$is_succ) {
                    return false;
                }
            }

            //添加交易记录
            $trade = new TradeRecord();
            $trade->uid = $info->uid;
            $trade->trade_type = 2;
            $trade->third_trade_num = $refund_info['out_refund_id'];
            $trade->order_sn = $info->order_sn;
            $trade->pay_type = $refund_info['pay_type'];
            $trade->amount = -$refund_info['out_refund_money'];
            $trade->add_time = time();
            $trade->remark = '退款';
            $trade->save();

            //用户积分修改
            User::updateUserScore($info->uid, intval($refund_info['out_refund_money']), -1);

            //积分记录
            $score['order_sn'] = $info->order_sn;
            $score['score'] = intval(-$refund_info['out_refund_money']);
            $score['create_time'] = time();
            $score['uid'] = $info->uid;
            $score['status'] = 1;
            $score_model = new ScoreLog();
            $score_model->setAttributes($score);
            $score_model->save();

        }else{
            return false;
        }
    }

    public static function onlinePay($order_sn, $pay_pwd){
        if(!$pay_pwd) {
            return ['code'=>-1, 'msg'=>'请输入支付密码'];
        }
        $user = User::findIdentity(Yii::$app->user->identity->getId());
        if(!$user->validatePayPassword($pay_pwd)) {
            return ['code'=>-1, 'msg'=>'支付密码错误'];
        }
        $data['out_trade_no'] = $order_sn;
        $data['trade_no'] = '';
        $data['pay_type'] = 4;
        if(static::orderPayCallback($data)){
            return ['code'=>1, 'msg'=>'支付成功'];
        }
        return ['code'=>0, 'msg'=>'支付失败'];
    }

    public static function getTrainTuanList($date, $id, $cid){
        $stime = strtotime($date.'-01');
        $etime = strtotime($date.'-01 +1 month');
        $list = static::find()->select(['FROM_UNIXTIME(start_time,"%Y-%m-%d") AS s', 'sum(num) AS c'])
            ->where(['type'=>'train_tuan', 'pay_status'=>1, 'cid'=>$cid, 'aid'=>$id])
            ->andWhere(['between', 'start_time', $stime, $etime])->groupBy('s')->asArray()->all();
        return $list;
    }
}
