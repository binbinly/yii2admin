<?php

namespace home\controllers;

use home\models\Article;
use home\models\Category;
use common\helpers\FuncHelper;
use Yii;


class EmailController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
        $email = Yii::$app->request->post('email');
        $content = Yii::$app->request->post('content');
        if(!$email || !$content){
            FuncHelper::ajaxReturn(-1, '参数不正确');
        }
        $html = "发件人：{$email}<br> 建议内容:{$content}";
        $mail= Yii::$app->mailer->compose();   
        $mail->setTo('104044924@qq.com');  
        $mail->setSubject("建议");  
        //$mail->setTextBody('zheshisha ');   //发布纯文字文本
        $mail->setHtmlBody($html);    //发布可以带html标签的文本
        if($mail->send())  
            FuncHelper::ajaxReturn(0, 'success');
        else  
            FuncHelper::ajaxReturn(-1, 'fail');
    }

}
