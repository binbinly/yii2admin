<?php
/* @var $this yii\web\View */

if(Yii::$app->request->get('type') != 1){
    $timeClass = 'form_datetime5';
    $timeFormat = 'Y-m-d H:00';
    $dw = '时';
    $dd = 1;
}else{
    $timeClass = 'form_datetime6';
    $timeFormat = 'Y-m-d';
    $dw = '天';
    $dd = 24;
}

?>

<link href="/bootstrap/css/fsgallery.css" rel="stylesheet">
<script src="/bootstrap/js/fs_forse.js"></script>

<style type="text/css">
.img_detail{
    float: left;
    width: 310px;
    min-height: 120px;
}
.text_detail{
    float: left;
    width: 770px;
    margin-left: 20px;
    margin-top: 9px;
    font-size: 12px;
}
.text_detail .title{
    font-size: 14px;
    font-weight: bold;
}
.sailing01 .shop_kefang li{
    font-size: 12px;
}
.explain{
    padding: 18px;
}
</style>

<div class="w_1200">
    <ol class="breadcrumb">
      <li><a href="/">首页</a></li>
      <li class="active" id='product_name'>
            <?php if(Yii::$app->request->get('type') == 1): ?>
                客房
            <?php elseif(Yii::$app->request->get('type') == 2): ?>
                帆船
            <?php elseif(Yii::$app->request->get('type') == 3): ?>
                潜水
            <?php elseif(Yii::$app->request->get('type') == 4): ?>
                海钓
            <?php endif; ?>
      </li>
    </ol>
    <!--客房-->
</div>
<div class="bann01" id='gallery'>
    <div class="bann02"> 
        <?php if(count($list)>0): ?>
            <a href="<?=$list[0]['cover']?>"><img src="<?=$list[0]['cover']?>"></a>
        <?php endif; ?>
    </div>
    <div class="bann03">
        <ul>
            <?php foreach ($list as $key => $v) :?>
                <?php if($key>=1 && $key<=4): ?>
                <li><a href="<?=$v['cover']?>"><img src="<?=$v['cover']?>"></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="w_1200 sailing01">
    <ul role="tablist" class="nav nav-tabs" id="myTabs">
        <li class="active" role="presentation">
            <a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#home">
                <?php if(Yii::$app->request->get('type') == 1): ?>
                    客房预订
                <?php elseif(Yii::$app->request->get('type') == 2): ?>
                    帆船预订
                <?php elseif(Yii::$app->request->get('type') == 3): ?>
                    潜水预订
                <?php elseif(Yii::$app->request->get('type') == 4): ?>
                    海钓预订
                <?php endif; ?>
            </a>
        </li>
        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile" aria-expanded="false">预订须知</a></li>
    </ul>
    <div class="tab-content shop_kefang" id="myTabContent">
        <div aria-labelledby="home-tab" id="home" class="tab-pane fade active in" role="tabpanel">
            <ul>

                <?php foreach ($list as $key => $v) :?>
                <li class="items <?=$key%2==1?'bg_f3ede2':''?>" goodid="<?=$v['id']?>">
                    <div class="w_260_1">
                        <img src="<?=$v['cover']?>" class="shop_kefang_img">
                        <p><?=$v['title']?></p>
                        <?php if(Yii::$app->request->get('type') == 1): ?>
                        <i><img src="/bootstrap/images/shuanren.png"> </i>
                        <i><img src="/bootstrap/images/diannao.png"> </i>
                        <i><img src="/bootstrap/images/wifi.png"> </i>
                        <!--<a href=""><img src="/bootstrap/images/jiaru.png"></a>-->
                        <?php endif; ?>
                    </div>
                    <div class="w_215" style="font-size: 14px;"><?=$v['description']?></div>
                    <div class="w_295">
                        <div class="store_shop_text05">
                            <div class="w_295_bott">
                                <span>入住日期</span>
                                <div class="input-append date <?=$timeClass?> w_120" data-picker-position="bottom-left">
                                    <div class="border">
                                        <input class="stime" size="16" readonly="readonly" type="text" value="<?=date($timeFormat,time()+60*60*24)?>">
                                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div >
                                <span>退房日期</span>
                                <div class="input-append date <?=$timeClass?> w_120" data-picker-position="bottom-left">
                                    <div class="border">
                                        <input class="etime" size="16" readonly="readonly" type="text" value="<?=date($timeFormat,time()+60*60*(24+$dd))?>">
                                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <span class="shijian">共<i type="<?=$dd?>">1</i> <?=$dw?></span>
                        </div>
                    </div>
                    <div class="w_235">
                        <div class="amount">
                            <span>房间数量</span>
                            <input name="num" value="0">
                            <img class="jian" src="/bootstrap/images/jian.png">
                            <img class="jia" src="/bootstrap/images/jia.png">
                        </div>
                    </div>
                    <div class="w_125">
                        <p class="w_125_p ">¥ <span class="price"><?=$v['price']?></span></p>
                    </div>
                    <div class="shop_kefang_xian"></div>
                    <a class="preview preview01" role="button" data-toggle="collapse" href="#collapseListGroup<?=$key?>" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
                    <div id="collapseListGroup<?=$key?>" class="panel-collapse collapse" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >
                        <div class="img_detail" id='gallery<?=$key+2?>'>
                            <?php foreach ($v['images'] as $img) :?>
                            <span><a class="tanchuimg" href="<?=$img?>"><img src="<?=$img?>"></a></span>
                            <?php endforeach; ?>
                        </div>
                        <div class="text_detail">
                            <!-- <p class="title">1、产品详情</p>
                            <p>不同的帆船带来的是截然不同的感受，DC22尺帆船象征着刺激与速度，在风与浪间灵活穿梭，他带来的兴奋感觉绝不亚于过山车。船长随着风向不断调整帆的角度，风大的时候船身倾斜，半个身子落入水中，非常刺激，但经验老道的船长保证了帆船绝对的安全。</p>
                            <p class="title">2、使用时间</p>
                            <p>8：00--18：00</p>
                            <p class="title">3、使用人数</p>
                            <p>一艘船限载6人（不包含船长）</p> -->
                            <?=$v['info']?>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>


            </ul>
        </div>
        <div aria-labelledby="profile-tab" id="profile" class="tab-pane fade" role="tabpanel">
            <div class="explain">我是说明</div>
        </div>
    </div>
