<?php

namespace home\controllers;

use common\models\Order;
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
        $train_id = Yii::$app->request->post('id', 0);
        $cid = Yii::$app->request->post('cid', 0);
        if(!$train_id || !$cid) {
            Yii::$app->getSession()->setFlash('error', '参数不合法');
            $this->redirect(Url::toRoute(['/train/index']));
            Yii::$app->end();
        }
        if (Yii::$app->user->isGuest) {
            Yii::$app->getSession()->setFlash('error', '请先登录');
            $this->redirect(Url::to(['/train/show', 'id'=>$train_id,'cid'=>$cid]));
            Yii::$app->end();
        }
        $n = Yii::$app->request->post('n', 1);
        if($n<1) {
            Yii::$app->getSession()->setFlash('error', '数量必须大于1哦');
            $this->redirect(Url::to(['/train/show', 'id'=>$train_id,'cid'=>$cid]));
            Yii::$app->end();
        }
        $stime = Yii::$app->request->post('stime', date('Y-m-d'));
        $train_info = Train::info($train_id);
        $certif_info = TrainCertificate::getInfo($cid);
        $train_info['price'] = TrainPrice::getNickPrice($train_id, $cid);

        $data['order_sn'] = 'T'.time().rand(1000,9999);
        $data['uid'] = Yii::$app->user->identity->getId();
        $data['aid'] = $train_id;
        $data['title'] = $certif_info['title'].$train_info['title'];
        $data['start_time'] = time($stime);
        $data['num'] = $n;
        $data['type'] = 'train';
        $data['total'] = $n * $train_info['price'];
        $data['pay_status'] = 0;
        $data['create_time'] = time();
        $data['end_time'] = $data['pay_time'] = 0;

        $data['status'] = 1;
        $model = new Order();
        $model->setAttributes($data);
        if ($model->save()) {
            Yii::$app->getSession()->setFlash('success', '订单提交成功，请尽快完成支付哦!');
            return $this->render('submit',['data'=>$data]);
        }else{
            Yii::$app->getSession()->setFlash('error', '订单提交失败');
            $this->redirect(Url::to(['/train/index']));
            Yii::$app->end();
        }
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
        $data['name'] = Yii::$app->request->post('name');
        $data['tel'] = Yii::$app->request->post('tel');
        $data['sfc'] = Yii::$app->request->post('sfc');

        $this->redirect(Url::toRoute(['/train/index']));
        Yii::$app->end();
    }
}
