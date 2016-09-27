<?php

namespace home\controllers;

use Yii;

/**
 * 公共信息控制器
 */
class PublicController extends \common\core\Controller{

    public $layout = false;
    
    /**
     * 404处理
     * @return String
     */
    public function action404(){
        return $this->render('404');
    }



}
