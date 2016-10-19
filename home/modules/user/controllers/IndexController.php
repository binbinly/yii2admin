<?php

namespace home\modules\user\controllers;

use common\models\Feedback;
use common\models\RechargeLog;
use common\models\ScoreLog;
use home\models\Order;
use home\models\TradeRecord;
use Yii;
use home\models\User;
use common\helpers\FuncHelper;
use yii\data\Pagination;
use yii\helpers\Url;
use home\models\PayPwdService;
use home\models\Captcha;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        $order_sn = Yii::$app->request->get('order_sn');
        $name = Yii::$app->request->get('name');
        $start_time = Yii::$app->request->get('start_time');
        $end_time = Yii::$app->request->get('end_time');
        $condition = ['uid'=>$this->uid, 'status'=>1];
        if($order_sn){
            $condition['order_sn'] = $order_sn;
        }
        if($name){
            $condition['name'] = $name;
        }

        $query = Order::find()->where($condition);
        if($start_time) {
            $query->andWhere(['>', 'create_time', strtotime($start_time)]);
        }
        if($end_time) {
            $query->andWhere(['<', 'create_time', strtotime($end_time)]);
        }

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

    public function actionForget(){
        $mobile = Yii::$app->request->get('mobile');
        $captcha = Yii::$app->request->get('captcha');
        /* 注册字段判断 */
        $reg = '/^1[3|4|5|7|8|9]\d{9}$/';
        if (!isset($mobile) || !preg_match($reg, $mobile)) {
            FuncHelper::ajaxReturn(1, '手机格式错误');
        }
        if (!$captcha || !Captcha::isCaptcha($mobile,$captcha)) {
            FuncHelper::ajaxReturn(1, '验证码错误');
        }
        $model = User::findOne(['mobile' => $mobile, 'status' => 1]);
        if (!$model) {
            FuncHelper::ajaxReturn(1, '用户不存在');
        }
        $model->pay_pwd = '';
        $model->save();
        return $this->refresh();
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
        $user = User::findIdentity($this->uid);

        $query = ScoreLog::find()->where(['uid'=>$this->uid]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->defaultPageSize = 10;

        $score = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('points', ['user'=>$user, 'score'=>$score, 'page'=>$pagination]);
    }

    public function actionWallet()
    {
        $user = User::findIdentity($this->uid);

        $query = TradeRecord::find()->where(['uid'=>$this->uid]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->defaultPageSize = 10;

        $trade = $query->offset($pagination->offset)->limit($pagination->limit)->all();
        return $this->render('wallet', ['user'=>$user, 'trade'=>$trade, 'page'=>$pagination]);
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
        $user = User::findIdentity($uid);//var_dump($username);
        if (!$user) {
            FuncHelper::ajaxReturn(-1, '参数错误');
        }
        if (!$user->validatePassword((string)$old_password)) {
            FuncHelper::ajaxReturn(-1, '密码错误');
        }

        $new_password = Yii::$app->security->generatePasswordHash($new_password);
        $user = new User();
        $attributes = array(
            'password'=>$new_password,
        );
        $condition = 'uid=:uid';
        $params = array(
            ':uid'=>$_SESSION['__id'],
        );
        User::updateAll($attributes,$condition,$params);
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
