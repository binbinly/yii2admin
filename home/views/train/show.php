<?php
/* @var $this yii\web\View */
?>


<?= $this->render('/public/nav')?>
<form action="<?= \yii\helpers\Url::to(['/train/submit'])?>" method="post">
<div class="w_1200 sailing01">
    <ul role="tablist" class="nav nav-tabs" id="myTabs">
        <li class="active" role="presentation"><a aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" id="home-tab" href="#home">培训详情</a></li>
        <li role="presentation" class=""><a aria-controls="profile" data-toggle="tab" id="profile-tab" role="tab" href="#profile" aria-expanded="false">预订须知</a></li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div aria-labelledby="home-tab" id="home" class="tab-pane fade active in" role="tabpanel">
           <ul>
               <li class="items">
                   <div class="w_315"><?= $certif['title'].$data['title']?></div>
                   <div class="w_280">
                       <div class="store_shop_text05">
                           <span>开始时间</span>
                           <div data-picker-position="bottom-left" class="input-append date form_datetime5 w_120">
                               <div class="border">
                                   <input class="stime" type="text" name="stime" readonly="readonly" size="16" value="<?=date('Y-m-d', strtotime("+1 days"))?>">
                                   <span class="add-on"><i class="icon-th glyphicon glyphicon-calendar"></i></span>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="w_240">
                       <div class="amount">
                           <span>人数</span>
                           <input name="num" value="<?= $data['num']?>">
                           <img class="jian" src="/bootstrap/images/jian.png">
                           <img class="jia" src="/bootstrap/images/jia.png">
                       </div>
                   </div>
                   <div  class="w_260" style="width:200px;">
                       <div class="goumai">
                           <i>¥ <span class="price"><?=$data['price']?></span></i>
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
        <input type="hidden" name="cid" value="<?= $cid ?>">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="hidden" value="<?php echo Yii::$app->getRequest()->getCsrfToken(); ?>" name="_csrf" />
        合计：<i>¥ <span id="total"><?= $data['num']*$data['price']?></span></i><input type="submit" class="goumai02" value="立即购买"/>
    </div>
</div>
</form>
<script type="text/javascript">
    var days = "<?= $data['days']?>";
    var min = "<?= $data['num']?>";
    var max = "<?= $data['max']?>";
    $(function () {
        /* 加减数量 */
        $('.amount').on('click','.jia',function(){
            var ipt = $(this).siblings('input');
            var num = parseInt(ipt.val());
            if(num+1 > max) {
                layer.msg('人数已满');return ;
            }
            ipt.val(num+1);
            total();//更新总价格
        });
        $('.amount').on('click','.jian',function(){
            var ipt = $(this).siblings('input');
            var num = parseInt(ipt.val());
            if(num-1 < min) {
                layer.msg('人数不得小于最小值');return ;
            }
            if(num<1){
                return;
            }
            ipt.val(num-1);
            total()//更新总价格
        });
//        $(".stime").on('change',function(){
//            var stime = $(".stime").val();
//            var arr = stime.split('-');
//            var date = new Date(arr[0]+','+arr[1]+','+arr[2]);
//            console.log(date.toLocaleString());
//            date.setDate(parseInt(date.getDate()) + parseInt(days));
//            console.log(date.toLocaleString());
//            var year = date.getFullYear();
//            var month = parseInt(date.getMonth())+1;
//            var day = date.getDate();
//            $(".etime").val(year+'-'+month+'-'+day+ ' ' + date.getHours() +':00');
//        });

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
