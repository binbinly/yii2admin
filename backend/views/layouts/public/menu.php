            <div class="navbar hor-menu hidden-phone hidden-tablet">
                <div class="navbar-inner">
                    <ul class="nav">
                        <li class="visible-phone visible-tablet">
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
                        <?php if(!empty($this->context->menu['main']) && is_array($this->context->menu['main'])):?>
                        <?php foreach ($this->context->menu['main'] as $menu): ?>
                        <li <?php if (isset($menu['class'])) {echo 'class="active"';} ?>>
                            <a href="<?=\yii\helpers\Url::toRoute($menu['url'])?>">
                                <?=$menu['title']?>
                                <?php if (isset($menu['class'])) {echo '<span class="selected"></span>';} ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                        <?php endif ?>

                        <li>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="">
                                其他
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html">About Us</a></li>
                                <li><a href="index.html">Services</a></li>
                                <li><a href="index.html">Pricing</a></li>
                                <li><a href="index.html">FAQs</a></li>
                                <li><a href="index.html">Gallery</a></li>
                                <li><a href="index.html">Registration</a></li>
                            </ul>
                            <b class="caret-out"></b>
                        </li>
                    </ul>
                </div>
            </div>
