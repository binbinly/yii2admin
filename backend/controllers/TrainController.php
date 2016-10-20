<?php

namespace backend\controllers;

use backend\models\Train;
use backend\models\TrainPrice;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use common\models\TrainCertificate;
use common\models\TrainType;
use Yii;


/*
 * 订单控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class TrainController extends BaseController
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

        $type = Yii::$app->request->get('type',0);
        $_where = '';
        $type && $_where = ['type'=>$type];

        return $this->render('index',[
            'dataProvider' => $this->lists1('\common\models\Train', $_where, 'sort ASC'),
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Train();
        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Train');
            $data['create_time'] = time();

            /* 将图组转化为字符串 */
            if (isset($data['images']) && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($id = $this->addRow('\backend\models\Train', $data)) {
                $train_price = Yii::$app->request->post('TrainPrice');
                $train_price_model = new TrainPrice();
                $train_price_model->addPrice($id, $train_price);
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        //当前类型下的证书列表
        $certif_ids = TrainType::getCertifIdsById(1);
        $certif_list = TrainCertificate::getAllByIds($certif_ids, 0);
        /* 获取模型默认数据 */
        $model->loadDefaultValues();
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
            'certif_list' => $certif_list
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
            $data = Yii::$app->request->post('Train');
            $data['update_time'] = time();
            $data['id'] = $id;

            /* 将图组转化为字符串 */
            if (isset($data['images']) && is_array($data['images'])) {
                $data['images'] = trim(implode ( ",", $data['images']),',');
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Train', 'id', $data)) {
                $train_price = Yii::$app->request->post('TrainPrice');
                $train_price_model = new TrainPrice();
                $train_price_model->addPrice($id, $train_price);
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Train::findOne($id);

        //当前类型下的证书列表
        $certif_ids = TrainType::getCertifIdsById($model->type);
        $certif_list = TrainCertificate::getAllPriceByIds($certif_ids, $id);
        
        /* 渲染模板 */
        return $this->render('edit', [
            'model' => $model,
            'certif_list' => $certif_list
        ]);
    }

    /*
     * ---------------------------------------
     * 删除或批量删除
     * ---------------------------------------
     */
    public function actionDelete(){
        if($this->delRow('\backend\models\Train', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

    public function actionAjaxCertif(){
        $type = Yii::$app->request->post('type', 1);
        $certif_ids = TrainType::getCertifIdsById($type);
        $certif_list = TrainCertificate::getAllByIds($certif_ids, 0);
        $this->ajaxReturn(['code'=>1, 'data'=>$certif_list]);
    }

}
