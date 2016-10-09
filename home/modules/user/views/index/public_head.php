<style type="text/css">
#carousel-example-generic{
    display: none !important;
}
</style>

    <!--banner-->
<?= $this->render("../../../../views/public/nav")?>

<div class="w_1200">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li class="active">关于我们</li>
    </ol>
    <!--客房-->
</div>
<div class="member_cen">
    <div class="member_cen_l">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation">
                <div class="member_img"><img src="/bootstrap/images/touxiang.jpg">
                    <p>会员名称</p>
                    <div class="member_jdt">
                        <div class="progress">
                            <div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
                                60%
                            </div>
                        </div>
                    </div>
                    <p class="member_img_p">普通会员</p>
                </div>
            </li>
            <li role="presentation"><a href="/user/index/info">个人资料</a></li>
            <li role="presentation"><a href="/user">我的订单</a></li>
            <li role="presentation"><a href="/user/index/points">我的积分</a></li>
            <li role="presentation"><a href="/user/index/suggestion">意见反馈</a></li>
        </ul>
    </div>
        <div class="member_cen_r">
        <div class="tab-content">
