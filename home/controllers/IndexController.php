<?php

namespace home\controllers;

use home\models\ShopGroup;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        /* 首页 套餐 幻灯片 */
        $group_ppt = ShopGroup::find()->where(['status'=>1])->orderBy('SORT asc')->limit(3)->asArray()->all();
        //var_dump($group_ppt);exit();
        return $this->render('index',[
            'group_ppt' => $group_ppt,
        ]);
    }
}
