
<style type="text/css">
.member_cen .nav > li > a {
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
    float: right;
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
<?php include('public_head.php'); ?>
<?
use yii\widgets\LinkPager;
?>
<div role="tabpanel" class="tab-pane active" id="member_cen03">
    <div class="member_cen_text">
        <div class="order_cen">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="/user/index/wallet">我的钱包</a></li>
                    <li role="presentation"><a href="/user/index/points">我的积分</a></li>
                </ul>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- 用户资料 -->
                <div class="userinfo">
                    <div class="base_info">
                        <table>
                            <tr>
                                <td>用户名</td>
                                <td><?= $user->username?>   <a href="#" class='member_btn'>成为会员</a></td>
                            </tr>
                            <tr>
                                <td>余额 </td>
                                <td><?= $user->amount?>元   <a href="<?= \yii\helpers\Url::to(['/user/index/recharge'])?>" class='member_btn'>充值</a></td>
                            </tr>
                            <tr>
                                <td>手机</td>
                                <td><?= $user->mobile?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="other_info">
                        <table>
                            <tr>
                                <td>注册时间：</td>
                                <td><?= date("Y-m-d", $user->reg_time)?></td>
                            </tr>
                            <tr>
                                <td>我的积分</td>
                                <td><?= $user->score_all?></td>
                            </tr>
                            <tr>
                                <td>会员等级</td>
                                <td>普通会员</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!-- 积分明细 -->
                <div class="points_detail">
                    <p class="title">收支明细</p>
                    <table>
                        <thead>
                            <td>交易时间</td>
                            <td>订单号</td>
                            <td>交易类型</td>
                            <td>交易金额</td>
                        </thead>
                        <tbody>
                            <? foreach($trade as $val): ?>
                            <tr>
                                <td><?= date("Y-m-d H:i:s", $val->add_time)?></td>
                                <td><?= $val->order_sn?></td>
                                <? if($val->trade_type == 1): ?>
                                <td>支付</td>
                                <? elseif($val->trade_type == 2): ?>
                                <td class="red">退款</td>
                                <? else: ?>
                                <td class="green">充值</td>
                                <? endif; ?>
                                <td>￥<?= $val->amount?></td>
                            </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                    <div class="pagination_wrap">
                        <div class="pagination_content">
                            <?
                            echo LinkPager::widget([
                                'pagination' => $page,
                            ]);
                            ?>
                        </div>
                        
                    </div>
                </div>

                <!-- 积分说明 -->
                <div class="points_desc">
                    <p class="title">会员说明</p>
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
<?php include('public_footer.php'); ?>