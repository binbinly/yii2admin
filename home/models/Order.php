<?php

namespace home\models;

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
                $trade['trade_type'] = 1;//支付
                $trade['third_trade_num'] = $data['trade_no'];
                $trade['order_sn'] = $data['out_trade_no'];
                $trade['pay_type'] = $data['pay_type'];
                $trade['amount'] = '+'.$data['total_fee'];
                $trade['add_time'] = time();
                $trade['remark'] = '支付宝支付记录';
                $model = new TradeRecord();
                $model->setAttributes($trade);
                return $model->save();
            }
        }
    }
}
