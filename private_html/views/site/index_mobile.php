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
                    <?php $counter = 0; for ($i = 0; $i < $availableApartmentsCounts; $i = $i + 5): $counter++;?>
                        <?php $apartment = $availableApartments[$i];
                        if (!isset($availableApartments[$i]))
                            break;
                        ?>

                        <?php if($counter == 2):?>
                            <!--Services-->
                            <?php if (isset($services) && $serviceCounts > 0): ?>
                                <section class="slide-3">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="slide-title" style="display: block !important;padding: 20px 5% 25px;">
                                                <div class="title-left">
                                                    <i class="svg-icon-services-b"></i>
                                                    <h2 class="slide">
                                                        <strong><?= trans('words', 'available') ?></strong> <?= trans('words', 'services') ?></h2>
                                                </div>
                                            </div>
                                            <div id="slide-3" class="carousel slide w-100" data-ride="carousel">
                                                <ul class="carousel-indicators">
                                                    <?php $pageNumber = 1; for ($a = 0; $a < $serviceCounts; $a++): ?>
                                                        <li data-target="#slide-3" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                                            class="<?= $a / 4 == 1 && $a % 4 == 0 ? 'active' : '' ?>"><span
                                                                    class="indicators"><?= trans('words', 'page') ?><?php echo $pageNumber++ ?></span>
                                                        </li>
                                                    <?php endfor; ?>
                                                </ul>
                                                <div class="carousel-inner row w-100 mx-auto" role="listbox">
                                                    <?php for ($a = 0; $a < $serviceCounts; $a++): ?>
                                                        <div class="carousel-item col-lg-12 col-md-12 col-sm-12 col-xs-12 <?= $a == 0 ? 'active' : '' ?>">
                                                            <div class="row">
                                                                <?php $service = $services[$a]; ?>
                                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                                    <a href="<?= $service->getUrl() ?>"
                                                                       title="<?= Html::encode($service->getName()) ?>">
                                                                        <h2 class="item-title"><?= $service->getName() ?></h2>
                                                                    </a>
                                                                    <p class="description"><?= Html::encode($service->getDescriptionStr()) ?></p>
                                                                    <a href="<?= $service->getUrl() ?>"
                                                                       title="<?= Html::encode($service->getName()) ?>">
                                                                        <button type="button" class="btn btn-primary slider-button">
                                                                            <?= trans('words', 'View More') ?>
                                                                        </button>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#slide-3" role="button" data-slide="prev">
                                                    <i class="fal fa-chevron-left"></i>
                                                    <span class="sr-only"><?= trans('words', 'Previous') ?></span>
                                                </a>
                                                <a class="carousel-control-next" href="#slide-3" role="button" data-slide="next">
                                                    <i class="fal fa-chevron-right"></i>
                                                    <span class="sr-only"><?= trans('words', 'Next') ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            <?php endif; ?>
                        <?php endif;?>

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