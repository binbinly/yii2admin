<?php

namespace home\models;

use Yii;

/**
 * 培训前端模型
 */
class Train extends \common\models\Train
{
    /**
     * 获取活动内容
     */
    public static function info($id)
    {
        return static::find()->where(['id'=>$id])->asArray()->one();
    }

    public static function getMax($id)
    {
        $info = static::findOne($id);
        return $info->num;
    }

    /*
     * ---------------------------------------
     * 获取一个类型所有的内容
     * ---------------------------------------
     */
    public static function lists($type){
        return static::find()->where(['type'=>$type])->orderBy('id ASC')->asArray()->all();
    }

    public static function calendar($id, $cid, $p=0){
        $train_max = static::getMax($id);
        $html = '';
        $month = $p ? date('m', strtotime('+'.$p.' month')) : date('m');
        $year = $p ? date('Y', strtotime('Y'.$p.' month')) : date('Y');

        $tuan_list = Order::getTrainTuanList($year.'-'.$month, $id, $cid);

        $start_week = date('w',mktime(0,0,0,$month,1,$year));
        $day_num = date('t',mktime(0,0,0,$month,1,$year));

        for($i = 0; $i<$start_week; $i++)
        {
            $html .= "<td></td>";
        }
        $j=1;

        while($j<=$day_num)
        {
            $date = $year."-".$month."-".$j;
            $datetime = '';
            if(strtotime($date.' -1 days') > time()) {
                $datetime = $date;
            }
            if($tuan_list) {
                $is_yes = 0;
                foreach ($tuan_list as $val) {
                    if ($val['s'] == $date || $val['s'] == $year."-".$month."-0".$j) {
                        $is_yes = 1;
                        if($val['c']>=$train_max){
                            $html .= "<td data-time='" . $datetime . "'><span class='day on'>$j</span><span class='booking notfull'>" . $val['c'] . '/' . $train_max . "</span></td>";
                        }else {
                            $html .= "<td data-time='" . $datetime . "'><span class='day on'>$j</span><span class='booking full'>" . $val['c'] . '/' . $train_max . "</span></td>";
                        }
                        break;
                    }
                }
                !$is_yes && $html .= "<td data-time='" . $datetime . "'><span class='day on'>$j</span></td>";
            } else {
                $html .= "<td data-time='" . $datetime . "'><span class='day on'>$j</span></td>";
            }
            $week = ($start_week+$j-1)%7;

            if($week ==6){
                $html .= "</tr>";
                if($j != $day_num)
                    $html .= "<tr>";
                else $end = true;
            }
            $j++;
        }
        while($week%7 != 6)
        {
            $html .= "<td></td>";
            $week++;
        }
        return $html;
    }
}
