<?php

namespace home\models;

use Yii;

/**
 * 培训类型模型
 */
class TrainType extends \common\models\TrainType
{
    /**
     * 培训类型详情
     */
    public static function info($type)
    {
        return static::find()->where(['id'=>$type])->asArray()->one();
    }


}
