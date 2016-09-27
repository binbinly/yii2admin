<?php
/* @var $this yii\web\View */
?>

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


<div class="store_shop_li shopping">
    <div class="panel panel-default">
        <h4 class="panel-title">
            <span class="pull-left">购物车</span>
            <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
        </h4>
        <div id="collapseListGroup1" class="panel-collapse in" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="false">
            <div class="change_else">
                <ul>
                    
                    <?php if($cart): ?>
                    <?php $i = 0; ?>
                    <?php foreach ($cart as $k=>$v): ?>
                    <?php $i++; ?>
                    <li class="items <?=$i%2==0?'change_else_bg':''?>" goodid="<?=$v['goods']['id']?>" type="<?=$v['goods']['type']?>">
                       <div class="w_80">
                            <label class="checkbox-inline">
                                <input name="key[]" type="checkbox" class="ids" value="<?=$k;?>">
                            </label>
                        </div>
                        <div class="w_140"><p><?=$v['goods']['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                        <div class="w_660">
                            <div class="store_shop_text05">
                                <span>入住日期</span>
                                <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                    <div class="border">
                                        <input class="stime" type="text" readonly="readonly" size="16" value="<?=$v['stime']?>">
                                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <span>退房日期</span>
                                <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                    <div class="border">
                                        <input class="etime" type="text" readonly="readonly" size="16" value="<?=$v['etime']?>">
                                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                    </div>
                                </div>
                                <span class="shijian">共<i><?=$v['days']?></i> 晚</span>　　
                                <div class="amount">
                                    <span>房间数量</span>
                                    <input name="num" value="<?=$v['num']?>">
                                    <img class="jian" src="/bootstrap/images/jian.png">
                                    <img class="jia" src="/bootstrap/images/jia.png">　　
                                    <p>¥ <i class="price"><?=$v['goods']['price']?></i></p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <div>购物车里什么东西都没有哦！</div>
                    <?php endif;?>

                </ul>
            </div>
        </div>
    </div>
    <div class="shopping_pos">
        <a href="javascript:;" class="shopping_pos_but checkall" >全选</a>
        <a href="javascript:;" class="shopping_pos_but01 delete" >删除</a>
    </div>
</div>

<div class="w_1200 store1_bottom">
    <p>服务热线: <i>4008888888</i>工作日: 00:00 - 22:00</p>
    <div class="goumai">
        合计：<i>¥ <span id="total">0</span></i>
        <a href="javascript:;" class="shopping_jieshuan goumai02">结&nbsp;&nbsp;算</a>
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
            stime = new Date(stime.replace(/-/g, "/"));
            var etime = item.find('.etime').val();
            etime = new Date(etime.replace(/-/g, "/"));
            var days = etime.getTime() - stime.getTime();
            days = parseInt(days / (1000 * 60 * 60 * 24));
            if(days<0){
                return;
            }
            item.find('.shijian i').text(days);
            total()//更新总价格
        });
        /* 全选 */
        $('.checkall').click(function () {
            $(".ids").prop("checked", true);
            total()//更新总价格
        });
        /* 单选 */
        $('.ids').click(function () {
            total()//更新总价格
        });
        /* 删除 */
        $('.delete').click(function () {
            var option = $(".ids");console.log(option);
            option.each(function(i, item){
                var that = $(item);
                if(item.checked){
                    var keys = that.val();console.log(keys);
                    $.ajax({
                        type: "GET",
                        url: "<?=\yii\helpers\Url::to(['order/del-cart'])?>",
                        data: {keys:keys},
                        success: function(data){
                            if(data.code == 0){
                                that.parents('.items').remove();
                            }
                        }
                    });
                }
            });
            //window.location.reload();
        });
        /* 立即购买，跳转到结算页 */
        $('.goumai02').click(function () {
            clearCart();
            addCart();
            window.location.href = '/order';
        });
    });
    /* 更新总价 */
    function total(){
        var t = 0, items = $('.items');
        items.each( function(k, item){
            if($(item).find('.ids')[0].checked){
                var time  = parseInt($(item).find('.shijian i').text());
                var num   = parseInt($(item).find('.amount input').val());
                var price = parseInt($(item).find('.price').text());
                t += time * num * price;
                console.log(t);
            }
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
            if($(item).find('.ids')[0].checked){ //当被选择的时候才进入结算
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
            }
        });
    }
</script>