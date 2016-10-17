<?php

namespace home\models;

use Yii;

/**
 * 文章模型
 */
class Ad extends \common\models\Ad
{

    /**
     * 获取指定广告列表
     */
    public static function getAdList($type){
        return static::findAll(['type'=>$type]);
    }
}