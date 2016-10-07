<?php

use yii\helpers\Url;//var_dump(\common\models\TrainType::getAll(0));exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>帆海汇</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">  
    <link href="/bootstrap/css/css.css" rel="stylesheet">
    <link href="/bootstrap/css/datetimepicker.css" rel="stylesheet">
    <script src="/bootstrap/js/jquery-1.js"></script>
    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/bootstrap/js/bootstrap-datetimepicker.js"></script>
    <script src="/bootstrap/js/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="/bootstrap/layer/layer.js"></script>
    
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<style type="text/css">
.mask{
    width: 100%;
    height: 100%;
     display: none; 
    background: #000;
    opacity: 0.9;
    position: fixed;
    z-index: 999;
    text-align: center;
    padding: 200px;
    top: 0;
    left: 0;
}
.nav > li > a {
    padding: 10px 10px;
}
#reg_model .tips p{
    padding-top: 7px;
}
#reg_model .tips{
    display: none;
    color: red;
}
</style>
<!--首页-->
<div class="sy_header">
    <div class="sy_header_nav">
            <div class="navbar-header">
                <h1><a title="首页" href="/"><img src="/bootstrap/images/logo.png"> </a></h1>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/" class="first-nav" id='home_nav'>首页</a></li>
                    
                    <li class="dropdown">
                        <a id='product_nav' aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle first-nav" href="#">产品&服务</a>
                        <ul class="dropdown-menu">
                            <i class="pos_icon"><img src="/bootstrap/images/up.jpg"> </i>
                            <li class="popup"><a href="/shop/group"><img src="/bootstrap/images/taocan.jpg"><p class="popup_bg"></p><div class="popup_bg_p"><p>套餐</p><span>说明内容说明内容说明内容</span></div></a></li>
                            <li class="popup"><a href="/shop/index?type=1"><img src="/bootstrap/images/kefang.jpg"><p class="popup_bg"></p><div class="popup_bg_p"><p>客房</p><span>说明内容说明内容说明内容</span></div></a></li>
                            <li class="popup01"><a href="/shop/index?type=2"><img src="/bootstrap/images/fangchuan.jpg"><p class="popup_bg"></p><div class="popup_bg_p"><p>帆船</p><span>说明内容说明内容说明内容</span></div></a></li>
                            <li class="popup01"><a href="/shop/index?type=3"><img src="/bootstrap/images/qianshui.jpg"><p class="popup_bg"></p><div class="popup_bg_p"><p>潜水</p><span>说明内容说明内容说明内容</span></div></a></li>
                            <li class="popup01"><a href="/shop/index?type=4"><img src="/bootstrap/images/haidiao.jpg"><p class="popup_bg"></p><div class="popup_bg_p"><p>海钓</p><span>说明内容说明内容说明内容</span></div></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a id='train_nav' aria-expanded="false" aria-haspopup="true" role="button" data-toggle="dropdown" class="dropdown-toggle first-nav" href="#">活动&培训</a>
                        <ul class="dropdown-menu train">
                            <i class="pos_icon"><img src="/bootstrap/images/up.jpg"> </i>
                            <?php foreach(\common\models\TrainType::getAll(0) as $item): ?>
                            <li class="popup01"><a href="<?= Url::to(['/train/certificate','type'=>$item['id']])?>"><img src="<?=$item['cover']?>"><p class="popup_bg"></p><div class="popup_bg_p"><p><?=$item['name']?></p><span><?= $item['description']?></span></div></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="acitve"><a id='active_nav' href="/article/index?cid=3">最新资讯</a></li>
                    <li><a id='about_nav' href="/article/index?cid=1">关于我们</a></li>
                </ul>
                
                <?php if (Yii::$app->user->identity) : ?>
                <div class="navbar-form navbar-left">
                    <div class="form-group user_wrap">
                        <span><?=Yii::$app->user->identity->username?></span>
                        <img style="width: 46px;" src="/uploads/5f0491a16bc1de2add0b09fa0874f272.jpg" class="img-circle">
                        <ul class="sub_nav">
                            <li><a href="/user/index/info">个人信息</a></li>
                            <li><a href="/user">我的订单</a></li>
                            <li><a href="/user/index/wallet">我的钱包</a></li>
                            <li><a href="/user/index/points">我的积分</a></li>
                            <li><a href="/user/login/logout">注销</a></li>
                        </ul>
                    </div>

                    <!-- <a class="btn btn-danger" href="<?=Url::to('/user/login/logout')?>">注销</a> -->

                    <!-- <a class="btn btn-info" href="<?=Url::to('/user')?>">会员中心</a> -->
                    <a class="cart-wrap" href="<?=Url::to('/order/view')?>"> <span class='text'>购物车 </span><span class="glyphicon glyphicon-shopping-cart"></span></i></a>
                </div>
                <?php else: ?>
                <form role="search" method="post" class="navbar-form navbar-left login" id='login_form'>
                    <div class="form-group">
                        <input name="username" type="text" placeholder="用户名/邮箱/手机号" class="form-control">
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" placeholder="请输入密码" class="form-control">
                    </div>
                    <button class="btn btn-default dl" type="submit">登录</button>
                    <p id='baocuo' style="width: 274px;text-align: right;color: red; display: none;">用户名或密码错误</p>
                    <div class="wangjimima"  data-toggle="modal" data-target="#myModal01">忘记密码</div>
                </form>

                <!-- 按钮触发模态框 -->
                <button class="btn btn-default zc" data-toggle="modal" data-target="#reg_model">
                    注册
                </button>
                <!-- 模态框（Modal） -->
                <div class="modal fade" id="reg_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form class="form-horizontal" id="reg">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">手机号码：</label>
                                    <div class="col-sm-5">
                                        <input name="data[mobile]" class="form-control mobile" placeholder="您的手机号码" type="text">
                                    </div>
                                    <div class="warning"><i>*</i>请输入正确的手机号码</div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">用户名：</label>
                                    <div class="col-sm-5">
                                        <input name="data[username]" class="form-control" placeholder="请输入用户名" type="text">
                                    </div>
                                    <div class="warning"><i>*</i>4-12位数字及英文字母</div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">设置密码：</label>
                                    <div class="col-sm-5">
                                        <input name="data[password]" class="form-control" placeholder="请输入密码" type="password">
                                    </div>
                                    <div class="warning"><i>*</i>8-16位数字及英文字母</div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">验证码：</label>
                                    <div class="col-sm-5">
                                        <input name="data[captcha]" class="form-control w_48left" placeholder="请输入验证码" type="text">
                                        <input class="w_48 btnSendCode" type="button" value="获取短信验证码" />
                                    </div>
                                    <div class="warning"><i>*</i>请输入正确的验证码</div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">推荐人：</label>
                                    <div class="col-sm-5">
                                        <input name="data[tmobile]" class="form-control" placeholder="请输入推荐人的手机号码" type="text">
                                    </div>
                                    <div class="warning"><i>&nbsp;</i>请输入推荐人的手机号码</div>
                                </div>
                                <div class="form-group">
                                    <div class="xueyi">
                                        <label>
                                            <input name="ty" type="checkbox">我已阅读并同意<a href="#">《网站协议》</a>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group tips">
                                    <label for="inputEmail3" class="col-sm-2 control-label">提示：</label>
                                    <div class="col-sm-5">
                                        <p>xxxx</p>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default ajax_post" data-dismiss="">注册</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
                <?php endif ?>
                
                <ul class="nav navbar-nav wx">
                    <li class="dropdown" id='show_wx'>
                        <a href="#"><img src="/bootstrap/images/co.jpg"></a>
                    </li>
                </ul>
                
                
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
                                
                            </form>
                            <div style="height:60px;"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default forget" data-dismiss="">找回密码
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
                
                
            </div>
    </div>
