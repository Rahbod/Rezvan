<?php

use app\controllers\ApartmentController;
use app\controllers\ConstructionController;
use app\models\projects\OtherConstruction;
use yii\web\View;

/** @var View $this */
/** @var OtherConstruction $model */

$baseUrl = $this->theme->baseUrl;
?>
<div class="fade show">
    <div class="overly">
        <?= $this->render('//site/_project_side', compact('model')) ?>
    </div>
    <?php if ($pdf_url = $model->getPdfUrl(ConstructionController::$pdfDir)): ?>
        <div class="download">
            <a href="<?= $pdf_url ?>">
                <p><?= trans('words', 'Download As<br><strong>PDF</strong>') ?></p>
            </a>
        </div>
    <?php endif; ?>
</div>
<?= $model->render($this) ?>

