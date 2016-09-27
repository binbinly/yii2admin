<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form ActiveForm */
?>
<style>
    /* 授权编辑页 */
    .checkmod {
        margin-bottom: 20px;
        border: 1px solid #ebebeb;
    }
    .checkmod dt {
        padding-left: 10px;
        height: 30px;
        line-height: 30px;
        font-weight: bold;
        border-bottom: 1px solid #ebebeb;
        background-color: #ECECEC;
    }
    .checkmod dd {
        padding-left: 10px;
        line-height: 30px;
    }
    .checkmod dd .checkbox {
        margin: 0 10px 0 0;
        display: inline;
        font-size: 10px;
    }
    .checkmod dd .divsion {
        margin-right: 20px;
    }
</style>
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
        <!-- BEGIN FORM-->
        <form action="<?=\yii\helpers\Url::toRoute(['auth','role'=>$role])?>" method="post" class="form-aaa form-horizontal form-bordered form-row-stripped">

            <?php foreach ($node_list as $node): ?>
                <dl class="checkmod">
                    <dt class="hd">
                        <label class="checkbox">
                            <input class="auth_rules rules_all" type="checkbox" name="rules[]" value="<?=$node['url']?>" <?php echo in_array($node['url'],$auth_rules) ?'checked':''; ?> />
                            <?=$node['title']?>
                        </label>
                    </dt>
                    <dd class="bd">
                        <?php if (isset($node['child'])) : ?>
                            <?php foreach ($node['child'] as $child): ?>
                                <div class="rule_check">
                                    <div>
                                        <label class="checkbox">
                                            <input class="auth_rules rules_row" type="checkbox" name="rules[]" value="<?php echo $child['url'] ?>" <?php echo in_array($child['url'],$auth_rules) ?'checked':''; ?> />
                                            <?=$child['title']?>
                                        </label>
                                    </div>
                                    <?php if (!empty($child['operator'])) : ?>
                                        <span class="divsion">&nbsp;</span>
                                           <span class="child_row">
                                               <?php foreach ($child['operator'] as $op): ?>
                                                   <label class="checkbox">
                                                       <input class="auth_rules" type="checkbox" name="rules[]" value="<?php echo $op['url'] ?>" <?php echo in_array($op['url'],$auth_rules) ?'checked':''; ?> />
                                                       <?=$op['title']?>
                                                   </label>
                                               <?php endforeach ?>
                                           </span>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                    </dd>
                </dl>
            <?php endforeach ?>

            <div class="form-actions">
                <?= Html::submitButton('<i class="icon-ok"></i> 确定', ['class' => 'btn blue ajax-post','target-form'=>'form-aaa']) ?>
                <?= Html::Button('取消', ['class' => 'btn']) ?>
            </div>
        </form>
        <!-- END FORM-->
    </div>
</div>



<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '角色授权管理';
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


$this->registerJsFile('@web/static/common/js/app.js');
$this->registerJsFile('@web/static/common/js/form-components.js');
?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    App.init();
    FormComponents.init();
    highlight_subnav('auth/index'); //子导航高亮
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
