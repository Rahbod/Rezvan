<?php

use app\models\projects\OtherConstruction;
use yii\web\View;

/** @var View $this */
/** @var OtherConstruction $model */

$baseUrl = $this->theme->baseUrl;
?>

<div class="overly">
    <div class="item unit">
        <p class="title-1"><?= $model->area_size ?></p>
        <p class="title-2"><?= trans('words', 'Meter') ?>></p>
    </div>
    <div class="item item-1">
        <img src="<?= $baseUrl ?>/images/item-1-w.png" alt="item-1">
    </div>
    <div class="item item-2">
        <img src="<?= $baseUrl ?>/images/item-2-w.png" alt="item-2">
    </div>
    <div class="item item-3">
        <img src="<?= $baseUrl ?>/images/item-3-w.png" alt="item-3">
    </div>
    <div class="item item-4">
        <img src="<?= $baseUrl ?>/images/item-4-w.png" alt="item-4">
    </div>
    <div class="item item-5">
        <img src="<?= $baseUrl ?>/images/item-5-w.png" alt="item-5">
    </div>
    <div class="item item-6">
        <img src="<?= $baseUrl ?>/images/item-6-w.png" alt="item-6">
    </div>
    <div class="item item-7">
        <img src="<?= $baseUrl ?>/images/item-7-w.png" alt="item-7">
    </div>
    <div class="item item-8">
        <img src="<?= $baseUrl ?>/images/item-8-w.png" alt="item-8">
    </div>
</div>
<?= $model->render($this) ?>

<section class="order-post">
    <div class="container-fluid">
        <div class="row">
            <div class="title-order-post">
                <h2 id="txt-order-post">
                    <strong><?= trans('words','other {type}',['type'=>'apartment']) ?></strong>
                </h2>
            </div>
            <div id="order-post" class="carousel slide col-lg-12 col-md-12" data-ride="carousel">
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

                </div>
                <a class="carousel-control-prev" href="#order-post" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#order-post" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</section>
