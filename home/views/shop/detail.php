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
                        <li  class="<?=$k%2==1?'change_else_bg':''?>">
                            <div class="w_140"><p><?=$v['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>入住日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退房日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i>1</i> 晚</span>
                                    <div class="amount01">
                                        <span>房间数量</span>
                                        <input name="num" value="<?=isset($info['groups'][1][$v['id']]['num'])?$info['groups'][1][$v['id']]['num']:''?>">
                                        <img src="/bootstrap/images/jian.png">
                                        <img src="/bootstrap/images/jia.png">
                                        <p>¥ 666</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif;?>

                    </ul>
                </div>


            </div>
        </div>
    </div>
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
                        <li  class="<?=$k%2==1?'change_else_bg':''?>">
                            <div class="w_140"><p><?=$v['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i>1</i> 晚</span>
                                    <div class="amount01">
                                        <span>帆船数量</span>
                                        <div class="input-append  w_120" data-picker-position="bottom-left">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <p>¥ 666</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif;?>

                </div>

            </div>
        </div>
    </div>
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
                        <li  class="<?=$k%2==1?'change_else_bg':''?>">
                            <div class="w_140"><p><?=$v['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i>1</i> 晚</span>
                                    <div class="amount01">
                                        <span>数量</span>
                                        <div data-picker-position="bottom-left" class="input-append  w_120">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <p>¥ 666</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif;?>

                    </ul>
                </div>

            </div>
        </div>
    </div>
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
                        <li  class="<?=$k%2==1?'change_else_bg':''?>">
                            <div class="w_140"><p><?=$v['title']?></p><i><img src="/bootstrap/images/shuanren.png"> </i><i><img src="/bootstrap/images/diannao.png"> </i><i><img src="/bootstrap/images/wifi.png"> </i></div>
                            <div class="w_200"><p><?=$v['description']?></p></div>
                            <div class="w_660">
                                <div class="store_shop_text05">
                                    <span>起租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span>退租日期</span>
                                    <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                        <div class="border">
                                            <input type="text" readonly="readonly" size="16">
                                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                        </div>
                                    </div>
                                    <span class="shijian">共<i>1</i> 晚</span>
                                    <div class="amount01">
                                        <span>数量</span>
                                        <div class="input-append  w_120" data-picker-position="bottom-left">
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <p>¥ 666</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif;?>


                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="w_1200 store1_bottom">
    <p>服务热线: <i>4008888888</i>工作日: 00:00 - 22:00</p>
    <div class="goumai">
        合计：<i>¥ 666</i><a href="" class="goumai01">放入购物车</a><a href="" class="goumai02">立即购买</a>
    </div>
</div>