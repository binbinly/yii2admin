<?php

namespace home\controllers;

use common\models\TrainCertificate;
use home\models\Train;
use home\models\TrainType;
use Yii;

class TrainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $type = Yii::$app->request->get('type', 1);
        $data = Train::lists($type);
        $type = TrainType::info($type);

        $param['data'] = $data;
        $param['type'] = $type;
        return $this->render('index',$param);
    }
    
    public function actionShow()
    {
        $id = Yii::$app->request->get('id', 1);
        $data = Train::info($id);
        return $this->render('show',[
            'data' => $data,
        ]);
    }

    public function actionCertificate(){
        $id = Yii::$app->request->post('id', 1);
        //根据培训分类id获取其证书ids
        $certifIds = TrainType::getFieldById($id);
        $list = TrainCertificate::getAllByIds($certifIds, 0);

        return $this->render('certificate', ['list'=>$list]);
    }

    public function actionSubmit() {

        return $this->render('submit');
    }
}
