<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;
use yii\helpers\Url;

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
                'class'=>"form-aaa form-horizontal form-bordered form-row-stripped",
                'enctype'=>"multipart/form-data",
            ]
        ]); ?>
        <?=$form->field($model, 'category_id')->selectList(
            ArrayHelper::map( ArrayHelper::format_tree($cate_tree), 'id', 'title'),
            ['class'=>'span3 chosen'])->label('栏目') ?>
        
        <?=$form->field($model, 'name')->textInput(['class'=>'span2 m-wrap'])->label('文章标识')->hint('英文标识，只允许含有:英文、数字和中划线')?>
        
        <?=$form->field($model, 'title')->textInput(['class'=>'span6 m-wrap'])->label('文章标题')->hint(' ')?>
        
        <div class="control-group">
            <label class="control-label">封面图片</label>
            <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="icon-file fileupload-exists"></i> 
                            <span class="fileupload-preview">
                                <?=$model->cover?>
                            </span>
                        </div>
                        <span class="btn btn-file">
                            <span class="fileupload-new">选择文件</span>
                            <span class="fileupload-exists">更改</span>
                            <input type="file" name="cover" class="default" id="file_but">
                            <input type="hidden" name="Article[cover]" id="file_ipt" value="<?=$model->cover?>">
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
                        <img id="file_img" src="<?= !empty($model->cover) ? $model->cover : '/static/no_pic.jpg'; ?>" class="img-circle"  width="100px" height="100px" style="margin-left: 40px;">
                    </div>
                </div>
            </div>
        </div>
        
        <?=$form->field($model, 'description')->textarea(['class'=>'span4', 'rows'=>3])->label('文章描述')->hint(' ', ['style'=>'display:block;']) ?>
        
        <?=$form->field($model, 'content')->widget(\crazydb\ueditor\UEditor::className(),[
            'config' => [
                'serverUrl' => ['/ueditor/index'],//确保serverUrl正确指向后端地址
                'lang' => 'zh-cn',
            ]
        ])->label('文章内容')?>
        
        <?=$form->field($model, 'link')->textInput(['class'=>'span6 m-wrap'])->label('外链')->hint('外链地址必须带http')?>
        
        <?=$form->field($model, 'extend')->textarea(['class'=>'span4', 'rows'=>5])->label('扩展参数')->hint('一维数组配置格式“项:值”每项之间用换行或逗号隔开，其值转化为array后serialize()存储到数据库', ['style'=>'display:block;']) ?>
        
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
$this->title = ($this->context->action->id == 'add' ? '添加' : '编辑') . '文章栏目';
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
    highlight_subnav('article/index');
    
    /* 上传单图 */
    $("#file_but").on("change", function(){
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;
        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);
            reader.onloadend = function(){
                $.ajax({
                    type: 'post',
                    url: '<?=Url::to(["upload/image"])?>',
                    data: {imgbase64:this.result},
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    success: function(json){
                        if(json.boo){
                            $('#file_img').attr('src',json.data);
                            $('#file_ipt').val(json.data);
                        } else {
                            alert(json.msg);
                        }
                    },
                    error: function(xhr, type){
                        alert('服务器错误')
                    }
                });
            }
        }
    });
    
    
    
    
});

<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
