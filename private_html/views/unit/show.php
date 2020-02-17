<?php

use app\controllers\ApartmentController;
use app\controllers\UnitController;
use app\models\projects\Apartment;
use app\models\Unit;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var Unit $model */

$baseUrl = $this->theme->baseUrl;

$this->context->breadcrumbs = [
    trans('words', 'Available Apartments'),
    $model->getName(),
    $model->getSubtitleStr(),
];
?>
<div class="fade show">
    <div class="overly">
        <div class="item unit">
            <p class="title-1"><?= $model->area_size ?></p>
            <p class="title-2"><?= trans('words', 'Meters') ?></p>
        </div>
        <div class="item item-1">
            <i class="svg-icon-bold-floor-w"></i>
        </div>
        <div class="item item-2">
            <i class="svg-icon-bold-rooms-w"></i>
        </div>
        <div class="item item-3">
            <i class="svg-icon-bold-toilet-w"></i>
        </div>
        <div class="item item-4">
            <i class="svg-icon-bold-master-w"></i>
        </div>
        <div class="item item-5">
            <i class="svg-icon-bold-heating-system-w"></i>
        </div>
        <div class="item item-6">
            <i class="svg-icon-bold-cooling-system-w"></i>
        </div>
        <div class="item item-7">
            <i class="svg-icon-bold-furnished-w"></i>
        </div>
        <div class="item item-8">
            <i class="svg-icon-bold-parking-w"></i>
        </div>
    </div>
    <?php if ($pdf_url = $model->getPdfUrl(UnitController::$pdfDir)): ?>
        <div class="download">
            <a href="<?= $pdf_url ?>">
                <p><?= trans('words', 'Download As<br><strong>PDF</strong>') ?></p>
            </a>
        </div>
    <?php endif; ?>
</div>
<?= $model->render($this) ?>


<?php if (!isDesktop()): ?>
    <section>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="back-button">
                    <a href="<?= Url::to(['/apartment/show', 'id' => $model->itemID]) ?>">
                        <p><strong><?= trans('words', 'Back') ?></strong></br>
                            <?= trans('words', 'Available Apartments') ?></p>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

