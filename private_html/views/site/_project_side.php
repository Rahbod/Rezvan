<?php
/** @var $this View */
/** @var $model Project */

/** @var $withValue bool */

use app\models\Project;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
$withValue = isset($withValue) ? $withValue : false;
?>
<?php if (!$withValue): ?>
    <div class="item unit">
        <p class="title-1"><?= $model->area_size ?></p>
        <p class="title-2"><?= trans('words', 'Meters') ?></p>
    </div>
    <?php if ($model->hasField('elevator')): ?>
        <div class="item item-1">
            <i class="svg-icon-elevator"></i>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('floor_number')): ?>
        <div class="item item-2">
            <i class="svg-icon-floors"></i>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('unit_count')): ?>
        <div class="item item-3">
            <i class="svg-icon-units"></i>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('parking')): ?>
        <div class="item item-4">
            <i class="svg-icon-parking"></i>
        </div>
    <?php endif; ?>
<!--    --><?php //if ($model->hasField('fire_alarm')): ?>
        <div class="item item-5">
            <i class="svg-icon-fire-alarm"></i>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('lobby')): ?>
        <div class="item item-6">
            <i class="svg-icon-lobby"></i>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('guard')): ?>
        <div class="item item-7">
            <i class="svg-icon-guard"></i>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('cctv')): ?>
        <div class="item item-8">
            <i class="svg-icon-cctv"></i>
        </div>
<!--    --><?php //endif; ?>
<?php else: ?>
    <?php if ($model->hasField('elevator')): ?>
        <div class="item item-1">
            <div class="inner">
                <p class="item-text-hover"><?= $model->elevator ?></p>
                <i class="svg-icon-elevator"></i>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('floor_number')): ?>
        <div class="item item-2">
            <div class="inner">
                <p class="item-text-hover"><?= $model->floor_number ?></p>
                <i class="svg-icon-floors"></i>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('unit_count')): ?>
        <div class="item item-3">
            <div class="inner">
                <p class="item-text-hover"><?= $model->unit_count ?></p>
                <i class="svg-icon-units"></i>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($model->hasField('parking')): ?>
        <div class="item item-4">
            <div class="inner">
                <p class="item-text-hover"><?= $model->parking ?></p>
                <i class="svg-icon-parking"></i>
            </div>
        </div>
    <?php endif; ?>
    <div class="item center-icon">
        <div class="inner">
            <p class="title-center-icon-1"><?= $model->area_size ?></p>
            <p class="title-center-icon-2"><?= trans('words', 'Meters') ?></p>
        </div>
    </div>
<!--    --><?php //if ($model->hasField('fire_alarm')): ?>
        <div class="item item-5">
            <div class="inner">
                <p class="item-text-hover"><?= $model->fire_alarm ?></p>
                <i class="svg-icon-fire-alarm"></i>
            </div>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('lobby')): ?>
        <div class="item item-6">
            <div class="inner">
                <p class="item-text-hover"><?= $model->lobby ?></p>
                <i class="svg-icon-lobby"></i>
            </div>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('guard')): ?>
        <div class="item item-7">
            <div class="inner">
                <p class="item-text-hover"><?= $model->guard ?></p>
                <i class="svg-icon-guard"></i>
            </div>
        </div>
<!--    --><?php //endif; ?>
<!--    --><?php //if ($model->hasField('cctv')): ?>
        <div class="item item-8">
            <div class="inner">
                <p class="item-text-hover"><?= $model->cctv ?></p>
                <i class="svg-icon-cctv"></i>
            </div>
        </div>
<!--    --><?php //endif; ?>
<?php endif; ?>