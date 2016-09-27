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
        <h4>订单支付</h4>
        <ul class="pay_cen_li">
            <li><span class="">订单号</span><i><?= $data['order_sn']?></i></li>
            <li><span class="">培训项目</span><i><?= $data['title']?></i></li>
            <li><span class="">培训开始时间</span><i><?= date('Y-m-d', $data['start_time'])?></i></li>
            <li><span class="">培训人数</span><i><?= $data['num']?></i></li>
            <li><span class="">总金额</span><i class="hong">￥<?= $data['total']?></i></li>
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
                    <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
                    <button type="submit" class=""><img src="/bootstrap/images/pay_xia.jpg"></button>
                </div>
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
