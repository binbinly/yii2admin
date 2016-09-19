<?php

namespace backend\models;

use common\models\ShopType;
use Yii;

/*
 * ---------------------------------------
 * 商品模型
 * ---------------------------------------
 */
class Shop extends \common\models\Shop
{

    /*
     * ---------------------------------------
     * 获取一条商品信息
     * ---------------------------------------
     */
    public static function info($id){
        return static::find()->where(['id'=>$id])->asArray()->one();
    }

    /*
     * ---------------------------------------
     * 商品列表 按类型分组
     * ---------------------------------------
     */
    public static function lists($type = 0){
        $arr = [];
        $typeArr = ShopType::find()->orderBy('id ASC')->asArray()->all();
        if (!$typeArr) {
            return false;
        }
        foreach ($typeArr as $value) {
            $_tmp = static::find()->where(['type'=>$value['id']])->orderBy('id ASC')->asArray()->all();
            $arr[$value['id']] = $_tmp?$_tmp:[];
        }
        return $type == 0 ? $arr : $arr[$type];
    }

    /*
     * ---------------------------------------
     * 商品列表 按类型分组 key-value
     * ---------------------------------------
     */
    public static function listsKv(){
        $arr = [];
        $typeArr = ShopType::find()->orderBy('id ASC')->asArray()->all();
        if (!$typeArr) {
            return false;
        }
        foreach ($typeArr as $value) {
            $_tmps = static::find()->where(['type'=>$value['id']])->orderBy('id ASC')->asArray()->all();
            if (!$_tmps) {
                continue;
            }
            foreach ($_tmps as $v) {
                $arr[$value['name']][$v['id']] = $v['title'];
            }

        }
        return $arr ;
    }
    
    
    
}
