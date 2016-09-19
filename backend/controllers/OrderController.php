<?php

namespace backend\controllers;

use backend\models\Order;
use backend\models\search\OrderSearch;
use backend\models\Shop;
use backend\models\Train;
use common\helpers\ArrayHelper;
use common\helpers\FuncHelper;
use Yii;


/*
 * 订单控制器
 * 作者 ：longfei
 * Email ：phphome@qq.com
 */
class OrderController extends BaseController
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

        $params = Yii::$app->request->getQueryParams();

        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search($params);

        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /*
     * ---------------------------------------
     * 添加
     * ---------------------------------------
     */
    public function actionAdd(){
        $model = new Order();
        $type = Yii::$app->request->get('type','shop');
        if (Yii::$app->request->isPost) {
            
            $data = Yii::$app->request->post('Order');
            $data['create_time'] = time();
            $data['type'] = $type;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time'] = strtotime($data['end_time']);
            $data['pay_time'] = time();
            if ($type == 'shop') {
                $shang = Shop::info($data['aid']);
                $data['title'] = $shang['title'];
            } else {
                $shang = Train::info($data['aid']);
                $data['title'] = $shang['title'];
            }
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->addRow('\backend\models\Order', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }

        /* 获取模型默认数据 */
        $model->loadDefaultValues();
        $model->order_sn = time();
        $model->pay_type = 4;
        $model->pay_source = 3;
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
            $data = Yii::$app->request->post('Order');
            $data['update_time'] = time();
            $data['id'] = $id;
            $data['start_time'] = strtotime($data['start_time']);
            $data['end_time']  = strtotime($data['end_time']);
            $data['pay_time']  = strtotime($data['pay_time']);
            /* 格式化extend值，为空或数组序列化 */
            if (isset($data['extend'])) {
                $tmp = FuncHelper::parse_field_attr($data['extend']);
                if (is_array($tmp)) {
                    $data['extend'] = serialize($tmp);
                }else{
                    $data['extend'] = '';
                }
            }
            /* 表单数据加载、验证、数据库操作 */
            if ($this->editRow('\backend\models\Order', 'id', $data)) {
                $this->success('操作成功', $this->getForward());
            }else{
                $this->error('操作错误');
            }
        }
        $model = Order::findOne($id);
        $model->start_time = date('Y-m-d H:i',$model->start_time);
        $model->end_time   = date('Y-m-d H:i',$model->end_time);
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
        if($this->delRow('\backend\models\Order', 'id')){
            $this->success('删除成功', $this->getForward());
        } else {
            $this->error('删除失败！');
        }
    }

}
