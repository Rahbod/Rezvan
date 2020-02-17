<?php

/* @var $this yii\web\View */
/* @var $model Page */

/* @var $apartment Apartment */

use app\models\Page;
use app\models\projects\Apartment;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = strip_tags($model->getName());

$baseUrl = $this->theme->baseUrl;
$apartmentCounts = isset($availableApartments) ? count($availableApartments) : 0;
?>
    <section class="main-text">
        <?php if (isDesktop()): ?>
            <div class="slide-title">
                <div class="title-left">
                    <i class="<?= $model->icon ?>"></i>
                    <div class="text">
                        <h2 class="slide"><strong><?= $this->title ?></strong></h2>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="title-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="title">
                            <div class="text-title">
                                <h1><i class="<?= str_replace('-w','',$model->icon) ?>"></i><?= $this->title ?></h1>
                                <!--                            <span>-->
                                <? //= trans('words', 'CONTACT US') ?><!--</span>-->
                            </div>
<!--                            <div class="share-icon">-->
<!--                                <a href="#"><img src="--><?//= $this->theme->baseUrl ?><!--/images/share.png" alt="share"></a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="main-section-page">
                        <div class="txt-post-page-test">
                            <p><strong><?= $model->getName() ?></strong></p>
                            <img src="<?= $model->getModelImage() ?>" alt="">
                            <p><?= Html::decode($model->getBodyStr()) ?></p>
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