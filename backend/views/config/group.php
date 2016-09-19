<?php

use yii\helpers\Html;
use common\core\ActiveForm;
use common\helpers\ArrayHelper;

$id = Yii::$app->request->get('id',1);
/* @var $this yii\web\View */
/* @var $model backend\models\Menu */
/* @var $form ActiveForm */
?>
<div class="tabbable tabbable-custom boxless">
    <ul class="nav nav-tabs">
        <?php foreach (Yii::$app->params['config_group'] as $key => $value) : ?>
        <?php if ($key == 0) { continue; } ?>
        <li <?php echo $key == $id ? 'class="active"' : ''; ?>><a href="<?=\yii\helpers\Url::toRoute(['group','id'=>$key])?>"><?=$value?>设置</a></li>
        <?php endforeach ?>
    </ul>
    
    <div class="tab-content">
        
        <div>
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption"><i class="icon-reorder"></i><?=Yii::$app->params['config_group'][$id]?>设置表单</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="<?=\yii\helpers\Url::toRoute(['group'])?>" method="post" class="form-aaa form-horizontal form-bordered form-row-stripped">
                        
                        <?php foreach ($groups as $group): ?>
                        <div class="control-group">
                            <label class="control-label"><?=$group['title']?></label>
                            <div class="controls">
                                <?php if($group['type'] == 2 || $group['type'] == 3): ?>
                                <textarea class="span3 m-wrap" name="param[<?=$group['name']?>]" rows="5"><?=$group['value']?></textarea>
                                <?php elseif($group['type'] == 4): ?>
                                <select class="span2 chosen" name="param[<?=$group['name']?>]" data-placeholder="请选择一个值" tabindex="1">
                                    <?php if($group['extra'] && is_array($group['extra'])): ?>
                                    <?php foreach ($group['extra'] as $k => $v) : ?>
                                    <option value="<?=$k?>" <?php if($group['value'] == $k){echo 'selected';} ?>><?=$v?></option>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                                <?php else : ?>
                                <input type="text" class="span3 m-wrap" name="param[<?=$group['name']?>]" value="<?=$group['value']?>"/>
                                <?php endif ?>
                                
                                <span class="help-inline"><?=$group['remark']?></span>
                            </div>
                        </div>
                        <?php endforeach ?>
                        
                        <input type="hidden" name="school_id" value="">
                        <div class="form-actions">
                            <?= Html::submitButton('<i class="icon-ok"></i> 确定', ['class' => 'btn blue ajax-post','target-form'=>'form-aaa']) ?>
                            <?= Html::Button('取消', ['class' => 'btn']) ?>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
</div>



<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '网站设置';
$this->context->title_sub = '';

/* 渲染其他文件 */
//echo $this->renderFile('@app/views/public/login.php');

/* 加载页面级别CSS */
$this->registerCssFile('@web/static/common/css/select2_metro.css');

/* 加载页面级别JS */
$this->registerJsFile('@web/static/common/js/select2.min.js');
$this->registerJsFile('@web/static/common/js/app.js');
$this->registerJsFile('@web/static/common/js/form-samples.js');
?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    App.init();
    FormSamples.init();
    highlight_subnav('config/group'); //子导航高亮

});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