</div>

<?= $content ?>

<div class="sy_bottom">
    <p><i>A：</i>地址23号鹰君中心2701室<i>T</i> (852) 2186 2388 F (852) 2186 2300<i>E</i>   info@langhamhotels.com</p>
    <!-- <div class="sy_bottom_icon">
        <ul>
            <li>
                <a class="" href="" target="_blank" style="top: 0px;">
                    <img src="/bootstrap/images/xlwb.png" alt=""></a>
            </li>
            <li>
                <a class="" href="" target="_blank" style="top: 0px;">
                    <img src="/bootstrap/images/wx.png" alt=""></a>
            </li>
            <li>
                <a class="" href="" target="_blank" style="top: 0px;">
                    <img src="/bootstrap/images/txpy.png" alt=""></a>
            </li>
            <li>
                <a class="" href="" target="_blank" style="top: 0px;">
                    <img src="/bootstrap/images/db.png" alt=""></a>
            </li>
        </ul>
    </div> -->
    <div class="xian"></div>
    <div class="sy_bottom_cen">
©帆海汇俱乐部有投资有限公司版权所有。粤ICP备09039361号</div>
</div>

<div class="mask">
    <img src="/bootstrap/images/weixin.jpg">
</div>

<script type="text/javascript">
    $('.user_wrap').hover(function(){
        $(this).find('.sub_nav').show();
    }, function(){
        $(this).find('.sub_nav').hide();
    });
    $(".form_datetime5").datetimepicker({
        startDate: '<?=date('Y-m-d',time()+60*60*24)?>',
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        todayBtn: true,
        language:'zh-CN',
        linkFormat: "yyyy-mm-ddi",
        startView: 2,//
        minView: 1
    });
    $(".form_datetime6").datetimepicker({
        startDate: '<?=date('Y-m-d',time()+60*60*24)?>',
        format: "yyyy-mm-dd",
        autoclose: true,
        todayBtn: true,
        language:'zh-CN',
        linkFormat: "yyyy-mm-ddi",
        startView: 2,//
        minView: 2
    });
