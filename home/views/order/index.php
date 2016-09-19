<?php
/* @var $this yii\web\View */
?>

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

        <div id="order">
            <?php foreach ($cart as $k=>$v): ?>
            <ul class="pay_cen_li" style="border-bottom:1px dashed #ccc;">
                <li><span class="">标题：</span><i><?=$v['goods']['title']?></i></li>
                <li><span class="">信息：</span>
                    <i><?=$v['stime']?> &nbsp;&nbsp;至&nbsp;&nbsp;<?=$v['etime']?>&nbsp;&nbsp;</i>
                    <i class="lan">修改时间</i>
                </li>
                <li><span class="">数量：</span><i><?=$v['num']?></i><i class="lan">修改数量</i></li>
                <li><span class="">价格：</span><i class="hong">￥<?=$v['goods']['price']?></i></li>
            </ul>
            <?php endforeach; ?>

        </div>

        <h4>订单用户信息</h4>
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-5">
              <input type="" class="form-control" placeholder="入住人姓名">
            </div>
          </div>
          <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" placeholder="手机号码">
                </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">证件号码</label>
            <div class="col-sm-5">
              <input type="" class="form-control" placeholder="身份证">
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

            <li>总费用<span></span><i>￥<?=$price['total']?></i></li>
            <li>套餐优惠<span></span><i class="hong">-￥<?=$price['discount']?></i></li>
        </ul>
        <div class="pay_cen_bottom"><p>总计<span></span><i class="hong">￥<?=$price['price']?></i></p></div>
    </div>
</div>


<script type="text/javascript">
    $(function () {

    });
</script>