<?php
/** @var $this View */
/** @var $model Unit */

/** @var $withValue bool */

use app\models\Project;
use app\models\Unit;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
$withValue = isset($withValue) ? $withValue : false;
?>
<?php if (!$withValue): ?>
    <div class="item unit">
        <p class="title-1"><?= $model->area_size ?></p>
        <p class="title-2"><?= trans('words', 'Meters') ?></p>
    </div>
    <?php if ($model->hasField('floor_number')): ?>
        <div class="item item-2">
            <i class="svg-icon-floors"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('unit_number')): ?>
        <div class="item item-1">
            <i class="svg-icon-unit-number"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('toilet')): ?>
        <div class="item item-3">
            <i class="svg-icon-toilet"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('bath_room')): ?>
        <div class="item item-4">
            <i class="svg-icon-bathroom"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('heating_system')): ?>
        <div class="item item-5">
            <i class="svg-icon-heating-system"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('cooling_system')): ?>
        <div class="item item-6">
            <i class="svg-icon-cooling-system"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('guard')): ?>
        <div class="item item-7">
            <i class="svg-icon-guard"></i>
        </div><?php endif; ?>
    <?php if ($model->hasField('iPhone_video')): ?>
        <div class="item item-8">
            <i class="svg-icon-cctv"></i>
        </div><?php endif; ?>
<?php else: ?>
    <?php if ($model->hasField('floor_number')): ?>
        <div class="item item-2">
        <div class="inner">
            <p class="item-text-hover"><?= $model->floor_number ?></p>
            <i class="svg-icon-floors"></i>
        </div>
        </div><?php endif; ?>
    <?php if ($model->hasField('unit_number')): ?>
        <div class="item item-1">
        <div class="inner">
            <p class="item-text-hover"><?= $model->unit_number ?></p>
            <i class="svg-icon-unit-number"></i>
        </div>
        </div><?php endif; ?>
    <?php if ($model->hasField('toilet')): ?>
        <div class="item item-3">
        <div class="inner">
            <p class="item-text-hover"><?= $model->toilet ?></p>
            <i class="svg-icon-toilet"></i>
        </div>
        </div><?php endif; ?>
    <?php if ($model->hasField('bath_room')): ?>
        <div class="item item-4">
        <div class="inner">
            <p class="item-text-hover"><?= $model->bath_room ?></p>
            <i class="svg-icon-bathroom"></i>
        </div>
        </div><?php endif; ?>
    <div class="item center-icon">
        <div class="inner">
            <p class="title-center-icon-1"><?= $model->area_size ?></p>
            <p class="title-center-icon-2"><?= trans('words', 'Meters') ?></p>
        </div>
    </div>
    <?php if ($model->hasField('heating_system')): ?>
        <div class="item item-5">
        <div class="inner">
<!--            <p class="item-text-hover">--><?//= $model->getListValueStr('heating_system') ?><!--</p>-->
            <i class="svg-icon-heating-system"></i>
        </div>
        </div><?php endif; ?>
    <?php if ($model->hasField('cooling_system')): ?>
        <div class="item item-6">
        <div class="inner">
<!--            <p class="item-text-hover">--><?//= $model->cooling-system ?><!--</p>-->
            <i class="svg-icon-cooling-system"></i>
        </div>
        </div><?php endif; ?>
<!--    --><?php //if ($model->hasField('guard')): ?>
        <div class="item item-7">
        <div class="inner">
<!--            <p class="item-text-hover">--><?//= $model->guard ?><!--</p>-->
            <i class="svg-icon-guard"></i>
        </div>
        </div>
    <?php //endif; ?>
    <?php if ($model->hasField('iPhone_video')): ?>
        <div class="item item-8">
        <div class="inner">
<!--            <p class="item-text-hover">--><?//= $model->cctv ?><!--</p>-->
            <i class="svg-icon-cctv"></i>
        </div>
        </div><?php endif; ?>
<?php endif; ?>