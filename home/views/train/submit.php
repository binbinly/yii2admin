<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<style type="text/css">
#carousel-example-generic{
    display: none !important;
}
</style>

    <!--banner-->
<?= $this->render('/public/nav')?>

<div class="pay_top w_1200">
    <ol>
        <li class="pay_top_yd">预定流程</li>
        <li>1&nbsp;填写订单</li>
        <li>2&nbsp;支付订单</li>
        <li>3&nbsp;预定完成</li>
    </ol>
</div>
<div class="pay_cen">
    <div class="pay_cen_left">
        <h4>订单支付</h4>
        <ul class="pay_cen_li">
            <li><span class="">订单号</span><i><?= $data['order_sn']?></i></li>
            <li><span class="">培训项目</span><i><?= $data['title']?></i></li>
            <li><span class="">培训开始时间</span><i><?= date('Y-m-d', $data['start_time'])?></i></li>
            <li><span class="">培训人数</span><i><?= $data['num']?></i></li>
            <li><span class="">总金额</span><i class="hong">￥<?= $data['total']?></i></li>
        </ul>
        <form class="form-horizontal" action="<?= Url::to(['/train/order-pay'])?>" method="post">
        <h4>个人信息</h4>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-5">
                    <input type="" class="form-control name" name="name" placeholder="真实姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">身份证</label>
                <div class="col-sm-5">
                    <input type="" class="form-control sfz" name="sfz" placeholder="身份证">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-5">
                    <input type="" class="form-control tel" name="tel" placeholder="手机号码">
                </div>
            </div>
        <h4>付款方式</h4>
        <div class="pay_mode">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <input type="hidden" name="pay_type" value="0" class="pay_type">
                <li class="active">
                    <a href="#order_cen01" class="pay-type-list" data-id="1" role="tab" data-toggle="tab"><img src="/bootstrap/images/zgyl.jpg"></a>
                </li>
                <li>
                    <a href="#order_cen02" class="pay-type-list" data-id="2" role="tab" data-toggle="tab"><img src="/bootstrap/images/zfb.jpg"></a>
                </li>
                <li>
                    <a href="#order_cen03" class="pay-type-list" data-id="3" role="tab" data-toggle="tab"><img src="/bootstrap/images/wxzf.jpg"></a>
                </li>
                <li>
                    <button href="#order_cen04" class="pay-type-list" data-id="4" role="tab" data-toggle="tab">钱包</button>
                </li>
            </ul>
            <div class="form-group inline-pay" style="display:none;">
                <label for="inputPassword3" class="col-sm-2 control-label">支付密码</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control tel" name="pay_pwd">
                </div>
            </div>
        </div>
        <div class="fkfs">支付</div>
        <div class="xiayibu">
            <input type="hidden" name="order_sn" value="<?= $data['order_sn']?>">
            <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
            <button type="submit" class="submit"><img src="/bootstrap/images/pay_xia.jpg"></button>
        </div>
        </form>
    </div>
    <div class="pay_cen_right">
        <p>需要在线支付</p>
        <ul>
            <li>培训金额<span></span><i>￥<?= $data['total']?></i></li>
        </ul>
        <div class="pay_cen_bottom"><p>总计<span></span><i class="hong">￥<?= $data['total']?></i></p></div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('.submit').click(function () {
            var name = $('.name').val();
            var tel  = $('.tel').val();
            var sfz  = $('.sfz').val();
            var pay_type  = $('.pay_type').val();
            if (!name || !tel || !sfz || !pay_type){
                layer.msg('用户信息与支付信息不为空');
                return false;
            }

        });
        $(".pay-type-list").click(function(){
            if($(this).attr('data-id') == 4) {
                var user_money = '<?= $data['money']?>';
                var order_money = '<?= $data['total']?>';
                if(parseFloat(user_money) < parseFloat(order_money)) {
                    layer.msg('余额不足哦，请先充值!');return;
                }
                $(".inline-pay").show();
            }
            $(".pay_type").val($(this).attr('data-id'));
        });
    });
</script>