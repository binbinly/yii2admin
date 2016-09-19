<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%shop_group}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $groups
 * @property string $price
 * @property integer $sort
 * @property integer $status
 */
class ShopGroup extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_group}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'groups', 'price'], 'required'],
            [['price'], 'number'],
            [['sort', 'status'], 'integer'],
            [['title'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'groups' => 'Groups',
            'price' => 'Price',
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }
}
