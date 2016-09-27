<?php

namespace home\models;

use Yii;

/**
 *
 *
 */
class Category extends \common\models\Category
{
    /**
     * 获取栏目信息
     */
    public static function info($id)
    {
        return static::find()->where(['id'=>$id])->asArray()->one();
    }


}
