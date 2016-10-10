<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>


<div class="store">
    <ol class="breadcrumb">
      <li><a href="/">首页</a></li>
      <li class="active">套餐</li>
    </ol>
    <div class="store_cen">
    <ul>

        <li>
            <a href="<?=Url::to(['shop/custom'])?>">
                <img src="/bootstrap/images/store.jpg" class="store_cen_img" width="1200" height="495">
                <div class="store_cen_text01">
                    <span><i>自定义套餐</i></span>
                </div>
                <div class="store_bg"><img src="/bootstrap/images/store_bg.png"></div>
            </a>
        </li>

        <?php if($lists): ?>
        <?php foreach($lists as $v): ?>
        <li>
            <a href="<?=Url::to(['shop/detail','id'=>$v['id']])?>">
                <!--<div class="store_cen_text">
                    <span><?=$v['title']?></span>
                    <p><?=$v['description']?></p>
                </div>-->
                <img src="<?=$v['cover']?>" class="store_cen_img" width="1200" height="495">
                <div class="store_cen_text01">
                    <span><i><?=$v['title']?></i></span>
                </div>
                <div class="store_bg"><img src="/bootstrap/images/store_bg.png"></div>
            </a>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
        

        <!-- <div class="pull-right "> ●  ●  ●正在加载 ●  ●  ●</div> -->
    </ul>
    </div>
</div>