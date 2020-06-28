<?php
/** @var $this View */
/** @var $sections \app\models\ProjectSection[] */
/** @var $videos \app\models\ProjectSectionVideo[] */
/* @var $apartment Apartment */

use app\models\projects\Apartment;
use yii\web\View;
use yii\helpers\Url;

$baseUrl = $this->theme->baseUrl;
$apartmentCounts = isset($availableApartments) ? count($availableApartments) : 0;
?>
<section class="main-text infography">
    <div class="slide-title">
        <div class="title-left">
            <div class="text">
                <h2 class="slide"><strong>title</strong></h2>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="main-section-page">
                    <div class="row" style="padding-bottom: 50px;">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right-box">
                            <div class="title">
                                <h2><?= trans('words', 'How to own?')?><small><?= trans('words', 'A foreigner does not own a company registration in Iran')?></small></h2>
                                <i class="line"></i>
                                <span class="desc"><?= trans('words', 'Here are the steps to register a company')?></span>
                            </div>
                            <ul class="infography-menu">
                                <?php $i = 0; foreach($sections as $section):?>
                                    <?php if ($src = $section->getIconSrc()) {
                                        $srcHover = $section->getIconHoverSrc();
                                        $this->registerCss('
                                            .section-icon-' . $section->id . ' {
                                                background-image: url("'.$src.'");
                                            }
                                            .infography-menu > li .active .section-icon-' . $section->id . ' {
                                                background-image: url("'.$srcHover.'");
                                            }', [], 'section-style-'.$section->id);
                                    }?>
                                    <li>
                                        <a href="#" class="section-trigger<?= $i++ == 0 ? ' active' : '' ?>" data-target="#section-tab-<?= $section->id ?>">
                                            <span class="num"><?php echo $i;?></span>
                                            <div class="section-content">
                                                <?php if ($src): ?><span class="section-icon section-icon-<?= $section->id ?>"></span><?php endif; ?>
                                                <div class="section-title">
                                                    <b><?= $section->getName() ?></b>
                                                    <small><?= $section->getDescriptionStr() ?></small>
                                                </div>
                                                <span class="icon-arrow"></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                            <?php /*if(isDesktop()):?>
                                <div class="videos">
                                    <?php foreach ($videos as $video):?>
                                        <!--                        <div class="row">-->
                                        <!--                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">-->
                                        <video controls class="center-block">
                                            <source src="<?= $video->getVideoSrc()?>">
                                        </video>
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                    <?php endforeach;?>
                                </div>
                            <?php endif;*/?>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <?php $i = 0; foreach ($sections as $section): ?>
                                <div class="section-container<?= $i++ == 0 ? ' active' : '' ?>" id="section-tab-<?= $section->id ?>">
                                    <div class="image">
                                        <img src="<?= $section->getImageSrc() ?>" alt="<?= $section->getName() ?>">
                                    </div>
                                    <div class="info">
                                        <h3 class="title"><span class="num"><?= $i?></span><?= $section->getName() ?></h3>
                                        <div class="desc"><?= $section->getDescriptionStr() ?></div>
                                        <div class="text"><?= $section->getBodyStr() ?></div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <?php /*if(!isDesktop()):?>
                                <div class="videos visible-xs hidden">
                                    <?php foreach ($videos as $video):?>
                                        <!--                        <div class="row">-->
                                        <!--                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-0">-->
                                        <video controls class="center-block">
                                            <source src="<?= $video->getVideoSrc()?>">
                                        </video>
                                        <!--                            </div>-->
                                        <!--                        </div>-->
                                    <?php endforeach;?>
                                </div>
                            <?php endif;*/?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (isDesktop()): ?>
    <section class="order-post">
        <div class="container-fluid">
            <div class="row">
                <div class="title-order-post">
                    <h2 id="txt-order-post">
                        <strong><?= trans('words', 'projects') ?></strong>
                    </h2>
                </div>
                <div id="order-post" class="carousel slide col-lg-12" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < $apartmentCounts; $i = $i + 4): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <?php for ($j = $i; $j < $i + 4; $j++):
                                            if (!isset($availableApartments[$j]))
                                                break;
                                            $apartment = $availableApartments[$j]; ?>
                                            <div class="grid little-post col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                                <a href="<?= $apartment->getUrl() ?>">
                                                    <img src="<?= $apartment->getModelImage() ?>"
                                                         alt="<?= $apartment->getName() ?>">
                                                    <h2 class="item-title"><?= $apartment->getName() ?></h2>
                                                    <span class="description"><?= $apartment->getLocationStr() ?><?= $apartment->getLocationTwoStr() ? ' / ' : '' ?></span>
                                                    <span class="description-2"><?= $apartment->getLocationTwoStr() ?></span>
                                                </a>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        <a class="carousel-control-prev" href="#order-post" data-slide="prev">
                            <i class="fas fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#order-post" data-slide="next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php else: ?>
    <div class="container-fluid">
        <div class="back-button">
            <a href="<?= Url::to(['/']) ?>">
                <p><strong><?= trans('words', 'Back') ?></strong></br>
                    <?= trans('words', 'Available Apartments') ?></p>
            </a>
        </div>
    </div>
<?php endif;