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
<style type="text/css">
    #feature-area img{width:100%;height:200px;}
</style>
<div class="sailing">
    <ol class="breadcrumb">
        <li><a href="#">首页</a></li>
        <li class="active">培训</li>
        <li class="active">证书</li>
    </ol>
    <br>
    <section id="feature-area" class="about-section">
        <div class="container">
            <div class="row text-center inner">
                <?php foreach($list as $val): ?>
                <div class="col-sm-4">
                    <div class="feature-content">
                        <img src="<?= $val['cover']?>" alt="Image">
                        <h2 class="feature-content-title green-text"><?= $val['title']?></h2>
                        <p class="feature-content-description"><?= $val['description']?></p>
                        <a href="<?= Url::to(['/train/index','type' => $type, 'cid'=>$val['id'] ])?>" class="feature-content-link green-btn">选择证书</a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>