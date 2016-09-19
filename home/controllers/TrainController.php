<?php

namespace home\controllers;

use home\models\Train;
use home\models\TrainType;
use Yii;

class TrainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $type = Yii::$app->request->get('type', 1);
        $data = Train::lists($type);//var_dump($data);exit();
        $type = TrainType::info($type);

        $param['data'] = $data;
        $param['type'] = $type;
        return $this->render('index',$param);
    }
    
    public function actionShow()
    {
        $id = Yii::$app->request->get('id', 1);
        $data = Train::info($id);
        $type = TrainType::info($data['type']);
        return $this->render('show',[
            'data' => $data,
            'type' => $type,
        ]);
    }
}
