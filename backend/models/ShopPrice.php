<?php

namespace backend\models;

use Yii;

/*
 * ---------------------------------------
 * 变价模型
 * ---------------------------------------
 */
class ShopPrice extends \common\models\ShopPrice
{

    public function setShopPrice($data) {
        // if(!$data['shop_day']) return false;
        if(isset($data['shop_id']) && !empty($data['shop_id'])) {
            static::deleteAll(['shop_id' => $data['shop_id']]);
        }else{
            static::deleteAll(['group_id' => $data['group_id']]);
        }
        if(isset($data['shop_day'])){
            foreach($data['shop_day'] as $key=>$val) {
                $this->isNewRecord = true;
                $this->shop_id = isset($data['shop_id']) ? $data['shop_id'] : 0;
                $this->group_id = isset($data['group_id']) ? $data['group_id'] : 0;
                $this->day = $val;
                $this->price = $data['shop_price'][$key];
                $this->save();
                $this->id = 0;
            }
        }
        
    }
    
}
