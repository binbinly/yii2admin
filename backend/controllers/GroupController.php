<?php

namespace backend\controllers;

use backend\models\Shop;
use backend\models\ShopGroup;
use backend\models\ShopPrice;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use Yii;


/*
 * 商品套餐
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class GroupController extends BaseController
{
    /*
     * ---------------------------------------
     * 列表页
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\ShopGroup', '', 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new ShopGroup();

        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('ShopGroup');

            /* 处理掉空白的groups数据 */
            $totel = 0;
            if ($data['groups'] && is_array($data['groups'])) {
                foreach ($data['groups'] as $i => $g) {
                    if ($g && is_array($g)) {
                        foreach ($g as $k => $v) {
                            if (!$v['days'] || !$v['num']) {
                                unset($data['groups'][$i][$k]);
                            }
                            /* 价格计算 */
                            $goods = Shop::info($v['id']);
                            $totel += $v['days'] * $v['num'] * $goods['price'];
                        }
                        if (!$data['groups'][$i]) {
                            unset($data['groups'][$i]);
                        }
                    }
                }
            }
            $data['groups'] = serialize($data['groups']);
            $data['totel']  = $totel;

            /* 将图组转化为字符串 */
            if (isset($data['images']) && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }

            /* 表单数据加载、验证、数据库操作 */
            if ($id = $this->addRow('\backend\models\ShopGroup', $data)) {
                $price_model = new ShopPrice();
                $data['group_id'] = $id;
                $price_model->setShopPrice($data);
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        /* 获取模型默认数据 */
        $model->loadDefaultValues();

        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 编辑
     * ---------------------------------------
     */
    public function actionEdit(){
        $id = Yii::$app->request->get('id',0);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post('ShopGroup');
            $data['id'] = $id;
            /* 处理掉空白的groups数据 */
            $total = 0;
            if ($data['groups'] && is_array($data['groups'])) {
                foreach ($data['groups'] as $i => $g) {
                    if ($g && is_array($g)) {
                        foreach ($g as $k => $v) {
                            if (!$v['days'] || !$v['num']) {
                                unset($data['groups'][$i][$k]);
                            }
                            /* 价格计算 */
                            $goods = Shop::info($v['id']);
                            $total += $v['days'] * $v['num'] * $goods['price'];
                        }
                        if (!$data['groups'][$i]) {
                            unset($data['groups'][$i]);
                        }
                    }
                }
            }
            $data['groups'] = serialize($data['groups']);
            $data['total']  = $total;

            $price_model = new ShopPrice();
            $data['group_id'] = $id;
            $price_model->setShopPrice($data);

            /* 将图组转化为字符串 */
            if (isset($data['images']) && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }//var_dump($data);exit();

            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\ShopGroup', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = ShopGroup::findOne($id);
        /* 还原groups的数据 */
        $groups = unserialize($model->groups);

        //获取节日假
        $price_list = ShopPrice::findAll(['group_id'=>$id]);
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
            'groups' => $groups,
            'price_list' => $price_list
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\backend\models\ShopGroup', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

}
