<?php

namespace home\models;

use Yii;

/**
 * 培训前端模型
 */
class ShopPrice extends \common\models\ShopPrice
{
    public static function getNickPrice($stime, $day, $shop_id) {
        $date[0] = $stime;
        if($day > 1) {
            for ($i = 1; $i < $day; $i++) {
                $date[] = $stime = date('Y-m-d',strtotime($stime)+24*60*60);
            }
        }
        //获取变动价格的天数，和总价
        $list = static::find()->where(['day'=>$date, 'shop_id'=>$shop_id])->select(['count(id) as n, sum(price) as total,price'])->asArray()->one();
        return $list;
    }

    public static function getNickPriceHour($stime, $id, $type = 1) {
        if($type == 1) {//非套餐
            $where['shop_id'] = $id;
        }else{
            $where['group_id'] = $id;
        }
        $where['day'] = substr($stime, 0, strpos($stime, ' '));
        return $info = static::findOne($where);
    }
}
