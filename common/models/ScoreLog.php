<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%score_log}}".
 *
 * @property string $id
 * @property string $uid
 * @property integer $score
 * @property string $order_sn
 * @property integer $create_time
 */
class ScoreLog extends \common\core\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%score_log}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uid', 'score', 'create_time', 'status'], 'integer'],
            [['order_sn'], 'string', 'max' => 20]
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
            'score' => 'Score',
            'order_sn' => 'Order Sn',
            'create_time' => 'Create Time',
            'status' => 'Status',
        ];
    }

    public function add($employ_score, $order_sn){
        $this->uid = Yii::$app->user->identity->getId();
        $this->create_time = time();
        $this->order_sn = $order_sn;
        $this->score = '-'.$employ_score;
        $this->save();
    }
}
