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

<div class="w_1200 sailing01">
    <ul role="tablist" class="nav nav-tabs" id="myTabs">
        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#home">培训详情</a></li>
        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile" aria-expanded="false">预订须知</a></li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div aria-labelledby="home-tab" id="home" class="tab-pane fade active in" role="tabpanel">
           <ul>
               <li class="items">
                   <div class="w_315"><?=$data['title']?></div>
                   <div class="w_280">
                       <div class="store_shop_text05">
                           <span>培训时间</span>
                           <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                               <div class="border">
                                   <input class="stime" type="text" readonly="readonly" size="16" value="<?=date('Y-m-d')?>">
                                   <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="w_240">
                       <div class="amount">
                           <span>人数</span>
                           <input name="num" value="1">
                           <img class="jian" src="/bootstrap/images/jian.png">
                           <img class="jia" src="/bootstrap/images/jia.png">
                       </div>
                   </div>
                   <div  class="w_260">
                       <div class="goumai">
                           <i>¥ <span class="price"><?=$data['price']?></span></i>
                           <a href="" class="goumai01">放入购物车</a>
                           <a href="" class="goumai02">立即购买</a>
                       </div>
                   </div>
               </li>
           </ul>
        </div>
        <div aria-labelledby="profile-tab" id="profile" class="tab-pane fade" role="tabpanel">
            <p>ss</p>
        </div>
    </div>
</div>
<div class="w_1200 store1_bottom">
    <p>服务热线: <i>4008888888</i>工作日: 00:00 - 22:00</p>
    <div class="goumai">
        合计：<i>¥ <span id="total">0</span></i><a href="" class="goumai01">放入购物车</a><a href="" class="goumai02">立即购买</a>
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
    });
    function total(){
        var t = 0, items = $('.items');
        items.each( function(k, item){
            var time  = parseInt(1);
            var num   = parseInt($(item).find('.amount input').val());
            var price = parseInt($(item).find('.price').text());
            t += time * num * price;
            console.log(price);
        });
        $('#total').html(t);
    }
</script>