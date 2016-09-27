<?php

namespace home\models;

use Yii;

/**
 * This is the model class for table "{{%captcha}}".
 *
 * @property string $id
 * @property string $ip
 * @property string $mobile
 * @property string $captcha
 * @property string $time
 */
class Captcha extends \common\models\Captcha
{
    /**
     * 判断验证码是否正确
     */
    public static function isCaptcha($mobile, $captcha)
    {
        $time = time() - 1800;
        $info = static::find()->where(['and',['mobile'=>$mobile],['>','time',$time]])->orderBy('id DESC')->asArray()->one();
        if ($info && $info['captcha'] == $captcha) {
            return true;
        } else {
            return false;
        }
    }
}
