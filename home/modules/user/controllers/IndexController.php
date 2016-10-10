<?php

namespace home\modules\user\controllers;

use common\models\Feedback;
use common\models\RechargeLog;
use home\models\Order;
use Yii;
use home\models\User;
use common\helpers\FuncHelper;
use yii\data\Pagination;
use yii\helpers\Url;
use home\models\PayPwdService;

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

    public function actionRecharge(){
        $model = new RechargeLog();
        if(Yii::$app->request->post()) {
            if ($model->load(Yii::$app->request->post()) && $model->add()) {
                Yii::$app->getSession()->setFlash('success', '提交成功');
                $pay_type = $model->pay_type;
                if($pay_type == 1) {

                }else if($pay_type == 2) {
                    $this->redirect(Url::to(['/pay/ali-pay','order_sn'=>$model->order_sn]));
                }else if($pay_type == 3) {
                    $this->redirect(Url::to(['/pay/wx-pay','order_sn'=>$model->order_sn]));
                }
            }else{
                Yii::$app->getSession()->setFlash('error', '提交失败');
            }
        }
        return $this->render('recharge');
    }

    public function actionPayPwd() {
        $model = new PayPwdService();
        $user = User::findIdentity(Yii::$app->user->identity->getId());
        if($user->pay_pwd) {
            $model->scenario = 'edit';
        }else{
            $model->scenario = 'reset';
        }
        if ($model->load(Yii::$app->request->post()) && $model->modifyPassword()){
            Yii::$app->getSession()->setFlash('success','支付密码修改成功');
            return $this->refresh();
        }
        return $this->render('paypwd',['model'=>$model]);
    }

    public function actionPayPwdReset(){
        $model = new PayPwdService();
        if ($model->load(Yii::$app->request->post()) && $model->modifyPassword()){
            Yii::$app->getSession()->setFlash('success','支付密码修改成功');
            return $this->refresh();
        }
        return $this->render('paypwd',['model'=>$model]);
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

    public function actionEditphone()
    {
        return $this->render('edit_phone');
    }


    public function actionModifyphone()
    {
        $new_mobile = intval(Yii::$app->request->post('new_mobile'));
        $captcha = Yii::$app->request->post('captcha');
        $uid = $_SESSION['__id'];

        if(!$new_mobile || !$captcha){
            FuncHelper::ajaxReturn(-1, '参数错误');
        }
        if (empty($new_mobile) && !preg_match('/^1[34578]\d{9}$/', $new_mobile)) {
            FuncHelper::ajaxReturn(-1, '手机号格式错误');
        }
        $model = User::findOne(['uid' => $_SESSION['__id'], 'status' => 1]);
        if (!$captcha || !Captcha::isCaptcha($model['mobile'],$captcha)) {
            FuncHelper::ajaxReturn(-1, '验证码错误');
        }
        
        $model->setMobile((string)$new_mobile);

        if ($model->save()) {
            FuncHelper::ajaxReturn(0, '修改成功');
        }
        FuncHelper::ajaxReturn(-1, '修改失败');
    }

    public function actionCaptcha(){
        $new_mobile = Yii::$app->request->post('new_mobile');
        if (empty($new_mobile) && !preg_match('/^1[34578]\d{9}$/', $new_mobile)) {
            FuncHelper::ajaxReturn(1, '手机号格式错误');
        }

        // 获取用户原来的密码

        $user_model = new User();
        $user_info = $user_model->findIdentity($_SESSION['__id']);
        $mobile = $user_info['mobile'];

        $code_num = mt_rand(1000, 9999);
        $msg = '修改帆海汇密码，你的验证码是：'.$code_num.'，请在1分钟内输入。【帆海汇俱乐部】';
        if (FuncHelper::sendSMS($mobile, $msg)) {
            /* 获取验证码数据 */
            
            $time = time();
            $ip = Yii::$app->request->getUserIP();

            /* 判断用户是否重复发送验证码数据 */
            $userCaptcha = Captcha::find()->where(['mobile'=>$mobile,'ip'=>$ip])->orderBy('id DESC')->one();
            if (!empty($userCaptcha)) {
                if ($time - $userCaptcha->time < 50) {
                    FuncHelper::ajaxReturn(2, '一分钟内验证码只能发一次');
                }
            }
            /* 保存发送验证码的记录 */
            $post = new Captcha();
            $post->ip = $ip;
            $post->mobile = $mobile;
            $post->time = $time;
            $post->captcha = (string)$code_num;
            if ($post->save()) {
                FuncHelper::ajaxReturn(0, '发送成功');
            } else {var_dump($post->getErrors());
                FuncHelper::ajaxReturn(1, '发送失败');
            }
        } else {
            FuncHelper::ajaxReturn(1, '短信发送失败');
        }
    }
}
