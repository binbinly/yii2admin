
<ul class="page-sidebar-menu visible-phone visible-tablet">
    
    <?php if(!empty($this->context->menu['main']) && is_array($this->context->menu['main'])):?>
    <?php foreach ($this->context->menu['main'] as $menu): ?>
    <li <?php if (isset($menu['class'])) {echo 'class="active"';} ?>>
        <a href="<?=\yii\helpers\Url::toRoute($menu['url'])?>">
            <?=$menu['title']?>
            <?php if (isset($menu['class'])) {echo '<span class="selected"></span>';} ?>
            <span class="arrow <?php if (isset($menu['class'])) {echo 'open';} ?>"></span>
        </a>
        <?php if (!isset($menu['class'])) { continue;} ?>
        <ul class="sub-menu">
            <?php if(!empty($this->context->menu['child']) && is_array($this->context->menu['child'])):?>
            <?php foreach ($this->context->menu['child'] as $menu): ?>
            <li>
                <a href="javascript:;">
                    <i class="<?=$menu['icon']?>"></i>
                    <span class="title"><?=$menu['name']?></span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <?php if(!empty($menu['_child']) && is_array($menu['_child'])):?>
                    <?php foreach ($menu['_child'] as $v): ?>
                    <li>
                        <a href="<?=\yii\helpers\Url::toRoute($v['url'])?>" nav="<?=$v['url']?>"><?=$v['title']?></a>
                    </li>
                    <?php endforeach ?>
                    <?php endif ?>
                </ul>
            </li>
            <?php endforeach ?>
            <?php endif ?>
        </ul>
        
    </li>
    <?php endforeach ?>
    <?php endif ?>
    
</ul>