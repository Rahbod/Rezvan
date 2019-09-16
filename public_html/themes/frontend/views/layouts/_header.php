<?php
/** @var $this View */
/** @var string $baseUrl */

use app\components\Setting;
use app\models\Menu;
use yii\helpers\Url;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
?>

<header id="header" class="site-header header-style-1">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header-inner clearfix">
                        <div id="site-branding" class="site-branding">
                            <h1 id="site-title" class="logo img-logo">
                                <a href="<?= Url::to('/site/index') ?>" <?= app()->name ?>>
                                    <img id="site-logo" src="<?= $baseUrl . '/images/logo.png' ?>" alt="<?= app()->name ?>">
                                    <span class="site-title"><?= app()->name ?></span>
                                </a>
                            </h1>
                        </div>
                        <!-- .site-branding -->
                        <div class="social-icon">
                            <ul class="social-list">
                                <?php $val = Setting::get('socialNetworks.whatsapp');
                                echo $val && !empty($val) ? '
                                <li class="social-item whatsapp"><a href="' . $val . '" target="_blank"><i class="fa fa-whatsapp"></i></a></li>' : ''; ?>

                                <?php $val = Setting::get('socialNetworks.twitter');
                                echo $val && !empty($val) ? '
                                 <li class="social-item twitter"><a href="' . $val . '" target="_blank"><i class="fa fa-twitter"></i></a></li>' : ''; ?>

                                <?php $val = Setting::get('socialNetworks.instagram');
                                echo $val && !empty($val) ? '<li class="social-item instagram"><a href="' . $val . '" target="_blank"><i class="fa fa-instagram"></i></a></li>' : ''; ?>

                                <?php $val = Setting::get('socialNetworks.facebook');
                                echo $val && !empty($val) ? '<li class="social-item facebook"><a href="' . $val . '" target="_blank"><i class="fa fa-facebook-f"></i></a></li>' : ''; ?>

                                <?php $val = Setting::get('socialNetworks.telegram');
                                echo $val && !empty($val) ? '<li class="social-item youtube"><a href="' . $val . '" target="_blank"><i class="fa fa-youtube"></i></a></li>' : ''; ?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="row">
                        <nav id="menu-main" class="main-menu-container navbar-expand-lg">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                    data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse" id="language">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="lang-select"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= strtoupper(app()->language) ?></a>
                                            <div class="dropdown-menu" aria-labelledby="lang-select">
                                                <a class="dropdown-item" href="<?= Url::to(["/en"]) ?>">EN</a>
                                                <a class="dropdown-item" href="<?= Url::to(["/fa"]) ?>">FA</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div id="main-navigation" class="search-container close collapse">
                                <div class="search-box clearfix">
                                    <form role="search" method="get" class="search-form clearfix"
                                          action="<?= Url::to(['/site/search']) ?>">
                                        <input type="search" class="search-field"
                                               placeholder="<?= trans('words', 'Search')?> ..." value="" name="query"
                                               title="<?= trans('words', 'Search') ?> ..." autocomplete="off">
                                        <input type="submit" class="search-submit" value="Search">
                                    </form>
                                    <!-- .search-form -->
                                </div>
                            </div>
                            <ul id="main-navigation" class="main-menu collapse">
                                <?php
                                /** @var Menu $menu */

                                foreach (app()->controller->menus as $menu): ?>
                                    <li class="menu-item"><i class="sprite <?= $menu->icon_class ?>"></i><a
                                                href="<?= $menu->getUrl()?>"><?= $menu->getName() ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <!-- #main-navigation -->
                        </nav>
                        <!-- .main-menu-container -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
