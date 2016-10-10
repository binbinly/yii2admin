
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
use yii\helpers\Url;
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
                <a class="" href="javascript:;" data-toggle="modal" data-target="#myModal01">忘记密码</a>
                    <!-- 模态框（Modal） -->
                    <div class="modal fade" id="myModal01" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form-horizontal forget_form">
                                    <div style="height:40px;"></div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">手机号码：</label>
                                        <div class="col-sm-5">
                                            <input class="form-control mobile" placeholder="您的手机号码" type="">
                                        </div>
                                        <div class="warning"><i>*</i>请输入正确的手机号码</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">验证码：</label>
                                        <div class="col-sm-5">
                                            <input class="form-control w_48left captcha" placeholder="请输入验证码" type="text">
                                            <input class="w_48 btnSendCode" type="button" value="获取短信验证码" />
                                        </div>
                                        <div class="warning"><i>*</i>请输入正确的验证码</div>
                                    </div>
                                    <div class="form-group tips">
                                        <label for="inputEmail3" class="col-sm-2 control-label">提示：</label>
                                        <div class="col-sm-5">
                                            <p></p>
                                        </div>
                                    </div>
                                </form>
                                <div style="height:60px;"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default forget" data-dismiss="">找回密码
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>
                <? endif; ?>
                <?php ActiveForm::end();?>
            </div><!-- tab-content -->

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        /* 发送验证码 */
        $('.btnSendCode').click(function () {
            that = this;
            var mobile = $(this).parents("form").find('.mobile').val();
            var re = /^1\d{10}$/;
            if(!re.test(mobile)){
                layer.alert('手机号码格式错误');
                return;
            }
            /* 发送验证码 */
            $.get("<?=Url::to(['/user/login/captcha'])?>", {mobile:mobile}, function(data){
                if(data.code == 0){
                    //设置button效果，开始计时
                    curCount = count;
                    $(that).attr("disabled", "true");
                    $(that).val( curCount + "秒后重新获取");
                    InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
                }
                layer.alert(data.msg);
            }, 'json');
        });
        /* 找回密码 */
        $('.forget').click(function(){
            var mobile = $('.forget_form').find('.mobile').val(),
                captcha = $('.forget_form').find('.captcha').val();
            if (!mobile || !captcha){
                $('#myModal01 .tips p').html('手机和验证码不为空');
                $('#myModal01 .tips').show();
                return;
            }
            $.get("<?=Url::to(['/user/index/forget'])?>", {mobile:mobile,captcha:captcha}, function(data){
                if(data.code == 0){
                    layer.alert(data.msg);
                }else{
                    $('#myModal01 .tips p').html(data.msg);
                    $('#myModal01 .tips').show();
                }
                // layer.alert(data.msg);
            }, 'json');
        });
    });
</script>
<?php include('public_footer.php'); ?>