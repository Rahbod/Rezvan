<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$baseUrl = $this->theme->baseUrl;
?>
<?php if (isDesktop()): ?>
    <table class="item-list-view">
        <tbody>
        <tr>
            <td><?= trans('words', 'Foundation') ?></td>
            <td><?= $model->area_size ?> <?= trans('words', 'Meters') ?></td>

            <td><?= trans('words', 'Floor number') ?></td>
            <td><?= $model->getFloorNumberStr() ?></td>

            <td><?= trans('words', 'wc') ?></td>
            <td><?= $model->getWcStr() ?></td>

            <td><?= trans('words', 'Gas point') ?></td>
            <td><?= $model->getGasPointStr() ?></td>
        </tr>
        <tr>
            <td><?= trans('words', 'Surface') ?></td>
            <td><?= $model->getSurfaceStr() ?></td>

            <td><?= trans('words', 'Bed room') ?></td>
            <td><?= $model->getBedRoomStr() ?></td>

            <td><?= trans('words', 'Parking') ?></td>
            <td><?= $model->getParkingStr() ?></td>

            <td><?= trans('words', 'Power point') ?></td>
            <td><?= $model->getPowerPointStr() ?></td>
        </tr>
        <tr>
            <td><?= trans('words', 'Cabinets') ?></td>
            <td><?= $model->getCabinetsStr() ?></td>

            <td><?= trans('words', 'Master bed room') ?></td>
            <td><?= $model->getMasterBedRoomStr() ?></td>

            <td><?= trans('words', 'Elevator') ?></td>
            <td><?= $model->getElevatorStr() ?></td>

            <td><?= trans('words', 'Water point') ?></td>
            <td><?= $model->getWaterPointStr() ?></td>
        </tr>
        <tr>
            <td><?= trans('words', 'Wall') ?></td>
            <td><?= $model->getWallStr() ?></td>

            <td><?= trans('words', 'Toilet') ?></td>
            <td><?= $model->getToiletStr() ?></td>

            <td><?= trans('words', 'Warehouse') ?></td>
            <td><?= $model->getWarehouseStr() ?></td>

            <td><?= trans('words', 'Telephone point') ?></td>
            <td><?= $model->getTelephonePointStr() ?></td>
        </tr>
        <tr>
            <td><?= trans('words', 'Heating system') ?></td>
            <td><?= $model->getHeating_systemStr() ?></td>

            <td><?= trans('words', 'Bath room') ?></td>
            <td><?= $model->getBathRoomStr() ?></td>

            <td><?= trans('words', 'Terrace') ?></td>
            <td><?= $model->getTerraceStr() ?></td>

            <td><?= trans('words', 'IPhone Video') ?></td>
            <td><?= $model->getIPhoneStr() ?></td>
        </tr>
        <tr>
            <td><?= trans('words', 'Cooling system') ?></td>
            <td><?= $model->getCooling_systemStr() ?></td>
        </tr>
        </tbody>
    </table>
<?php else: ?>
    <div class="item-list-view">
        <div class="container-fluid">
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Foundation') ?></div>
                        <div class="col-8"><?= $model->area_size ?> <?= trans('words', 'Meters') ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'wc') ?></div>
                        <div class="col-8"><?= $model->getWcStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Surface') ?></div>
                        <div class="col-8"><?= $model->getSurfaceStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Bed room') ?></div>
                        <div class="col-8"><?= $model->getBedRoomStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Parking') ?></div>
                        <div class="col-8"><?= $model->getParkingStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Cabinets') ?></div>
                        <div class="col-8"><?= $model->getCabinetsStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Master bed room') ?></div>
                        <div class="col-8"><?= $model->getMasterBedRoomStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Wall') ?></div>
                        <div class="col-8"><?= $model->getWallStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Toilet') ?></div>
                        <div class="col-8"><?= $model->getToiletStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Heating system') ?></div>
                        <div class="col-8"><?= $model->getHeating_systemStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Bath room') ?></div>
                        <div class="col-8"><?= $model->getBathRoomStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-4"><?= trans('words', 'Cooling system') ?></div>
                        <div class="col-8"><?= $model->getCooling_systemStr() ?></div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Gas point') ?></div>
                        <div class="col-2"><?= $model->getGasPointStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Power point') ?></div>
                        <div class="col-2"><?= $model->getPowerPointStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Elevator') ?></div>
                        <div class="col-2"><?= $model->getElevatorStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Water point') ?></div>
                        <div class="col-2"><?= $model->getWaterPointStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Warehouse') ?></div>
                        <div class="col-2"><?= $model->getWarehouseStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Telephone point') ?></div>
                        <div class="col-2"><?= $model->getTelephonePointStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'Terrace') ?></div>
                        <div class="col-2"><?= $model->getTerraceStr() ?></div>
                    </div>
                    <div class="row">
                        <div class="col-10"><?= trans('words', 'IPhone Video') ?></div>
                        <div class="col-2"><?= $model->getIPhoneStr() ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>