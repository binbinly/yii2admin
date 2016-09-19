<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
    <div class="dashboard-stat blue">
        <div class="visual">
            <i class="icon-comments"></i>
        </div>
        <div class="details">
            <div class="number">
                1349
            </div>
            <div class="desc">
                新的评论
            </div>
        </div>
        <a class="more" href="#">
            查看更多 <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>

<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
    <div class="dashboard-stat green">
        <div class="visual">
            <i class="icon-shopping-cart"></i>
        </div>
        <div class="details">
            <div class="number">549</div>
            <div class="desc">新的产品</div>
        </div>
        <a class="more" href="#">
            查看更多 <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>

<div class="span3 responsive" data-tablet="span6  fix-offset" data-desktop="span3">
    <div class="dashboard-stat purple">
        <div class="visual">
            <i class="icon-globe"></i>
        </div>
        <div class="details">
            <div class="number">+89%</div>
            <div class="desc">品牌关注度</div>
        </div>
        <a class="more" href="#">
            查看更多 <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>

<div class="span3 responsive" data-tablet="span6" data-desktop="span3">
    <div class="dashboard-stat yellow">
        <div class="visual">
            <i class="icon-bar-chart"></i>
        </div>
        <div class="details">
            <div class="number">12,5M$</div>
            <div class="desc">总的利润</div>
        </div>
        <a class="more" href="#">
            查看更多 <i class="m-icon-swapright m-icon-white"></i>
        </a>
    </div>
</div>

<div class="row-fluid margin-bottom-30">
    <div class="span6">
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
        <ul class="unstyled margin-top-10 margin-bottom-10">
            <li><i class="icon-ok"></i> Nam liber tempor cum soluta</li>
            <li><i class="icon-ok"></i> Mirum est notare quam</li>
            <li><i class="icon-ok"></i> Lorem ipsum dolor sit amet</li>
            <li><i class="icon-ok"></i> Mirum est notare quam</li>
        </ul>
        <!-- Blockquotes -->
        <blockquote class="hero">
            <p>Lorem ipsum dolor sit amet, consectetuer sed diam nonummy nibh euismod tincidunt. </p>
            <small>Bob Nilson</small>
        </blockquote>
    </div>
</div>


<?php
/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = '测试标题';
$this->context->title_sub = '测试标题的子标题或提示信息';

/* 渲染其他文件 */
//echo $this->renderFile('@app/views/public/login.php');

/* 加载页面级别JS */
$this->registerJsFile('@web/static/common/js/app.js');

?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    App.init();
    highlight_subnav('index/index'); //子导航高亮
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
