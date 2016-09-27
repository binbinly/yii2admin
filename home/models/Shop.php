<?php

namespace home\models;

use Yii;

/**
 * 培训前端模型
 */
class Shop extends \common\models\Shop
{
    /**
     * 获取活动内容
     */
    public static function info($id)
    {
        return static::find()->where(['id'=>$id])->asArray()->one();
    }

    /*
     * ---------------------------------------
     * 获取一个类型所有的内容
     * ---------------------------------------
     */
    public static function lists($type){
        return static::find()->where(['type'=>$type])->orderBy('id ASC')->asArray()->all();
    }
}
