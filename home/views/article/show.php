<?php
/* @var $this yii\web\View */
?>

<!--banner-->


<div class="w_1200">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li class="active"><?=$category['title']?></li>
    </ol>
    <!--客房-->
</div>
<div class="about_cen">
    <div class="about_cen_l">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#about_cen01" aria-controls="home" role="tab" data-toggle="tab">内容详情</a></li>
        </ul>
    </div>
    <div class="about_cen_r">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="about_cen01">
                <div class="about_cen_text"><?=$data['content']?></div>
        </div>
    </div>
</div>
