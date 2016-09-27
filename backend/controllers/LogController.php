<?php

namespace backend\controllers;

use common\models\Log;
use Yii;

/**
 * 行为日志控制器
 */
class LogController extends BaseController {

    /*
     * ---------------------------------------
     * 行为日志列表 
     * @param string string  参数说明 
     * @return string 返回信息 
     * ---------------------------------------
     */
    public function actionIndex(){
        /* 添加当前位置到cookie供后续操作调用 */
        $this->setForward();

        $_where = '';
        /* 搜索 */
        $search = Yii::$app->request->get('s');
        if ( !empty($search) ) {
            $_where = ['and', $_where, ['like', 'title', $search]];
        }

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Log', $_where, 'id desc'),
        ]);
    }

    /*
     * ---------------------------------------
     * 查看行为日志 
     * @param string string  参数说明 
     * @return string 返回信息 
     * ---------------------------------------
     */
    public function actionView(){
        $id = Yii::$app->request->get('id',0);
        $model = Log::findOne($id);
        return $this->render('view',['model'=>$model]);
    }

    /*
     * ---------------------------------------
     * 删除日志
     * @param mixed $ids
     * @return string 返回信息 
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\common\models\Menu', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    /*
     * ---------------------------------------
     * 清空日志
     * @return string 返回信息 
     * ---------------------------------------
     */
    public function actionClear(){
        $res = Log::deleteAll();
        if($res !== false){
            $this->success('日志清空成功！');
        }else {
            $this->error('日志清空失败！');
        }
    }

}
