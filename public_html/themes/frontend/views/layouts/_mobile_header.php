<?php
$baseUrl = $this->theme->baseUrl;

use app\components\MultiLangActiveRecord;
use app\models\Menu;
use yii\helpers\Url; ?>

<header id="header" class="site-header header-style-2">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2 logo-col">
                    <div class="header-inner clearfix">
                        <div id="site-branding" class="site-branding">
                            <h1 id="site-title" class="logo img-logo">
                                <a href="<?= Url::to(['/site/index']) ?>">
<!--                                    --><?php //if (app()->language == 'ar'): ?>
<!--                                        <img id="site-logo" src="--><?//= $baseUrl . '/images/logo-ar.png' ?><!--"-->
<!--                                             alt="--><?//= app()->name ?><!--">-->
<!--                                        <img id="site-logo-2" src="--><?//= $baseUrl . '/images/logo-02-rtl.png' ?><!--"-->
<!--                                             alt="--><?//= app()->name ?><!--">-->
<!--                                    --><?php //else: ?>
<!--                                        <img id="site-logo" src="--><?//= $baseUrl . '/images/logo.png' ?><!--"-->
<!--                                             alt="--><?//= app()->name ?><!--">-->
<!--                                        <img id="site-logo-2" src="--><?//= $baseUrl . '/images/logo-02.png' ?><!--"-->
<!--                                             alt="--><?//= app()->name ?><!--">-->
<!--                                    --><?php //endif; ?>
                                    <div id="site-logo" class="svg-icon-logo<?=app()->language == 'ar'?'-ar':''?>"></div>
                                    <div id="site-logo-2" class="svg-icon-logo-landscape<?=app()->language == 'ar'?'-ar':''?>"></div>
                                    <span class="site-title"><?= app()->name ?></span>
                                </a>
                            </h1>
                        </div>
                        <!-- .site-branding -->
                        <?= $this->render('//layouts/_socials') ?>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="row">
                        <nav id="menu-main" class="main-menu-container navbar-expand-lg">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                    data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <img src="<?= $this->theme->baseUrl . '/images/menu-icon.svg' ?>" alt="menu-button">
                            </button>
                            <nav id="main-navigation" class="navbar navbar-expand-lg collapse">
                                <div class="navbar-collapse" id="language">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="lang-select"
                                               data-toggle="dropdown" aria-haspopup="true"
                                               aria-expanded="false"><?= strtoupper(app()->language) ?></a>
                                            <div class="dropdown-menu" aria-labelledby="lang-select">
                                                <?php foreach (MultiLangActiveRecord::$showLangArray as $key => $val): ?>
                                                    <a class="dropdown-item"
                                                       href="<?= Url::to(["/$key"]) ?>"><?= $val ?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <ul id="main-navigation" class="main-menu collapse">
                                <?php
                                /** @var Menu $menu */

                                foreach (app()->controller->menus as $menu): ?>
                                    <li class="menu-item"><i class="<?= $menu->icon_class ?>"></i><a
                                                href="<?= $menu->getUrl() ?>"><?= $menu->getName() ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                            <ul id="main-button" class="main-button">
                                <li class="menu-button-item"><a href="<?= Url::to(['/']) ?>"><i
                                                class="svg-icon-rezvan-w"></i></a></li>
                                <li class="menu-button-item"><a href="<?= Url::to(['/apartment/list']) ?>"><i
                                                class="svg-icon-apartment-w"></i></a></li>
                                <li class="menu-button-item"><a href="<?= Url::to(['/investment/list']) ?>"><i
                                                class="svg-icon-investment-w"></i></a></li>
                                <li class="menu-button-item"><a href="<?= Url::to(['/construction/list']) ?>"><i
                                                class="svg-icon-services-w"></i></a></li>
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
