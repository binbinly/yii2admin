
<ul class="page-sidebar-menu hidden-phone hidden-tablet">
    <li>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"></div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    </li>
    <li>
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <form class="sidebar-search">
            <div class="input-box">
                <a href="javascript:;" class="remove"></a>
                <input type="text" placeholder="Search..." />
                <input type="button" class="submit" value=" " />
            </div>
        </form>
        <!-- END RESPONSIVE QUICK SEARCH FORM -->
    </li>

    <?php if(!empty($this->context->menu['child']) && is_array($this->context->menu['child'])):?>
    <?php foreach ($this->context->menu['child'] as $menu): ?>
    <li>
        <a href="javascript:;">
            <i class="<?=$menu['icon']?>"></i>
            <span class="title"><?=$menu['name']?></span>
            <span class="selected "></span>
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