<?php

namespace home\modules\user\controllers;

use Yii;
use home\models\Order;
use common\helpers\FuncHelper;

class OrderController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDel(){
        if (Yii::$app->request->isAjax) {
            $order_id = intval(Yii::$app->request->post('order_id'));
            $order_model = new Order;
            $order_model->deleteAll("order_id=$order_id");
            FuncHelper::ajaxReturn(0, 'success');
        }
    }

}
