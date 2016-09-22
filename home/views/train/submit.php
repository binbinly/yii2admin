<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>


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
        <h4>预定信息</h4>
        <ul class="pay_cen_li">
            <li><span class="">房型信息</span><i>阳台双人房（预定）</i>
            </li>
            <li><span class="">房型信息</span>
                <i>2016-07-22 &nbsp;&nbsp;周五&nbsp;&nbsp;至&nbsp;&nbsp;2016-07-23&nbsp;&nbsp;周日</i>
                <i>共一晚</i><i class="lan">修改时间</i>
            </li>
            <li><span class="">房型信息</span><i>1</i><i class="lan">修改数量</i></li>
            <li><span class="">房型信息</span><i class="hong">￥666</i></li>
        </ul>
        <h4>入住信息</h4>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">房间1</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" placeholder="入住人姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">证件号码</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" placeholder="身份证">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" placeholder="手机号码">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class=""><img src="/bootstrap/images/pay_xia.jpg"></button>
                </div>
            </div>
        </form>
    </div>
    <div class="pay_cen_right">
        <p>需要在线支付</p>
        <ul>
            <li>房费<span></span><i>￥666</i></li>
            <li>取消费<span></span><i>￥666</i></li>
            <li>套餐优惠<span></span><i class="hong">-￥66</i></li>
        </ul>
        <div class="pay_cen_bottom"><p>总计<span></span><i class="hong">￥666</i></p></div>
    </div>
</div>
