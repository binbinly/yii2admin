<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form ActiveForm */
?>

<div class="portlet box blue">

    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i>表单内容</div>
        <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="#portlet-config" data-toggle="modal" class="config"></a>
            <a href="javascript:;" class="reload"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form">
        
        <div class="form-horizontal form-view">
            <div class="row-fluid">
                <div class="span12 ">
                    <div class="control-group">
                        <label class="control-label" >说明:</label>
                        <div class="controls">
                            <span class="text"><?=$model->title?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span3 ">
                    <div class="control-group">
                        <label class="control-label" >控制器:</label>
                        <div class="controls">
                            <span class="text"><?=$model->controller?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" >动作:</label>
                        <div class="controls">
                            <span class="text"><?=$model->action?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label" >查询字符串:</label>
                        <div class="controls">
                            <span class="text"><?=$model->querystring?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 ">
                    <div class="control-group">
                        <label class="control-label" >备注:</label>
                        <div class="controls">
                            <span class="text"><?=$model->remark?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span3 ">
                    <div class="control-group">
                        <label class="control-label" >IP:</label>
                        <div class="controls">
                            <span class="text"><?=$model->ip?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span3">
                    <div class="control-group">
                        <label class="control-label" >创建时间:</label>
                        <div class="controls">
                            <span class="text"><?=$model->create_time?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <div class="control-group">
                        <label class="control-label" >状态:</label>
                        <div class="controls">
                            <span class="text"><?=$model->status?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-actions">
            <?= Html::submitButton('<i class="icon-ok"></i> 返回', ['class' => 'btn blue','onclick'=>"javascript:history.go(-1);"]) ?>
        </div>

        <!-- END FORM-->
    </div>
</div>



<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '详细行为日志';
$this->context->title_sub = '';

/* 渲染其他文件 */
//echo $this->renderFile('@app/views/public/login.php');

/* 加载页面级别CSS */
$this->registerCssFile('@web/static/common/css/bootstrap-fileupload.css');
$this->registerCssFile('@web/static/common/css/jquery.gritter.css');
$this->registerCssFile('@web/static/common/css/chosen.css');
$this->registerCssFile('@web/static/common/css/select2_metro.css');
$this->registerCssFile('@web/static/common/css/jquery.tagsinput.css');
$this->registerCssFile('@web/static/common/css/clockface.css');
$this->registerCssFile('@web/static/common/css/bootstrap-wysihtml5.css');
$this->registerCssFile('@web/static/common/css/datepicker.css');
$this->registerCssFile('@web/static/common/css/timepicker.css');
$this->registerCssFile('@web/static/common/css/colorpicker.css');
$this->registerCssFile('@web/static/common/css/bootstrap-toggle-buttons.css');
$this->registerCssFile('@web/static/common/css/daterangepicker.css');
$this->registerCssFile('@web/static/common/css/datetimepicker.css');
$this->registerCssFile('@web/static/common/css/multi-select-metro.css');
$this->registerCssFile('@web/static/common/css/bootstrap-modal.css');

/* 加载页面级别JS */
$this->registerJsFile('@web/static/common/js/ckeditor.js');
$this->registerJsFile('@web/static/common/js/bootstrap-fileupload.js');
$this->registerJsFile('@web/static/common/js/chosen.jquery.min.js');
$this->registerJsFile('@web/static/common/js/select2.min.js');
$this->registerJsFile('@web/static/common/js/wysihtml5-0.3.0.js');
$this->registerJsFile('@web/static/common/js/bootstrap-wysihtml5.js');
$this->registerJsFile('@web/static/common/js/jquery.tagsinput.min.js');
$this->registerJsFile('@web/static/common/js/jquery.toggle.buttons.js');
$this->registerJsFile('@web/static/common/js/bootstrap-datepicker.js');
$this->registerJsFile('@web/static/common/js/bootstrap-datetimepicker.js');
$this->registerJsFile('@web/static/common/js/clockface.js');
$this->registerJsFile('@web/static/common/js/date.js');
$this->registerJsFile('@web/static/common/js/daterangepicker.js');
$this->registerJsFile('@web/static/common/js/bootstrap-colorpicker.js');
$this->registerJsFile('@web/static/common/js/bootstrap-timepicker.js');
$this->registerJsFile('@web/static/common/js/jquery.inputmask.bundle.min.js');
$this->registerJsFile('@web/static/common/js/jquery.input-ip-address-control-1.0.min.js');
$this->registerJsFile('@web/static/common/js/jquery.multi-select.js');
$this->registerJsFile('@web/static/common/js/bootstrap-modal.js');
$this->registerJsFile('@web/static/common/js/bootstrap-modalmanager.js');

/* 初始化组件 */
$this->registerJsFile('@web/static/common/js/app.js');
$this->registerJsFile('@web/static/common/js/form-components.js');

?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>

$(function() {
    App.init();
    FormComponents.init();
    /* 子导航高亮 */
    highlight_subnav('log/index');
    
});

<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
