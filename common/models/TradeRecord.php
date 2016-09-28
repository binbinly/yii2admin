<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%trade_record}}".
 *
 * @property integer $id
 * @property integer $uid
 * @property integer $trade_type
 * @property string $third_trade_num
 * @property string $order_sn
 * @property integer $pay_type
 * @property string $amount
 * @property integer $add_time
 * @property string $remark
 */
class TradeRecord extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%trade_record}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'amount'], 'required'],
            [['uid', 'trade_type', 'pay_type', 'add_time'], 'integer'],
            [['amount'], 'number'],
            [['third_trade_num'], 'string', 'max' => 60],
            [['order_sn'], 'string', 'max' => 32],
            [['remark'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'trade_type' => 'Trade Type',
            'third_trade_num' => 'Third Trade Num',
            'order_sn' => 'Order Sn',
            'pay_type' => 'Pay Type',
            'amount' => 'Amount',
            'add_time' => 'Add Time',
            'remark' => 'Remark',
        ];
    }
}
