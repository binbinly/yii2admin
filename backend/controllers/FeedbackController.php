<?php

namespace backend\controllers;

use common\models\Log;
use Yii;

/**
 * 行为日志控制器
 */
class FeedbackController extends BaseController {

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
            $_where = ['and', $_where, ['like', 'remark', $search]];
        }

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Feedback', $_where, 'id desc'),
        ]);
    }

}
