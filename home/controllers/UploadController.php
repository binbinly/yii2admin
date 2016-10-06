<?php

namespace home\controllers;

use yii\web\Controller;
use common\helpers\FuncHelper;

class UploadController extends Controller
{
    public function actionIndex()
    {
        echo 111;exit;
        /* 首页 套餐 幻灯片 */
        $group_ppt = ShopGroup::find()->where(['status'=>1])->orderBy('SORT desc')->limit(3)->asArray()->all();
        $article_ppt = Article::lists(3);
        $recommd = array();
        $recommd['all'] = array_merge($group_ppt, $article_ppt);
        $recommd['active'] = $article_ppt;
        $recommd['package'] = $group_ppt;

        //var_dump($group_ppt);exit();
        return $this->render('index',[
            'group_ppt' => $group_ppt,
            'recommd' => $recommd,
        ]);
    }

    public function actionFiles(){
        $targetFolder = '/uploads';
        if (!empty($_FILES)) {
            $tempFile = $_FILES['Filedata']['tmp_name'];
            $md5_file_name = md5($_FILES['Filedata']['tmp_name']).'.'.substr(strrchr($_FILES['Filedata']['name'], '.'), 1);
            
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath,'/') . '/' . $md5_file_name;
            
            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
            $fileParts = pathinfo($_FILES['Filedata']['name']);
            
            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                FuncHelper::ajaxReturn(0, 'success', array(
                    'file_path'=>"/uploads/{$md5_file_name}",
                ));
            } else {
                FuncHelper::ajaxReturn(-1, '上传失败');
            }
        }
    }
}
