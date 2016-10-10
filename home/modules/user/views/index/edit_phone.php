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
            <div class="tab-content member_data">
                <div class="tab-pane active " id="order_cen001">
                    <form class="form-horizontal" id="mainform">
                        
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">新手机号码</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="new_mobile" placeholder="新手机号码" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">手机验证码</label>
                            <div class="col-sm-2">
                                <input class="form-control" name="captcha" placeholder="请输入验证码" type="text">
                            </div>
                            <div class="col-sm-2">
                                <button type="button" id='getcode_btn' class="btn btn-info btn-sm btn-danger" style="padding: 2px 10px;" >获取验证码</button>
                            </div>
                            
                        </div>
                        <div class="form-group" style="text-align: left;margin-left: 0px;">
                            <button type="button" class="btn btn-default" style="color:#fff;" id='save_btn'>提交修改</button>
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

    var flag=0;
    var timer = null;
    $('#save_btn').click(function(){
        var save_data = $('#mainform').serializeArray();
        $.post('/user/index/modifyphone',save_data,function(ret){
            if(ret.code==0){
                alert('修改成功');
            }else{
                alert(ret.msg)
            }
        },'json');
    })
    $('#getcode_btn').click(function(){
        
        if(!flag){
            var save_data = $('#mainform').serializeArray();
            if(!save_data){
                alert('请输入新手机号码');
                return;
            }
            $.post('/user/index/captcha',save_data,function(ret){
                if(ret.code==0){
                    alert('修改成功');
                }else{
                    alert(ret.msg)
                }
            },'json');

            flag = 1;
            var time = 60;
            timer = setInterval(function(){
                time -= 1;
                if(time<=0){
                    clearInterval(timer);
                    var x = '获取验证码';
                    flag = 0;
                }else{
                    var x = time+'s';
                }
                
                $('#getcode_btn').html(x)
            }, 1000)
        }
    })
});

</script>



