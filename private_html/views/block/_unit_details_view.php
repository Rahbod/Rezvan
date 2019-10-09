<?php
/** @var $this View */

/** @var $block UnitDetails */

use app\models\blocks\UnitDetails;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
$unit = $block->getUnit();
?>
<section class="slide-4" id="unit-section">
    <div class="content">
        <div class="container-fluid">
            <div class="row available">
                <div class="available-left-title col-lg-4">
                    <div class="title-left">
                        <p class="slide"><?= trans('words','<strong>Current status</strong><br> of the UNIT {unit_number}',['unit_number' => $unit->unit_number]) ?></p>
                    </div>
                    <img src="<?= $baseUrl .'/images/door-icon.png' ?>" alt="door">
                    <div class="title-unit">
                        <div class="title-unit">
                            <p><?= trans('words', '<span class="green"><strong>unit {unit_number}</strong></span><strong>available</strong>', ['unit_number' => $unit->unit_number]) ?></p>
                            <p><?= trans('words', 'from {all_units} units / ON FLOOR {floor}', ['all_units' => $unit->number_of_units,'floor'=>$unit->floor_number]) ?> </p>
                        </div>

<!--                        <p><span class="green"><strong>unit 1</strong></span><strong>available</strong></p>-->
<!--                        <p>from 8 unit / ON FLOOR 2</p>-->
                    </div>
                    <div class="desc-unit">
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="available-right-title col-lg-8 col-md-12 col-sm-12 ">
                    <div class="item-inner">
                        <div class="items">
                            <div class="item item-1">
                                <p class="item-1">UNIT <?= $unit->unit_number ?></p>
                                <p class="item-1"><?= $unit->area_size ?> Metr</p>
                            </div>
                            <div class="item item-2">
                                <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                <span class="item-2">on floor <?= $unit->floor_number ?></span>
                            </div>
                            <div class="item item-3">
                                <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                <span class="item-2">have <?= $unit->bed_room ?> rooms</span>
                            </div>
                            <div class="item item-4">
                                <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-4">
                                <span class="item-2">have <?= $unit->air_conditioner ?> air conditions</span>
                            </div>
                            <div class="item item-5">
                                <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-5">
                                <span class="item-2">have <?= $unit->wc ?> wc</span>
                            </div>
                            <div class="item item-6">
                                <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                <span class="item-2">have <?= $unit->bath_room ?> seprat bathroom</span>
                            </div>
                            <div class="item item-7">
                                <img src="<?= $baseUrl ?>/images/item-7.png" alt="item-7">
                                <span class="item-2">have <?= $unit->parking ?> parking</span>
                            </div>
                            <div class="item item-8">
                                <img src="<?= $baseUrl ?>/images/item-8.png" alt="item-8">
                                <span class="item-2">have <?= $unit->radiator ?> Radiator</span>
                            </div>
                        </div>
                        <div class="item-list">
                            <table class="item-list-view">
                                <tbody>
                                <tr>
                                    <td><?= trans('words', 'Foundation') ?></td>
                                    <td><?= $unit->area_size ?> M</td>

                                    <td><?= trans('words', 'Water score') ?></td>
                                    <td>has or not</td>

                                    <td><?= trans('words', 'Number of floors') ?></td>
                                    <td><?= $unit->number_of_floors ?></td>

                                    <td><?= trans('words', 'Terrace') ?></td>
                                    <td><?= $unit->terrace ?></td>
                                </tr>
                                <tr>
                                    <td><?= trans('words', 'Number of sleep') ?></td>
                                    <td><?= $unit->getBedRoomStr() ?></td>

                                    <td><?= trans('words', 'Parking') ?></td>
                                    <td><?= $unit->getParkingStr() ?></td>

                                    <td><?= trans('words', 'Property direction') ?></td>
                                    <td>???</td>

                                    <td><?= trans('words', 'Elevator') ?></td>
                                    <td>has or not</td>
                                </tr>
                                <tr>
                                    <td><?= trans('words', 'Number of units') ?></td>
                                    <td><?= $unit->number_of_units ?></td>

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
                                    <td><?= $unit->getParkingStr() ?></td>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>