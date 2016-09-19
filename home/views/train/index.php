<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>


<!--banner-->
<div id="carousel-example-generic" class="carousel slide ban" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div role="listbox" class="carousel-inner">
        <div class="item active">
            <img src="/bootstrap/images/banner.jpg" alt="First slide">
        </div>
        <div class="item">
            <img src="/bootstrap/images/banner.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img src="/bootstrap/images/banner.jpg" alt="Third slide">
        </div>
    </div>
    <!-- 轮播（Carousel）导航 -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right.png"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="sailing">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li><a href="#">培训</a></li>
      <li class="active"><?=$type['name']?></li>
    </ol>
    <div class="sailing_cen">
    <ul>
        <?php if($data): ?>
        <?php foreach ($data as $k => $v): ?>
        <?php $i = $k + 1; ?>
        <li class="sailing_cen0<?=$i?>">
            <div class="sailing_cen_l">            
                <h3><?=$v['title']?>：</h3>
                <p>帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，<br>
双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，<br><br>
还是商务洽谈等都可以满足您的需要。 <br>

帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议<br>
或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，<br>
将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 </p>
<a href="<?=Url::to(['show','id'=>$v['id']])?>">详&nbsp;&nbsp;情</a>
            </div>
            <div class="sailing_cen_r">            
                <img src="/bootstrap/images/sailing0<?=$i?>.jpg">
            </div>
        </li>
        <?php endforeach; ?>
        <?php endif;?>


    </ul>
    </div>
</div>