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

        <!-- 首页封面 -->
        <div class="control-group">
            <label class="control-label">首页封面图片</label>
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
                            <input type="hidden" name="ShopGroup[cover]" id="file_ipt" value="<?=$model->cover?>">
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
                    </div>
                    <div><img id="file_img" src="<?=$model->cover?>" class="img-circle"  width="100px" height="100px" style="margin:10px 0 -10px 0;<?= !empty($model->cover) ? 'display:block' : 'display:none'; ?>"></div>
                </div>
            </div>
        </div>
        <!-- 内页封面 -->
        <div class="control-group">
            <label class="control-label">内页封面图片</label>
            <div class="controls">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="icon-file fileupload-exists"></i>
                            <span class="fileupload-preview">
                                <?=$model->detail_cover?>
                            </span>
                        </div>
                        <span class="btn btn-file">
                            <span class="fileupload-new">选择文件</span>
                            <span class="fileupload-exists">更改</span>
                            <input type="file" name="detail_cover" class="default" id="file_but2">
                            <input type="hidden" name="ShopGroup[detail_cover]" id="file_ipt2" value="<?=$model->detail_cover?>">
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">删除</a>
                    </div>
                    <div><img id="file_img2" src="<?=$model->detail_cover?>" class="img-circle"  width="100px" height="100px" style="margin:10px 0 -10px 0;<?= !empty($model->cover) ? 'display:block' : 'display:none'; ?>"></div>
                </div>
            </div>
        </div>

        <?=$this->renderFile('@app/views/public/_image.php',[
            'data'=>$model->images,
            'field'=>'ShopGroup[images]'
        ])?>

        

        <div class="control-group">
            <label class="control-label">套餐【酒店】</label>
            <?php foreach (Shop::lists(1) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][1][<?=$list1['id']?>][days]" value="<?=isset($groups[1][$list1['id']]['days'])?$groups[1][$list1['id']]['days']:''?>" placeholder="天数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][1][<?=$list1['id']?>][num]" value="<?=isset($groups[1][$list1['id']]['days'])?$groups[1][$list1['id']]['num']:''?>" placeholder="房间数">
                    <input type="hidden" name="ShopGroup[groups][1][<?=$list1['id']?>][id]" value="<?=$list1['id']?>" >
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【帆船】</label>
            <?php foreach (Shop::lists(2) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][2][<?=$list1['id']?>][days]" value="<?=isset($groups[2][$list1['id']]['days'])?$groups[2][$list1['id']]['days']:''?>" placeholder="小时数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][2][<?=$list1['id']?>][num]" value="<?=isset($groups[2][$list1['id']]['num'])?$groups[2][$list1['id']]['num']:''?>" placeholder="数量">
                    <input type="hidden" name="ShopGroup[groups][2][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【潜水】</label>
            <?php foreach (Shop::lists(3) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][3][<?=$list1['id']?>][days]" value="<?=isset($groups[3][$list1['id']]['days'])?$groups[3][$list1['id']]['days']:''?>" placeholder="小时数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][3][<?=$list1['id']?>][num]" value="<?=isset($groups[3][$list1['id']]['num'])?$groups[3][$list1['id']]['num']:''?>" placeholder="数量">
                    <input type="hidden" name="ShopGroup[groups][3][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="control-group">
            <label class="control-label">套餐【海钓】</label>
            <?php foreach (Shop::lists(4) as $list1) :?>
                <div class="controls" style="padding: 4px;">
                    <div class="span3 m-wrap" style="line-height: 30px;"><?=$list1['id']?>、<?=$list1['title']?></div>
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][4][<?=$list1['id']?>][days]" value="<?=isset($groups[4][$list1['id']]['days'])?$groups[4][$list1['id']]['days']:''?>" placeholder="小时数">
                    <input type="text" class="span1 m-wrap" name="ShopGroup[groups][4][<?=$list1['id']?>][num]" value="<?=isset($groups[4][$list1['id']]['num'])?$groups[4][$list1['id']]['num']:''?>" placeholder="数量">
                    <input type="hidden" name="ShopGroup[groups][4][<?=$list1['id']?>][id]" value="<?=$list1['id']?>">
                </div>
            <?php endforeach; ?>
        </div>

        
        <?=$form->field($model, 'price')->textInput(['class'=>'span1 m-wrap'])->label('套餐价格')->hint('价格保留两位小数，例如420.12')?>

        <div class="control-group field-shop-price-list">
            <label for="shop-price" class="control-label">节日价</label>
            <?php if(isset($price_list) && !empty($price_list)):?>
                <?php foreach($price_list as $price): ?>
                    <div class="controls price_list">
                        日期：<input type="text" name="ShopGroup[shop_day][]" class="span2 m-wrap" value="<?= $price->day; ?>" id="shop-day_list"/>&nbsp;&nbsp;&nbsp;
                        价格：<input type="text" name="ShopGroup[shop_price][]" class="span2 m-wrap" id="shop-price_list" value="<?= $price->price?>"/>
                        <span style="font-size:20px;font-weight: 700;cursor: pointer;" class="add_price">+</span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="controls price_list">
                    日期：<input type="text" name="ShopGroup[shop_day][]" class="span2 m-wrap" id="shop-day_list"/>&nbsp;&nbsp;&nbsp;
                    价格：<input type="text" name="ShopGroup[shop_price][]" class="span2 m-wrap" id="shop-price_list"/>
                    <span style="font-size:20px;font-weight: 700;cursor: pointer;" class="add_price">+</span>
                </div>
            <?php endif; ?>
        </div>

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

    /* ======================图集js========================= */
    $('.fileupload-item').live('mouseover mouseout',function(e){
        if (event.type == 'mouseover') {
            $(this).find('span').css('display','block');
        } else {
            $(this).find('span').css('display','none');
        }
    });
    $('.fileupload-del').live('click',function(e){
        $(this).parent().remove();
    });
    $("#uploadImages").on("change", function(){
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
                        $('.fileupload-text').html('上传中...');
                    },
                    success: function(json){
                        if(json.boo){
                            var html  = '';
                                html += '<div class="fileupload-item thumbnail">';
                                html += '    <img src="'+ json.data +'" />';
                                html += '    <span class="fileupload-del">删除</span>';
                                html += '    <input type="hidden" name="ShopGroup[images][]" value="'+json.data+'" />';
                                html += '</div>';
                            $('.fileupload-list').append(html);
                            $('.fileupload-text').html('上传成功');
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

    $(".field-shop-price-list").on('click', '.add_price', function(){
        $(this).parents('.price_list').clone(false).appendTo(".field-shop-price-list");
    });

    /* ===================上传单图======================= */
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

    $("#file_but2").on("change", function(){
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
                            $('#file_img2').attr('src',json.data);
                            $('#file_ipt2').val(json.data);
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
