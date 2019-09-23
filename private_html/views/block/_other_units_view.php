<?php
/** @var $this View */

/** @var $block OtherUnits */
/** @var $units Unit[] */

use app\models\blocks\OtherUnits;
use app\models\Unit;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
?>
<section class="slide-4">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-left">
                    <p class="slide"><?= trans('words', '<strong>Current status</strong></br> of the building') ?></p>
                </div>
                <div class="title-right">
                    <p class="slide">
                        <a href="#" class="active"><img src="<?= $baseUrl ?>/images/icon-1.png" alt="icon-1"></a>
                        <a href="#"><img src="<?= $baseUrl ?>/images/icon-2.png" alt="icon-2"></a>
                    </p>
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
                        <p><span class="green"><strong>2 unit </span>free </strong></p>
                        <p>from 8 unit </p>
                    </div>
                    <div class="desc-unit">
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="available-right-title col-lg-9">
                    <div class="item-inner row">
                        <div class="items col-lg-10">
                            <div class="item item-1">
                                <p class="item-1">UNIT 1</p>
                                <p class="item-1">220 Metr</p>
                            </div>
                            <div class="item item-2">
                                <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                <span class="item-2">on floor 2</span>
                            </div>
                            <div class="item item-3">
                                <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                <span class="item-2">have 3 rooms</span>
                            </div>
                            <div class="item item-4">
                                <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-4">
                                <span class="item-2">have 3 air conditions</span>
                            </div>
                            <div class="item item-5">
                                <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-5">
                                <span class="item-2">have 4 wc</span>
                            </div>
                            <div class="item item-6">
                                <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                <span class="item-2">have 2 seprat bathroom</span>
                            </div>
                            <div class="item item-7">
                                <img src="<?= $baseUrl ?>/images/item-7.png" alt="item-7">
                                <span class="item-2">have a parking</span>
                            </div>
                            <div class="item item-8">
                                <img src="<?= $baseUrl ?>/images/item-8.png" alt="item-8">
                                <span class="item-2">have 5 Radiator</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <p class="free-text">FREE</p>
                        </div>
                        <div class="items col-lg-10">
                            <div class="item item-1">
                                <p class="item-1">UNIT 2</p>
                                <p class="item-1">220 Metr</p>
                            </div>
                            <div class="item item-2">
                                <img src="<?= $baseUrl ?>/images/item-2.png" alt="item-2">
                                <span class="item-2">on floor 3</span>
                            </div>
                            <div class="item item-3">
                                <img src="<?= $baseUrl ?>/images/item-3.png" alt="item-3">
                                <span class="item-2">have 4 rooms</span>
                            </div>
                            <div class="item item-4">
                                <img src="<?= $baseUrl ?>/images/item-4.png" alt="item-4">
                                <span class="item-2">have 2 Water Cooler</span>
                            </div>
                            <div class="item item-5">
                                <img src="<?= $baseUrl ?>/images/item-5.png" alt="item-5">
                                <span class="item-2">have 2 wc</span>
                            </div>
                            <div class="item item-6">
                                <img src="<?= $baseUrl ?>/images/item-6.png" alt="item-6">
                                <span class="item-2">have 1 seprat bathroom</span>
                            </div>
                            <div class="item item-7">
                                <img src="<?= $baseUrl ?>/images/item-7-l.png" alt="item-7">
                                <span class="item-2">No parking</span>
                            </div>
                            <div class="item item-8">
                                <img src="<?= $baseUrl ?>/images/item-8.png" alt="item-8">
                                <span class="item-2">have 5 Radiator</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <p class="free-text">FREE</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row sold">
                <div class="sold-left-title col-lg-3">
                    <p class="sold-title"><span class="red"><strong>6 unit</strong></span> SOLD</p>
                </div>
                <div class="sold-right-title col-lg-9">
                    <div class="item-inner row">
                        <div class="items col-lg-10">
                            <div class="item item-1">
                                <p class="item-1">UNIT 3</p>
                                <p class="item-1">250 Metr</p>
                            </div>
                            <div class="item item-2">
                                <img src="<?= $baseUrl ?>/images/item-2-l.png" alt="item-2">
                                <span class="item-2">on floor 4</span>
                            </div>
                            <div class="item item-3">
                                <img src="<?= $baseUrl ?>/images/item-3-l.png" alt="item-3">
                                <span class="item-2">have 2 rooms</span>
                            </div>
                            <div class="item item-4">
                                <img src="<?= $baseUrl ?>/images/item-4-l.png" alt="item-4">
                                <span class="item-2">have 3 air conditions</span>
                            </div>
                            <div class="item item-5">
                                <img src="<?= $baseUrl ?>/images/item-5-l.png" alt="item-5">
                                <span class="item-2">have 3 wc</span>
                            </div>
                            <div class="item item-6">
                                <img src="<?= $baseUrl ?>/images/item-6-l.png" alt="item-6">
                                <span class="item-2">have 2 seprat bathroom</span>
                            </div>
                            <div class="item item-7">
                                <img src="<?= $baseUrl ?>/images/item-7-l.png" alt="item-7">
                                <span class="item-2">have a parking</span>
                            </div>
                            <div class="item item-8">
                                <img src="<?= $baseUrl ?>/images/item-8-l.png" alt="item-8">
                                <span class="item-2">have 5 Radiator</span>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <p class="sold-text"> SOLD</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