</div>
<div class="w_1200 store1_bottom">
    <p>服务热线: <i>4008888888</i>工作日: 00:00 - 22:00</p>
    <div class="goumai">
        合计：
        <i>¥ <span id="total">0</span></i>
        <a href="javascript:;" class="goumai01">放入购物车</a>
        <a href="javascript:;" class="goumai02">立即购买</a>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        /* 加减数量 */
        $('.amount').on('click','.jia',function(){
            var ipt = $(this).siblings('input');
            var num = parseInt(ipt.val());
            ipt.val(num+1);
            total();//更新总价格
        });
        $('.amount').on('click','.jian',function(){
            var ipt = $(this).siblings('input');
            var num = parseInt(ipt.val());
            if(num<1){
                return;
            }
            ipt.val(num-1);
            total()//更新总价格
        });
        /* 时间差 */
        $('.stime,.etime').change(function () {
            var item = $(this).parents('.items');
            var stime = item.find('.stime').val();
            stime = new Date(stime);
            var etime = item.find('.etime').val();
            etime = new Date(etime);
            var days = etime.getTime() - stime.getTime();
            days = parseInt(days / (1000 * 60 * 60)); //小时
            if(days<0){
                return;
            }
            var dd = parseInt(item.find('.shijian i').attr('type')); // 判断单位是天(24)还是时(1)
            item.find('.shijian i').text(Math.ceil(days/dd));
            total()//更新总价格
        });
        /* 加入购物车 */
        $('.goumai01').click(function () {
            addCart();
            layer.alert('已加入购物车');
        });
        /* 立即购买，跳转到结算页 */
        $('.goumai02').click(function () {
            clearCart();
            addCart();
            window.location.href = '/order';
        });
        
        /* 点击图片自动放大 */
        
        
    });
    /* 更新总价 */
    function total(){
        var t = 0, items = $('.items');
        items.each( function(k, item){
            var time  = parseInt($(item).find('.shijian i').text());
            var num   = parseInt($(item).find('.amount input').val());
            var price = parseInt($(item).find('.price').text());
            t += time * num * price;
            console.log(t);
        });
        $('#total').html(t);
    }
    /* 清空购物车 */
    function clearCart() {
        $.ajax({
            async: false, //同步
            type: "GET",
            url: "<?=\yii\helpers\Url::to(['order/clear'])?>",
            success: function(data){
                
            }
        });
    }
    /* 添加或修改购物车 */
    function addCart() {
        var items = $('.items');
        items.each( function(k, item){
            var id  = parseInt($(item).attr('goodid'));
            var stime  = $(item).find('.stime').val();
            var etime  = $(item).find('.etime').val();
            var price = parseInt($(item).find('.price').text());
            var num   = parseInt($(item).find('.amount input').val());
            var time  = parseInt($(item).find('.shijian i').text());
            if(num > 0 && time > 0){
                $.ajax({
                    async: false, //同步
                    type: "GET",
                    url: "<?=\yii\helpers\Url::to(['order/cart'])?>",
                    data: {type:"shop",aid:id,stime:stime,etime:etime,num:num},
                    success: function(data){
                        if(data.code != 0){
                            layer.alert(data.msg);
                            return;
                        }
                    }
                });
            }
        });
    }
</script>