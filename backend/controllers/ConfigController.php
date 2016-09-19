<?php

namespace backend\controllers;

use backend\models\Config;
use Yii;


/*
 * 系统配置控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */

class ConfigController extends BaseController
{

    /*
     * ---------------------------------------
     * 以列表的形式展现配置项
     * ---------------------------------------
     */
    public function actionIndex()
    {
        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        $_where = '';
        /* 搜索 */
        $search  = Yii::$app->request->get('s');
        if ( !empty($search) ) {
            $_where = ['or', ['like', 'title', $search], ['like', 'name', $search]];
        }

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Config', $_where, 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加配置项
     * ---------------------------------------
     */
    public function actionAdd(){

        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('Config');
            $data['create_time'] = time();

            if ($this->addRow('\backend\models\Config', $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }

        $model = new Config();
        /* 模型默认值 */
        $model->loadDefaultValues();
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 编辑配置项
     * ---------------------------------------
     */
    public function actionEdit(){
        $id = Yii::$app->request->get('id',0);

        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('Config');
            $data['id'] = $id;
            $data['update_time'] = time();//var_dump($data);exit;

            if ($this->editRow('\backend\models\Config', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }

        $model = Config::findOne($id);
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除配置项
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\common\models\Config', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /*
     * ---------------------------------------
     * 以表单的形式展现配置项
     * ---------------------------------------
     */
    public function actionGroup()
    {

        /* 提交表单后 */
        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('param');
            //var_dump($data);exit;
            /* 更改配置值 */
            $isSuccess = true;
            foreach ($data as $name => $value) {
                $model = Config::findOne(['name'=>$name]);
                $model->value = $value;
                $model->update_time = time();
                if (!$model->save()) {
                    $isSuccess = false;
                    continue;
                }
            }
            if ($isSuccess) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('有配置值修改失败');
            }
        }

        /* 添加当前位置到cookie供后续跳转调用 */
        $this->setForward();

        $id = Yii::$app->request->get('id', 1);
        /* 配置表 分组 */
        $groups = Config::find()
                ->where(['and', ['group'=>$id], ['status'=>1]])
                ->orderBy('sort ASC')->asArray()->all();
        foreach ($groups as $key => $value) {
            if ($value['extra']) {
                $groups[$key]['extra'] = Config::parse(3, $value['extra']);
            }
        }

        return $this->render('group', [
            'groups' => $groups,
        ]);
    }

}
