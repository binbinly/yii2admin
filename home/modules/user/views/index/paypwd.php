
<style type="text/css">
    .member_cen .nav > li > a {
        padding: 0px;
    }
    .tab-content{
        padding: 10px;
    }
    .base_info{
        float: left;
        padding: 10px;
    }
    .tab-content .userinfo{
    }
    .tab-content .userinfo table{
        width: 300px
    }
    .tab-content .userinfo table td{
        padding: 3px;
    }
    .other_info{
        float: right;
        margin-left: 100px;
        background: #fefbcc;
        padding: 10px;
    }
    .clearfix{
        clear: both;
    }
    .points_detail{
        margin-top: 20px;
        padding:10px;
    }
    .points_detail .title{
        font-size: 14px;
        font-weight: bold;
    }
    .points_detail table{
        width: 100%;
    }
    .points_detail thead{
        background: #c4a76f;
        height: 30px;
        line-height: 30px;
        color: #fff;
    }
    .points_detail td{
        padding: 6px 8px;
    }
    .points_detail tbody tr{
        font-size: 12px;
    }
    .points_detail tbody tr:nth-child(2n){
        background: #f3ede2;
        border-top: 1px solid #e1d3b9;
        border-bottom: 1px solid #e1d3b9;
    }
    .points_detail .red{
        color: red;
    }
    .points_detail .green{
        color: green;
    }
    .points_desc{
        margin-top: 20px;
        padding: 10px;
    }
    .points_desc .title{
        font-size: 14px;
        font-weight: bold;
        border-bottom: 1px solid #ccc;
    }
    .points_desc_item{
        font-size: 12px;
        margin-bottom: 20px;
    }
    .member_btn{
        display: inline-block;
        height: 20px;
        width: 90px;
        text-align: center;
        background: #c4a76f;
        margin-left: 30px;
        color: #fff;
        line-height: 20px;
    }
    .pagination_wrap{
        margin-top: 10px;
        font-size: 12px;

    }
    .pagination_content{
        float: right;
    }
    .pagination_content a{
        color: #000;
        margin-left: 5px;
    }
</style>
<!--banner-->
<?php include('public_head.php'); ?>
<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div role="tabpanel" class="tab-pane active" id="member_cen03">
    <div class="member_cen_text">
        <div class="">
            <h4>修改支付密码</h4>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php $form = ActiveForm::begin([
                    'id' => 'modifyPasswordForm',
                    'options' => ['class'=>'form-horizontal'],
                    'enableAjaxValidation'=>false,
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-lg-6\">{input}</div>\n<div class=\"col-lg-4\">{error}</div>",
                        'labelOptions' => ['class' => 'col-lg-2 control-label'],
                    ]
                ]);?>
                <? if($model->scenario == 'edit'): ?>
                <?=$form->field($model,'old_password')->passwordInput()?>
                <? endif; ?>
                <?=$form->field($model,'new_password')->passwordInput()?>
                <?=$form->field($model,'renew_password')->passwordInput()?>
                <?=Html::submitButton('修改',['class'=>'btn btn-primary col-sm-offset-2'])?>
                <? if($model->scenario == 'edit'): ?>
                <a href="">忘记密码</a>
                <? endif; ?>
                <?php ActiveForm::end();?>
            </div><!-- tab-content -->

        </div>
    </div>
</div>
<?php include('public_footer.php'); ?>