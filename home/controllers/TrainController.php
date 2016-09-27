<?php

namespace home\controllers;

use common\models\TrainCertificate;
use home\models\Train;
use home\models\TrainPrice;
use home\models\TrainType;
use Yii;
use yii\helpers\Url;

class TrainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $type = Yii::$app->request->get('type', 1);
        $cid = Yii::$app->request->get('cid', 1);
        $data = Train::lists($type);
        $type = TrainType::info($type);

        $param['data'] = $data;
        $param['type'] = $type;
        $param['cid'] = $cid;
        return $this->render('index',$param);
    }
    
    public function actionShow()
    {
        $id = Yii::$app->request->get('id', 1);
        $cid = Yii::$app->request->get('cid', 1);
        $data = Train::info($id);
        $data['price'] = TrainPrice::getNickPrice($id, $cid);
        $certif = TrainCertificate::getInfo($cid);
        return $this->render('show',[
            'data' => $data,
            'cid' => $cid,
            'certif' => $certif
        ]);
    }

    public function actionCertificate(){
        $id = Yii::$app->request->get('type', 1);
        //根据培训分类id获取其证书ids
        $certifIds = TrainType::getFieldById($id);
        $list = TrainCertificate::getAllByIds($certifIds, 0);

        return $this->render('certificate', ['list'=>$list, 'type' => $id]);
    }

    public function actionSubmit() {
        $train_id = Yii::$app->request->get('id', 0);
        $cid = Yii::$app->request->get('cid', 0);
        $n = Yii::$app->request->get('n', 1);
        $train_info = Train::info($train_id);
        $certif_info = TrainCertificate::getInfo($cid);
        $train_info['price'] = TrainPrice::getNickPrice($train_id, $cid);
        $train_info['n'] = $n;
        return $this->render('submit',['train_info'=>$train_info, 'certif_info'=>$certif_info]);
    }

    public function actionOrder(){
        $train_id = Yii::$app->request->post('train_id', 0);
        $cid = Yii::$app->request->post('cid', 0);
        $n = Yii::$app->request->post('n', 1);
        $name = Yii::$app->request->post('name', 1);
        $tel = Yii::$app->request->post('tel', 1);
        $sfz = Yii::$app->request->post('sfc', 1);

        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::toRoute(['/index/index']));
            Yii::$app->end();
        }
        $train_info = Train::info($train_id);
        $date['order_sn'] = 'T'.time().rand(1000,9999);
        $data['uid'] = Yii::$app->user->identity->getId();
        $data['name'] = Yii::$app->request->post('name');
        $data['tel'] = Yii::$app->request->post('tel');
        $data['sfc'] = Yii::$app->request->post('sfc');
        $data['type'] = Yii::$app->request->post('train');
        $data['aid'] = $train_id;
        $data['title'] = $train_info['title'];
        $data['start_time'] = $train_info['title'];

        $this->redirect(Url::toRoute(['/train/index']));
        Yii::$app->end();
    }
}
