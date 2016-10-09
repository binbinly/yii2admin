<?php
namespace backend\controllers;

use Yii;
use common\helpers\FuncHelper;
use backend\models\UploadForm;
use yii\web\UploadedFile;

/**
 * 上传图片控制器
 */
class UploadController extends \common\core\Controller
{

    public $enableCsrfValidation=false;
    /*
     * ---------------------------------------
     * 上传base64格式的图片
     * @param  int    $id  参数信息
     * @return json   返回信息
     * ---------------------------------------
     */
    public function actionImage(){
        $json = [
            'boo'  => false,
            'msg'  => '上传失败',
            'data' => ''
        ];
        $imgbase64 = Yii::$app->request->post('imgbase64');
        if (empty($imgbase64)) {
            $this->ajaxReturn($json);
        }
        $url = FuncHelper::uploadImage($imgbase64);
        if ($url) {
            $json['boo']  = true;
            $json['msg']  = '上传成功';
            $json['data'] = $url;
        }
        $this->ajaxReturn($json);
    }
    
    public function actionFiles(){
        $targetFolder = '/upload/video/';
        if (!empty($_FILES)) {
            $tempFile = $_FILES['video']['tmp_name'];
            $md5_file_name = md5($_FILES['video']['tmp_name']).'.'.substr(strrchr($_FILES['video']['name'], '.'), 1);
            
            $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
            $targetFile = rtrim($targetPath,'/') . '/' . $md5_file_name;
            
            // Validate the file type
            $fileTypes = array('jpg','jpeg','gif','png', 'mp4'); // File extensions
            $fileParts = pathinfo($_FILES['video']['name']);
            
            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);
                FuncHelper::ajaxReturn(0, 'success', array(
                    'file_path'=>"/upload/video/{$md5_file_name}",
                ));
            } else {
                FuncHelper::ajaxReturn(-1, '上传失败');
            }
        }
        // if ($url) {
        //     $json['boo']  = true;
        //     $json['msg']  = '上传成功';
        //     $json['data'] = $url;
        // }
        // $this->ajaxReturn($json);
    }

    public function ajaxReturn($data) {
        // 返回JSON数据格式到客户端 包含状态信息
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($data));
    }




}
