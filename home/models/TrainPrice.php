<?php

namespace home\models;

use Yii;

/**
 * 培训前端模型
 */
class TrainPrice extends \common\models\TrainPrice
{
    public static function getNickPrice($train_id, $certif_id) {
        $info = static::find()->select(['price'])->where(['train_id'=>$train_id, 'certif_id'=>$certif_id])->one();
        return $info['price'];
    }
}
