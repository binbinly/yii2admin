<?php

$this->title = '测试标题';
$this->context->title_sub = '测试标题的子标题或提示信息';

/* 渲染其他文件 */
echo $this->renderFile('@app/views/public/login.php');

/* 加载页面级别CSS */
//$this->registerCssFile('@web/css/font-awesome.min.css');

/* 加载页面级别JS */
$this->registerJsFile('@web/static/common/js/app.js');

?>

<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    App.init();
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
