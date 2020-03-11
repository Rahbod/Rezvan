<?php

use app\controllers\ApartmentController;
use app\controllers\InvestmentController;
use app\models\projects\Investment;
use yii\web\View;

/** @var View $this */
/** @var Investment $model */

$baseUrl = $this->theme->baseUrl;
?>
<div class="fade show">
    <div class="overly d-none">
        <?= $this->render('//site/_project_side', compact('model')) ?>
    </div>
    <?php if ($pdf_url = $model->getPdfUrl(InvestmentController::$pdfDir)): ?>
        <div class="download">
            <a href="<?= $pdf_url ?>">
                <p><?= trans('words', 'Download As<br><strong>PDF</strong>') ?></p>
            </a>
        </div>
    <?php endif; ?>
</div>
<?= $model->render($this) ?>

