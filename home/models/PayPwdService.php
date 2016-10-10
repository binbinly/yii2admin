<?php
namespace home\models;
use Yii;
use yii\base\Model;

class PayPwdService extends Model
{
    public $old_password;
    public $new_password;
    public $renew_password;
    private $_user = false;

    public function scenarios() {
        return [
            'reset' => ['new_password', 'renew_password'],
            'edit' => ['old_password', 'new_password', 'renew_password'],
        ];
    }

    public function rules()
    {
        return [
            [['old_password','new_password','renew_password'],'required'],
            [['new_password','renew_password'],'string','min'=>6],
            ['renew_password','compare','compareAttribute'=>'new_password','message'=>'两次输入的密码不一致'],
            ['old_password','validatePassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'old_password'=> '原密码',
            'new_password'=> '新密码',
            'renew_password'=> '确认密码',
        ];
    }

    public function validatePassword($attribute,$param)
    {
        $user = null;
        if(!$this->hasErrors()){
            $user = $this->getUser();
        }
        if(!$user || !$user->validatePayPassword($this->old_password)){
            $this->addError('old_password','密码错误');
        }
    }

    public function modifyPassword()
    {
        if ($this->validate()){
            $user = $this->getUser();
            $user->setPayPassword($this->new_password);
            return $user->save();
        }
    }

    public function getUser()
    {
        if($this->_user===false){
            $this->_user = Yii::$app->user->identity;
        }
        return $this->_user;
    }
}