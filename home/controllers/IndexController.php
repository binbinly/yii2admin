<?php

namespace home\controllers;

use home\models\ShopGroup;
use home\models\Article;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        /* 首页 套餐 幻灯片 */
        $group_ppt = ShopGroup::find()->where(['status'=>1])->orderBy('SORT desc')->limit(3)->asArray()->all();
        $article_ppt = Article::lists(3);
        $recommd = array();
        $recommd['all'] = array_merge($group_ppt, $article_ppt);
        $recommd['active'] = $article_ppt;
        $recommd['package'] = $group_ppt;

        //var_dump($group_ppt);exit();
        return $this->render('index',[
            'group_ppt' => $group_ppt,
            'recommd' => $recommd,
        ]);
    }
}
