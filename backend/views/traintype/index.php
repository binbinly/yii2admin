<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Category;

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
                <?=Html::a('添加 <i class="icon-plus"></i>',['edit'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
                <?=Html::a('删除 <i class="icon-remove"></i>',['delete'],['class'=>'btn green ajax-post confirm','target-form'=>'ids','style'=>'margin-right:10px;'])?>
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
            <form action="#" class="form-search pull-right" style="margin: 0 10px 0;">
                <div class="input-append">
                    <input class="m-wrap" type="text" />
                    <button class="btn green" type="button">搜索</button>
                </div>
            </form>
        </div>
        <form class="ids">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            /* 重新排版 摘要、表格、分页 */
            'layout' => '{items}<div class="row-fluid"><div class="span6">{summary}</div><div class="span6"><div class="dataTables_paginate paging_bootstrap pagination">{pager}</div></div></div>',
            /* 配置分页样式 */
            'pager' => [
                'options' => [],
                'nextPageLabel' => '下一页',
                'prevPageLabel' => '上一页',
                'firstPageLabel' => '第一页',
                'lastPageLabel' => '最后页'
            ],
            /* 定义列表格式 */
            'columns' => [
                [
                    'class' => \yii\grid\CheckboxColumn::className(),
                    'name'  => 'id',
                    'options' => ['width' => '24px;']
                ],
                [
                    'header' => 'ID',
                    'attribute' => 'id',
                    'options' => ['width' => '50px;']
                ],
                [
                    'header' => '培训分类',
                    'attribute' => 'name',
                    'options' => ['width' => '150px;'],
                ],
                [
                    'header' => '封面',
                    'options' => ['width' => '100px;'],
                    'content' => function($model){
                        return '<img src="'.$model['cover'].'" />';
                    }
                ],
                [
                    'header' => '证书',
                    'options' => ['width' => '100px;'],
                    'content' => function($model){
                        return \common\models\TrainCertificate::getAllByIds($model['certif_ids']);
                    }
                ],
                [
                    'header' => '内容描述',
                    'attribute' => 'description',
                    'options' => ['width' => '200px;'],
                ],
                [
                    'label' => '添加时间',
                    'options' => ['width' => '100px;'],
                    'content' => function($model){
                        return date('Y-m-d', $model['ctime']);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{view} {edit} {addsub} {delete}',
                    'options' => ['width' => '200px;'],
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit"></i>', ['edit','id'=>$key], [
                                'title' => Yii::t('app', '编辑'),
                                'class' => 'btn mini purple'
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-remove icon-white"></i>', $url, [
                                'title' => Yii::t('app', '删除'),
                                'class' => 'btn mini red ajax-get confirm'
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
        </form>
    </div>
</div>




<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '培训管理';
$this->context->title_sub = '';

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
    highlight_subnav('traintype/index'); //子导航高亮

});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
