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
                        <span class="projects">32 projects / </span>
                        <span class="available-project">available<br>
									project </span>
                        <span class="num">7</span>
                    </p>
                </div>
            </div>
            <div class="container-fluid project-list">
                <div class="row">
                    <?php
                    if ($projects):
                        foreach ($projects as $key => $project):
                            if ($key == 0): ?>
                                <div class="grid first-post col-lg-6">
                                    <a title="<?= Html::encode($project->title) ?>"
                                       href="<?= \yii\helpers\Url::to('project/show/' . $project->id) ?>">
                                        <h2 class="item-title"><?= Html::encode($project->title) ?></h2>
                                        <span class="first-title"><?= Html::encode($project->title) ?></span>
                                        <!--                                        <span class="first-title">Residential Complex</span>-->
                                    </a>
                                    <span class="description"><?= Html::encode($project->title) ?></span>
                                </div>

                            <?php elseif ($key > 0 && $key < 5) : ?>
                                <div class="col-lg-6 right-post-slider">
                                    <div class="row">
                                        <div class="grid col-lg-6">
                                            <img src="<?= $project->image ?>"
                                                 alt="<?= Html::encode($project->title) ?> ">
                                            <a title="<?= Html::encode($project->title) ?>"
                                               href="<?= \yii\helpers\Url::to('project/show/' . $project->id) ?>">
                                                <h2 class="item-title"><?= Html::encode($project->title) ?></h2>
                                            </a>
                                            <span class="description"><?= $project->location ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="grid col-lg-3">
                                    <img src="<?= $project->image ?>" alt="<?= Html::encode($project->title) ?> ">
                                    <a title="<?= Html::encode($project->title) ?>"
                                       href="<?= \yii\helpers\Url::to('project/show/' . $project->id) ?>">
                                        <h2 class="item-title"><?= Html::encode($project->title) ?></h2>
                                    </a>
                                    <span class="description"><?= $project->location ?></span>
                                </div>
                            <?php endif; endforeach; endif; ?>

                </div>
            </div>
        </div>
    </div>
</section>

