<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\AuthAssignment */
/* @var $form ActiveForm */
?>
<div class="portlet box light-grey">
    <div class="portlet-title">
        <div class="caption"><i class="icon-globe"></i>管理表格</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body">
        <div class="clearfix">
            <div class="btn-group">
                <?=Html::a('添加 <i class="icon-plus"></i>',['add'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
            </div>
            <div class="btn-group pull-right">
                <button class="btn dropdown-toggle" data-toggle="dropdown">工具 <i class="icon-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li><a href="#">Print</a></li>
                    <li><a href="#">Save as PDF</a></li>
                    <li><a href="#">导出为Excel</a></li>
                </ul>
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th style="width:8px;">#</th>
                <th>角色名</th>
                <th class="hidden-480">描述</th>
                <th style="width:140px;">添加时间</th>
                <th style="width:140px;">更新时间</th>
                <th class="hidden-480">操作</th>
            </tr>
            </thead>
            <tbody>

            <?php $nn=0;?>
            <?php foreach ($roles as $key => $value): ?>
            <tr class="odd gradeX">
                <?php $nn++;?>
                <td><?=$nn?></td>
                <td><?=$value->name?></td>
                <td><?=$value->description?></td>
                <td><?=date('Y-m-d H:i',$value->createdAt)?></td>
                <td><?=date('Y-m-d H:i',$value->updatedAt)?></td>
                <td>
                    <a href="<?=Url::toRoute(['auth', 'role'=>$key])?>" class="btn mini purple"><i class="icon-key"></i> 授权</a>
                    <a href="<?=Url::toRoute(['user', 'role'=>$key])?>" class="btn mini purple"><i class="icon-user"></i> 用户</a>
                    <a href="<?=Url::toRoute(['edit', 'role'=>$key])?>" class="btn mini purple"><i class="icon-edit"></i> 编辑</a>
                    <a href="<?=Url::toRoute(['delete', 'role'=>$key])?>" class="btn mini red ajax-get confirm"><i class="icon-remove icon-white"></i></a>
                </td>
            </tr>
            <?php endforeach ?>

            </tbody>
        </table>

    </div>
</div>





<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '角色管理';
$this->context->title_sub = '管理用户角色信息';

/* 渲染其他文件 */
//echo $this->renderFile('@app/views/public/login.php');

/* 加载页面级别CSS */
$this->registerCssFile('@web/static/common/css/select2_metro.css');
$this->registerCssFile('@web/static/common/css/DT_bootstrap.css');

/* 加载页面级别JS */
$this->registerJsFile('@web/static/common/js/select2.min.js');
$this->registerJsFile('@web/static/common/js/jquery.dataTables.js');
$this->registerJsFile('@web/static/common/js/DT_bootstrap.js');

$this->registerJsFile('@web/static/common/js/app.js');
$this->registerJsFile('@web/static/common/js/table-managed.js');

?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
    jQuery(document).ready(function() {
    App.init();
    TableManaged.init();
    highlight_subnav('auth/index'); //子导航高亮
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
