<!-- image表图集 -->
<?php
/* 图集处理 */
$albums = array();
if (!empty($data)) {
    $albums = explode(',', $data);
}
?>
<style>
.fileupload-item {width: 100px; min-height: 100px;position: relative;margin-right:5px;}
.fileupload-del {display:block;bottom:5px;left:40%;cursor: pointer;}
.fileupload-text {color: #f00;}
</style>
<div class="control-group">
    <label class="control-label">商品图集</label>
    <div class="controls">
        <div class="fileupload fileupload-new" >
            <div style="margin-bottom:10px;">
                <span class="btn btn-file">
                    <span class="fileupload-new">上传图片</span>
                    <input type="file" id="uploadImages" class="default" />
                </span>
                <span class="help-inline fileupload-text"></span>
            </div>
            <div class="fileupload-list">
                <?php if($albums && is_array($albums)): ?>
                <?php foreach($albums as $g): ?>
                    <div class="fileupload-item thumbnail">
                        <img src="<?=$g?>" />
                        <span class="fileupload-del">删除</span>
                        <input type="hidden" name="<?=$field?>[]" value="<?=$g?>" />
                    </div>
                <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
