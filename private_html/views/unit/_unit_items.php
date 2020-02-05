<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$baseUrl = $this->theme->baseUrl;
?>
<?php if (isset($sold) && $sold): ?>
    <div class="item item-1">
        <p class="item-1"><?= $model->getName() ?></p>
        <p class="item-1"><?= $model->area_size ?> <?= trans('words', 'Meters') ?></p>
    </div>
    <div class="item item-2">
        <i class="svg-icon-bold-floor-w"></i>
        <span class="item-2"><?= $model->getFloorNumberStr() ?></span>
    </div>
    <div class="item item-3">
        <i class="svg-icon-bold-rooms-w"></i>
        <span class="item-2"><?= $model->getBedRoomStr(true) ?></span>
    </div>
    <div class="item item-4">
        <i class="svg-icon-bold-toilet-w"></i>
        <span class="item-2"><?= $model->getToiletStr() ?></span>
    </div>
    <div class="item item-5">
        <i class="svg-icon-bold-master-w"></i>
        <span class="item-2"><?= $model->getBathRoomStr(true) ?></span>
    </div>
    <div class="item item-6">
        <i class="svg-icon-bold-heating-system-w"></i>
        <span class="item-2"><?= $model->getListValueStr('heating_system') ?></span>
    </div>
    <div class="item item-7">
        <i class="svg-icon-bold-cooling-system-w"></i>
        <span class="item-2"><?= $model->getListValueStr('cooling_system') ?></span>
    </div>
    <div class="item item-8">
        <i class="svg-icon-bold-furnished-w"></i>
<!--        <span class="item-2">--><?//= $model->getRadiatorStr(true) ?><!--</span>-->
    </div>
    <div class="item item-9">
        <i class="svg-icon-bold-parking-w"></i>
        <span class="item-2"><?= $model->getParkingStr(true) ?></span>
    </div>

<?php else: ?>
    <div class="item item-1">
        <p class="item-1"><?= $model->getName() ?></p>
        <p class="item-1"><?= $model->area_size ?> <?= trans('words', 'Meters') ?></p>
    </div>
    <div class="item item-2">
        <i class="svg-icon-bold-floor"></i>
        <span class="item-2"><?= $model->getFloorNumberStr() ?></span>
    </div>
    <div class="item item-3">
        <i class="svg-icon-bold-rooms"></i>
        <span class="item-2"><?= $model->getBedRoomStr(true) ?></span>
    </div>
    <div class="item item-4">
        <i class="svg-icon-bold-toilet"></i>
        <span class="item-2"><?= $model->getToiletStr() ?></span>
    </div>
    <div class="item item-5">
        <i class="svg-icon-bold-master"></i>
        <span class="item-2"><?= $model->getBathRoomStr(true) ?></span>
    </div>
    <div class="item item-6">
        <i class="svg-icon-bold-heating-system"></i>
        <span class="item-2"><?= $model->getListValueStr('heating_system') ?></span>
    </div>
    <div class="item item-7">
        <i class="svg-icon-bold-cooling-system"></i>
        <span class="item-2"><?= $model->getListValueStr('cooling_system') ?></span>
    </div>
    <div class="item item-8">
        <i class="svg-icon-bold-furnished"></i>
<!--        <span class="item-2">--><?//= $model->getRadiatorStr(true) ?><!--</span>-->
    </div>
    <div class="item item-9">
        <i class="svg-icon-bold-parking"></i>
        <span class="item-2"><?= $model->getParkingStr(true) ?></span>
    </div>
<?php endif;