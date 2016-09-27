<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
        <div class="clearfix">
            
        </div>
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>备份名称</th>
                    <th class="hidden-480">卷数</th>
                    <th style="width:140px;">压缩</th>
                    <th style="width:140px;">数据大小</th>
                    <th style="width:140px;">备份时间</th>
                    <th style="width:140px;">备份状态</th>
                    <th class="hidden-480">操作</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($list as $key => $value): ?>
            <tr class="odd gradeX">
                <td><?=date('Ymd-His', $value['time'])?></td>
                <td><?=$value['part']?></td>
                <td><?=$value['compress']?></td>
                <td><?=Yii::$app->formatter->asShortSize($value['size'])?></td>
                <td><?=$key?></td>
                <td>-</td>
                <td>
                    <a href="<?=Url::toRoute(['import', 'time'=>$value['time']])?>" class="db-import btn mini purple"><i class="icon-check"></i> 还原</a>
                    <a href="<?=Url::toRoute(['del', 'time'=>$value['time']])?>" class="ajax-get confirm btn mini purple"><i class="icon-medkit"></i> 删除</a>
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
$this->title = '还原数据库';
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
    highlight_subnav('database/index?type=import'); //子导航高亮
    
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
    
    /* 还原数据库 */
    $(".db-import").click(function(){
        var self = this, status = ".";
        $.get(self.href, success, "json");
        window.onbeforeunload = function(){ return "正在还原数据库，请不要关闭！" }
        return false;
    
        function success(data){
            if(data.status){
                if(data.gz){
                    data.info += status;
                    if(status.length === 5){
                        status = ".";
                    } else {
                        status += ".";
                    }
                }
                $(self).parent().prev().text(data.info);
                if(data.part){
                    $.get(self.href, 
                        {"part" : data.part, "start" : data.start}, 
                        success, 
                        "json"
                    );
                }  else {
                    window.onbeforeunload = function(){ return null; }
                }
            } else {
                updateAlert(data.info,'alert-error');
            }
        }
    });
    
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>

