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
                <?=Html::a('添加商品订单 <i class="icon-plus"></i>',['add','type'=>'shop'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
                <?=Html::a('添加培训订单 <i class="icon-plus"></i>',['add','type'=>'train'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
                <?=Html::a('删除 <i class="icon-remove"></i>',['delete'],['class'=>'btn green ajax-post confirm','target-form'=>'ids','style'=>'margin-right:10px;'])?>
                <?=Html::a('清空搜索 <i class="icon-remove"></i>',['order/index'],['class'=>'btn green','style'=>'margin-right:10px;'])?>
            </div>
            <div class="btn-group pull-right">
                <button class="btn dropdown-toggle" data-toggle="dropdown">工具 <i class="icon-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right">
                    <li><a id="export" href="<?='http://'.$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"].'?'.$_SERVER["QUERY_STRING"].'&action=export';?>">导出为Excel</a></li>
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
            'filterModel' => $searchModel,
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
                    'value' => 'order_id',
                    'options' => ['width' => '50px;']
                ],
                [
                    'header' => 'UID',
                    'options' => ['width' => '50px;'],
                    'attribute' => 'uid',
                    'filter' => Html::input('text', 'OrderSearch[uid]', $searchModel->uid, ['style' => 'width:30px'])
                ],
                [
                    'header' => '商品名',
                    'attribute' => 'title',
                    'content' => function($model){
                        if ($model['taocan'] > 0) {
                            return '<span style="color:#f00;">'.$model['title'].'</span>';
                        }else if (substr($model['order_sn'], 0, 1) == 'T') {
                            return '<span style="color:green;">'.$model['title'].'</span>';
                        }
                        return $model['title'];
                    },
                    'filter' => Html::input('text', 'OrderSearch[title]', $searchModel->title, ['style' => 'width:100px'])
                ],
                [
                    'header' => '起租时间',
                    'value' => 'start_time',
                    'format' => ['date', 'php:Y-m-d'],
                    'options' => ['width' => '100px;'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'language' => 'zh-CN',
                        'name' => 'OrderSearch[start_date]',
                        'value' => $searchModel->start_time,
                        'options' =>  ['style' => 'width:100px','placeholder' => '退租时间'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'header' => '退租时间',
                    'value' => 'end_time',
                    'format' => ['date', 'php:Y-m-d'],
                    'options' => ['width' => '100px;'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'language' => 'zh-CN',
                        'name' => 'OrderSearch[end_date]',
                        'value' => $searchModel->end_time,
                        'options' =>  ['style' => 'width:100px','placeholder' => '退租时间'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'label' => '数量',
                    'value' => 'num',
                    'options' => ['width' => '50px;'],
                ],
                [
                    'label' => '订单金额/支付',
                    'options' => ['width' => '50px;'],
                    'content' => function($model){
                        return $model['total'].' | '.$model['order_money'];
                    }
                ],
                [
                    'label' => '支付状态',
                    'attribute' => 'pay_status',
                    'options' => ['width' => '80px;'],
                    'content' => function($model){
                        return Yii::$app->params['pay_status'][$model['pay_status']];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'pay_status', Yii::$app->params['pay_status'], ['prompt'=>'全部','style' => 'width:80px']),

                ],
                [
                    'label' => '订单时间',
                    'attribute' => 'create_time',
                    'options' => ['width' => '150px;'],
                    'format' =>  ['date', 'php:Y-m-d H:i'],
                    'filter' => \kartik\widgets\DatePicker::widget([
                        'type' => \kartik\widgets\DatePicker::TYPE_RANGE,
                        'language' => 'zh-CN',
                        'layout' => '{input1}<br>{input2}',
                        'name' => 'OrderSearch[from_date]',
                        'value' => $searchModel->from_date,
                        'options' =>  ['style' => 'width:100px','placeholder' => '开始时间'],
                        'name2' => 'OrderSearch[to_date]',
                        'value2' => $searchModel->to_date,
                        'options2' => ['style' => 'width:100px','placeholder' => '结束时间'],
                        'pluginOptions' => [
                            'autoclose'=>true,
                            'format' => 'yyyy-mm-dd'
                        ]
                    ])
                ],
                [
                    'label' => '支付类型',
                    'attribute' => 'pay_type',
                    'options' => ['width' => '80px;'],
                    'content' => function($model){
                        if($model['pay_type'] == 0) return '-';
                        return Yii::$app->params['pay_type'][$model['pay_type']];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'pay_type', Yii::$app->params['pay_type'], ['prompt'=>'全部','style' => 'width:80px']),
                ],
                [
                    'label' => '订单类型',
                    'attribute' => 'type',
                    'options' => ['width' => '80px;'],
                    'content' => function($model){
                        return Yii::$app->params['order_type'][$model['type']];
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'type', Yii::$app->params['order_type'],['prompt'=>'全部','style' => 'width:80px']),
                ],
                [
                    'label' => '状态',
                    'options' => ['width' => '50px;'],
                    'content' => function($model){
                        return $model['status']?'正常':'隐藏';
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => '操作',
                    'template' => '{edit} {delete} {refund}',
                    'options' => ['width' => '200px;'],
                    'buttons' => [
                        'edit' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit"></i>', $url, [
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
                        'refund' => function ($url, $model, $key) {
                            return Html::a('<i class="icon-edit icon-red"></i>', $url, [
                                'title' => Yii::t('app', '退款'),
                                'class' => 'btn mini purple'
                            ]);
                        },
                    ],
                    'headerOptions' => [],
                ],
            ],
        ]); ?>
        </form>
    </div>
</div>




<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '订单管理';
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
    highlight_subnav('order/index'); //子导航高亮
    
    /* 导出excel的url格式化 */
    url = window.location.href;
    if(url.indexOf('?') > 0){
        url = url + '&action=export';
    } else {
        url = url + '?action=export';
    }
    $('#export').attr('href', url);


});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