</script>
<script type="text/javascript">
    /*-------------------------------------------*/
    var InterValObj; //timer变量，控制时间
    var count = 60; //间隔函数，1秒执行
    var curCount;//当前剩余秒数
    var that;
    //timer处理函数
    function SetRemainTime() {
        if (curCount == 0) {                
            window.clearInterval(InterValObj);//停止计时器
            $(that).removeAttr("disabled");//启用按钮
            $(that).val("重新发送验证码");
        } else {
            curCount--;
            $(that).val( curCount + "秒后重新获取");
        }
    }
    
    $(function () {
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
        /* ajax登录 */
        $('.dl').click(function () {
            var username = $('.login input[name="username"]').val();
            var password = $('.login input[name="password"]').val();
            if (username && password){
                $.ajax({
                    type: "GET",
                    url: "<?=Url::to('/user/login/login')?>",
                    data: {username:username,password:password},
                    success: function(data){
                        if(data == 1){
                            window.location.reload();
                        } else {
                            // layer.alert('用户名或密码错误');
                            $('#baocuo').show();
                        }
                    }
                });
            }
            return false;
        });
        /* reg注册 */
        $('.ajax_post').click(function(){
            /* 同意之后才能注册 */
            var ty = $('#reg').find('input[name="ty"]').is(':checked');
            if (ty){
                $.get("<?=Url::to(['/user/login/reg'])?>", $("#reg").serialize(), function(data){
                    if(data.code == 0){
                        //window.location.href = '/';
                    }else{
                        $('#reg_model .tips p').html(data.msg);
                        $('#reg_model .tips').show();
                    }
                    // layer.alert(data.msg);
                }, 'json');
            } else {
                // layer.alert('同意网站协议后才能注册');
                $('#reg_model .tips p').html('同意网站协议后才能注册');
                $('#reg_model .tips').show();
            }
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
            $.get("<?=Url::to(['/user/login/forget'])?>", {mobile:mobile,captcha:captcha}, function(data){
                if(data.code == 0){
                    //window.location.href = '/';
                }else{
                    $('#myModal01 .tips p').html(data.msg);
                    $('#myModal01 .tips').show();
                }
                // layer.alert(data.msg);
            }, 'json');
        });
        /* logout注销 */
        $('.logout').click(function () {
            $.ajax({
                type: "GET",
                url: "<?=Url::to('/user/login/logout')?>",
                success: function(data){

                }
            });
            //window.location.reload();
        });
    });
var pathname = location.pathname+location.search;
if(pathname=='/'){
    $('.first-nav').removeClass('acitve');
    $('#home_nav').addClass('active');
}else if(location.pathname=='/shop/index'){
    $('.first-nav').removeClass('acitve');
    $('#product_nav').addClass('active');
}else if(location.pathname=='/shop/group'){
    $('.first-nav').removeClass('acitve');
    $('#product_nav').addClass('active');
}else if(pathname=='/article/index?cid=3'){
    $('.first-nav').removeClass('acitve');
    $('#active_nav').addClass('active');
}else if(pathname=='/article/index?cid=1'){
    $('.first-nav').removeClass('acitve');
    $('#about_nav').addClass('active');
}
$('#login_form input').focus(function(){
    $('#baocuo').hide();
})
$('#show_wx').click(function(){
    $('.mask').show();
})
$('.mask').click(function(){
    $(this).hide();
})
</script>

</body>
</html>
