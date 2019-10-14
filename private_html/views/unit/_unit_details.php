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

        <td><?= trans('words', 'Water point') ?></td>
        <td><?= $model->getWaterPointStr() ?></td>

        <td><?= trans('words', 'Number of floors') ?></td>
        <td><?= $model->getNumberOfFloorsStr() ?></td>

        <td><?= trans('words', 'Terrace') ?></td>
        <td><?= $model->getTerraceStr() ?></td>
    </tr>
    <tr>
        <td><?= trans('words', 'Number of sleep') ?></td>
        <td><?= $model->getBedRoomStr() ?></td>

        <td><?= trans('words', 'Parking') ?></td>
        <td><?= $model->getParkingStr() ?></td>

        <td><?= trans('words', 'Elevator') ?></td>
        <td><?= $model->getElevatorStr() ?></td>
    </tr>
    <tr>
        <td><?= trans('words', 'Number of units') ?></td>
        <td><?= $model->getNumberOfUnitsStr() ?></td>

        <td><?= trans('words', 'Store') ?></td>
        <td>has or not</td>

        <td><?= trans('words', 'Age of the building') ?></td>
        <td>Newcomer</td>
        <td><?= trans('words', 'Split') ?></td>
        <td>has or not</td>
    </tr>
    <tr>
        <td><?= trans('words', 'View') ?></td>
        <td>Rock</td>

        <td><?= trans('words', 'Parking') ?></td>
        <td><?= $model->getParkingStr() ?></td>

        <td><?= trans('words', 'Floor heating') ?></td>
        <td>has or not</td>

        <td><?= trans('words', 'Condition') ?></td>
        <td>Discharge</td>
    </tr>
    <tr>
        <td><?= trans('words', 'type of Document') ?></td>
        <td>threshold</td>
        <td><?= trans('words', 'IPhone Video') ?></td>
        <td>has or not</td>
        <td><?= trans('words', 'user') ?></td>
        <td>Residential</td>
    </tr>
    <tr>
        <td><?= trans('words', 'Number of assignments') ?></td>
        <td>2</td>
        <td><?= trans('words', 'Elevator') ?></td>
        <td>has or not</td>
        <td><?= trans('words', 'Diorra') ?></td>
        <td>Paper and color</td>
    </tr>
    <tr>
        <td><?= trans('words', 'Floor') ?></td>
        <td>ceramic</td>
        <td><?= trans('words', 'Terrace') ?></td>
        <td>has or not</td>
        <td><?= trans('words', 'Gas points') ?></td>
        <td>Independent</td>
    </tr>
    <tr>
        <td><?= trans('words', 'Cabinets') ?></td>
        <td>Glassware</td>
        <td><?= trans('words', 'Floor') ?></td>
        <td>2</td>
        <td><?= trans('words', 'Electricity rating') ?></td>
        <td>Independent</td>
    </tr>
    </tbody>
</table>