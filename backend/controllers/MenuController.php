<?php

namespace backend\controllers;

use backend\models\Menu;
use common\helpers\ArrayHelper;
use Yii;


/*
 * 后台菜单控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class MenuController extends BaseController
{
    /*
     * ---------------------------------------
     * 列表页
     * ---------------------------------------
     */
    public function actionIndex()
    {

        /* 添加当前位置到cookie供后续跳转调用*/
        $this->setForward();

        $_where = '';
        /* 搜索 */
        $search  = Yii::$app->request->get('s');
        if ( !empty($search) ) {
            $_where = ['and', $_where, ['like', 'title', $search]];
        }

        /* 添加条件查询 */
        $pid = Yii::$app->request->get('pid',0);
        $_where = ['and', $_where, ['pid'=>$pid]];

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Menu', $_where, 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $pid = Yii::$app->request->get('pid',0);

        if (Yii::$app->request->isPost) {
            /* 表单验证 */
            $data = Yii::$app->request->post('Menu');
            $data['status'] = 1;

            if ($this->addRow('\backend\models\Menu', $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }

        $model = new Menu();
        /* 获取菜单树的 [id=>title] */
        $menu_list = Menu::find()->asArray()->all();
        $menu_tree = ArrayHelper::list_to_tree($menu_list,'id','pid','_child');

        /* 设置默认值 */
        $model->loadDefaultValues();
        $model->pid = $pid;
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
            'menu_tree' => $menu_tree,
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
            /* 表单验证 */
            $data = Yii::$app->request->post('Menu');
            $data['id'] = $id;

            if ($this->editRow('\backend\models\Menu', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            } else {
                $this->error('操作错误');
            }
        }

        $model = Menu::findOne($id);
        /* 获取菜单树的 [id=>title] */
        $menu_list = Menu::find()->asArray()->all();
        $menu_tree = ArrayHelper::list_to_tree($menu_list,'id','pid','_child');

        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
            'menu_tree' => $menu_tree,
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\common\models\Menu', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

}
