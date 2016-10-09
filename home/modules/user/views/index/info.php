<?php
use yii\helpers\Html;
?>
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
#img_show{
    width: 200px;
    min-height: 200px;
    border: 1px solid #ccc;
}
#img_show img{
    width: 100%
}
#file_upload-queue{
    display: none;
}
#file_upload{
    padding-top: 4px;
}
.img_area{
    position: absolute;
    right: 0px;
    top:0px;
}
.img_area .title{
    padding-left: 15px;
}

.img_area .glyphicon{
    width: 200px;
    height: 200px;
    line-height: 200px;
    font-size: 66px;
    color: #ccc;
    text-align: center;
}
.icon-calendar{
    background: none;
}
#save_btn{
    background: #cfb970;
}
</style>
<script src="/bootstrap/js/jquery.uploadify.min.js"></script>
<link rel="stylesheet" type="text/css" href="/bootstrap/css/uploadify.css">
<?php include('public_head.php'); ?>



<div role="tabpanel" class="tab-pane active" id="member_cen03">
    <div class="member_cen_text">
        <div class="order_cen">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="/user/index/info">个人信息单</a></li>
                <li role="presentation"><a href="/user/index">会员说明</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content member_data">
                <div class="tab-pane active " id="order_cen001">
                    <form class="form-horizontal" id="mainform">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">姓名</label>
                            <div class="col-sm-2">
                                <input class="form-control" name='username' value="<?= $user->username ?>" placeholder="王明" type="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">密码</label>
                            <div class="col-sm-5">
                                <a class="btn btn-default" href='/user/index/editpwd' style="background:#e50012;color:#fff;">修改密码</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">昵称</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="nickname" value="<?= $user->nickname ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">性别</label>
                            <div class="col-sm-2">
                                <select name="sexual">
                                    <option value="0">请选择</option>
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">邮箱</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="email" value="<?= $user->email ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">手机</label>
                            <div class="col-sm-2">
                                <input class="form-control" value="<?= $user->mobile ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">生日</label>
                            <div data-picker-position="bottom-left" class="input-append date form_datetime6 w_120">
                               <div class="border">
                                   <input type="text" name="birthday" readonly="readonly" size="16" value="<?= $user->birthday ?>">
                                   <span class="add-on"><i class="icon-calendar glyphicon glyphicon-calendar"></i></span>
                               </div>
                           </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">公司</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="company" placeholder="公司名称" value="<?= $user->company ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">职务</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="title" value="<?= $user->title ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">地址</label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="addr"><?= $user->addr ?></textarea>
                            </div>
                        </div>
                        <div class="form-group img_area">
                            <p class='title'>头像上传</p>
                            <div class="col-sm-2">
                                <div id="img_show">
                                    <?php if(isset($user->image)): ?>
                                        <img src="<?= $user->image ?>" />
                                    <?php else: ?>
                                        <span class="glyphicon glyphicon-user"></span>
                                    <?php endif; ?>
                                </div>
                                <input id="file_upload" name="file_upload" type="file" multiple="true">
                            </div>
                            
                        </div>
                        <div class="form-group" style="text-align: left;margin-left: 40px;">
                            <button type="button" class="btn btn-default" id='save_btn'>提交修改</button>
                        </div>

                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php include('public_footer.php'); ?>


<script type="text/javascript">

function loadData(obj){
    var key,value,tagName,type,arr;
    for(x in obj){
        key = x;
        value = obj[x];
        
        $("[name='"+key+"'],[name='"+key+"[]']").each(function(){
            tagName = $(this)[0].tagName;
            type = $(this).attr('type');
            if(tagName=='INPUT'){
                if(type=='radio'){
                    $(this).attr('checked',$(this).val()==value);
                }else if(type=='checkbox'){
                    arr = value.split(',');
                    for(var i =0;i<arr.length;i++){
                        if($(this).val()==arr[i]){
                            $(this).attr('checked',true);
                            break;
                        }
                    }
                }else{
                    $(this).val(value);
                }
            }else if(tagName=='SELECT' || tagName=='TEXTAREA'){
                $(this).val(value);
            }
            
        });
    }
}
$(function() {
    $('#file_upload').uploadify({
        'height'        : 27,
        'width'         : 80, 
        'buttonText'    : '选择图片',
        'swf'           : '/bootstrap/css/uploadify.swf',
        'uploader'      : '/upload/files',
        'auto'          : true,
        'multi'         : false,
        'removeCompleted':false,
        'cancelImg'     : '/bootstrap/images/uploadify-cancel.png',
        'fileTypeExts'  : '*.jpg;*.jpge;*.gif;*.png',
        'fileSizeLimit' : '2MB',
        'onUploadSuccess':function(file,data,response){
            data = JSON.parse(data);
            if(data.code==0){
                $('#img_show').html('<img src="'+data.obj.file_path+'">')
            }
        },
        //加上此句会重写onSelectError方法【需要重写的事件】
        'overrideEvents': ['onSelectError', 'onDialogClose'],
        //返回一个错误，选择文件的时候触发
        'onSelectError':function(file, errorCode, errorMsg){
            switch(errorCode) {
                case -110:
                    alert("文件 ["+file.name+"] 大小超出系统限制的" + jQuery('#upload_org_code').uploadify('settings', 'fileSizeLimit') + "大小！");
                    break;
                case -120:
                    alert("文件 ["+file.name+"] 大小异常！");
                    break;
                case -130:
                    alert("文件 ["+file.name+"] 类型不正确！");
                    break;
            }
        },
    });
    $('#save_btn').click(function(){
        var save_data = $('#mainform').serializeArray();
        var img = $('#img_show img').attr('src');
        if(img){
            save_data.push({
                name:'image',
                value:img
            });
        }
        $.post('/user/index/modify',save_data,function(ret){
            if(ret.code==0){
                alert('修改成功');
            }else{
                alert(ret.msg)
            }
        },'json');
    })
    $('[name=sexual]').val(parseInt('<?= $user->sexual ?>'));
});

</script>



