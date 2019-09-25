<?php
/** @var $this View */

/** @var $block Units */

/** @var $project Project */

use app\models\blocks\Units;
use app\models\Project;
use app\models\Unit;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;

$sold = $project->getUnits()->andWhere([Unit::columnGetString('sold') => 1])->all();
$free = $project->getUnits()->andWhere([Unit::columnGetString('sold') => 0])->all();
?>
<section class="slide-4">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-left">
                    <p class="slide"><?= trans('words', '<strong>Current status</strong></br> of the building') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row available">
                <div class="available-left-title col-lg-3">
                    <img src="<?= $baseUrl ?>/images/door-icon.png" alt="door">
                    <div class="title-unit">
                        <p><?= trans('words', '<span class="green"><strong>{count} unit </span>free </strong>', ['count' => count($free)]) ?></p>
                        <p><?= trans('words', 'from {total_count} unit', ['total_count' => count($sold) + count($free)]) ?> </p>
                    </div>
                    <div class="desc-unit">
                        <p>
                            <?= $project->subtitle ?>
                        </p>
                    </div>
                </div>
                <div class="available-right-title col-lg-9">
                    <div class="item-inner row">
                        <?php foreach ($free as $item): ?>

                            <div class="items col-lg-10">
                                <div class="item item-1">
                                    <p class="item-1">UNIT <?= $item->unit_number ?></p>
                                    <p class="item-1"><?= $item->area_size ?> Metr</p>
                                </div>
                                <div class="item item-2">
                                    <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                    <span class="item-2">on floor <?= $item->floor_number ?></span>
                                </div>
                                <div class="item item-3">
                                    <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                    <span class="item-2">have <?= $item->bed_room ?> rooms</span>
                                </div>
                                <div class="item item-4">
                                    <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-4">
                                    <span class="item-2">have <?= $item->air_conditioner ?> air conditions</span>
                                </div>
                                <div class="item item-5">
                                    <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-5">
                                    <span class="item-2">have <?= $item->wc ?> wc</span>
                                </div>
                                <div class="item item-6">
                                    <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                    <span class="item-2">have <?= $item->bath_room ?> seprat bathroom</span>
                                </div>
                                <div class="item item-7">
                                    <img src="<?= $baseUrl ?>/images/item-7.png" alt="item-7">
                                    <span class="item-2">have <?= $item->parking ?> parking</span>
                                </div>
                                <div class="item item-8">
                                    <img src="<?= $baseUrl ?>/images/item-8.png" alt="item-8">
                                    <span class="item-2">have <?= $item->radiator ?> Radiator</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <p class="free-text">FREE</p>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row sold">
                <div class="sold-left-title col-lg-3">

                    <p class="sold-title">
                        <?= trans('words', '<span class="red"><strong>{count} unit</strong></span> SOLD', ['count' => count($sold)]) ?>
                    </p>
                </div>
                <div class="sold-right-title col-lg-9">
                    <div class="item-inner row">
                        <?php foreach ($sold as $item): ?>
                            <div class="items col-lg-11 collapsible collapsed" data-toggle="collapse"
                                 data-target="#item-1" aria-expanded="false">
                                <div class="item item-1">
                                    <p class="item-1">UNIT <?= $item->unit_number ?></p>
                                    <p class="item-1"><?= $item->area_size ?> Metr</p>
                                </div>
                                <div class="item item-2">
                                    <img src="<?= $baseUrl ?>/images/item-2-l.png" alt="item-2">
                                    <span class="item-2">on floor <?= $item->floor_number ?></span>
                                </div>
                                <div class="item item-3">
                                    <img src="<?= $baseUrl ?>/images/item-3-l.png" alt="item-3">
                                    <span class="item-2">have <?= $item->bed_room ?> rooms</span>
                                </div>
                                <div class="item item-4">
                                    <img src="<?= $baseUrl ?>/images/item-4-l.png" alt="item-4">
                                    <span class="item-2">have <?= $item->air_conditioner ?> air conditions</span>
                                </div>
                                <div class="item item-5">
                                    <img src="<?= $baseUrl ?>/images/item-5-l.png" alt="item-5">
                                    <span class="item-2">have <?= $item->wc ?> wc</span>
                                </div>
                                <div class="item item-6">
                                    <img src="<?= $baseUrl ?>/images/item-6-l.png" alt="item-6">
                                    <span class="item-2">have <?= $item->bath_room ?> seprat bathroom</span>
                                </div>
                                <div class="item item-7">
                                    <img src="<?= $baseUrl ?>/images/item-7-l.png" alt="item-7">
                                    <span class="item-2">have <?= $item->parking ?> parking</span>
                                </div>
                                <div class="item item-8">
                                    <img src="<?= $baseUrl ?>/images/item-8-l.png" alt="item-8">
                                    <span class="item-2">have <?= $item->radiator ?> Radiator</span>
                                </div>
                                <div id="item-1" class="item-list w-100 collapse" style="">
                                    <table class="item-list-view">
                                        <tbody>
                                        <tr>
                                            <td><?= trans('words', 'Foundation') ?></td>
                                            <td><?= $item->area_size ?> M</td>

                                            <td><?= trans('words', 'Water score') ?></td>
                                            <td>has or not</td>

                                            <td><?= trans('words', 'Number of floors') ?></td>
                                            <td><?= $item->number_of_floors ?></td>

                                            <td><?= trans('words', 'Terrace') ?></td>
                                            <td><?= $item->terrace ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= trans('words', 'Number of sleep') ?></td>
                                            <td><?= $item->getBedRoomStr() ?></td>

                                            <td><?= trans('words', 'Parking') ?></td>
                                            <td><?= $item->getParkingStr() ?></td>

                                            <td><?= trans('words', 'Property direction') ?></td>
                                            <td>???</td>

                                            <td><?= trans('words', 'Elevator') ?></td>
                                            <td>has or not</td>
                                        </tr>
                                        <tr>
                                            <td><?= trans('words', 'Number of units') ?></td>
                                            <td><?= $item->number_of_units ?></td>

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
                                            <td><?= $item->getParkingStr() ?></td>

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
                            <div class="col-lg-1">
                                <p class="free-text">Sold</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
