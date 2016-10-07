<?php

use yii\helpers\Url;
?>
<style type="text/css">
    .store_cen img{
        max-width: 100%;
    }
</style>
<!--banner-->
<div id="carousel-example-generic" class="carousel slide activity" data-ride="carousel">
    <!-- Indicators -->
    <div role="listbox" class="carousel-inner">
        <div class="item active">
            <img src="/bootstrap/images/activity.jpg" alt="First slide">
        </div>
        <div class="item">
            <img src="/bootstrap/images/activity01.jpg" alt="Second slide">
        </div>
        <div class="item">
            <img src="/bootstrap/images/activity.jpg" alt="Third slide">
        </div>
        <div class="item">
            <img src="/bootstrap/images/activity01.jpg" alt="Third slide">
        </div>
    </div>
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
            <img src="/bootstrap/images/activity.jpg">
        </li>
        <li data-target="#carousel-example-generic" data-slide-to="1">
            <img src="/bootstrap/images/activity01.jpg">
        </li>
        <li data-target="#carousel-example-generic" data-slide-to="2">
            <img src="/bootstrap/images/activity.jpg">
        </li>
        <li data-target="#carousel-example-generic" data-slide-to="3">
            <img src="/bootstrap/images/activity01.jpg">
        </li>
    </ol>
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
    <div class="store_cen">
    <ul>
        <?php if($data): ?>
        <?php foreach ($data as $k => $v): ?>
        <li>
        <a href="<?=Url::to(['show','id'=>$v['id']])?>">
            <!-- <div class="store_cen_text">            
                <span><?=$v['title']?></span>
                <p><?=$v['description']?></p>
            </div> -->
            <img src="/bootstrap/images/store.jpg" class="store_cen_img">
            <div class="store_cen_text01">            
                <span><i><?=$v['title']?></i></span>
            </div>
            <div class="store_bg"><img src="/bootstrap/images/store_bg.png"></div>
        </a>
        </li>
        <?php endforeach; ?>
        <?php endif;?>


        <!-- <div class="pull-right "> ●  ●  ●正在加载 ●  ●  ●</div> -->
    </ul>
    </div>
</div>
