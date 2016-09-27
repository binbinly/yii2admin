<?php

namespace backend\controllers;

use backend\models\Ad;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use Yii;


/*
 * 栏目控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class AdController extends BaseController
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
        //var_dump(Ad::getParents(2));
        $_where = '';
        $type = Yii::$app->request->get('type',0);

        $type && $_where = ['type'=>$type];
        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Ad', $_where, 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Ad();

        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Ad');

            /* 表单数据加载、验证、数据库操作 */
            if ($this->addRow('\backend\models\Ad', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        /* 获取模型默认数据 */
        $model->loadDefaultValues();
        $model->type = Yii::$app->request->get('type',0);
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
            $data = Yii::$app->request->post('Ad');
            $data['id'] = $id;
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Ad', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Ad::findOne($id);

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
        if($this->delRow('\backend\models\Ad', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

}
