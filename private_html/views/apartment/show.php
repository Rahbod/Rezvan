<?php

use app\controllers\ApartmentController;
use app\models\Project;
use app\models\projects\Apartment;
use yii\helpers\Url;
use yii\web\View;

/** @var View $this */
/** @var Apartment $model */

$baseUrl = $this->theme->baseUrl;
?>
<div class="fade show">
    <div class="overly">
        <?= $this->render('//site/_project_side', compact('model')) ?>
    </div>
    <?php if ($pdf_url = $model->getPdfUrl(ApartmentController::$pdfDir)): ?>
        <div class="download">
            <a href="<?= $pdf_url ?>">
                <p><?= trans('words', 'Download As<br><strong>PDF</strong>') ?></p>
            </a>
        </div>
    <?php endif; ?>
</div>
<?= $model->render($this) ?>


<?php if ($model->project_type == Project::SINGLE_VIEW && !isDesktop()): ?>
    <section>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="back-button">
                    <a href="<?= Url::to(['/']) ?>">
                        <p><strong><?= trans('words', 'Back') ?></strong></br>
                            <?= trans('words', 'Available Apartments') ?></p>
                    </a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if(!isDesktop()):?>
    <?php if ($pdf_url = $model->getPdfUrl(ApartmentController::$pdfDir)): ?>
        <div class="download">
            <a href="<?= $pdf_url ?>">
                <p>PDF</p>
            </a>
        </div>
    <?php endif; ?>
<?php endif; ?>