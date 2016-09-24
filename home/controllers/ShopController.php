<?php

namespace home\controllers;

use home\models\ShopGroup;
use Yii;
use home\models\Shop;

class ShopController extends \yii\web\Controller
{
    /* 列表 */
    public function actionIndex()
    {
        $type = Yii::$app->request->get('type');
        $list = Shop::lists($type);
        foreach ($list as &$value) {
            /* 图片 */
            $value['images'] = explode(',', trim($value['images'],','));
            /* 扩展数据 */
            $value['extend'] = unserialize($value['extend']);
        }//var_dump($list);exit;
        return $this->render('index',[
            'list' => $list
        ]);
    }
    
    /* 套餐列表 */
    public function actionGroup()
    {
        $lists = ShopGroup::lists();
        return $this->render('group',[
            'lists' => $lists,
        ]);
    }
    
    /* 套餐内容 */
    public function actionDetail()
    {
        $id = Yii::$app->request->get('id', 1);
        $lists = \backend\models\Shop::lists();
        $info = ShopGroup::info($id);
        $info['images'] = explode(',', trim($info['images'],','));
        $info['groups'] = unserialize($info['groups']);//var_dump($info['groups']);exit();
        return $this->render('detail',[
            'lists' => $lists,
            'info' => $info,
        ]);
    }

    /* 自定义套餐内容 */
    public function actionCustom()
    {
        $id = Yii::$app->request->get('id', 1);
        $lists = \backend\models\Shop::lists();
        return $this->render('custom',[
            'lists' => $lists,
        ]);
    }
    
    
    
    
    
    
    
    
    
}
