<?php

/* @var $this yii\web\View */
/* @var $model Page */
/* @var $apartment Apartment */

use app\models\Page;
use app\models\projects\Apartment;
use yii\helpers\Html;

$this->title = $model->getName();

$baseUrl = $this->theme->baseUrl;
$apartmentCounts = isset($availableApartments) ? count($availableApartments) : 0;
?>
<section class="main-text">
    <div class="title-page">
        <div class="container-fluid">
            
            <div class="row">
                <div class="title">
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="main-section-page">
                    <div class="txt-post-page-test">
                        <p><strong>
                                <?= trans('words', $model->name) ?>
                            </strong></p>
                        <img src="<?= $model->image ?>" alt="">
                        <p>
                            <?= Html::decode($model->body) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                                    <?php for ($j = $i; $j < $i+ 4; $j++):
                                        if (!isset($availableApartments[$j]))
                                            break;
                                        $apartment = $availableApartments[$j]; ?>
                                        <div class="grid little-post col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= $apartment->getName() ?>">
                                            <a href="<?= $apartment->getUrl() ?>">
                                                <h2 class="item-title"><?= $apartment->getName() ?></h2>
                                            </a>
                                            <span class="description"><?= $apartment->getLocationStr() ?><?= $apartment->getLocationTwoStr()?' / ':'' ?></span>
                                            <span class="description-2"><?= $apartment->getLocationTwoStr() ?></span>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <a class="carousel-control-prev" href="#order-post" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#order-post" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
