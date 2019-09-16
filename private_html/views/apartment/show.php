<?php

use app\models\projects\Apartment;
use yii\web\View;

/** @var View $this */
/** @var Apartment $model */

?>

<div class="overly">
    <div class="item unit">
        <p class="title-1"><?= $model->area_size ?></p>
        <p class="title-2"><?= trans('words', 'Meter') ?>></p>
    </div>
    <div class="item item-1">
        <img src="images/item-1-w.png" alt="item-1">
    </div>
    <div class="item item-2">
        <img src="images/item-2-w.png" alt="item-2">
    </div>
    <div class="item item-3">
        <img src="images/item-3-w.png" alt="item-3">
    </div>
    <div class="item item-4">
        <img src="images/item-4-w.png" alt="item-4">
    </div>
    <div class="item item-5">
        <img src="images/item-5-w.png" alt="item-5">
    </div>
    <div class="item item-6">
        <img src="images/item-6-w.png" alt="item-6">
    </div>
    <div class="item item-7">
        <img src="images/item-7-w.png" alt="item-7">
    </div>
    <div class="item item-8">
        <img src="images/item-8-w.png" alt="item-8">
    </div>
</div>
<?= $model->render($this) ?>

