<?php

/* @var $this yii\web\View */
/* @var $project Apartment */
/* @var $free Unit[] */
/* @var $sold Unit[] */

$baseUrl = $this->theme->baseUrl;

use app\controllers\ApartmentController;
use app\models\projects\Apartment;
use app\models\Unit;

$sold = $project->getUnits()->andWhere([Unit::columnGetString('sold') => 1])->all();
$free = $project->getUnits()->andWhere([Unit::columnGetString('sold') => 0])->all();
?>
<section class="full-slide">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-left">
                    <img src="<?= $baseUrl ?>/images/apartment-icon-w.png" alt="apartment-icon">
                    <div class="text">
                        <h2 class="slide"><?= trans('words', '<strong>available </strong> apartment') ?></h2><br>
                        <span class="slide"><strong><?= $project->getName() . ' ' . $project->getSubtitleStr() ?></strong></span>
                    </div>
                </div>
                <div class="title-right">
                    <p class="slide">
                        <span class="projects"><?= trans('words', '{count} unit', ['count' => $project->getUnitCount()]) ?> / </span>
                        <span class="available-project"><?= trans('words', 'available<br>unit') ?></span>
                        <span class="num"><?= $project->getUnitCount(true) ?></span>
                    </p>
                </div>
            </div>
            <div class="bg-slide" <?= $project->banner && is_file(alias('@webroot') . DIRECTORY_SEPARATOR . ApartmentController::$imgDir . DIRECTORY_SEPARATOR . $project->banner) ? 'style="background: url(\'' . alias('@web') . '/' . ApartmentController::$imgDir . '/' . $project->banner . '\') no-repeat center bottom;background-size:cover"' : '' ?>>
                <div class="bg-logo-slider">
                </div>
                <div class="center-title">
                    <h1 class="center-text"><?= $project->getName() ?></h1>
                    <h2 class="center-text"><?= $project->getSubtitleStr() ?></h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <ul class="icon-list-slider">
                            <div class="item item-1">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-7.png" alt="item-7">
                                </div>
                            </div>
                            <div class="item item-2">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-3">
                                </div>
                            </div>
                            <div class="item item-3">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                </div>
                            </div>
                            <div class="item item-4">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-4">
                                </div>
                            </div>
                            <div class="item center-icon">
                                <div class="inner">
                                    <p class="title-center-icon-1"><?= $project->area_size ?></p>
                                    <p class="title-center-icon-2"><?= trans('words', 'Meter') ?></p>
                                </div>
                            </div>
                            <div class="item item-5">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                </div>
                            </div>
                            <div class="item item-6">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-9.png" alt="item-9">
                                </div>
                            </div>
                            <div class="item item-7">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                </div>
                            </div>
                            <div class="item item-8">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>/images/item-10.png" alt="item-10">
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <?php if ($pdf_url = $project->getPdfUrl(ApartmentController::$pdfDir)): ?>
                    <div class="download">
                        <a href="<?= $pdf_url ?>">
                            <p><?= trans('words', 'Download As<br><strong>PDF</strong>') ?></p>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="content">
        <?php if ($free): ?>
            <div class="container">
                <div class="row">
                    <div class="available">
                        <div class="title">
                            <h2 class="available-title"><?= trans('words', '<strong>available</strong> for sel') ?></h2>
                        </div>
                        <div class="item-inner">
                            <?php foreach ($free as $unit): ?>
                                <div class="items">
                                    <div class="item item-1">
                                        <p class="item-1"><?= $unit->getName() ?></p>
                                        <p class="item-1"><?= $unit->area_size ?> <?= trans('words', 'Meter') ?></p>
                                    </div>
                                    <div class="item item-2">
                                        <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                        <span class="item-2"><?= $unit->getFloorNumberStr() ?></span>
                                    </div>
                                    <div class="item item-3">
                                        <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                        <span class="item-2"><?= $unit->getBedRoomStr() ?></span>
                                    </div>
                                    <div class="item item-4">
                                        <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-4">
                                        <span class="item-2"><?= $unit->getAirConditionerStr() ?></span>
                                    </div>
                                    <div class="item item-5">
                                        <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-5">
                                        <span class="item-2"><?= $unit->getWcStr() ?></span>
                                    </div>
                                    <div class="item item-6">
                                        <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                        <span class="item-2"><?= $unit->getBathRoomStr() ?></span>
                                    </div>
                                    <div class="item item-7">
                                        <img src="<?= $baseUrl ?>/images/item-7.png" alt="item-7">
                                        <span class="item-2"><?= $unit->getParkingStr() ?></span>
                                    </div>
                                    <div class="item item-8">
                                        <img src="<?= $baseUrl ?>/images/item-8.png" alt="item-8">
                                        <span class="item-2"><?= $unit->getRadiatorStr() ?></span>
                                    </div>
                                    <div class="item link-more">
                                        <a href="<?= $unit->getUrl() ?>"
                                           class="more"><?= trans('words', 'More ...') ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($sold): ?>
            <div class="container">
                <div class="row">
                    <div class="sold">
                        <div class="title">
                            <h2 class="sold-title"><?= trans('words', '<strong>sold</strong> units')?></h2>
                        </div>
                        <div class="item-inner">
                            <?php foreach ($sold as $unit): ?>
                                <div class="items">
                                    <div class="item item-1">
                                        <p class="item-1"><?= $unit->getName() ?></p>
                                        <p class="item-1"><?= $unit->area_size ?> <?= trans('words', 'Meter') ?></p>
                                    </div>
                                    <div class="item item-2">
                                        <img src="<?= $baseUrl ?>/images/item-2-l.png" alt="item-2">
                                        <span class="item-2"><?= $unit->getFloorNumberStr() ?></span>
                                    </div>
                                    <div class="item item-3">
                                        <img src="<?= $baseUrl ?>/images/item-3-l.png" alt="item-3">
                                        <span class="item-2"><?= $unit->getBedRoomStr() ?></span>
                                    </div>
                                    <div class="item item-4">
                                        <img src="<?= $baseUrl ?>/images/item-4-l.png" alt="item-4">
                                        <span class="item-2"><?= $unit->getAirConditionerStr() ?></span>
                                    </div>
                                    <div class="item item-5">
                                        <img src="<?= $baseUrl ?>/images/item-5-l.png" alt="item-5">
                                        <span class="item-2"><?= $unit->getWcStr() ?></span>
                                    </div>
                                    <div class="item item-6">
                                        <img src="<?= $baseUrl ?>/images/item-6-l.png" alt="item-6">
                                        <span class="item-2"><?= $unit->getBathRoomStr() ?></span>
                                    </div>
                                    <div class="item item-7">
                                        <img src="<?= $baseUrl ?>/images/item-7-l.png" alt="item-7">
                                        <span class="item-2"><?= $unit->getParkingStr() ?></span>
                                    </div>
                                    <div class="item item-8">
                                        <img src="<?= $baseUrl ?>/images/item-8-l.png" alt="item-8">
                                        <span class="item-2"><?= $unit->getRadiatorStr() ?></span>
                                    </div>
                                    <div class="item link-more">
                                        <a href="<?= $unit->getUrl() ?>"
                                           class="more"><?= trans('words', 'More ...') ?></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

