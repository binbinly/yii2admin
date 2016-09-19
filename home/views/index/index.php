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

<!--房间选择与滑动-->

<div class="switch_slide">
    <!--房间选择-->
    <div class="sy_switch">
        <ul id="myTab" class="nav nav-tabs">
            <li class="active"><a href="#guestroom" data-toggle="tab">客房</a></li>
            <li><a href="#sailing" data-toggle="tab">帆船</a></li>
            <li><a href="#dive" data-toggle="tab">潜水</a></li>
            <li><a href="#sea" data-toggle="tab">海钓</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="guestroom">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>入住日期</p>
                        <div class="border">
                        <input size="16" readonly="readonly" type="text">
                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>退房日期</p>
                        <div class="border">
                            <input size="16" readonly="readonly" type="text">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                    <p>房间类型</p>
                        <select class="form-control">
                            <option>空调房</option>
                            <option>单人房</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>房间数量</p>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </section>
                <p  class="jia">+房间类型</p>
                <a href="" class="tijiao ">提&nbsp;交</a>
            </div>
            <div class="tab-pane fade" id="sailing">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>入住日期</p>
                        <div class="border">
                        <input size="16" readonly="readonly" type="text">
                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>退房日期</p>
                        <div class="border">
                            <input size="16" readonly="readonly" type="text">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                    <p>房间类型</p>
                        <select class="form-control">
                            <option>空调房</option>
                            <option>单人房</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>房间数量</p>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="dive">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>入住日期</p>
                        <div class="border">
                        <input size="16" readonly="readonly" type="text">
                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>退房日期</p>
                        <div class="border">
                            <input size="16" readonly="readonly" type="text">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                    <p>房间类型</p>
                        <select class="form-control">
                            <option>空调房</option>
                            <option>单人房</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>房间数量</p>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </section>
            </div>
            <div class="tab-pane fade" id="sea">
                <section id="demo_position">
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>入住日期</p>
                        <div class="border">
                        <input size="16" readonly="readonly" type="text">
                        <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append date form_datetime5 w_120" data-picker-position="bottom-left">
                        <p>退房日期</p>
                        <div class="border">
                            <input size="16" readonly="readonly" type="text">
                            <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="input-append  w_120 fz" data-picker-position="bottom-left">
                    <p>房间类型</p>
                        <select class="form-control">
                            <option>空调房</option>
                            <option>单人房</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="input-append  w_120" data-picker-position="bottom-left">
                        <p>房间数量</p>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--滑动-->

    <div id="carousel-example-captions" class="carousel slide bann_switch" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
            <li data-target="#carousel-example-captions" data-slide-to="1" class="active"></li>
            <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
        </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item">
            <a href="">
                <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="bann_switch_img">
                <div class="carousel-caption">
                <h3>悠长假期住宿优惠</h3>
                <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
            </a>
          </div>
        </div>
        <div class="item active">
            <a href="">
                <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="bann_switch_img">
                <div class="carousel-caption">
                <h3>悠长假期住宿优惠</h3>
                <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
            </a>
            </div>
        </div>
        <div class="item">
            <a href="">
                <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="bann_switch_img">
                <div class="carousel-caption">
                <h3>悠长假期住宿优惠</h3>
                <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
            </a>
            </div>
        </div>
      </div>
    </div>
    <!--滑动结束-->
</div>
<div class="xian"></div>
<!--最新推荐-->
<div class="tj">
    <h2>最&nbsp;新&nbsp;推&nbsp;荐</h2>
    <p>帆海汇各版块主推项目入口、帆海汇各版块主推项目入口、帆海汇各版块主推项目入口
帆海汇各版块主推项目入口帆海汇各版块主推项目</p>
</div>
<!--最新推荐滚动图-->
<div class="recommended_top">
    <span class="recommended_top_span">所有</span>
    <div class="input-append">
        <select class="form-control">
            <option>选择</option>
            <option>客房</option>
            <option>潜水</option>
        </select>
    </div>
    <div class="recommended_top_right"><span class="glyphicon glyphicon-menu-left"></span>12 <i>/</i> 24<span class="glyphicon glyphicon-menu-right"></span></div>
</div>
<div id="carousel-example-generic01" class="carousel slide recommended" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true" >
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
             <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true" >
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="item">
                        <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
            <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true">
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
             <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true" >
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
             <div class="w_385">
                <a href="">
                    <img src="/bootstrap/images/zx01.jpg" data-holder-rendered="true" >
                    <div class="carousel-caption">
                    <h3>悠长假期住宿优惠</h3>
                    <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic01" role="button" data-slide="prev">
        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left01.png"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic01" role="button" data-slide="next">
        <span class="glyphicon-chevron-right" aria-hidden="true"><img src="/bootstrap/images/right01.png"></span>
    </a>
</div>
<div class="xian"></div>
<!--爱正能量-->
<div class="tj">
    <h2>爱&nbsp;·&nbsp;运&nbsp;动&nbsp;·&nbsp;正&nbsp;能&nbsp;量</h2>
    <p>特色介绍：用最简短的一段话阐述帆海汇各版块的特色项目<br>
以下为各项目的入口，包括俱乐部、培训、活动</p>
</div>
<!--爱正能量-->
<div class="w_1440">
    <div class="exercise_bg">
        <div class="exercise_bg01">
            <h3>帆海汇俱乐部：</h3>
            <p>帆海汇码头里停泊着单体竞赛帆船TEN，龙骨帆船DC22，丁级帆船DC15，
双体帆船JE28，三体帆船JE27。无论您是出海游玩钓鱼，海上派对，
还是商务洽谈等都可以满足您的需要。 </p>

<p>帆海汇培训中心室内拥有设施齐全的超大会议室，可以满足不同公司组织的业内会议
或不同领域的年度盛会。帆海汇培训中心为美国ASA权威帆船培训体系授权分校，
将为帆船运动爱好者提供专业的帆船培训，并颁发美国ASA帆船驾驶证书。 </p>
            <a href="">详&nbsp;情</a>
        </div>
        <div class="exercise_bg02"></div>
        <div class="exercise_cen">
            <div id="carousel-example-captions02" class="carousel slide exercise_cen" data-ride="carousel">
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <a href="">
                            <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="exercise_cen_img">
<!--                             <div class="carousel-caption">
                            <h3>悠长假期住宿优惠</h3>
                            <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p></div>-->
                        </a>
                    </div>
                    <div class="item">
                        <a href="">
                            <img src="/bootstrap/images/lunbo.jpg" data-holder-rendered="true" class="exercise_cen_img">
<!--                             <div class="carousel-caption">
                            <h3>悠长假期住宿优惠</h3>
                            <p>内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明内容说明</p></div> -->
                        </a>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-captions02" role="button" data-slide="prev">
                        <span class="glyphicon-chevron-left" aria-hidden="true"><img src="/bootstrap/images/left.png"></span>
                        <span class="sr-only">Previous</span></a>
                  </div>
            </div>
        </div>
    </div>
</div>