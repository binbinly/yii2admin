<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%train}}".
 *
 * @property string $id
 * @property integer $type
 * @property string $title
 * @property string $description
 * @property string $price
 * @property integer $num
 * @property integer $sort
 * @property string $create_time
 * @property string $update_time
 * @property integer $status
 */
class Train extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%train}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'title', 'description'], 'required'],
            [['type', 'num', 'max', 'days', 'sort', 'is_tuan', 'create_time', 'update_time', 'status'], 'integer'],
            [['price'], 'number'],
            [['title','cover'], 'string', 'max' => 100],
            [['remark'], 'string'],
            [['description','images'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'num' => 'Num',
            'sort' => 'Sort',
            'cover'=> 'Cover',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'status' => 'Status',
            'max' => 'Max',
            'days' => 'Days',
            'is_tuan' => 'Is_tuan'
        ];
    }
}
