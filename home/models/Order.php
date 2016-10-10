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
            $info->pay_time = time();
            $info->pay_type = $data['pay_type'];
            $info->pay_source = 1;
            $info->pay_status = 1;
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
                $trade['uid'] = $info['uid'];
                $model = new TradeRecord();
                $model->setAttributes($trade);
                $model->save();

                //用户积分修改
                User::updateUserScore($info['uid'], '+'.$data['total_fee']);

                //积分记录
                $score['order_sn'] = $data['out_trade_no'];
                $score['score'] = '+'. $data['total_fee'];
                $score['create_time'] = time();
                $score['uid'] = $info['uid'];
                $score_model = new ScoreLog();
                $score_model->setAttributes($score);
                $score_model->save();
                return true;
            }
        }
        return false;
    }
}
