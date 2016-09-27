<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%train_type}}".
 *
 * @property integer $id
 * @property string $name
 */
class TrainPrice extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%train_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['train_id', 'certif_id', 'price'], 'required'],
            [['train_id', 'certif_id'], 'integer'],
            [['price'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'train_id' => 'Train_id',
            'certif_id' => 'Certif_id',
            'price' => 'Price',
        ];
    }

}
