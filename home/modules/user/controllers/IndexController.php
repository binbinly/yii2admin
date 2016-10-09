<?php

namespace home\modules\user\controllers;

use common\models\Feedback;
use home\models\Order;
use Yii;
use home\models\User;
use common\helpers\FuncHelper;
use yii\data\Pagination;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        $query = Order::find()->where(['uid'=>$this->uid, 'status'=>1]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->defaultPageSize = 10;

        $order_list = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('index',['order_list'=>$order_list, 'page'=>$pagination]);
    }

    public function actionInfo(){
        $id = $_SESSION['__id'];
        $userinfo = User::findIdentity($id);
        return $this->render('info', [
            'user' => $userinfo,
            'username' => 'samdark',
        ]);
    }

    public function actionModify(){
        if (Yii::$app->request->isAjax) {
            $sexual = intval(Yii::$app->request->post('sexual'));
            $email = Yii::$app->request->post('email');
            $company = Yii::$app->request->post('company');
            $title = Yii::$app->request->post('title');
            $addr = Yii::$app->request->post('addr');
            $image = Yii::$app->request->post('image');
            $nickname = Yii::$app->request->post('nickname');
            $birthday = Yii::$app->request->post('birthday');

            $attributes = array();
            $condition = 'uid=:uid';
            $params = array(
                ':uid'=>$_SESSION['__id'],
            );
            if($sexual){
                $attributes['sexual'] = $sexual;
            }
            if($email){
                $attributes['email'] = $email;
            }
            if($company){
                $attributes['company'] = $company;
            }
            if($title){
                $attributes['title'] = $title;
            }
            if($addr){
                $attributes['addr'] = $addr;
            }
            if($image){
                $attributes['image'] = $image;
            }
            if($nickname){
                $attributes['nickname'] = $nickname;
            }
            if($birthday){
                $attributes['birthday'] = $birthday;
            }
            if($attributes){
                $count=User::updateAll($attributes,$condition,$params); 
            }
        }
        FuncHelper::ajaxReturn(0, 'success');
    }

    public function actionSuggestion(){
        // $model = new Feedback();
        // if(Yii::$app->request->post()) {
        //     if ($model->load(Yii::$app->request->post()) && $model->add()) {
        //         Yii::$app->getSession()->setFlash('success', '提交成功');
        //         return $this->refresh();
        //     }else{
        //         Yii::$app->getSession()->setFlash('error', '提交失败');
        //     }
        // }
        // return $this->render('suggestion', ['model'=>$model]);
        return $this->render('suggestion');
    }

    public function actionPoints()
    {
        return $this->render('points');
    }

    public function actionWallet()
    {
        return $this->render('wallet');
    }

    public function actionTrain()
    {
        return $this->render('train');
    }

    public function actionModifypwd()
    {
        $old_password = intval(Yii::$app->request->post('old_password'));
        $new_password = Yii::$app->request->post('new_password');
        $new_password2 = Yii::$app->request->post('new_password2');
        $uid = $_SESSION['__id'];

        if(!$old_password || !$new_password || !$new_password2 || ($new_password!=$new_password2)){
            FuncHelper::ajaxReturn(-1, '参数错误');
        }

        $old_password = Yii::$app->security->generatePasswordHash($old_password);
        $new_password = Yii::$app->security->generatePasswordHash($new_password);
        $user = new User();
        $user_info = User::find("uid=$uid and password='$old_password'");
        if($user_info){
            $attributes = array(
                'password'=>$new_password,
            );
            $condition = 'uid=:uid';
            $params = array(
                ':uid'=>$_SESSION['__id'],
            );
            User::updateAll($attributes,$condition,$params);
        }else{
            FuncHelper::ajaxReturn(-1, '参数错误');
        }
        FuncHelper::ajaxReturn(0, 'success');
    }

    public function actionEditpwd()
    {
        return $this->render('edit_password');
    }
    
    // public function actionSuggestion(){
    //     return $this->render('suggestion');
    // }
}
