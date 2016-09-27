<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Menu;

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
                    <input class="m-wrap" type="text" name="s" value="<?=Yii::$app->request->get('s')?>"/>
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
                    'header' => '配置名称',
                    'options' => ['width' => '200px;'],
                    'attribute' => 'name'
                ],
                [
                    'header' => '名称',
                    'attribute' => 'title'
                ],
                [
                    'header' => '类型',
                    'options' => ['width' => '50px;'],
                    'content' => function($model, $key){
                        switch ($model['type']){
                            case 0 :
                                return '数字'; 
                            case 1 :
                                return '字符';
                            case 2 :
                                return '文本';
                            case 3 :
                                return '数组';
                            case 4 :
                                return '枚举';
                        }
                    }
                ],
                [
                    'label' => '分组',
                    'options' => ['width' => '50px;'],
                    'value' => function($model){
                        switch ($model['group']){
                            case 0 :
                                return ''; 
                            case 1 :
                                return '基本';
                            case 2 :
                                return '内容';
                            case 3 :
                                return '用户';
                            case 4 :
                                return '系统';
                        }
                    }
                ],
                [
                    'label' => '排序',
                    'value' => 'sort',
                    'options' => ['width' => '50px;'],
                ],
                [
                    'label' => '状态',
                    'options' => ['width' => '50px;'],
                    'content' => function($model){
                        if ($model['status']) {
                            return '正常';
                        }
                        return '<span style="color:#f00;">隐藏</span>';
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{edit} {delete}',
                    'options' => ['width' => '200px;'],
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit"></i>', $url, [
                                'title' => Yii::t('app', '更新'),
                                'class' => 'btn mini purple'
                            ]);
                        },
                        'delete' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-remove icon-white"></i>', $url, [
                                'title' => Yii::t('app', '删除'),
                                'class' => 'btn mini red ajax-get confirm'
                            ]);
                        }
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
$this->title = '系统配置项管理';
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
    highlight_subnav('config/index'); //子导航高亮
    
    /* 点击搜索 */
    $('.form-search button').click(function(){
        var s = $('.form-search input[name="s"]').val(),
            url = window.location.href;
        if(url.indexOf('#') > 0){
            url = url.substring(0, url.indexOf('#'));
        }
        if(url.indexOf('&s=') > 0){
            url = url.substring(0, url.indexOf('&s='));
        }
        if( !s ){
            alert('搜索内容不能为空');
            return;
        }
        window.location.href = url + '&s='+s;
    });
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
