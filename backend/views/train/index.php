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
                <?=Html::a('添加 <i class="icon-plus"></i>',['add','type'=>Yii::$app->request->get('type',0)],['class'=>'btn green','style'=>'margin-right:10px;'])?>
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
                    'header' => '类型',
                    'options' => ['width' => '150px;'],
                    'content' => function($model){
                        switch ($model['type']) {
                            case '1': return '帆船培训';break;
                            case '2': return '潜水培训';break;
                            default:break;
                        }
                    }
                ],
                [
                    'header' => '名称',
                    'attribute' => 'title'
                ],
                [
                    'header' => '总数',
                    'attribute' => 'num',
                    'options' => ['width' => '100px;'],
                ],
                [
                    'header' => '价格',
                    'attribute' => 'price',
                    'options' => ['width' => '100px;'],
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
                        return '正常';
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{view} {edit} {addsub} {delete}',
                    'options' => ['width' => '200px;'],
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit"></i>', ['edit','type'=>Yii::$app->request->get('type'),'id'=>$key], [
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
    highlight_subnav('train/index?type=<?=Yii::$app->request->get("type")?>'); //子导航高亮

});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
