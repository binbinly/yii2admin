<?php

use yii\helpers\Url;
?>
<style type="text/css">
    .store_cen img{
        max-width: 100%;
        width: 100%;
    }
    #carousel-example-generic{
        max-width: 100%;
    }
    .activity .item img {
        width: 1440px;
        height: 430px !important;
    }
</style>
<!--banner-->
<?php if($video_data): ?>
<div id="carousel-example-generic" class="carousel slide activity" data-ride="carousel">
    <!-- Indicators -->
    <div role="listbox" class="carousel-inner">
        <?php foreach ($video_data as $k => $v): ?>
            <?php if($k==0): ?>
                <div class="item active">
            <?php else: ?>
                <div class="item">
            <?php endif; ?>
                <a href="javascript:void(0)" class="show_video_btn"> <img src="<?=$v['cover']?>" video_src="<?=$v['video']?>" alt="First slide"> </a>
            </div>
        <?php endforeach; ?>
    </div>
    <ol class="carousel-indicators">
        <?php foreach ($video_data as $k => $v): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$k?>">
                <img src="<?=$v['cover']?>" video_src="<?=$v['video']?>">
            </li>
        <?php endforeach; ?>
    </ol>
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
<?php endif; ?>
<div class="store">
    <div class="store_cen">
    <ul>
        <?php if($data): ?>
        <?php foreach ($data as $k => $v): ?>
        <li>
        <a href="<?=Url::to(['show','id'=>$v['id']])?>">
            <!-- <div class="store_cen_text">            
                <span><?=$v['title']?></span>
                <p><?=$v['description']?></p>
            </div> -->
            <?php if(!empty($v['detail_cover'])): ?>
                <img src="<?=$v['detail_cover']?>" class="store_cen_img">
            <?php endif; ?>
            <div class="store_cen_text01">            
                <span><i><?=$v['title']?></i></span>
            </div>
            <div class="store_bg"><img src="/bootstrap/images/store_bg.png"></div>
            
        </a>
        </li>
        <?php endforeach; ?>
        <?php endif;?>


        <!-- <div class="pull-right "> ●  ●  ●正在加载 ●  ●  ●</div> -->
    </ul>
    </div>
</div>

                <!-- 模态框（Modal） -->
                <div class="modal fade" id="modal_for_video" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog" style="width:600px;height:400px;">
                        <div class="modal-content" id='video_source' style="padding-top:0px;">
                                
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>

<script type="text/javascript">

$('.show_video_btn').click(function(){
    var video_url = $(this).find('img').attr('video_src');
    var html = '<video controls="controls" height="400" width="600"><source src="'+video_url+'" type="video/mp4"/></video>'
    $('#video_source').html(html);
    $('#modal_for_video').modal('show');
})
$('#modal_for_video').on('hide.bs.modal',
    function() {
        $('#video_source').html('');
    }
)
</script>



