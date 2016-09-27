<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use backend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="<?= Yii::$app->charset ?>" />
    <title><?= Html::encode($this->title) ?> | Yii2通用后台 by huanglongfei.cn</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="huanglongfei.cn" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/static/common/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/style-metro.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/static/common/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/static/common/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <?php $this->head() ?>
    <!-- END PAGE LEVEL STYLES -->
    <link rel="shortcut icon" href="/static/common/images/favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<?php $this->beginBody() ?>
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="navbar-inner">
        <div class="container-fluid">
            <!-- BEGIN LOGO -->
            <a class="brand" href="admin.php">
                <img src="/static/common/images/logo.png" alt="logo" />
            </a>
            <!-- END LOGO -->
            <!-- BEGIN HORIZANTAL MENU 一级栏目 -->
            <?php $this->beginContent('@app/views/layouts/public/menu.php') ?>
            <?php $this->endContent() ?>
            <!-- END HORIZANTAL MENU -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER 手机版展开栏目图表 -->
            <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                <img src="/static/common/images/menu-toggler.png" alt="" />
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <ul class="nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN 通知消息（主要显示一些待处理的事件） -->

                <?php $this->beginContent('@app/views/layouts/public/notice.php') ?>
                <?php $this->endContent() ?>

                <!-- END NOTIFICATION DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN 管理员信息 -->
                <li class="dropdown user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img alt="" src="/static/common/images/avatar1_small.jpg" />
                        <span class="username"><?=$this->context->admins['username']?></span>
                        <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="extra_profile.html"><i class="icon-user"></i> 个人主页</a></li>
                        <li><a href="page_calendar.html"><i class="icon-calendar"></i> 日历</a></li>
                        <li><a href="inbox.html"><i class="icon-envelope"></i> 收件箱(3)</a></li>
                        <li><a href="#"><i class="icon-tasks"></i> 我的任务</a></li>
                        <li class="divider"></li>
                        <li><a href="extra_lock.html"><i class="icon-lock"></i> 锁屏</a></li>
                        <li><a href="extra_lock.html"><i class="icon-pencil"></i> 修改密码</a></li>
                        <li><a href="<?=Url::toRoute('login/logout')?>"><i class="icon-key"></i> 注销</a></li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
            </ul>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid" >
    <!-- BEGIN HORIZONTAL MENU PAGE SIDEBAR1 -->
    <div class="page-sidebar nav-collapse collapse">
        <!-- 二级子栏目 -->
        <?php $this->beginContent('@app/views/layouts/public/menu-sub.php') ?>
        <?php $this->endContent() ?>

        <!--  窄屏幕（手机版）下显示的栏目-->
        <?php $this->beginContent('@app/views/layouts/public/menu-mobile.php') ?>
        <?php $this->endContent() ?>

    </div>
    <!-- END BEGIN HORIZONTAL MENU PAGE SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div id="portlet-config" class="modal hide">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button"></button>
                <h3>页面配置</h3>
            </div>
            <div class="modal-body">
                <p>这里是弹窗口，里面可以设置一些页面配置表单</p>
            </div>
        </div>

        <!-- 表单操作ajax弹出提示 -->
        <style>
            .fixed{position: fixed!important;}
            .alert{color: #c09853;font-weight: bold;border: 1px solid #fbeed5;background-color: #fcf8e3;}
            #top-alert {display: block;top: 40px;left: 245px;right: 20px;z-index: 3000;margin-top: 20px;padding-top: 12px;padding-bottom: 12px;overflow: hidden;font-size: 16px;}
            .alert-error {color: white;border-color: #eed3d7;background-color: #FF6666;}
            .alert-success {color: #468847;background-color: #CCFF99;border-color: #eed3d7;}
        </style>
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>

        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE CONTAINER-->
        <div class="container-fluid">
            <!-- BEGIN PAGE HEADER-->
            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                    <h3 class="page-title">
                        <?= Html::encode($this->title) ?>
                        <small><?= Html::encode($this->context->title_sub) ?></small>
                    </h3>
                    <ul class="breadcrumb">
                        <li>
                            <i class="icon-home"></i>
                            <a href="<?=Url::toRoute('index/index')?>">主页</a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <?php foreach($this->context->breadcrumbs as $breadcrumbs): ?>
                        <li>
                            <a href="#"><?=$breadcrumbs['title']?></a>
                            <i class="icon-angle-right"></i>
                        </li>
                        <?php endforeach ?>
                        <li><a href="#">内容</a></li>
                    </ul>
                    <!-- END PAGE TITLE & BREADCRUMB-->
                </div>
            </div>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row-fluid">
                <div class="span12">
                    <?=$content?>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        2016 &copy; Metronic by huanglongfei.cn.
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="icon-angle-up"></i>
			</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS 核心插件JS文件 -->
<script src="/static/common/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/static/common/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/static/common/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/static/common/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/static/common/js/excanvas.min.js"></script>
<script src="/static/common/js/respond.min.js"></script>
<![endif]-->
<script src="/static/common/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/static/common/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/static/common/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/static/common/js/jquery.uniform.min.js" type="text/javascript" ></script>
<script language="JavaScript">
    //导航高亮
    function highlight_subnav(url){
        var ele =  $('.page-sidebar-menu').find('a[nav="'+url+'"]');
        ele.closest('li').addClass('active');
        ele.parent().parent().parent().addClass('start active');
        ele.parent().parent().parent().find('.arrow').addClass('open');
        ele.parent().parent().parent().find('.arrow').before('<span class="selected "></span>');
    }
</script>
<script src="/static/backend/js/common.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS 页面级别插件JS文件 -->
<?php $this->endBody() ?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php $this->endPage() ?>


