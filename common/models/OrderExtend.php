<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order_extend}}".
 *
 * @property integer $id
 * @property string $aid
 * @property string $title
 * @property string $start_time
 * @property string $end_time
 * @property string $num
 * @property string $total
 * @property string $create_time
 * @property string $pid
 * @property integer $taocan
 */
class OrderExtend extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_extend}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aid', 'title', 'start_time', 'end_time', 'create_time'], 'required'],
            [['aid', 'start_time', 'end_time', 'num', 'create_time', 'pid', 'taocan'], 'integer'],
            [['total'], 'number'],
            [['title'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aid' => 'Aid',
            'title' => 'Title',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'num' => 'Num',
            'total' => 'Total',
            'create_time' => 'Create Time',
            'pid' => 'Pid',
            'taocan' => 'Taocan',
        ];
    }
}
