<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $order_id
 * @property string $order_sn
 * @property integer $uid
 * @property string $name
 * @property string $tel
 * @property string $sfz
 * @property string $type
 * @property integer $taocan
 * @property integer $aid
 * @property string $title
 * @property integer $start_time
 * @property integer $end_time
 * @property integer $num
 * @property string $total
 * @property integer $pay_status
 * @property integer $pay_time
 * @property integer $pay_type
 * @property integer $pay_source
 * @property integer $create_time
 * @property integer $status
 */
class Order extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_sn', 'type', 'aid', 'title', 'start_time', 'end_time', 'pay_time', 'create_time'], 'required'],
            [['uid', 'taocan', 'aid', 'start_time', 'end_time', 'num', 'pay_status', 'pay_time', 'pay_type', 'pay_source', 'create_time', 'status'], 'integer'],
            [['total'], 'number'],
            [['order_sn', 'type'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 30],
            [['tel', 'sfz'], 'string', 'max' => 20],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_sn' => 'Order Sn',
            'uid' => 'Uid',
            'name' => 'Name',
            'tel' => 'Tel',
            'sfz' => 'Sfz',
            'type' => 'Type',
            'taocan' => 'Taocan',
            'aid' => 'Aid',
            'title' => 'Title',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'num' => 'Num',
            'total' => 'Total',
            'pay_status' => 'Pay Status',
            'pay_time' => 'Pay Time',
            'pay_type' => 'Pay Type',
            'pay_source' => 'Pay Source',
            'create_time' => 'Create Time',
            'status' => 'Status',
        ];
    }
}
