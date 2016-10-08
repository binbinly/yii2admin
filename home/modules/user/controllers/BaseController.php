<?php

namespace home\modules\user\controllers;

use Yii;
use yii\helpers\Url;

class BaseController extends \yii\web\Controller
{

    public $uid = 0;
    /*
     * ---------------------------------------
     * 构造函数
     * ---------------------------------------
     */
    public function init(){
        if (Yii::$app->user->isGuest) {
            $this->redirect(Url::toRoute(['/index/index']));
            Yii::$app->end();
        }
        $this->uid = Yii::$app->user->identity->getId();
    }

}
