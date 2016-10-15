
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
<?php
use yii\widgets\LinkPager;
?>

            <div role="tabpanel" class="tab-pane active" id="member_cen03">
                <div class="member_cen_text">
                    <p class="order_top"><img src="/bootstrap/images/jingao.png" class="member_jingao_img">您可以在线查看近一年的订单。如需查找更早之前的订单，请致电：0755-88888888 </p>
                    <div class="order_cen">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#order_cen01" aria-controls="home" role="tab" data-toggle="tab" id='all_btn'>全部订单</a></li>
                            <li role="presentation"><a href="#order_cen02" aria-controls="profile" role="tab" data-toggle="tab" id='payed_btn'>已付款</a></li>
                            <li role="presentation"><a href="#order_cen03" aria-controls="messages" role="tab" data-toggle="tab" id='not_payed_btn'>待付款</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="order_cen01">
                                <div class="order_forn">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2">订单号</label>
                                            <input type="text" class="form-control"  name='order_sn' id="exampleInputName2" placeholder="输入订单号">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">用户</label>
                                            <input type="text" class="form-control" name='name' id="exampleInputEmail2" placeholder="中文名/英文名">
                                        </div>
                                        <div class="store_shop_text05">
                                            <span>预订日期</span>
                                            <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                                <div class="border">
                                                    <input type="text" readonly="readonly" name='start_time' size="16">
                                                    <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                            </div>&nbsp;&nbsp;~&nbsp;&nbsp;
                                            <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                                <div class="border">
                                                    <input type="text" readonly="readonly" name="end_time" size="16">
                                                    <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">查&nbsp;询</button>
                                    </form>
                                </div>
                                <div class="order_type">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox1"> 全选
                                            </label>
                                        </div>
                                        <div class="col-md-2">类型</div>
                                        <div class="col-md-2">用户</div>
                                        <div class="col-md-2">有效日期</div>
                                        <div class="col-md-2">总金额</div>
                                        <div class="col-md-3">订单状态</div>
                                    </div>
                                </div>
                                <?php foreach($order_list as $order): ?>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：
                                            <i><?= $order->order_sn?></i>
                                        </label>
                                        预订日期：<?= date("Y-m-d", $order->start_time)?>
                                        <a href="javascript:void(0)" class="del_btn" target_id='<?= $order->order_id?>'>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1"><?= $order->title?></div>
                                        <div class="col-md-2"><?= $order->type?></div>
                                        <div class="col-md-2"><?= $order->name?></div>
                                        <div class="col-md-2"><?= date("Y-m-d", $order->create_time)?></div>
                                        <div class="col-md-2">￥<?= $order->total?></div>
                                        <div class="col-md-3" pay_status="<?= $order->pay_status?>">
                                            <p>
                                            <?php if($order->pay_status==1): ?>
                                                已付款
                                            <?php else: ?>
                                                未付款
                                            <?php endif; ?>
                                            </p>
                                        <span></span></div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="page text-center">
                            <?php
                                echo LinkPager::widget([
                                    'pagination' => $page,
                                ]);
                            ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
<?php include('public_footer.php'); ?>

<script type="text/javascript">
var delCgi = '/user/order/del'
$(function(){

$('.del_btn').click(function(){
    if(confirm('确定删除订单 ?')){
        var target_id = $(this).attr('target_id');
        var that = this;
        $.post(delCgi, {order_id:target_id},function(ret){
            $(that).parents('.order_li').slideUp('fast');
        }, 'json')
    }
})

// 已付款
$('#payed_btn').click(function(){
    $('.order_li').show();
    $('.order_li').each(function(index,dom){
        if($(dom).find('[pay_status]').attr('pay_status') == 0){
            $(dom).hide();
        }
    })
})


// 未付款
$('#not_payed_btn').click(function(){
    $('.order_li').show();
    $('.order_li').each(function(index,dom){
        if($(dom).find('[pay_status]').attr('pay_status') == 1){
            $(dom).hide();
        }
    })
})

// 全部
$('#all_btn').click(function(){
    $('.order_li').show();
})

})
</script>

