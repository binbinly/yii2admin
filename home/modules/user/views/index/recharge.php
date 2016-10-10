
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

<div role="tabpanel" class="tab-pane active" id="member_cen03">
    <div class="member_cen_text">
        <div class="">
            <!-- Tab panes -->
            <div class="tab-content">
                <form class="form-horizontal" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">充值金额</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name='RechargeLog[amount]'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">付款方式</label>
                    <div class="col-sm-10">
                        <div class="pay_mode">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <input type="hidden" name="RechargeLog[pay_type]" value="" class="pay_type">
                                <li>
                                    <a href="#order_cen01" class="pay-type-list" data-id="1" role="tab" data-toggle="tab"><img src="/bootstrap/images/zgyl.jpg"></a>
                                </li>
                                <li>
                                    <a href="#order_cen02" class="pay-type-list" data-id="2" role="tab" data-toggle="tab"><img src="/bootstrap/images/zfb.jpg"></a>
                                </li>
                                <li>
                                    <a href="#order_cen04" class="pay-type-list" data-id="3" role="tab" data-toggle="tab"><img src="/bootstrap/images/wxzf.jpg"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
                        <button type="submit" id='save_btn' class="btn btn-default">提交</button>
                    </div>
                </div>
                </form>
            </div><!-- tab-content -->

        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $(".pay-type-list").click(function(){
            $(".pay_type").val($(this).attr('data-id'));
        });
    });
</script>
<?php include('public_footer.php'); ?>