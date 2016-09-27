<?php

namespace backend\models;

use Yii;

/*
 * ---------------------------------------
 * 文章模型
 * ---------------------------------------
 */
class Order extends \common\models\Order
{

    public function rules()
    {
        return [
            [['order_sn', 'type', 'aid', 'title', 'start_time', 'end_time', 'pay_time', 'create_time', 'status', 'order_money'], 'required'],
            [['uid', 'num', 'pay_status', 'pay_time', 'pay_type', 'pay_source', 'create_time', 'status','cid','total'], 'integer'],
            [['order_sn', 'type'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 30],
            [['tel'], 'string', 'max' => 20],
        ];
    }
    
    
}
