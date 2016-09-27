
<div class="member_cen">
    <form id="reg" role="form" class="col-xs-4">
        <div class="form-group">
            <label for="exampleInputEmail1">手机号</label>
            <input name="mobile" type="text" class="form-control " id="mobile" placeholder="注册手机号">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">用户名</label>
            <input name="username" type="text" class="form-control " id="tel" placeholder="注册手机号">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">密码</label>
            <input name="password" type="password" class="form-control" id="password" placeholder="密码">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">确认密码</label>
            <input name="repassword" type="password" class="form-control" id="repassword" placeholder="确认密码">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">手机验证码</label>
            <input name="captcha" type="text" class="form-control" id="captcha" placeholder="推荐人手机">
            <button id="" type="button" class="btn btn-primary">获取验证码</button>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">推荐人手机号</label>
            <input name="ttel" type="email" class="form-control" id="ttel" placeholder="推荐人手机">
        </div>
        <button id="reg_submit" type="button" class="btn btn-primary">注册</button>
    </form>
</div>

<script>
    $(function(){
        $('#reg #reg_submit').click(function(){
            var mobile = $('#reg input[name="mobile"]').val();
            var username = $('#reg input[name="username"]').val();
            var password = $('#reg input[name="password"]').val();
            var repassword = $('#reg input[name="repassword"]').val();
            var ttel = $('#reg input[name="ttel"]').val();
            if(password != repassword){
                alert('两次输入的密码不一样');
                return false;
            }
            if(!username || !password || !mobile){
                alert('用户名和手机号不为空');
                return;
            }
            var re = /^1\d{10}$/;
            if(!re.test(mobile)){
                alert('手机号码格式错误');
                return;
            }
            if(username.length < 4 || username.length > 12){
                alert('用户名格式为4-12位字符');
                return;
            }
            if(password.length < 8 || password.length > 16){
                alert('密码格式为8-16位字符');
                return;
            }
            //alert(username.length);
            //return;
            $.ajax({
                type: "GET",
                url: "<?=\yii\helpers\Url::to(['/user/login/reg'])?>",
                data: {'data[mobile]':mobile,'data[username]':username,'data[password]':password,'data[ttel]':ttel},
                success: function(data){
                    if(data == 0){
                        alert('注册失败');
                        return;
                    }
                    alert('注册成功');
                    window.location.href = '/'
                }
            });

        });



    });
</script>

