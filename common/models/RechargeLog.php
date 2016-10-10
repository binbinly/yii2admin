<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%recharge_log}}".
 *
 * @property integer $id
 * @property string $order_sn
 * @property string $amount
 * @property integer $pay_type
 * @property integer $ctime
 */
class RechargeLog extends \common\core\BaseActiveRecord
{

    public $title;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%recharge_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amount', 'pay_type'], 'required'],
            [['amount'], 'number'],
            [['pay_type', 'ctime', 'uid'], 'integer'],
            [['order_sn'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_sn' => 'Order Sn',
            'amount' => 'Amount',
            'pay_type' => 'Pay Type',
            'ctime' => 'Ctime',
        ];
    }

    public function add(){
        if($this->validate()) {
            $this->uid = Yii::$app->user->identity->getId();
            $this->ctime = time();
            $this->order_sn = 'R'.time().rand(1000, 9999);
            return $this->save();
        }
    }
}
