
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
.member_data {
    margin-top: 10px;
}
#save_btn {
    background: #cfb970;
    color: #fff;
}
</style>
<?php include('public_head.php'); ?>
<?
use yii\widgets\ActiveForm;
?>
<div role="tabpanel" class="tab-pane active" id="member_cen03">
    <div class="member_cen_text">
        <div class="order_cen">
            <!-- Tab panes -->
            <div class="tab-content member_data">
                <div  class="tab-pane active" id="member_cen04">
                    <div class="member_cen_text">
                        <div class="">
                            <form class="form-horizontal" role="form" id='mainform'>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-1 control-label">反馈邮箱</label>
                                <div class="col-sm-10">
                                  <input class="form-control" id="inputEmail3" placeholder="Email" type="email" name='email'>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-1 control-label">留言建议</label>
                                <div class="col-sm-10">
                                <textarea class="form-control" rows="3" name='content'></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-offset-1 col-sm-10">
                                  <button type="button" id='save_btn' class="btn btn-default pull-right">提交</button>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php include('public_footer.php'); ?>

<script type="text/javascript">
$('#save_btn').click(function(){
    var send_data = $('#mainform').serializeArray();
    $.post('/email',send_data,function(ret){
        if(ret.code==0){
            alert('发送成功，谢谢您的建议');
        }else{
            alert(ret.msg);
        }
    }, 'json')
})
</script>

