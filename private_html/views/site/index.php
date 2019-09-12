<?php

use yii\helpers\Html;
use yii\helpers\Url;

$baseUrl = $this->theme->baseUrl;

$apartmentCounts = isset($apartments) ? count($apartments) : 0;
$investmentCounts = isset($investments) ? count($investments) : 0;
$constructionCounts = isset($otherConstructions) ? count($otherConstructions) : 0;
$serviceCounts = isset($services) ? count($services) : null;

?>
<section class="slider">
    <div class="container">
        <div class="row"></div>
    </div>
</section>

<?php if (isset($apartments)): ?>
    <section class="slide-1">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= alias('@web/themes/frontend/images/apartment-icon.png') ?>"
                             alt="apartment-icon">
                        <h2 class="slide"><strong>available </strong> apartment</h2>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="projects"><?= $apartmentCounts ?> projects / </span>
                            <span class="available-project">available</br>
                                project </span>
                            <span class="num"><?= $availableApartments ?></span>
                        </p>
                    </div>
                </div>

                <div id="slide-1" class="carousel slide col-lg-12 col-md-12  col-sm-12" data-ride="carousel">
                    <!-- Indicators -->

                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $apartmentCounts; $i++): ?>
                            <?php if ($apartmentCounts / 4 >= 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-1" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span class="indicators">page <?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < $apartmentCounts; $i = $i + 5): ?>
                            <?php $apartment = $apartments[$i]; ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <div class="grid first-post col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->name) ?>">
                                            <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                               title="<?= Html::encode($apartment->name) ?>">
                                                <h2 class="item-title"><?= Html::encode($apartment->name) ?></h2>
                                                <span class="first-title"><?= Html::encode($apartment->subTitle) ?></span>
                                            </a>
                                            <span class="description"><?= Html::encode($apartment->location) ?></span>
                                            <div class="overly">
                                                <div class="item unit">
                                                    <p class="title-1"><?= $apartment->area_size ?></p>
                                                    <p class="title-2">Metr</p>
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
                                                <?php if (!isset($apartments[$i + 1]))
                                                    break;
                                                $apartment = $apartments[$i + 1]; ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $apartment->getModelImage() ?>"
                                                         alt="<?= Html::encode($apartment->name) ?>">
                                                    <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                                       title="<?= Html::encode($apartment->name) ?>">
                                                        <h2 class="item-title">
                                                            <?= Html::encode($apartment->name) ?></h2>
                                                    </a>
                                                    <span class="description"><?= Html::encode($apartment->location) ?></span>
                                                </div>

                                                <?php if (!isset($apartments[$i + 2])) break;
                                                $apartment = $apartments[$i + 2]; ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $apartment->getModelImage() ?>"
                                                         alt="<?= Html::encode($apartment->name) ?>">
                                                    <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                                       title="<?= Html::encode($apartment->name) ?>">
                                                        <h2 class="item-title">
                                                            <?= Html::encode($apartment->name) ?></h2>
                                                    </a>
                                                    <span class="description"><?= Html::encode($apartment->location) ?></span>
                                                </div>

                                                <?php if (!isset($apartments[$i + 3])) break;
                                                $apartment = $apartments[$i + 3]; ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $apartment->getModelImage() ?>"
                                                         alt="<?= Html::encode($apartment->name) ?>">
                                                    <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                                       title="<?= Html::encode($apartment->name) ?>">
                                                        <h2 class="item-title">
                                                            <?= Html::encode($apartment->name) ?></h2>
                                                    </a>
                                                    <span class="description"><?= Html::encode($apartment->location) ?></span>
                                                </div>

                                                <?php if (!isset($apartments[$i + 4])) break;
                                                $apartment = $apartments[$i + 4]; ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $apartment->getModelImage() ?>"
                                                         alt="<?= Html::encode($apartment->name) ?>">
                                                    <a href="<?= Url::to(['/apartment/show/', 'id' => $apartment->id]) ?>"
                                                       title="<?= Html::encode($apartment->name) ?>">
                                                        <h2 class="item-title">
                                                            <?= Html::encode($apartment->name) ?></h2>
                                                    </a>
                                                    <span class="description"><?= Html::encode($apartment->location) ?></span>
                                                </div>
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
                        <a title="View More" href="<?= Url::to('apartment/list') ?>">
                            <button type="button" class="btn btn-primary section-button">View More</button>
                        </a>
                    </div>
                </div>
            </div>
    </section>
<?php endif; ?>

<?php if (isset($investments)): ?>
    <section class="slide-2">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl . '/images/investment.png' ?>" alt="investment-icon">
                        <h2 class="slide"><strong>investment</strong> opportunities</h2>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="projects"><?= $investmentCounts ?> projects / </span>
                            <span class="available-project">available</br>
                                project </span>
                            <span class="num"><?= $availableInvestments ?></span>
                        </p>
                    </div>
                </div>

                <div id="slide-2" class="carousel slide col-lg-12 col-md-12  col-sm-12 col-xs-12" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $investmentCounts; $i++): ?>
                            <?php if ($investmentCounts / 5 > 1 && $i % 5 == 0): ?>
                                <li data-target="#slide-2" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span class="indicators">page <?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i < $investmentCounts; $i = $i + 5): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 left-post-slider">
                                            <div class="row">
                                                <?php
                                                if (!isset($investments[$i])) break;
                                                $investment = $investments[$i];
                                                ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $investment->getModelImage() ?>"
                                                         alt="<?= $investment->name ?>">
                                                    <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                        <h2 class="item-title"><?= $investment->name ?></h2>
                                                    </a>
                                                    <span class="description"><?= $investment->location ?> / </span>
                                                    <span class="description-2"><?= $investment->location ?></span>
                                                </div>
                                                <?php
                                                if (!isset($investments[$i + 1])) break;
                                                $investment = $investments[$i + 1];
                                                ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $investment->getModelImage() ?>"
                                                         alt="<?= $investment->name ?>">
                                                    <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                        <h2 class="item-title"><?= $investment->name ?></h2>
                                                    </a>
                                                    <span class="description"><?= $investment->location ?> / </span>
                                                    <span class="description-2"><?= $investment->location ?></span>
                                                </div>
                                                <?php
                                                if (!isset($investments[$i + 2])) break;
                                                $investment = $investments[$i + 2];
                                                ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $investment->getModelImage() ?>"
                                                         alt="<?= $investment->name ?>">
                                                    <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                        <h2 class="item-title"><?= $investment->name ?></h2>
                                                    </a>
                                                    <span class="description"><?= $investment->location ?> / </span>
                                                    <span class="description-2"><?= $investment->location ?></span>
                                                </div>
                                                <?php
                                                if (!isset($investments[$i + 3])) break;
                                                $investment = $investments[$i + 3];
                                                ?>
                                                <div class="grid col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                                    <img src="<?= $investment->getModelImage() ?>"
                                                         alt="<?= $investment->name ?>">
                                                    <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                        <h2 class="item-title"><?= $investment->name ?></h2>
                                                    </a>
                                                    <span class="description"><?= $investment->location ?> / </span>
                                                    <span class="description-2"><?= $investment->location ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        if (!isset($investments[$i+4])) break;
                                        $investment = $investments[$i+4];
                                        ?>
                                        <div class="grid first-post col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                            <img src="<?= $investment->getModelImage() ?>"
                                                 alt="<?= $investment->name ?>">
                                            <a href="<?= Url::to(['/investment/show/', 'id' => $investment->id]) ?>">
                                                <h2 class="item-title"><?= $investment->name ?></h2>
                                            </a>
                                            <span class="description"><?= $investment->location ?> / </span>
                                            <div class="overly">
                                                <div class="item unit">
                                                    <p class="title-1"><?= $investment->area_size ?></p>
                                                    <p class="title-2">Metr</p>
                                                </div>
                                                <div class="item item-1">
                                                    <img src="<?= $baseUrl . '/images/item-1-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-2">
                                                    <img src="<?= $baseUrl . '/images/item-2-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-3">
                                                    <img src="<?= $baseUrl . '/images/item-3-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-4">
                                                    <img src="<?= $baseUrl . '/images/item-4-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-5">
                                                    <img src="<?= $baseUrl . '/images/item-5-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-6">
                                                    <img src="<?= $baseUrl . '/images/item-6-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-7">
                                                    <img src="<?= $baseUrl . '/images/item-7-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
                                                </div>
                                                <div class="item item-8">
                                                    <img src="<?= $baseUrl . '/images/item-8-w.png' ?>"
                                                         alt="<?= $investment->name ?>">
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
                        <button type="button" class="btn btn-primary section-button">View More</button>
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
                        <h2 class="slide"><strong>Available</strong> services</h2>
                    </div>
                </div>
                <div id="slide-3" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $serviceCounts; $i++): ?>
                            <?php if ($serviceCounts / 4 > 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-3" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span class="indicators">page <?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>

                    </ul>
                    <div class="carousel-inner row w-100 mx-auto" role="listbox">
                        <?php for ($i = 0; $i < $serviceCounts; $i = $i + 3): ?>
                            <div class="carousel-item col-lg-12 col-md-12 col-sm-12 col-xs-12 <?= $i == 0 ? 'active' : '' ?>">
                                <div class="row">
                                    <?php
                                    if (!isset($services[$i])) break;
                                    $service = $services[$i];
                                    ?>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <h2 class="item-title"><?= Html::encode($service->title) ?></h2>
                                        </a>
                                        <span class="description">
                                            <?= Html::encode($service->description) ?>
                                        </span>
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <button type="button" class="btn btn-primary slider-button">View More
                                            </button>
                                        </a>
                                    </div>
                                    <?php
                                    if (!isset($services[$i + 1])) break;
                                    $service = $services[$i + 1];
                                    ?>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <h2 class="item-title"><?= Html::encode($service->title) ?></h2>
                                        </a>
                                        <span class="description">
                                            <?= Html::encode($service->description) ?>
                                        </span>
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <button type="button" class="btn btn-primary slider-button">View More
                                            </button>
                                        </a>
                                    </div>
                                    <?php
                                    if (!isset($services[$i + 2])) break;
                                    $service = $services[$i + 2];
                                    ?>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <h2 class="item-title"><?= Html::encode($service->title) ?></h2>
                                        </a>
                                        <span class="description">
                                            <?= Html::encode($service->description) ?>
                                        </span>
                                        <a href="<?= Url::to(['/service/show/', 'id' => $service->id]) ?>"
                                           title="<?= Html::encode($service->title) ?>">
                                            <button type="button" class="btn btn-primary slider-button">View More
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    </div>
                    <a class="carousel-control-prev" href="#slide-3" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#slide-3" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($otherConstructions)): ?>
    <section class="slide-4">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <h2 class="slide">other construction</h2>
                    </div>
                </div>

                <div id="slide-4" class="carousel slide col-lg-12 col-md-12  col-sm-12 col-xs-12" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <?php $pageNumber = 1;

                        for ($i = 0; $i < $constructionCounts; $i++): ?>
                            <?php if ($constructionCounts / 4 > 1 && $i % 4 == 0): ?>
                                <li data-target="#slide-4" data-slide-to="<?php echo $pageNumber - 1 ?>"
                                    class="<?= $i / 4 == 1 && $i % 4 == 0 ? 'active' : '' ?>"><span class="indicators">page <?php echo $pageNumber++ ?></span>
                                </li>
                            <?php endif; endfor; ?>
                    </ul>
                    <div class="carousel-inner">
                        <?php
                        for ($i = 0; $i < $constructionCounts; $i = $i + 4): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <?php
                                        if (!isset($otherConstructions[$i])) break;
                                        $construction = $otherConstructions[$i];
                                        ?>
                                        <div class="grid col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                            <div class="img">
                                                <img src="<?= $construction->getModelImage() ?>"
                                                     alt="<?= Html::encode($construction->name) ?>">
                                            </div>
                                            <div class="post-meta">
                                                <a href="<?= Url::to(['/construction/show/', 'id' => $construction->id]) ?>"
                                                   title="<?= Html::encode($construction->name) ?>">
                                                    <h2 class="item-title"><?= Html::encode($construction->name) ?></h2>
                                                </a>
                                                <span class="author"><?= Html::encode($construction->location) ?></span>

                                                <span class="description"><?= Html::encode($construction->subtitle) ?></span>

                                                <a href="<?= Url::to('construction/show', ['id' => $construction->id]) ?>">
                                                    <button type="button" class="btn btn-primary">View More</button>
                                                </a>
                                            </div>
                                        </div>

                                        <?php if (!isset($otherConstructions[$i + 1])) break;
                                        $construction = $otherConstructions[$i + 1];
                                        ?>
                                        <div class="grid col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                            <div class="img">
                                                <img src="<?= $construction->getModelImage() ?>"
                                                     alt="<?= Html::encode($construction->name) ?>">
                                            </div>
                                            <div class="post-meta">
                                                <a href="<?= Url::to(['/construction/show/', 'id' => $construction->id]) ?>"
                                                   title="<?= Html::encode($construction->name) ?>">
                                                    <h2 class="item-title"><?= Html::encode($construction->name) ?></h2>
                                                </a>
                                                <span class="author"><?= Html::encode($construction->location) ?></span>

                                                <span class="description"><?= Html::encode($construction->location) ?></span>

                                                <a href="<?= Url::to('construction/show', ['id' => $construction->id]) ?>">
                                                    <button type="button" class="btn btn-primary">View More</button>
                                                </a>
                                            </div>
                                        </div>

                                        <?php if (!isset($otherConstructions[$i + 2])) break;
                                        $construction = $otherConstructions[$i + 2];
                                        ?>
                                        <div class="grid col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                            <div class="img">
                                                <img src="<?= $construction->getModelImage() ?>"
                                                     alt="<?= Html::encode($construction->name) ?>">
                                            </div>
                                            <div class="post-meta">
                                                <a href="<?= Url::to(['/construction/show/', 'id' => $construction->id]) ?>"
                                                   title="<?= Html::encode($construction->name) ?>">
                                                    <h2 class="item-title"><?= Html::encode($construction->name) ?></h2>
                                                </a>
                                                <span class="author"><?= Html::encode($construction->location) ?></span>

                                                <span class="description"><?= Html::encode($construction->location) ?></span>

                                                <a href="<?= Url::to('construction/show', ['id' => $construction->id]) ?>">
                                                    <button type="button" class="btn btn-primary">View More</button>
                                                </a>
                                            </div>
                                        </div>

                                        <?php if (!isset($otherConstructions[$i + 3])) break;
                                        $construction = $otherConstructions[$i + 3];
                                        ?>
                                        <div class="grid col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                            <div class="img">
                                                <img src="<?= $construction->getModelImage() ?>"
                                                     alt="<?= Html::encode($construction->name) ?>">
                                            </div>
                                            <div class="post-meta">
                                                <a href="<?= Url::to(['/construction/show/', 'id' => $construction->id]) ?>"
                                                   title="<?= Html::encode($construction->name) ?>">
                                                    <h2 class="item-title"><?= Html::encode($construction->name) ?></h2>
                                                </a>
                                                <span class="author"><?= Html::encode($construction->location) ?></span>

                                                <span class="description"><?= Html::encode($construction->location) ?></span>

                                                <a href="<?= Url::to('construction/show', ['id' => $construction->id]) ?>">
                                                    <button type="button" class="btn btn-primary">View More</button>
                                                </a>
                                            </div>
                                        </div>

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
                        <a href="<?= Url::to('construction') ?>" title="View More">
                            <button type="button" class="btn btn-primary section-button">View More</button>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>
