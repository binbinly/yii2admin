<?php

namespace home\models;

use Yii;

class ShopGroup extends \common\models\ShopGroup
{
    /*
     * ---------------------------------------
     * 获取所有套餐
     * ---------------------------------------
     */
    public static function lists()
    {
        return static::find()->where(['status'=>1])->orderBy('id DESC')->asArray()->all();
    }

    /**
     * 获取套餐内容
     */
    public static function info($id)
    {
        return static::find()->where(['id'=>$id])->asArray()->one();
    }


}
