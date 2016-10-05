<?php

namespace home\modules\user\controllers;

use Yii;

class IndexController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
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
}
