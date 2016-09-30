<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_price}}".
 *
 * @property integer $id
 * @property integer $shop_id
 * @property integer $day
 * @property string $price
 */
class ShopPrice extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_price}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['day', 'price'], 'required'],
            [['shop_id', 'group_id'], 'integer'],
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
            'shop_id' => 'Shop ID',
            'day' => 'Day',
            'price' => 'Price',
            'group_id' => 'Group ID'
        ];
    }
}
