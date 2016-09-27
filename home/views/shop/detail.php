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

<div class="w_1200">
    <ol class="breadcrumb">
      <li><a href="#">首页</a></li>
      <li><a href="#">商城</a></li>
      <li><a href="#">套餐</a></li>
      <li class="active">套餐名称</li>
    </ol>

    <div class="store_shop_li">
        <div class="panel panel-default">
            <h4 class="panel-title">
                <span class="pull-left">套餐详情</span>
            </h4>
            <div id="collapseListGroup1" class="panel-collapse in" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >
                <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <?php if($info['images']):?>
                        <?php foreach ($info['images'] as $k => $img) :?>
                        <?php if($k < 4):?>
                        <div  class="tab-pane fade <?=$k == 0 ?'active in':''?>" id="home0<?=$k+1?>" >
                            <img src="<?=$img?>" >
                        </div>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>

                    </div>
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                        <?php if($info['images']):?>
                        <?php foreach ($info['images'] as $k => $img) :?>
                        <?php if($k < 4):?>
                        <li role="presentation" class="<?=$k == 0 ?'active':''?>"><a href="#home0<?=$k+1?>"   data-toggle="tab" aria-controls="home0<?=$k+1?>"><img src="<?=$img?>" ></a></li>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>
                    </ul>
                </div>
                <div class="store_shop_li_text">
                    <h3><?=$info['title']?><i><img src="/bootstrap/images/biaoqian.png">套餐</i><br>
                    </h3>
                    <br>
                    <div class="store_shop_text03">
                        <p>套餐说明：</p>
                        <div class="cen_top_r"></div>
                    </div>
                    <p class="store_shop_text04"> <?=$info['description']?></p>
                    <!--<div class="store_shop_text04" style="color: #e50012;font-size: 18px;">
                        原价：<i style="text-decoration:line-through;color:#e50012;">¥ <span><?=$info['total']?></span></i>　
                        套餐价：<i style="color:#e50012;">¥ <span id="total" ><?=$info['price']?></span></i>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <?php if(isset($info['groups'][1])): ?>
    <!--客房-->
    <div class="store_shop_li">
        <div class="panel panel-default">
            <h4 class="panel-title">
                <span class="pull-left">客房</span>
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
            </h4>
            <div id="collapseListGroup1" class="panel-collapse in" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >


                <div class="change_else">
                    <ul>

                        <?php if(!empty($lists[1])): ?>
                        <?php foreach($lists[1] as $k => $v): ?>
                        <?php if(isset($info['groups'][1][$v['id']])): ?>
                        <li class="items <?=$k%2==1?'change_else_bg':''?>" goodid="<?=$v['id']?>">
                            <div class="w_140"><p><?=$v['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>入住日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime6 w_120">
                                        <div class="border">
                                            <input class="stime" type="text" readonly="readonly" size="16" value="<?=date('Y-m-d',time()+60*60*24)?>">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退房日期</span>
                                    <div data-picker-position="bottom-left" class="input-append  w_120">
                                        <div class="border">
                                            <input class="etime" type="text" readonly="readonly" size="18" value="<?=date('Y-m-d',time()+60*60*24*($info['groups'][1][$v['id']]['days']+1))?>" disabled>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i type="24"><?=isset($info['groups'][1][$v['id']]['days'])?$info['groups'][1][$v['id']]['days']:0?></i> 天</span>
                                    <div class="amount amount01">
                                        <span>数量</span>
                                        <input name="num" value="<?=isset($info['groups'][1][$v['id']]['num'])?$info['groups'][1][$v['id']]['num']:0?>" disabled>
                                        <img src="/bootstrap/images/jian.png">
                                        <img src="/bootstrap/images/jia.png">
                                        <p>¥ <span class="price" style="float:none;"><?=$v['price']?></span></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>

                    </ul>
                </div>


            </div>
        </div>
    </div>
    <?php endif;?>
    
    <?php if(isset($info['groups'][2])): ?>
    <!--帆 船-->
    <div class="store_shop_li">
        <div class="panel panel-default">
            <h4 class="panel-title">
                <span class="pull-left">帆 船</span>
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
            </h4>
            <div id="collapseListGroup2" class="panel-collapse in" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >


                <div class="change_else">
                    <ul>

                        <?php if(!empty($lists[2])): ?>
                        <?php foreach($lists[2] as $k => $v): ?>
                        <?php if(isset($info['groups'][2][$v['id']])): ?>
                        <li class="items <?=$k%2==1?'change_else_bg':''?>" goodid="<?=$v['id']?>">
                            <div class="w_140"><p><?=$v['title']?></p></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input class="stime" type="text" readonly="readonly" size="16" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append w_120">
                                        <div class="border">
                                            <input class="etime" type="text" readonly="readonly" size="18" value="<?=date('Y-m-d H:00',time()+60*60*(24+$info['groups'][2][$v['id']]['days']))?>" disabled>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i type="1"><?=isset($info['groups'][2][$v['id']]['days'])?$info['groups'][2][$v['id']]['days']:0?></i> 时</span>
                                    <div class="amount amount01">
                                        <span>数量</span>
                                        <input name="num" value="<?=isset($info['groups'][2][$v['id']]['num'])?$info['groups'][2][$v['id']]['num']:0?>" disabled>
                                        <img src="/bootstrap/images/jian.png">
                                        <img src="/bootstrap/images/jia.png">
                                        <p>¥ <span class="price" style="float:none;"><?=$v['price']?></span></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>

                </div>

            </div>
        </div>
    </div>
    <?php endif;?>
    
    <?php if(isset($info['groups'][3])): ?>
    <!--海 钓-->
    <div class="store_shop_li">
        <div class="panel panel-default">
            <h4 class="panel-title">
                <span class="pull-left">海 钓</span>
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
            </h4>
            <div id="collapseListGroup3" class="panel-collapse in" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >


                <div class="change_else">
                    <ul>
                        <?php if(!empty($lists[3])): ?>
                        <?php foreach($lists[3] as $k => $v): ?>
                        <?php if(isset($info['groups'][3][$v['id']])): ?>
                        <li class="items <?=$k%2==1?'change_else_bg':''?>" goodid="<?=$v['id']?>">
                            <div class="w_140"><p><?=$v['title']?></p></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input class="stime" type="text" readonly="readonly" size="16" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append w_120">
                                        <div class="border">
                                            <input class="etime" type="text" readonly="readonly" size="18" value="<?=date('Y-m-d H:00',time()+60*60*(24+$info['groups'][3][$v['id']]['days']))?>" disabled>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i type="1"><?=isset($info['groups'][3][$v['id']]['days'])?$info['groups'][3][$v['id']]['days']:0?></i> 时</span>
                                    <div class="amount amount01">
                                        <span>数量</span>
                                        <input name="num" value="<?=isset($info['groups'][3][$v['id']]['num'])?$info['groups'][3][$v['id']]['num']:0?>" disabled>
                                        <img src="/bootstrap/images/jian.png">
                                        <img src="/bootstrap/images/jia.png">
                                        <p>¥ <span class="price" style="float:none;"><?=$v['price']?></span></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>

                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php endif;?>
    
    <?php if(isset($info['groups'][4])): ?>
    <!--潜水-->
    <div class="store_shop_li">
        <div class="panel panel-default">
            <h4 class="panel-title">
                <span class="pull-left">潜 水</span>
                <a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup4" aria-expanded="false" aria-controls="collapseListGroup1">展开/收起</a>
            </h4>
            <div id="collapseListGroup4" class="panel-collapse in" role="tabpanel"  aria-labelledby="collapseListGroupHeading1" aria-expanded="false" >

                <div class="change_else">
                    <ul>

                        <?php if(!empty($lists[4])): ?>
                        <?php foreach($lists[4] as $k => $v): ?>
                        <?php if(isset($info['groups'][4][$v['id']])): ?>
                        <li class="items <?=$k%2==1?'change_else_bg':''?>" goodid="<?=$v['id']?>">
                            <div class="w_140"><p><?=$v['title']?></p></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input class="stime" type="text" readonly="readonly" size="16" value="<?=date('Y-m-d H:00',time()+60*60*24)?>">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append w_120">
                                        <div class="border">
                                            <input class="etime" type="text" readonly="readonly" size="18" value="<?=date('Y-m-d H:00',time()+60*60*(24+$info['groups'][4][$v['id']]['days']))?>" disabled>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i type="1"><?=isset($info['groups'][4][$v['id']]['days'])?$info['groups'][4][$v['id']]['days']:0?></i> 时</span>
                                    <div class="amount amount01">
                                        <span>数量</span>
                                        <input name="num" value="<?=isset($info['groups'][4][$v['id']]['num'])?$info['groups'][4][$v['id']]['num']:0?>" disabled>
                                        <img src="/bootstrap/images/jian.png">
                                        <img src="/bootstrap/images/jia.png">
                                        <p>¥ <span class="price" style="float:none;"><?=$v['price']?></span></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endif;?>
                        <?php endforeach; ?>
                        <?php endif;?>


                    </ul>
                </div>

            </div>
        </div>
    </div>
    <?php endif;?>
</div>
<div class="w_1200 store1_bottom">
    <p>服务热线: <i>4008888888</i>工作日: 00:00 - 22:00</p>
    <div class="goumai">
        原价：<i style="text-decoration: line-through;">¥ <span><?=$info['total']?></span></i>
        套餐价：<i>¥ <span id="total"><?=$info['price']?></span></i>
        <!--<a href="javascript:;" class="goumai01">放入购物车</a>-->
        <a href="javascript:;" class="goumai02">立即购买</a>
    </div>
</div>


<script type="text/javascript">
    $(function () {
        /* 选择开始时间 */
        $('.stime').change(function(){
            var item = $(this).parents('.items');
            var days = item.find('.shijian i').text();
            var dd   = item.find('.shijian i').attr('type');
            var stime = item.find('.stime').val();
            stime = new Date(stime.replace(/-/g, "/"));
            var etime = stime.getTime() + 1000 * 60 * 60 * dd * days;
            var dataOBJ = new Date(etime);

            var eMonth = dataOBJ.getMonth()+1;
            if(dd == 24){
                etime = dataOBJ.getFullYear()+'-'+eMonth+'-'+dataOBJ.getDate();
            }else{
                etime = dataOBJ.getFullYear()+'-'+eMonth+'-'+dataOBJ.getDate()+' '+dataOBJ.getHours()+':00';
            }
            item.find('.etime').val(etime);
            console.log(etime);
            //total();//更新总价格
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
                    data: {type:"shop",aid:id,stime:stime,etime:etime,num:num,taochan:<?=$info['id']?>},
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