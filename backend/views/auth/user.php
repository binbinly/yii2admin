<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

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
                    'header' => 'UID',
                    'attribute' => 'uid',
                    'options' => ['width' => '50px;']
                ],
                [
                    'header' => '用户名',
                    'attribute' => 'username',
                    'options' => ['width' => '150px;']
                ],
                [
                    'header' => '邮箱',
                    'attribute' => 'email',
                    'options' => ['width' => '150px;']
                ],
                [
                    'header' => '手机',
                    'attribute' => 'mobile',
                    'options' => ['width' => '150px;']
                ],
                [
                    'header' => '最后登录时间',
                    'attribute' => 'last_login_time',
                    'options' => ['width' => '150px;'],
                    'format' => ['date', 'php:Y-m-d H:i']
                ],
                [
                    'header' => '最后登录IP',
                    'attribute' => 'last_login_ip',
                    'options' => ['width' => '150px;'],
                    'content' => function($model){
                        return long2ip($model['last_login_ip']);
                    }
                ],
                [
                    'header' => '状态',
                    'attribute' => 'status',
                    'options' => ['width' => '50px;'],
                    'content' => function($model){
                        return $model['status'] ?
                            Html::tag('span','正常',['class'=>'label label-success']) :
                            Html::tag('span','删除',['class'=>'label label-important']);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{edit} {auth} {delete}',
                    //'options' => ['width' => '200px;'],
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit"></i> 更新', ['user/edit','uid'=>$key], [
                                'title' => Yii::t('app', '更新'),
                                'class' => 'btn mini purple'
                            ]);
                        },
                        'auth' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-user"></i> 授权', ['user/auth','uid'=>$key], [
                                'title' => Yii::t('app', '授权'),
                                'class' => 'btn mini purple'
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-remove icon-white"></i>', ['user/delete', 'id'=>$key], [
                                'title' => Yii::t('app', '删除'),
                                'class' => 'btn mini red ajax-get confirm'
                            ]);
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>




<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '用户管理';
$this->context->title_sub = '管理用户信息';

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
