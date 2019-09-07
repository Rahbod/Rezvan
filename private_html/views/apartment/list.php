<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$baseUrl = $this->theme->baseUrl;

?>
<section class="full-slide">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-left">
                    <img src="<?= $baseUrl ?>. /images/apartment-icon-w.png" alt="apartment-icon">
                    <div class="text">
                        <h2 class="slide"><strong>available </strong> apartment</h2>
                    </div>
                </div>
                <div class="title-right">
                    <p class="slide">
                        <span class="projects"><?php echo count($projects) ?> projects / </span>
                        <span class="available-project">available<br>
									project </span>
                        <span class="num">7</span>
                    </p>
                </div>
            </div>
            <div class="container-fluid project-list">
                <div class="row">
                    <div class="grid first-post col-lg-6">
                        <img src="<?= $projects[0]->getImage() ?>"
                             alt="<?= Html::encode($projects[0]->name) ?>">

                        <a title="<?= Html::encode($projects[0]->name) ?>"
                           href="<?= \yii\helpers\Url::to('project/show/' . $projects[0]->id) ?>">
                            <h2 class="item-title"><?= Html::encode($projects[0]->name) ?></h2>
                            <span class="first-title"><?= $projects[0]->subtitle ?></span>
                        </a>
                        <span class="description"><?= Html::encode($projects[0]->name) ?></span>
                    </div>

                    <div class="col-lg-6 right-post-slider">
                        <div class="row">
                            <?php foreach ($projects as $key => $project):
                                if ($key && $key > 0 && $key < 5) : ?>
                                    <div class="grid col-lg-6">
                                        <img src="<?= $project->getImage() ?>"
                                             alt="<?= Html::encode($project->name) ?> ">
                                        <a title="<?= Html::encode($project->name) ?>"
                                           href="<?= \yii\helpers\Url::to('project/show/' . $project->id) ?>">
                                            <h2 class="item-title"><?= Html::encode($project->name) ?></h2>
                                        </a>
                                        <span class="description"><?= $project->location ?></span>
                                    </div>
                                <?php endif; endforeach; ?>

                        </div>
                    </div>

                    <?php foreach ($projects as $key => $project):
                        if ($key && $key > 5) : ?>
                            <div class="grid col-lg-3">
                                <img src="<?= $project->getImage() ?>"
                                     alt="<?= Html::encode($project->name) ?> ">
                                <a title="<?= Html::encode($project->name) ?>"
                                   href="<?= \yii\helpers\Url::to('project/show/' . $project->id) ?>">
                                    <h2 class="item-title"><?= Html::encode($project->name) ?></h2>
                                </a>
                                <span class="description"><?= $project->location ?></span>
                            </div>
                        <?php endif; endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>

