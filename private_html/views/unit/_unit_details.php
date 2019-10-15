<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$baseUrl = $this->theme->baseUrl;
?>
<table class="item-list-view">
    <tbody>
    <tr>
        <td><?= trans('words', 'Foundation') ?></td>
        <td><?= $model->area_size ?> <?= trans('words', 'Meter') ?></td>

        <td><?= trans('words', 'Floor number') ?></td>
        <td><?= $model->getFloorNumberStr() ?></td>

        <td><?= trans('words', 'Bed room') ?></td>
        <td><?= $model->getBedRoomStr() ?></td>

        <td><?= trans('words', 'Master bed room') ?></td>
        <td><?= $model->getMasterBedRoomStr() ?></td>
    </tr>
    <tr>
        <td><?= trans('words', 'Surface') ?></td>
        <td><?= $model->getSurfaceStr() ?></td>

        <td><?= trans('words', 'Parking') ?></td>
        <td><?= $model->getParkingStr() ?></td>

        <td><?= trans('words', 'Warehouse') ?></td>
        <td><?= $model->getWarehouseStr() ?></td>

        <td><?= trans('words', 'Elevator') ?></td>
        <td><?= $model->getElevatorStr() ?></td>
    </tr>
    <tr>
        <td><?= trans('words', 'Heating system') ?></td>
        <td><?= $model->getHeating_systemStr() ?></td>

        <td><?= trans('words', 'Cooling system') ?></td>
        <td><?= $model->getCooling_systemStr() ?></td>

        <td><?= trans('words', 'Wall') ?></td>
        <td><?= $model->getWallStr() ?></td>

        <td><?= trans('words', 'Terrace') ?></td>
        <td><?= $model->getTerraceStr() ?></td>
    </tr>
    <tr>
        <td><?= trans('words', 'Water point') ?></td>
        <td><?= $model->getWaterPointStr() ?></td>

        <td><?= trans('words', 'Number of floors') ?></td>
        <td><?= $model->getNumberOfFloorsStr() ?></td>

        <td><?= trans('words', 'Terrace') ?></td>
        <td><?= $model->getTerraceStr() ?></td>
    </tr>
    </tbody>
</table>