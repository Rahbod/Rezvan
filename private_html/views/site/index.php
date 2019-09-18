<?php
/** @var Apartment $apartment */
/** @var OtherConstruction $construction */
/** @var Investment $investment */

/** @var Service $service */

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
<section class="slider">
    <div class="container">
        <div class="row"></div>
    </div>
</section>

<?php if (isset($availableApartments)): ?>
    <section class="slide-1">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= alias('@web/themes/frontend/images/apartment-icon.png') ?>"
                             alt="apartment-icon">
                        <h2 class="slide"><strong><?= trans('words', 'available') ?>
                            </strong> <?= trans('words', 'apartments') ?></h2>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="projects"><?= $apartmentCounts ?> <?= trans('words', 'projects') ?> / </span>
                            <span class="available-project"><?= trans('words', 'available') ?><br><?= trans('words', 'project') ?> </span>
                            <span class="num"><?= $availableApartmentsCounts ?></span>
                        </p>
                    </div>
                </div>

                <div id="slide-1" class="carousel slide col-lg-12 col-md-12  col-sm-12" data-ride="carousel">
                    <!-- Indicators -->

                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $availableApartmentsCounts; $i++): ?>
                            <?php if ($availableApartmentsCounts / 4 >= 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-1" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span
                                            class="indicators"><?= trans('words', 'page') ?><?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < $availableApartmentsCounts; $i = $i + 5): ?>
                            <?php $apartment = $availableApartments[$i]; ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <div class="grid first-post col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                            <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                               title="<?= Html::encode($apartment->getName()) ?>">
                                                <h2 class="item-title"><?= Html::encode($apartment->getName()) ?></h2>
                                                <span class="first-title"><?= Html::encode($apartment->getSubtitleStr()) ?></span>
                                            </a>
                                            <span class="description"><?= Html::encode($apartment->location) ?></span>
                                            <div class="overly">
                                                <div class="item unit">
                                                    <p class="title-1"><?= $apartment->area_size ?></p>
                                                    <p class="title-2"><?= trans('words', 'Meter') ?></p>
                                                </div>
                                                <div class="item item-1">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-1-w.png') ?>"
                                                         alt="item-1">
                                                </div>
                                                <div class="item item-2">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-2.png') ?>"
                                                         alt="item-2">
                                                </div>
                                                <div class="item item-3">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-3-w.png') ?>"
                                                         alt="item-3">
                                                </div>
                                                <div class="item item-4">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-4-w.png') ?>"
                                                         alt="item-4">
                                                </div>
                                                <div class="item item-5">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-5-w.png') ?>"
                                                         alt="item-5">
                                                </div>
                                                <div class="item item-6">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-6-w.png') ?>"
                                                         alt="item-6">
                                                </div>
                                                <div class="item item-7">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-7-w.png') ?>"
                                                         alt="item-7">
                                                </div>
                                                <div class="item item-8">
                                                    <img src="<?= alias('@web/themes/frontend/images/item-8-w.png') ?>"
                                                         alt="item-8">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 right-post-slider">
                                            <div class="row">
                                                <?php for ($j = $i + 1; $j <= 4; $j++): ?>
                                                    <?php if (!isset($availableApartments[$j]))
                                                        break;
                                                    $apartment = $availableApartments[$j]; ?>
                                                    <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                        <img src="<?= $apartment->getModelImage() ?>"
                                                             alt="<?= Html::encode($apartment->getName()) ?>">
                                                        <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                                           title="<?= Html::encode($apartment->getName()) ?>">
                                                            <h2 class="item-title">
                                                                <?= Html::encode($apartment->getName()) ?></h2>
                                                        </a>
                                                        <span class="description"><?= Html::encode($apartment->getLocationStr()) ?></span>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#slide-1" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slide-1" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                    <div class="button-more">
                        <a href="<?= Url::to(['/apartment/list']) ?>" title="<?= trans('words', 'View More') ?>">
                            <button type="button"
                                    class="btn btn-primary section-button"><?= trans('words', 'View More') ?></button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php if (isset($availableInvestments)): ?>
    <section class="slide-2">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl . '/images/investment.png' ?>" alt="investment-icon">
                        <h2 class="slide"><strong><?= trans('words', 'investment') ?></strong>
                            <?= trans('words', 'opportunities') ?></h2>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="projects"><?= $investmentCounts ?> <?= trans('words', 'projects') ?> / </span>
                            <span class="available-project"><?= trans('words', 'available') ?><br>
                                <?= trans('words', 'project') ?> </span>
                            <span class="num"><?= $availableInvestmentsCounts ?></span>
                        </p>
                    </div>
                </div>

                <div id="slide-2" class="carousel slide col-lg-12 col-md-12  col-sm-12 col-xs-12" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $availableInvestmentsCounts; $i++): ?>
                            <?php if ($availableInvestmentsCounts / 5 > 1 && $i % 5 == 0): ?>
                                <li data-target="#slide-2" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span
                                            class="indicators"><?= trans('words', 'page') ?><?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < $availableInvestmentsCounts; $i = $i + 5): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 left-post-slider">
                                            <div class="row">
                                                <?php for ($j = $i; $j < 4; $j++): ?>
                                                    <?php
                                                    if (!isset($availableInvestments[$j])) break;
                                                    $investment = $availableInvestments[$j];
                                                    ?>
                                                    <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                        <img src="<?= $investment->getModelImage() ?>"
                                                             alt="<?= $investment->getName() ?>">
                                                        <a href="<?= $investment->getUrl(); ?>">
                                                            <h2 class="item-title"><?= $investment->getName() ?></h2>
                                                        </a>
                                                        <span class="description"><?= $investment->getLocationStr() ?> / </span>
                                                        <span class="description-2"><?= $investment->getLocationStr() ?></span>
                                                    </div>
                                                <?php endfor; ?>
                                            </div>
                                        </div>
                                        <?php
                                        if (!isset($availableInvestments[$i + 4])) break;
                                        $investment = $availableInvestments[$i + 4];
                                        ?>
                                        <div class="grid first-post col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                            <img src="<?= $investment->getModelImage() ?>"
                                                 alt="<?= $investment->getName() ?>">
                                            <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                <h2 class="item-title"><?= $investment->getName() ?></h2>
                                            </a>
                                            <span class="description"><?= $investment->getLocationStr() ?> / </span>
                                            <div class="overly">
                                                <div class="item unit">
                                                    <p class="title-1"><?= $investment->area_size ?></p>
                                                    <p class="title-2"><?= trans('words', 'Meter') ?></p>
                                                </div>
                                                <div class="item item-1">
                                                    <img src="<?= $baseUrl . '/images/item-1-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-2">
                                                    <img src="<?= $baseUrl . '/images/item-2-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-3">
                                                    <img src="<?= $baseUrl . '/images/item-3-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-4">
                                                    <img src="<?= $baseUrl . '/images/item-4-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-5">
                                                    <img src="<?= $baseUrl . '/images/item-5-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-6">
                                                    <img src="<?= $baseUrl . '/images/item-6-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-7">
                                                    <img src="<?= $baseUrl . '/images/item-7-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                                <div class="item item-8">
                                                    <img src="<?= $baseUrl . '/images/item-8-w.png' ?>"
                                                         alt="<?= $investment->getName() ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#slide-2" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slide-2" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                    <div class="button-more col-lg-4 col-md-4 col-sm-4">
                        <a href="<?= Url::to(['/investment/list']) ?>" title="<?= trans('words', 'View More') ?>">
                            <button type="button"
                                    class="btn btn-primary section-button"><?= trans('words', 'View More') ?></button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php if (isset($services)): ?>
    <section class="slide-3">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl . '/images/services.png' ?>" alt="services-icon">
                        <h2 class="slide">
                            <strong><?= trans('words', 'available') ?></strong> <?= trans('words', 'services') ?></h2>
                    </div>
                </div>
                <div id="slide-3" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $serviceCounts; $i++): ?>
                            <?php if ($serviceCounts / 4 > 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-3" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span
                                            class="indicators"><?= trans('words', 'page') ?><?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>

                    </ul>
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php for ($i = 0; $i < $serviceCounts; $i = $i + 3): ?>
                            <div class="carousel-item col-lg-12 col-md-12 col-sm-12 col-xs-12 <?= $i == 0 ? 'active' : '' ?>">
                                <div class="row">
                                    <?php for ($j = $i; $j < 4; $j++): ?>
                                        <?php
                                        if (!isset($services[$j])) break;
                                        $service = $services[$j];
                                        ?>
                                        <div class="col-sm-12 col-md-4 col-lg-4">
                                            <a href="<?= $service->getUrl() ?>"
                                               title="<?= Html::encode($service->getName()) ?>">
                                                <h2 class="item-title"><?= Html::encode($service->getName()) ?></h2>
                                            </a>
                                            <span class="description">
                                            <?= Html::encode($service->getDescriptionStr()) ?>
                                        </span>
                                            <a href="<?= $service->getUrl() ?>"
                                               title="<?= Html::encode($service->getName()) ?>">
                                                <button type="button" class="btn btn-primary slider-button">
                                                    <?= trans('words', 'View More') ?>
                                                </button>
                                            </a>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>

                    </div>
                    <a class="carousel-control-prev" href="#slide-3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?= trans('words', 'Previous') ?></span>
                    </a>
                    <a class="carousel-control-next" href="#slide-3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"><?= trans('words', 'Next') ?></span>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($availableConstructions)): ?>
    <section class="slide-4">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <h2 class="slide"><?= trans('words', 'other construction') ?></h2>
                    </div>
                </div>

                <div id="slide-4" class="carousel slide col-lg-12 col-md-12  col-sm-12 col-xs-12" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $availableConstructionsCounts; $i++): ?>
                            <?php if ($availableConstructionsCounts / 4 > 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-4" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span
                                            class="indicators"><?= trans('words', 'page') ?><?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>
                    <div class="carousel-inner">
                        <?php
                        for ($i = 0; $i < $availableConstructionsCounts; $i = $i + 4): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <?php for ($j = $i; $j < 4; $j++): ?>
                                            <?php
                                            if (!isset($availableConstructions[$j])) break;
                                            $construction = $availableConstructions[$j];
                                            ?>
                                            <div class="grid col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                                <div class="img"><img src="<?= $construction->getModelImage() ?>"
                                                                      alt="<?= Html::encode($construction->getName()) ?>">
                                                </div>
                                                <div class="post-meta">
                                                    <a href="<?= $construction->getUrl() ?>"
                                                       title="<?= Html::encode($construction->getName()) ?>">
                                                        <h2 class="item-title"><?= Html::encode($construction->getName()) ?></h2>
                                                    </a>
                                                    <span class="author"><?= Html::encode($construction->getLocationStr()) ?></span>
                                                    <span class="description"><?= Html::encode($construction->getLocationStr()) ?></span>
                                                    <a href="<?= $construction->getUrl() ?>">
                                                        <button type="button"
                                                                class="btn btn-primary"><?= trans('words', 'View More') ?></button>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                        <a class="carousel-control-prev" href="#slide-4" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#slide-4" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                    <div class="button-more">
                        <a href="<?= Url::to(['/construction/list']) ?>" title="<?= trans('words', 'View More') ?>">
                            <button type="button"
                                    class="btn btn-primary section-button"><?= trans('words', 'View More') ?></button>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>
