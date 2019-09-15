<?php
/** @var $this View */
/** @var $block Banner */
/** @var $project Project */

use app\models\blocks\Banner;
use app\models\Project;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;

?>
<section class="slide-3">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-right">
                    <p class="slide"><strong>Building </strong> access</br>
                        Near you</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/imam-reza.png" alt="imam-reza">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">IMAM REZA shrine</h3>
                        <p class="desc-building-access">About 3 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/shoping.png" alt="shoping">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">shopping</h3>
                        <p class="desc-building-access">CITY CENTER - About 1 km distance</br>
                            OFOGH - About 2 km distance</br>
                            REFAH - About 4 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/hospital.png" alt="hospital">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">hospital</h3>
                        <p class="desc-building-access">imam reza - About 1 km distance</br>
                            samen - About 2 km distance</br>
                            iranian - About 2 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/metro.png" alt="metro">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">mETRO</h3>
                        <p class="desc-building-access">About 1 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/laundry.png" alt="laundry">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">LAUNDRY</h3>
                        <p class="desc-building-access">About 1 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/airport.png" alt="airport">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">airport</h3>
                        <p class="desc-building-access">imam reza international airport - About 15 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/resturant.png" alt="resturant">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">RESTURANT</h3>
                        <p class="desc-building-access">BOOF FAST FOOD - About 1 km distance</br>
                            KARIMI RESTURANT - About 5 km distance</br>
                            ATAWITCH FAST FOOD - About 6 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/bank.png" alt="bank">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">bank</h3>
                        <p class="desc-building-access">saman - About 1 km distance</br>
                            meli - About 2 km distance</br>
                            melat - About 2 km distance</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 building-access">
                <div class="row">
                    <div class="col-lg-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>/images/gas.png" alt="gas">
                    </div>
                    <div class="col-lg-10 right">
                        <h3 class="title-building-access">gas / oil</h3>
                        <p class="desc-building-access">petro oil - About 3 km distance</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>