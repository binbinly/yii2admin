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
                            <label for="inputEmail3" class="col-sm-1 control-label">密码</label>
                            <div class="col-sm-3">
                                <input class="form-control" name="old_password" placeholder="你的密码" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">新密码</label>
                            <div class="col-sm-3">
                                <input class="form-control" name="new_password" placeholder="请输入新密码" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-1 control-label">新密码</label>
                            <div class="col-sm-3">
                                <input class="form-control" name="new_password2" placeholder="请输入新密码" type="password">
                            </div>
                        </div>
                        <div class="form-group" style="text-align: left;margin-left: 82px;">
                            <button type="button" class="btn btn-default" id='save_btn' style="color: #fff;">确认</button>
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

    $('#save_btn').click(function(){
        var save_data = $('#mainform').serializeArray();
        $.post('/user/index/modifypwd',save_data,function(ret){
            if(ret.code==0){
                alert('修改成功');
            }else{
                alert(ret.msg)
            }
        },'json');
    })
});

</script>



