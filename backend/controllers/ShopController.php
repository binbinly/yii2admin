<?php

namespace backend\controllers;

use backend\models\Shop;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use Yii;


/*
 * 商品控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class ShopController extends BaseController
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
        
        $type = Yii::$app->request->get('type',0);
        $_where = '';
        $type && $_where = ['type'=>$type];
        
        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Shop', $_where, 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Shop();

        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Shop');
            $data['create_time'] = time();
            $data['type'] = Yii::$app->request->get('type',1);
            /* 格式化extend值，为空或数组序列化 */
            if ($data['extend']) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 将图组转化为字符串 */
            if ($data['images'] && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->addRow('\backend\models\Shop', $data)) {
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
            $data = Yii::$app->request->post('Shop');
            $data['update_time'] = time();
            $data['id'] = $id;
            $data['type'] = Yii::$app->request->get('type',1);
            /* 格式化extend值，为空或数组序列化 */
            if ($data['extend']) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 将图组转化为字符串 */
            if ($data['images'] && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Shop', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Shop::findOne($id);
        /* 还原extend的数据 */
        if ($model->extend) {
            $_tmp = unserialize($model->extend);
            $_str = '';
            if ($_tmp && is_array($_tmp)) {
                foreach ($_tmp as $key => $value) {
                    $_str .= $key.':'.$value.',';
                }
            }
            $model->extend = $_str;
        }

        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\backend\models\Shop', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /*
     * ---------------------------------------
     * 商城套餐
     * @param int $id 参数信息
     * @return json 返回信息
     * ---------------------------------------
     */
    public function actionGroup(){
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        return $this->render('group',[
            'dataProvider' => $this->lists1('\common\models\ShopGroup', '', 'sort ASC'),
        ]);

    }

}
