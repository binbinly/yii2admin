<?php
/* @var $this yii\web\View */
?>

<!--banner-->
<!-- <div id="carousel-example-generic" class="carousel slide ban" data-ride="carousel">
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
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right.png"></span>
        <span class="sr-only">Next</span>
    </a>
</div> -->

<div class="w_1200">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li class="active">关于我们</li>
    </ol>
    <!--客房-->
</div>
<div class="about_cen">
    <div class="about_cen_l">
        <ul class="nav nav-tabs" role="tablist">
            <?php if($data): ?>
            <?php foreach ($data as $k => $v): ?>
            <?php $i = $k + 1; ?>
            <li role="presentation" <?php if($i==1):?>class="active"<?php endif; ?>>
                <a href="#about_cen<?=$i?>" aria-controls="home" role="tab" data-toggle="tab"><?=$v['title']?></a>
            </li>
            <?php endforeach; ?>
            <?php endif;?>
        </ul>
    </div>
    <div class="about_cen_r">
        <div class="tab-content">
            <?php if($data): ?>
            <?php foreach ($data as $k => $v): ?>
            <?php $i = $k + 1; ?>
            <div role="tabpanel" class="tab-pane <?php if($i==1):?>active<?php endif; ?>" id="about_cen<?=$i?>">
                <div class="about_cen_text"><?=$v['content']?></div>
            </div>
            <?php endforeach; ?>
            <?php endif;?>
        </div>
    </div>
</div>
