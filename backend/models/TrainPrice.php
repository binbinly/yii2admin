<?php

namespace backend\models;

use Yii;

/*
 * ---------------------------------------
 * 文章模型
 * ---------------------------------------
 */
class TrainPrice extends \common\models\TrainPrice
{
    /*
     * ---------------------------------------
     * 添加记录
     * ---------------------------------------
     */
    public function addPrice($train_id, $train_price){
        if(!$train_price) return false;
        static::deleteAll(['train_id'=>$train_id]);
        foreach($train_price['price'] as $key => $price) {
            $this->isNewRecord = true;
            $this->train_id = $train_id;
            $this->certif_id = $train_price['certif_id'][$key];
            $this->price = $price;
            $id = $this->save();
            $this->id = 0;
        }
    }

    public static function getListByTrainId($train_id) {
        $list = static::find()->from('yii2_train_price as p')->select(['p.train_id', 'p.certif_id', 'p.price','c.id', 'c.title'])
            ->leftJoin('yii2_train_certificate as c', 'p.certif_id=c.id')->where(['p.train_id'=>$train_id])->asArray()->all();
        return $list;
    }
    
    
}
