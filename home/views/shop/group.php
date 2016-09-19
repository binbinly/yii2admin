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

<div class="store">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li><a href="#">商城</a></li>
      <li class="active">套餐</li>
    </ol>
    <div class="store_cen">
    <ul>
        
        <?php if($lists): ?>
        <?php foreach($lists as $v): ?>
        <li>
            <a href="<?=Url::to(['shop/detail','id'=>$v['id']])?>">
                <div class="store_cen_text">
                    <span><?=$v['title']?></span>
                    <p><?=$v['description']?></p>
                </div>
                <img src="/bootstrap/images/store.jpg" class="store_cen_img">
                <div class="store_cen_text01">
                    <span><i><?=$v['title']?></i><?=$v['description']?></span>
                </div>
                <div class="store_bg"><img src="/bootstrap/images/store_bg.png"></div>
            </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
        

        <div class="pull-right "> ●  ●  ●正在加载 ●  ●  ●</div>
    </ul>
    </div>
</div>