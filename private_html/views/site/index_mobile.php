<?php
/** @var Apartment $apartment */
/** @var OtherConstruction $construction */
/** @var Investment $investment */
/** @var Slide $slides */

/** @var Service $service */

use app\models\Slide;
use app\models\projects\Apartment;
use app\models\projects\Investment;
use app\models\projects\OtherConstruction;
use app\models\Service;
use yii\helpers\Html;
use yii\helpers\Url;

$baseUrl = $this->theme->baseUrl;

$availableApartmentsCounts = isset($availableApartments) ? count($availableApartments) : 0;
$availableInvestmentsCounts = isset($availableInvestments) ? count($availableInvestments) : 0;
$availableConstructionsCounts = isset($availableConstructions) ? count($availableConstructions) : 0;
$serviceCounts = isset($services) ? count($services) : null;
?>
<section class="full-slide">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-left">
                    <i class="svg-icon-apartment"></i>
                    <h2 class="slide"><?= trans('words', '<strong>available </strong> apartment') ?></h2>
                </div>
                <div class="title-right">
                    <p class="slide">
                            <span class="projects">
                                <?= trans('words', '{count} projects', ['count' => $apartmentCounts]) ?> /
                            </span>
                        <span class="available-project"><?= trans('words', 'available<br>project') ?></span>
                        <span class="num"><?= $availableApartmentsCounts ?></span>
                    </p>
                </div>
            </div>
            <div class="container-fluid project-list">
                <div class="row">
                    <!--Apartments-->
                    <?php for ($i = 0; $i < $availableApartmentsCounts; $i = $i + 5): ?>
                        <?php $apartment = $availableApartments[$i];
                        if (!isset($availableApartments[$i]))
                            break;
                        ?>
                        <div class="grid first-post apartment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                            <a href="<?= $apartment->getUrl() ?>"
                               title="<?= Html::encode($apartment->getName()) ?>">
                                <img src="<?= $apartment->getModelImage() ?>"
                                     alt="<?= Html::encode($apartment->getName()) ?>">
                                <?php if ($apartment->free_count == 0): ?><span
                                        class="sold-icon">SOLD!</span><?php endif; ?>
                                <div class="top-title">
                                    <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                    <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                    <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                </div>
                                <div class="share-icon">
                                    <a href="#"><img src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                     alt="share"></a>
                                </div>
                                <div class="cat-text">
                                    <span><?= trans('words', 'Available Apartments') ?></span>
                                </div>
                                <ul class="icon-list-slider">
                                    <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                </ul>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 right-post-slider">
                            <div class="row">
                                <?php for ($j = $i + 1; $j <= $i + 4; $j++): ?>
                                    <?php if (!isset($availableApartments[$j]))
                                        break;
                                    $apartment = $availableApartments[$j]; ?>
                                    <div class="grid little-post apartment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                        <a href="<?= $apartment->getUrl() ?>"
                                           title="<?= Html::encode($apartment->getName()) ?>">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                            <div class="grid-title">
                                                <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                                <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                                <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                            </div>
                                            <div class="share-icon">
                                                <a href="#"><img
                                                            src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                            alt="share"></a>
                                            </div>
                                            <div class="cat-text">
                                                <span><?= trans('words', 'Available Apartments') ?></span>
                                            </div>
                                            <ul class="icon-list-slider">
                                                <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                            </ul>
                                        </a>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <!--Investments-->
                    <?php for ($i = 0; $i < $availableInvestmentsCounts; $i = $i + 5): ?>
                        <?php $apartment = $availableInvestments[$i];
                        if (!isset($availableInvestments[$i]))
                            break;
                        ?>
                        <div class="grid first-post investment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                            <a href="<?= $apartment->getUrl() ?>"
                               title="<?= Html::encode($apartment->getName()) ?>">
                                <img src="<?= $apartment->getModelImage() ?>"
                                     alt="<?= Html::encode($apartment->getName()) ?>">
                                <?php if ($apartment->free_count == 0): ?><span
                                        class="sold-icon">SOLD!</span><?php endif; ?>
                                <div class="top-title">
                                    <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                    <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                    <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                </div>
                                <div class="share-icon">
                                    <a href="#"><img src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                     alt="share"></a>
                                </div>
                                <div class="cat-text">
                                    <span><?= trans('words', 'Available Investments') ?></span>
                                </div>
                                <ul class="icon-list-slider">
                                    <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                </ul>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 right-post-slider">
                            <div class="row">
                                <?php for ($j = $i + 1; $j <= $i + 4; $j++): ?>
                                    <?php if (!isset($availableInvestments[$j]))
                                        break;
                                    $apartment = $availableInvestments[$j]; ?>
                                    <div class="grid little-post investment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                        <a href="<?= $apartment->getUrl() ?>"
                                           title="<?= Html::encode($apartment->getName()) ?>">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                            <div class="grid-title">
                                                <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                                <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                                <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                            </div>
                                            <div class="share-icon">
                                                <a href="#"><img
                                                            src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                            alt="share"></a>
                                            </div>
                                            <div class="cat-text">
                                                <span><?= trans('words', 'Available Investments') ?></span>
                                            </div>
                                            <ul class="icon-list-slider">
                                                <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                            </ul>
                                        </a>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <!--Constructions-->
                    <?php for ($i = 0; $i < $availableConstructionsCounts; $i = $i + 5): ?>
                        <?php $apartment = $availableConstructions[$i];
                        if (!isset($availableConstructions[$i]))
                            break;
                        ?>
                        <div class="grid first-post services col-lg-6 col-md-6  col-sm-12 col-xs-12">
                            <a href="<?= $apartment->getUrl() ?>"
                               title="<?= Html::encode($apartment->getName()) ?>">
                                <img src="<?= $apartment->getModelImage() ?>"
                                     alt="<?= Html::encode($apartment->getName()) ?>">
                                <?php if ($apartment->free_count == 0): ?><span
                                        class="sold-icon">SOLD!</span><?php endif; ?>
                                <div class="top-title">
                                    <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                    <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                    <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                </div>
                                <div class="share-icon">
                                    <a href="#"><img src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                     alt="share"></a>
                                </div>
                                <div class="cat-text">
                                    <span><?= trans('words', 'Other constructions') ?></span>
                                </div>
                                <ul class="icon-list-slider">
                                    <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                </ul>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 right-post-slider">
                            <div class="row">
                                <?php for ($j = $i + 1; $j <= $i + 4; $j++): ?>
                                    <?php if (!isset($availableConstructions[$j]))
                                        break;
                                    $apartment = $availableConstructions[$j]; ?>
                                    <div class="grid little-post services col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                        <a href="<?= $apartment->getUrl() ?>"
                                           title="<?= Html::encode($apartment->getName()) ?>">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                            <div class="grid-title">
                                                <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                                <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?> / </span>
                                                <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                            </div>
                                            <div class="share-icon">
                                                <a href="#"><img
                                                            src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                            alt="share"></a>
                                            </div>
                                            <div class="cat-text">
                                                <span><?= trans('words', 'Other constructions') ?></span>
                                            </div>
                                            <ul class="icon-list-slider">
                                                <?= $this->render('//site/_project_side', ['model' => $apartment, 'withValue' => true]) ?>
                                            </ul>
                                        </a>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>