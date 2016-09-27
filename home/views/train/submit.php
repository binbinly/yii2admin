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
            <li><span class="">证书名</span><i><?= $certif_info['title']?></i></li>
            <li><span class="">证书</span><img src="<?= $certif_info['cover']?>" width="200"></li>
            <li><span class="">培训开始时间</span><i><?= date('Y-m-d', $certif_info['ctime'])?></i></li>
            <li><span class="">培训名</span><i><?= $train_info['title']?></i></li>
            <li><span class="">培训人数</span><i><?= $train_info['n']?></i></li>
            <li><span class="">培训单价</span><i class="hong">￥<?= $train_info['price']?></i></li>
            <li><span class="">总金额</span><i class="hong">￥<?= $train_info['n']*$train_info['price']?></i></li>
        </ul>
        <h4>个人信息</h4>
        <form class="form-horizontal" action="<?= Url::to(['/train/order'])?>">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" name="name" placeholder="真实姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">身份证</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" name="sfz" placeholder="身份证">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">联系电话</label>
                <div class="col-sm-5">
                    <input type="" class="form-control" name="tel" placeholder="手机号码">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="train_id" value="<?= $train_info['id']?>">
                    <input type="hidden" name="cid" value="<?= $certif_info['id']?>">
                    <input type="hidden" name="n" value="<?= $train_info['n']?>">
                    <button type="submit" class=""><img src="/bootstrap/images/pay_xia.jpg"></button>
                </div>
            </div>
        </form>
    </div>
    <div class="pay_cen_right">
        <p>需要在线支付</p>
        <ul>
            <li>房费<span></span><i>￥<?= $train_info['n']*$train_info['price']?></i></li>
        </ul>
        <div class="pay_cen_bottom"><p>总计<span></span><i class="hong">￥<?= $train_info['n']*$train_info['price']?></i></p></div>
    </div>
</div>
