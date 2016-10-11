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

    /*
     * ---------------------------------------
     * 获取一个类型所有的内容
     * ---------------------------------------
     */
    public static function lists($type){
        return static::find()->where(['type'=>$type])->orderBy('id ASC')->asArray()->all();
    }

    public static function calendar(){
        $html = '';
        $month = date('m');
        $year = date('Y');

        $start_week = date('w',mktime(0,0,0,$month,1,$year));
        $day_num = date('t',mktime(0,0,0,$month,1,$year));
        $end = false;
        for($i = 0; $i<$start_week; $i++)
        {
            $html .= "<td></td>";
        }
        $j=1;

        while($j<=$day_num)
        {
            $date = $year."-".$month."-".$j;
            if($j == 1){
                $html .= "<td data-time='".$date."'><span class='day on'>$j</span><span class='booking notfull'>6/4</span></td>";
            }else {
                $html .= "<td data-time='".$date."'><span class='day on'>$j</span></td>";
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
