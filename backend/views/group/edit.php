<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;
use yii\helpers\Url;
use backend\models\Shop;

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
        <!-- BEGIN FORM-->
        <?php $form = ActiveForm::begin([
            'options'=>[
                'class'=>"form-aaa form-horizontal form-bordered form-row-stripped"
            ]
        ]); ?>
        
        <?=$form->field($model, 'title')->textInput(['class'=>'span6 m-wrap'])->label('商品标题')->hint(' ')?>

        <?=$form->field($model, 'description')->textarea(['class'=>'span4', 'rows'=>3])->label('商品描述')->hint(' ', ['style'=>'display:block;']) ?>


        <div class="control-group">
            <label class="control-label">套餐【酒店】</label>
            <?php foreach (Shop::lists(1) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][1][<?=$list1['id']?>][days]" value="<?=isset($groups[1][$list1['id']]['days'])?$groups[1][$list1['id']]['days']:''?>" placeholder="天数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][1][<?=$list1['id']?>][num]" value="<?=isset($groups[1][$list1['id']]['days'])?$groups[1][$list1['id']]['num']:''?>" placeholder="人数">
                    <input type="hidden" name="ShopGroup[groups][1][<?=$list1['id']?>][id]" value="<?=$list1['id']?>" >
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【帆船】</label>
            <?php foreach (Shop::lists(2) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][2][<?=$list1['id']?>][days]" value="<?=isset($groups[2][$list1['id']]['days'])?$groups[2][$list1['id']]['days']:''?>" placeholder="天数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][2][<?=$list1['id']?>][num]" value="<?=isset($groups[2][$list1['id']]['num'])?$groups[2][$list1['id']]['num']:''?>" placeholder="人数">
                    <input type="hidden" name="ShopGroup[groups][2][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【潜水】</label>
            <?php foreach (Shop::lists(3) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][3][<?=$list1['id']?>][days]" value="<?=isset($groups[3][$list1['id']]['days'])?$groups[3][$list1['id']]['days']:''?>" placeholder="天数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][3][<?=$list1['id']?>][num]" value="<?=isset($groups[3][$list1['id']]['num'])?$groups[3][$list1['id']]['num']:''?>" placeholder="人数">
                    <input type="hidden" name="ShopGroup[groups][3][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【海钓】</label>
            <?php foreach (Shop::lists(4) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][4][<?=$list1['id']?>][days]" value="<?=isset($groups[4][$list1['id']]['days'])?$groups[4][$list1['id']]['days']:''?>" placeholder="天数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][4][<?=$list1['id']?>][num]" value="<?=isset($groups[4][$list1['id']]['num'])?$groups[4][$list1['id']]['num']:''?>" placeholder="人数">
                    <input type="hidden" name="ShopGroup[groups][4][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        
        <?=$form->field($model, 'price')->textInput(['class'=>'span1 m-wrap'])->label('套餐价格')->hint('价格保留两位小数，例如420.12')?>
        
        <?=$form->field($model, 'sort')->textInput(['class'=>'span1 m-wrap'])->label('排序值')->hint('排序值越小越前')?>
        
        <?=$form->field($model, 'status')->radioList(['1'=>'正常','0'=>'隐藏'])->label('状态') ?>
        
        <div class="form-actions">
            <?= Html::submitButton('<i class="icon-ok"></i> 确定', ['class' => 'btn blue ajax-post','target-form'=>'form-aaa']) ?>
            <?= Html::Button('取消', ['class' => 'btn']) ?>
        </div>
        
        <?php ActiveForm::end(); ?>
        
        <!-- END FORM-->
    </div>
</div>



<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = ($this->context->action->id == 'add' ? '添加' : '编辑') . '商品';
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
    highlight_subnav('group/index');
    
    
    
});

<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
