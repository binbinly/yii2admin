<?php

namespace home\modules\user\controllers;

use common\helpers\FuncHelper;
use home\models\Captcha;
use home\models\User;
use Yii;
use yii\helpers\Url;

class LoginController extends \yii\web\Controller
{
    /*
     * ---------------------------------------
     * ajax post登录
     * ---------------------------------------
     */
    public function actionLogin(){
        if (Yii::$app->request->isAjax) {
            $username = Yii::$app->request->get('username');
            $password = Yii::$app->request->get('password');
            if (!$username || !$password) {
                exit('0');
            }
            $user = [];
            /* 手机号登录 */
            $reg = '/^1[3|4|5|7|8|9]\d{9}$/';
            if (preg_match($reg, $username)) {
                $user = User::findOne(['mobile' => $username, 'status' => User::STATUS_ACTIVE]);
            }
            /* 用户名登录 */
            if (!$user) {
                $user = User::findByUsername($username);//var_dump($username);
            }
            if (!$user) {
                exit('0');
            }
            if (!$user->validatePassword($password)) {
                exit('0');
            }
            if (Yii::$app->user->login($user)) {
                exit('1');
            }
            exit('0');
        }
        exit('0');
    }

    /*
     * ---------------------------------------
     * ajax post注册
     * ---------------------------------------
     */
    public function actionReg(){
        if (Yii::$app->request->isAjax) {
            /* 获取注册数据 */
            $data = Yii::$app->request->get('data');
            /* 注册字段判断 */
            $reg = '/^1[3|4|5|7|8|9]\d{9}$/';
            if (!isset($data['mobile']) || !preg_match($reg, $data['mobile'])) {
                FuncHelper::ajaxReturn(1, '手机格式错误');
            }
            if (!isset($data['username']) || strlen(trim($data['username'])) < 4 || strlen(trim($data['username'])) > 12) {
                FuncHelper::ajaxReturn(1, '用户名格式为4-12位字符');
            }
            if (!isset($data['password']) || strlen(trim($data['password'])) < 8 || strlen(trim($data['password'])) > 16) {
                FuncHelper::ajaxReturn(1, '密码格式为8-16位字符');
            }
            if (!isset($data['captcha']) || !Captcha::isCaptcha($data['mobile'],$data['captcha'])) {
                FuncHelper::ajaxReturn(1, '验证码错误');
            }
            if (!empty($data['tmobile'])) {
                $u = User::findByMobile($data['tmobile']);
                if ($u) {
                    $data['tuid'] = $u['uid'];
                } else {
                    FuncHelper::ajaxReturn(1, '推荐人手机号不存在');
                }
            }
            
            $model = new User();
            $data['reg_time'] = time();
            $data['reg_ip']   = ip2long(Yii::$app->request->getUserIP());
            $data['last_login_time'] = 0;
            $data['last_login_ip']   = ip2long(Yii::$app->request->getUserIP());
            $data['update_time']     = 0;
            $data['status'] = 1;
            /* 表单数据加载和验证，具体验证规则在模型rule中配置 */
            $model->setAttributes($data);
            $model->generateAuthKey();
            $model->setPassword($data['password']);
            if ($model->save()) {
                FuncHelper::ajaxReturn(0, '注册成功');
            }//var_dump($model->getErrors());exit;
            FuncHelper::ajaxReturn(1, '注册失败');
        }
        return $this->render('reg');
    }
    
    /*
     * ---------------------------------------
     * 忘记密码
     * @return json   返回信息
     * ---------------------------------------
     */
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
        $code_num = mt_rand(10000000, 99999999); //随机新密码
        $model->generateAuthKey();
        $model->setPassword($code_num);
        if ($model->save()) {
            $msg = '您好，你的密码是：'. $code_num .'，为保证帐户安全，请在登陆后立即修改密码，谢谢！【帆海汇俱乐部】';
            FuncHelper::sendSMS($mobile,$msg);
            FuncHelper::ajaxReturn(0, '修改成功，新密码查看手机短信');
        }//var_dump($model->getErrors());exit;
        FuncHelper::ajaxReturn(1, '修改失败');
    }

    /*
     * ---------------------------------------
     * 注销页
     * ---------------------------------------
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(Url::to('/index/index'));
    }

    /*
     * ---------------------------------------
     * ajax发送手机验证码
     * ---------------------------------------
     */
    public function actionCaptcha(){
        $mobile = Yii::$app->request->get('mobile');
        if (empty($mobile) && !preg_match('/^1[34578]\d{9}$/', $mobile)) {
            FuncHelper::ajaxReturn(1, '手机号格式错误');
        }
        $code_num = mt_rand(1000, 9999);
        $msg = '欢迎加入帆海汇，你的验证码是：'.$code_num.'，请在1分钟内输入。【帆海汇俱乐部】';
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
