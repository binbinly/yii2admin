<?php

namespace home\controllers;

use home\models\Article;
use home\models\Category;
use Yii;

class ArticleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $cid = Yii::$app->request->get('cid', 1);
        $data = Article::lists($cid);//var_dump($data);exit();
        $category = Category::info($cid);

        $param['data'] = $data;
        $param['category'] = $category;
        /* 关于我们 */
        if ($cid == 1) {
            return $this->render('about',$param);
        }
        /* 其他活动 */
        return $this->render('index',$param);
    }
    
    public function actionShow()
    {
        $id = Yii::$app->request->get('id', 1);
        $data = Article::info($id);
        $category = Category::info($data['category_id']);
        return $this->render('show',[
            'data' => $data,
            'category' => $category,
        ]);
    }

}
