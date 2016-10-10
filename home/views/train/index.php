<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
?>
<style type="text/css">
#carousel-example-generic{
    display: none !important;
}
</style>

<!--banner-->
<?= $this->render('/public/nav')?>

<div class="sailing">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li class="active">培训</li>
      <li class="active"><?=$type['name']?></li>
    </ol>
    <div class="sailing_cen">
    <ul>
        <?php if($data): ?>
        <?php foreach ($data as $k => $v): ?>
        <?php $i = $k + 1; ?>
        <li class="sailing_cen0<?=$i?>">
            <div class="sailing_cen_l">            
                <h3><?= $v['title']?>：</h3>
                <p><?=$v['description']?></p>
                <a href="<?=Url::to(['show','id'=>$v['id'], 'cid'=>$cid])?>">详&nbsp;&nbsp;情</a>
            </div>
            <div class="sailing_cen_r">            
<!--                <img src="/bootstrap/images/sailing0--><?//=$i?><!--.jpg">-->
                <img src="<?= $v['cover']?>">
            </div>
        </li>
        <?php endforeach; ?>
        <?php endif;?>


    </ul>
    </div>
</div>