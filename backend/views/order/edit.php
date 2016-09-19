<?php


use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;
use backend\models\Train;
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

        <?=$form->field($model, 'order_sn')->textInput(['class'=>'span2 m-wrap'])->label('订单号')->hint('订单号由系统自动生成')?>

        <?=$form->field($model, 'name')->textInput(['class'=>'span2 m-wrap'])->label('姓名')->hint('购买人的姓名')?>
        <?=$form->field($model, 'tel')->textInput(['class'=>'span2 m-wrap'])->label('电话')->hint('购买人的电话')?>

        <?php $type = Yii::$app->request->get('type') ?>
        <?=$form->field($model, 'aid')->widget(\kartik\widgets\Select2::classname(), [
            'data' => $type == 'shop'?Shop::listsKv():Train::listsKv(),
            'options' => ['placeholder' => '选择商品'],
            'pluginOptions' => [
                'allowClear' => true,
                'width' => '30%'
            ],
        ])->label('商品名称')->hint(' ');?>

        <?=$form->field($model, 'start_time')->Widget(\kartik\widgets\DateTimePicker::classname(),[
            'language' => 'zh-CN',
            'type' => \kartik\widgets\DateTimePicker::TYPE_INPUT,
            'value' => '2016-07-15',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd hh:ii'
            ]
        ])->label('开始时间')->hint('租赁开始时间，或订购时间')?>
        
        <?=$form->field($model, 'end_time')->Widget(\kartik\widgets\DateTimePicker::classname(),[
            'language' => 'zh-CN',
            'type' => \kartik\widgets\DateTimePicker::TYPE_INPUT,
            //'convertFormat' => 'yyyy-mm-dd',
            'value' => '2016-07-15',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd hh:ii'
            ]
        ])->label('结束时间')->hint('租赁结束时间')?>
        
        <?=$form->field($model, 'num')->textInput(['class'=>'span1 m-wrap'])->label('数量')->hint('订购数量')?>
        
        <?=$form->field($model, 'pay_status')->radioList(['1'=>'已支付','0'=>'未支付'])->label('支付状态') ?>
        <?php if($this->context->action->id != 'add'):?>
        <?=$form->field($model, 'pay_time')->textInput(['class'=>'span2 m-wrap','value'=>date('Y-m-d H:i'),'disabled'=>true])->label('支付时间')->hint('支付时间')?>
        <?php endif ?>
        <?=$form->field($model, 'pay_type')->radioList(\Yii::$app->params['pay_type'])->label('支付类型')->hint(' ')?>
        <?=$form->field($model, 'pay_source')->radioList(['1'=>'网站','2'=>'微信','3'=>'后台'])->label('支付途径')->hint(' ')?>

        <?=$form->field($model, 'status')->radioList(['1'=>'显示','0'=>'隐藏'])->label('是否显示') ?>
        
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
$this->title = ($this->context->action->id == 'add' ? '添加' : '编辑') . '订单';
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
    highlight_subnav('order/index');
});

<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
