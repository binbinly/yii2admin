
<style type="text/css">
.nav > li > a {
    padding: 0px;
}
.tab-content{
    padding: 10px;
}
.base_info{
    float: left;
    padding: 10px;
}
.tab-content .userinfo{
}
.tab-content .userinfo table{
    width: 300px
}
.tab-content .userinfo table td{
    padding: 3px;
}
.other_info{
    float: right;
    margin-left: 100px;
    background: #fefbcc;
    padding: 10px;
}
.clearfix{
    clear: both;
}
.points_detail{
    margin-top: 20px;
    padding:10px;
}
.points_detail .title{
    font-size: 14px;
    font-weight: bold;
}
.points_detail table{
    width: 100%;
}
.points_detail thead{
    background: #c4a76f;
    height: 30px;
    line-height: 30px;
    color: #fff;
}
.points_detail td{
    padding: 6px 8px;
}
.points_detail tbody tr{
    font-size: 12px;
}
.points_detail tbody tr:nth-child(2n){
    background: #f3ede2;
    border-top: 1px solid #e1d3b9;
    border-bottom: 1px solid #e1d3b9;
}
.points_detail .red{
    color: red;
}
.points_detail .green{
    color: green;
}
.points_desc{
    margin-top: 20px;
    padding: 10px;
}
.points_desc .title{
    font-size: 14px;
    font-weight: bold;
    border-bottom: 1px solid #ccc;
}
.points_desc_item{
    font-size: 12px;
    margin-bottom: 20px;
}
.member_btn{
    display: inline-block;
    height: 20px;
    width: 90px;
    text-align: center;
    background: #c4a76f;
    margin-left: 30px;
    color: #fff;
    line-height: 20px;
}
.pagination_wrap{
    margin-top: 10px;
    font-size: 12px;
    
}
.pagination_content{
    float: right;
}
.pagination_content a{
    color: #000;
    margin-left: 5px;
}
</style>
<!--banner-->
<div id="carousel-example-generic" class="carousel slide ban" data-ride="carousel">
    <!-- Indicators -->
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
            <li role="presentation"><a href="#member_cen02" aria-controls="profile" role="tab" data-toggle="tab">个人资料</a></li>
            <li role="presentation" class="active"><a href="#member_cen03" aria-controls="messages" role="tab" data-toggle="tab">我的订单</a></li>
            <li role="presentation"><a href="#member_cen04" aria-controls="settings" role="tab" data-toggle="tab">我的积分</a></li>
            <li role="presentation"><a href="#member_cen05" aria-controls="settings" role="tab" data-toggle="tab">意见反馈</a></li>
        </ul>
    </div>
    <div class="member_cen_r">
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="member_cen02">
                <div class="member_cen_text">个人资料</div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="member_cen03">
                <div class="member_cen_text">
                    <div class="order_cen">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#order_cen01" aria-controls="home" role="tab" data-toggle="tab">我的钱包</a></li>
                            <li role="presentation"><a href="#order_cen02" aria-controls="profile" role="tab" data-toggle="tab">我的积分</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- 用户资料 -->
                            <div class="userinfo">
                                <div class="base_info">
                                    <table>
                                        <tr>
                                            <td>用户名</td>
                                            <td>lasek0018736   <a href="#" class='member_btn'>成为会员</a></td>
                                        </tr>
                                        <tr>
                                            <td>积分</td>
                                            <td>1740</td>
                                        </tr>
                                        <tr>
                                            <td>手机</td>
                                            <td>13123123</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="other_info">
                                    <table>
                                        <tr>
                                            <td>注册时间：</td>
                                            <td>lasek0018736</td>
                                        </tr>
                                        <tr>
                                            <td>我的余额</td>
                                            <td>1740</td>
                                        </tr>
                                        <tr>
                                            <td>会员等级</td>
                                            <td>13123123</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <!-- 积分明细 -->
                            <div class="points_detail">
                                <p class="title">积分明细</p>
                                <table>
                                    <thead>
                                        <td>交易时间</td>
                                        <td>订单号</td>
                                        <td>交易类型</td>
                                        <td>交易积分</td>
                                        <td>可用积分</td>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>2016/09/28 15:21:49</td>
                                            <td>C60880011088</td>
                                            <td class="red">积分抵现</td>
                                            <td class="red">-500</td>
                                            <td>1740</td>
                                        </tr>
                                        <tr>
                                            <td>2016/09/28 15:21:49</td>
                                            <td>C60880011088</td>
                                            <td class="green">获取积分</td>
                                            <td class="green">+500</td>
                                            <td>2240</td>
                                        </tr>
                                        <tr>
                                            <td>2016/09/28 15:21:49</td>
                                            <td>C60880011088</td>
                                            <td class="red">积分抵现</td>
                                            <td class="red">-500</td>
                                            <td>1740</td>
                                        </tr>
                                        <tr>
                                            <td>2016/09/28 15:21:49</td>
                                            <td>C60880011088</td>
                                            <td class="green">获取积分</td>
                                            <td class="green">+500</td>
                                            <td>2240</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="pagination_wrap">
                                    <div class="pagination_content">
                                        <a href="#">上一页</a>
                                        <a><img src="/bootstrap/images/pre.png"></a>
                                        <span>1/10</span>
                                        <a><img src="/bootstrap/images/next.png"></a>
                                        <a href="#">下一页</a>
                                    </div>
                                    
                                </div>
                            </div>

                            <!-- 积分说明 -->
                            <div class="points_desc">
                                <p class="title">积分明细</p>
                                <div class="points_desc_item">
                                    <p class="question">1.什么是途牛"会员等级"方案？</p>
                                    <p class="answer">这是途牛为会员打造定制的一套回馈、增值奖励方案，会员级别越高享受的权益越多，更多的权益策略将在不断完善中，敬请期待。</p>
                                </div>
                                <div class="points_desc_item">
                                    <p class="question">2.会员级别的升级标准是什么？</p>
                                    <p class="answer">这是途牛为会员打造定制的一套回馈、增值奖励方案，会员级别越高享受的权益越多，更多的权益策略将在不断完善中，敬请期待。</p>
                                </div>
                                
                            </div>
                        </div><!-- tab-content -->
                        
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="member_cen04">
                <div class="member_cen_text">我的积分</div>
            </div>
            <div role="tabpanel" class="tab-pane" id="member_cen05">
                <div class="member_cen_text">意见反馈</div>
            </div>
        </div>
    </div>
</div>