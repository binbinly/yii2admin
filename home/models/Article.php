<?php

namespace home\models;

use Yii;

/**
 * 文章模型
 */
class Article extends \common\models\Article
{

    /*
     * ---------------------------------------
     * 获取一条内容
     * ---------------------------------------
     */
    public static function info($id){
        return static::find()->where(['id'=>$id])->asArray()->one();
    }

    /*
     * ---------------------------------------
     * 获取一个栏目所有的内容
     * ---------------------------------------
     */
    public static function lists($cid){
        return static::find()->where(['category_id'=>$cid])->orderBy('id ASC')->asArray()->all();
    }
}
