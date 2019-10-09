<?php

/* @var $this yii\web\View */
/* @var $availableInvestments Investment[] */

/* @var $projects Investment[] */

use app\models\projects\Investment;
use yii\helpers\Html;
use yii\helpers\Url;

$baseUrl = $this->theme->baseUrl;
$investmentCounts = isset($projects) ? count($projects) : 0;

?>

<?php if (isset($projects)): ?>
    <section class="full-slide">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl ?>/images/apartment-icon-w.png" alt="investment-icon">
                        <div class="text">
                            <h2 class="slide"><?= trans('words', '<strong>available </strong> investment') ?></h2>
                        </div>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                             <span class="projects">
                                <?= trans('words', '{count} projects', ['count' => $investmentCounts]) ?> /
                            </span>
                            <span class="available-project"><?= trans('words', 'available<br>project') ?></span>
                            <span class="num"><?= $availableInvestments ?></span>
                        </p>
                    </div>
                </div>
                <div class="container-fluid project-list">
                    <div class="row">
                        <?php if (isset($projects[0])): ?>
                            <div class="grid first-post col-lg-6">
                                <img src="<?= $projects[0]->getModelImage() ?>"
                                     alt="<?= Html::encode($projects[0]->getName()) ?>">
                                <a title="<?= Html::encode($projects[0]->getName()) ?>"
                                   href="<?= $projects[0]->getUrl() ?>">
                                    <h2 class="item-title"><?= Html::encode($projects[0]->getName()) ?></h2>
                                    <span class="first-title"><?= $projects[0]->getSubtitleStr() ?></span>
                                </a>
                                <span class="description"><?= $projects[0]->getLocationTwoStr() ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="col-lg-6 right-post-slider">
                            <div class="row">
                                <?php foreach ($projects as $key => $project):
                                    if ($key && $key > 0 && $key < 5) : ?>
                                        <div class="grid col-lg-6">
                                            <img src="<?= $project->getModelImage() ?>"
                                                 alt="<?= Html::encode($project->getName()) ?> ">
                                            <a title="<?= Html::encode($project->getName()) ?>"
                                               href="<?= $project->getUrl() ?>">
                                                <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                            </a>
                                            <span class="description"><?= $project->getSubtitleStr() ?><?= $project->getLocationTwoStr() ? ' / ' : '' ?></span>
                                            <span class="description-2"><?= $project->getLocationTwoStr() ?></span>
                                        </div>
                                    <?php endif; endforeach; ?>
                            </div>
                        </div>

                        <?php foreach ($projects as $key => $project):
                            if ($key && $key > 4) : ?>
                                <div class="grid col-lg-3">
                                    <img src="<?= $project->getModelImage() ?>"
                                         alt="<?= Html::encode($project->getName()) ?> ">
                                    <a title="<?= Html::encode($project->getName()) ?>"
                                       href="<?= $project->getUrl() ?>">
                                        <h2 class="item-title"><?= Html::encode($project->getName()) ?></h2>
                                    </a>
                                    <span class="description"><?= $project->getLocationStr() ?></span>
                                </div>
                            <?php endif; endforeach; ?>

                    </div>
                </div>
                <div class="button-more">
                    <button type="button" class="btn btn-primary section-button"><?= trans('words', 'View More') ?></button>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

