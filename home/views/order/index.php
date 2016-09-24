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
                <li><span class="">时间：</span>
                    <i><?=$v['stime']?> &nbsp;&nbsp;至&nbsp;&nbsp;<?=$v['etime']?>&nbsp;&nbsp;</i>
                    <a href="JavaScript:history.go(-1)"><i class="lan">返回修改</i></a>
                </li>
                <li><span class="">数量：</span><i><?=$v['num']?></i></li>
                <li><span class="">单价：</span><i class="hong">￥<?=$v['goods']['price']?></i></li>
            </ul>
            <?php endforeach; ?>

        </div>

        <h4>订单用户信息</h4>
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
            <div class="col-sm-5">
              <input type="" class="form-control name" placeholder="入住人姓名">
            </div>
          </div>
          <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-5">
                    <input type="" class="form-control tel" placeholder="手机号码">
                </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">证件号码</label>
            <div class="col-sm-5">
              <input type="" class="form-control sfz" placeholder="身份证">
            </div>
          </div>
        </form>
        <h4>付款方式</h4>
        <div class="pay_mode">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <input type="hidden" name="pay_type" value="1" class="pay_type">
                <li class="active">
                    <a href="#order_cen01" role="tab" data-toggle="tab"><img src="/bootstrap/images/zgyl.jpg"></a>
                </li>
                <li>
                    <a href="#order_cen02" role="tab" data-toggle="tab"><img src="/bootstrap/images/zfb.jpg"></a>
                </li>
                <li>
                    <a href="#order_cen04" role="tab" data-toggle="tab"><img src="/bootstrap/images/wxzf.jpg"></a>
                </li>
            </ul>
        </div>
        <div class="fkfs">请选择付款方式</div>
        <div class="xiayibu">
            <button type="submit" class="submit"><img src="/bootstrap/images/pay_xia.jpg"></button>
            <p>优惠卷<p>
            <div class="pay_select col-sm-4">
                <select class="form-control">
                    <option>选择优惠卷</option>
                    <option>4446556541</option>
                    <option>31434332</option>
                </select>
            </div>
        </div>
        
    </div>
    <div class="pay_cen_right">
        <div class="pay_cen_right01">
            <p>需要在线支付</p>
            <ul>
                <li>总费用<span></span><i>￥<?=$price['total']?></i></li>
                <li>套餐优惠<span></span><i class="hong">-￥<?=$price['discount']?></i></li>
            </ul>
            <div class="pay_cen_bottom"><p>总计<span></span><i class="hong">￥<?=$price['price']?></i></p></div>
        </div>
        <div class="pay_cen_right02">
            <div class="bs-example">
                <h3 class="pay_cen_right02_h3">相关推荐</h3>
                <div class="media">
                    <a class="media-left" href="#">
                        <img data-holder-rendered="true" src="/bootstrap/images/pay_pc.jpg" class="media-object" data-src="holder.js/64x64">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">悠长假期住宿</a><i>￥600</i></h4>
                        <div class="pay_media_text">内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</div>
                    </div>
                </div>
                <div class="media">
                    <a class="media-left" href="#">
                        <img data-holder-rendered="true" src="/bootstrap/images/pay_pc.jpg" class="media-object" data-src="holder.js/64x64">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">悠长假期住宿</a><i>￥600</i></h4>
                        <div class="pay_media_text">内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</div>
                    </div>
                </div>
                <div class="media">
                    <a class="media-left" href="#">
                        <img data-holder-rendered="true" src="/bootstrap/images/pay_pc.jpg" class="media-object" data-src="holder.js/64x64">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="">悠长假期住宿</a><i>￥600</i></h4>
                        <div class="pay_media_text">内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</div>
                    </div>
                </div>
            </div>
        </div>
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
                layer.alert('用户信息与支付信息不为空');
                return false;
            }
            console.log(name);console.log(tel);console.log(sfz);console.log(pay_type);
            //return;
            $.ajax({
                type: "GET",
                url: "<?=\yii\helpers\Url::to(['order/submit'])?>",
                data: {name:name,tel:tel,sfz:sfz,pay_type:pay_type},
                success: function(data){
                    if(data.code == 0){
                        layer.alert(data.msg);
                        /* 跳转到支付页面 */

                    } else {
                        layer.alert(data.msg);
                    }
                }
            });

        });
    });
</script>