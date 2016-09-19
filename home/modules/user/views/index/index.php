
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
<!--            <div role="tabpanel" class="tab-pane " id="member_cen01">
                <div class="member_cen_text">帆海汇介绍</div>
            </div>-->
            <div role="tabpanel" class="tab-pane" id="member_cen02">
                <div class="member_cen_text">个人资料</div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="member_cen03">
                <div class="member_cen_text">
                    <p class="order_top"><img src="/bootstrap/images/jingao.png" class="member_jingao_img">您可以在线查看近一年的订单。如需查找更早之前的订单，请致电：0755-88888888 </p>
                    <div class="order_cen">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#order_cen01" aria-controls="home" role="tab" data-toggle="tab">全部订单</a></li>
                            <li role="presentation"><a href="#order_cen02" aria-controls="profile" role="tab" data-toggle="tab">已付款</a></li>
                            <li role="presentation"><a href="#order_cen03" aria-controls="messages" role="tab" data-toggle="tab">待付款</a></li>
                            <li role="presentation"><a href="#order_cen04" aria-controls="settings" role="tab" data-toggle="tab">历史订单</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="order_cen01">
                                <div class="order_forn">
                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="exampleInputName2">订单号</label>
                                            <input type="text" class="form-control" id="exampleInputName2" placeholder="输入订单号">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail2">用户</label>
                                            <input type="email" class="form-control" id="exampleInputEmail2" placeholder="中文名/英文名">
                                        </div>
                                        <div class="store_shop_text05">
                                            <span>预订日期</span>
                                            <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                                <div class="border">
                                                    <input type="text" readonly="readonly" size="16">
                                                    <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                            </div>&nbsp;&nbsp;~&nbsp;&nbsp;
                                            <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                                                <div class="border">
                                                    <input type="text" readonly="readonly" size="16">
                                                    <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-default">查&nbsp;询</button>
                                    </form>
                                </div>
                                <div class="order_type">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox1"> 全选
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <div data-picker-position="bottom-left" class="input-append ">
                                                <select class="form-control">
                                                    <option>类型</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">用户</div>
                                        <div class="col-md-2">有效日期</div>
                                        <div class="col-md-2">总金额</div>
                                        <div class="col-md-3">
                                            <div data-picker-position="bottom-left" class="input-append ">
                                                <select class="form-control">
                                                    <option>订单状态</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>
                                <div class="order_li">
                                    <div class="order_li_top">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option1" id="inlineCheckbox2">订单号：<i>88888888</i>
                                        </label>   预订日期：2016-06-06     <a>删除订单</a>
                                    </div>
                                    <div class="order_li_cen">
                                        <div class="col-md-1">海景大床房</div>
                                        <div class="col-md-2">客房</div>
                                        <div class="col-md-2">住客名字</div>
                                        <div class="col-md-2">2016-06-06</div>
                                        <div class="col-md-2">￥666</div>
                                        <div class="col-md-3"><p>已成交</p><span></span></div>
                                    </div>
                                </div>


                            </div>
                            <div role="tabpanel" class="tab-pane" id="order_cen02">2...</div>
                            <div role="tabpanel" class="tab-pane" id="order_cen03">3...</div>
                            <div role="tabpanel" class="tab-pane" id="order_cen04">4...</div>
                        </div>

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
        <nav>
            <ul class="pagination posin">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
            </ul>
        </nav>
    </div>
</div>