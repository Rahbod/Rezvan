<?php

/* @var $this yii\web\View */
/* @var $availableApartments Apartment[] */

/* @var $projects Apartment[] */

use app\models\projects\Apartment;
use yii\helpers\Html;
use yii\helpers\Url;

$baseUrl = $this->theme->baseUrl;
$apartmentCounts = isset($projects) ? count($projects) : 0;

?>
<?php if (isset($projects)): ?>
    <section class="full-slide">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <i class="svg-icon-apartment-w"></i>
                        <div class="text">
                            <h2 class="slide"><?= trans('words', '<strong>available </strong> apartment') ?></h2>
                        </div>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                             <span class="projects">
                                <?= trans('words', '{count} projects', ['count' => $apartmentCounts]) ?> /
                            </span>
                            <span class="available-project"><?= trans('words', 'available<br>project') ?></span>
                            <span class="num"><?= $availableApartments ?></span>
                        </p>
                    </div>
                </div>
                <div class="container-fluid project-list">
                    <div class="row">
                        <?php if (isset($projects[0])): ?>
                            <div class="grid first-post apartment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                <a title="<?= Html::encode($projects[0]->getName()) ?>"
                                   href="<?= $projects[0]->getUrl() ?>">
                                    <img src="<?= $projects[0]->getModelImage() ?>"
                                         alt="<?= Html::encode($projects[0]->getName()) ?>">
                                    <?php if ($projects[0]->free_count == 0): ?>
                                        <span class="sold-icon"><?php echo trans('words', 'Sold')?></span>
                                    <?php endif; ?>
                                    <div class="top-title">
                                        <h2 class="item-title"><?= Html::encode($projects[0]->getName()) ?></h2>
                                        <span class="first-title"><?= $projects[0]->getLocationStr() ?><?php if (!isDesktop()): ?> / <?php endif; ?></span>
                                        <span class="description"><?= $projects[0]->getLocationTwoStr() ?></span>
                                    </div>
                                    <?php if (!isDesktop()): ?>
                                        <div class="share-icon">
                                            <a href="#" data-url="<?= $projects[0]->getUrl() ?>"><img src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                             alt="share"></a>
                                        </div>
                                        <div class="cat-text">
                                            <span><?= trans('words', 'Available Apartments') ?></span>
                                        </div>
                                        <ul class="icon-list-slider">
                                            <?= $this->render('//site/_project_side', ['model' => $projects[0], 'withValue' => true]) ?>
                                        </ul>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs-12 right-post-slider">
                            <div class="row">
                                <?php foreach ($projects as $key => $project):
                                    if ($key && $key > 0 && $key < 5) : ?>
                                        <div class="grid little-post apartment col-lg-6 col-md-6  col-sm-12 col-xs-12">
                                            <a title="<?= Html::encode($project->getName()) ?>"
                                               href="<?= $project->getUrl() ?>">
                                                <img src="<?= $project->getModelImage() ?>"
                                                     alt="<?= Html::encode($project->getName()) ?> ">
                                                <?php if (isDesktop()): ?>
                                                    <?php if ($project->free_count == 0): ?>
                                                        <span class="sold-icon"><?php echo trans('words', 'Sold')?></span>
                                                    <?php endif; ?>
                                                    <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                                    <span class="description"><?= $project->getLocationStr() ?><?= $project->getLocationTwoStr() ? ' / ' : '' ?></span>
                                                    <span class="description-2"><?= $project->getLocationTwoStr() ?></span>
                                                <?php else: ?>
                                                    <div class="grid-title">
                                                        <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                                        <span class="first-title"><?= $project->getLocationStr() ?><?= $project->getLocationTwoStr() ? ' / ' : '' ?></span>
                                                        <span class="description"><?= $project->getLocationTwoStr() ?></span>
                                                    </div>
                                                    <div class="share-icon">
                                                        <a href="#" data-url="<?= $project->getUrl() ?>"><img
                                                                    src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                                    alt="share"></a>
                                                    </div>
                                                    <div class="cat-text">
                                                        <span><?= trans('words', 'Available Apartments') ?></span>
                                                    </div>
                                                    <ul class="icon-list-slider">
                                                        <?= $this->render('//site/_project_side', ['model' => $project, 'withValue' => true]) ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>

                        <?php foreach ($projects as $key => $project):
                            if ($key && $key > 4) : ?>
                                <div class="grid little-post apartment col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                    <a title="<?= Html::encode($project->getName()) ?>"
                                       href="<?= $project->getUrl() ?>">
                                        <img src="<?= $project->getModelImage() ?>"
                                             alt="<?= Html::encode($project->getName()) ?> ">
                                        <?php if (isDesktop()): ?>
                                            <?php if ($project->free_count == 0): ?>
                                                <span class="sold-icon"><?php echo trans('words', 'Sold')?></span>
                                            <?php endif; ?>
                                            <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                            <span class="description"><?= $project->getLocationStr() ?><?= $project->getLocationTwoStr() ? ' / ' : '' ?></span>
                                            <span class="description-2"><?= $project->getLocationTwoStr() ?></span>
                                        <?php else: ?>
                                            <div class="grid-title">
                                                <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                                <span class="first-title"><?= $project->getLocationStr() ?><?= $project->getLocationTwoStr() ? ' / ' : '' ?></span>
                                                <span class="description"><?= $project->getLocationTwoStr() ?></span>
                                            </div>
                                            <div class="share-icon">
                                                <a href="#" data-url="<?= $project->getUrl() ?>"><img
                                                            src="<?= $this->theme->baseUrl . '/images/share.svg' ?>"
                                                            alt="share"></a>
                                            </div>
                                            <div class="cat-text">
                                                <span><?= trans('words', 'Available Apartments') ?></span>
                                            </div>
                                            <ul class="icon-list-slider">
                                                <?= $this->render('//site/_project_side', ['model' => $project, 'withValue' => true]) ?>
                                            </ul>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            <?php endif;
                        endforeach; ?>
                    </div>
                </div>
                <div class="button-more">
                    <button type="button"
                            class="btn btn-primary section-button"><?= trans('words', 'View More') ?></button>
                </div>
            </div>

            <?php if (!isDesktop()): ?>
                <div class="container-fluid">
                    <div class="back-button">
                        <a href="<?= Url::to(['/']) ?>">
                            <p><strong><?= trans('words', 'Back') ?></strong></br>
                                <?= trans('words', 'Available Apartments') ?></p>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>

