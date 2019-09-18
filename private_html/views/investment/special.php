<?php

/* @var $this yii\web\View */

$baseUrl = $this->theme->baseUrl;

?>
<div class="overly">
    <div class="item unit">
        <p class="title-1">220</p>
        <p class="title-2"><?= trans('words','Metr') ?></p>
    </div>
    <div class="item item-1">
        <img src="<?= $baseUrl ?>./images/item-1-w.png" alt="item-1">
    </div>
    <div class="item item-2">
        <img src="<?= $baseUrl ?>./images/item-2-w.png" alt="item-2">
    </div>
    <div class="item item-3">
        <img src="<?= $baseUrl ?>./images/item-3-w.png" alt="item-3">
    </div>
    <div class="item item-4">
        <img src="<?= $baseUrl ?>./images/item-4-w.png" alt="item-4">
    </div>
    <div class="item item-5">
        <img src="<?= $baseUrl ?>./images/item-5-w.png" alt="item-5">
    </div>
    <div class="item item-6">
        <img src="<?= $baseUrl ?>./images/item-6-w.png" alt="item-6">
    </div>
    <div class="item item-7">
        <img src="<?= $baseUrl ?>./images/item-7-w.png" alt="item-7">
    </div>
    <div class="item item-8">
        <img src="<?= $baseUrl ?>./images/item-8-w.png" alt="item-8">
    </div>
</div>
<section class="full-slide">
    <div class="container-fluid">
        <div class="row">
            <div class="bg-slide">
                <div class="bg-logo-slider">
                </div>
                <div class="center-title">
                    <h1 class="center-text">Al-Ghadir</h1>
                    <h2 class="center-text">Residential Complex</h2>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <ul class="icon-list-slider">
                            <div class="item item-1">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-7.png" alt="item-7">
                                </div>
                            </div>
                            <div class="item item-2">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-4.png" alt="item-3">
                                </div>
                            </div>
                            <div class="item item-3">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-6.png" alt="item-6">
                                </div>
                            </div>
                            <div class="item item-4">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-5.png" alt="item-4">
                                </div>
                            </div>
                            <div class="item center-icon">
                                <div class="inner">
                                    <p class="title-center-icon-1">240</p>
                                    <p class="title-center-icon-2">Meter</p>
                                </div>
                            </div>
                            <div class="item item-5">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-2.png" alt="item-2">
                                </div>
                            </div>
                            <div class="item item-6">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-9.png" alt="item-9">
                                </div>
                            </div>
                            <div class="item item-7">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-3.png" alt="item-3">
                                </div>
                            </div>
                            <div class="item item-8">
                                <div class="inner">
                                    <img src="<?= $baseUrl ?>./images/item-10.png" alt="item-10">
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="slide-2">
    <div class="slide-title">
        <div class="title-left">
            <img src="<?= $baseUrl ?>./images/apartment-icon.png" alt="investment-icon">
            <h2 class="slide"><strong><?= trans('words','available') ?> </strong> <?= trans('words','investments') ?></h2>
        </div>
    </div>
    <div class="center-title">
        <h2 class="center-text"><strong><?= trans('words','Building') ?></strong><?= trans('words','facades') ?></h2>
        <h3 class="center-text">3 <?= trans('words','faces have') ?></h3>
    </div>
    <div class="picture-slide-1">
        <img src="<?= $baseUrl ?>./images/picture-post.png" alt="item-10">
    </div>
    <div class="picture-slide-2">
        <img src="<?= $baseUrl ?>./images/picture-post-1.jpg" alt="item-10">
    </div>
    <div class="picture-slide-3">
        <img src="<?= $baseUrl ?>./images/picture-post-2.jpg" alt="item-10">
    </div>
    <div class="picture-slide-4">
        <img src="<?= $baseUrl ?>./images/picture-post-3.jpg" alt="item-10">
    </div>
</section>
<section class="slide-3">
    <div class="container-fluid">
        <div class="row">
            <div class="slide-title">
                <div class="title-right">
                    <p class="slide"><strong><?= trans('words','Building') ?> </strong>
                        <?= trans('words','access') ?></br>
                        <?= trans('words','Near you') ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/imam-reza.png" alt="imam-reza">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access">IMAM REZA shrine</h3>
                        <p class="desc-building-access">
                            <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/shoping.png" alt="shoping">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','shopping') ?></h3>
                        <p class="desc-building-access">CITY CENTER - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            OFOGH - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            REFAH - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/hospital.png" alt="hospital">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','hospital') ?></h3>
                        <p class="desc-building-access">imam reza - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            samen - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            iranian - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/metro.png" alt="metro">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','metro') ?></h3>
                        <p class="desc-building-access"><?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2 col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/laundry.png" alt="laundry">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','LAUNDRY') ?></h3>
                        <p class="desc-building-access"><?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/airport.png" alt="airport">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','airport') ?></h3>
                        <p class="desc-building-access">imam reza international airport - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/resturant.png" alt="resturant">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','RESTURANT') ?></h3>
                        <p class="desc-building-access">
                            BOOF FAST FOOD - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            KARIMI RESTURANT - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            ATAWITCH FAST FOOD - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2  col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/bank.png" alt="bank">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','bank') ?></h3>
                        <p class="desc-building-access">
                            saman - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            meli - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></br>
                            melat - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 building-access">
                <div class="row">
                    <div class="col-lg-2 col-md-2 thumb">
                        <img class="img-building-access" src="<?= $baseUrl ?>./images/gas.png" alt="gas">
                    </div>
                    <div class="col-lg-10  col-md-10 right">
                        <h3 class="title-building-access"><?= trans('words','gas / oil') ?></h3>
                        <p class="desc-building-access">
                            petro oil - <?= trans('words','About') ?> 3 km <?= trans('words','distance') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="slide-4">
    <div class="content">
        <div class="container-fluid">
            <div class="row available">
                <div class="available-left-title col-lg-3 col-md-12 col-sm-12 ">
                    <div class="title-left">
                        <p class="slide"><strong><?= trans('words','Current status') ?></strong>
                            <br> <?= trans('words','of the UNIT') ?> 1</p>
                    </div>
                    <img src="<?= $baseUrl ?>./images/door-icon.png" alt="door">
                    <div  class="title-unit">
                        <p><span class="green"><strong><?= trans('words','unit') ?> 1</span><?= trans('words','available') ?></strong></p>
                        <p><?= trans('words','from') ?> 8 <?= trans('words','unit') ?> / <?= trans('words','ON FLOOR') ?> 2</p>
                    </div>
                    <div  class="desc-unit">
                        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
                <div class="available-right-title col-lg-9 col-md-12 col-sm-12 ">
                    <div class="item-inner">
                        <div class="items">
                            <div class="item item-1">
                                <p class="item-1"><?= trans('words','unit') ?> 1</p>
                                <p class="item-1">220 <?= trans('words','Metr') ?></p>
                            </div>
                            <div class="item item-2">
                                <img src="<?= $baseUrl ?>./images/item-2.png" alt="item-2">
                                <span class="item-2"><?= trans('words','on floor') ?> 2</span>
                            </div>
                            <div class="item item-3">
                                <img src="<?= $baseUrl ?>./images/item-3.png" alt="item-3">
                                <span class="item-2"><?= trans('words','have') ?> 3 <?= trans('words','rooms') ?></span>
                            </div>
                            <div class="item item-4">
                                <img src="<?= $baseUrl ?>./images/item-4.png" alt="item-4">
                                <span class="item-2"><?= trans('words','have') ?> 3 <?= trans('words','air conditions') ?></span>
                            </div>
                            <div class="item item-5">
                                <img src="<?= $baseUrl ?>./images/item-5.png" alt="item-5">
                                <span class="item-2"><?= trans('words','have') ?> 4 <?= trans('words','wc') ?></span>
                            </div>
                            <div class="item item-6">
                                <img src="<?= $baseUrl ?>./images/item-6.png" alt="item-6">
                                <span class="item-2"><?= trans('words','have') ?> 2 <?= trans('words','seprat') ?> <?= trans('words','bathroom') ?></span>
                            </div>
                            <div class="item item-7">
                                <img src="<?= $baseUrl ?>./images/item-7.png" alt="item-7">
                                <span class="item-2"><?= trans('words','have') ?> 1 <?= trans('words','parking') ?></span>
                            </div>
                            <div class="item item-8">
                                <img src="<?= $baseUrl ?>./images/item-8.png" alt="item-8">
                                <span class="item-2"><?= trans('words','have') ?> 5 <?= trans('words','radiator') ?></span>
                            </div>
                        </div>
                        <div class="item-list">
                            <table class="item-list-view">
                                <tbody>
                                <tr>
                                    <td><?= trans('words','Foundation') ?></td>
                                    <td>155 M</td>
                                    <td><?= trans('words','Water Score') ?></td>
                                    <td><?= trans('words','has it') ?></td>
                                    <td><?= trans('words','Number') ?> <?= trans('words','of floors') ?></td>
                                    <td>4</td>
                                    <td>Terrace</td>
                                    <td>1</td>
                                </tr>
                                <tr>
                                    <td><?= trans('words','Number') ?> of Sleep</td>
                                    <td>3</td>
                                    <td><?= trans('words','parking') ?></td>
                                    <td>1</td>
                                    <td>Property direction</td>
                                    <td>South</td>
                                    <td>Elevator</td>
                                    <td>has it</td>
                                </tr>
                                <tr>
                                    <td><?= trans('words','Number') ?> of units</td>
                                    <td>2</td>
                                    <td>Store</td>
                                    <td>has it</td>
                                    <td>Age of the building</td>
                                    <td>Newcomer</td>
                                    <td>Split</td>
                                    <td>has it</td>
                                </tr>
                                <tr>
                                    <td>View</td>
                                    <td>Rock</td>
                                    <td>Floor heating</td>
                                    <td>has it</td>
                                    <td>Condition</td>
                                    <td>Discharge</td>
                                </tr>
                                <tr>
                                    <td>type of Document</td>
                                    <td>threshold</td>
                                    <td>IPhone Video</td>
                                    <td>has it</td>
                                    <td>user</td>
                                    <td>Residential</td>
                                </tr>
                                <tr>
                                    <td><?= trans('words','Number') ?> of assignments</td>
                                    <td>2</td>
                                    <td>Elevator</td>
                                    <td>has it</td>
                                    <td>Diorra</td>
                                    <td>Paper and color</td>
                                </tr>
                                <tr>
                                    <td>Floor</td>
                                    <td>ceramic</td>
                                    <td>Terrace</td>
                                    <td>has it</td>
                                    <td>Gas points</td>
                                    <td>Independent</td>
                                </tr>
                                <tr>
                                    <td>Cabinets</td>
                                    <td>Glassware</td>
                                    <td>Floor</td>
                                    <td>2</td>
                                    <td>Electricity rating</td>
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
<section class="order-post">
    <div class="container-fluid">
        <div class="row">
            <div class="title-order-post">
                <h2 id="txt-order-post">
                    <strong><?= trans('words','مرتبط') ?> <?= trans('words','projects') ?></strong>
                </h2>
            </div>
            <div id="order-post" class="carousel slide col-lg-12 col-md-12" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="posts">
                            <div class="row">
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-1.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-2.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="posts">
                            <div class="row">
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-2.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-1.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3 col-md-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>./images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#order-post" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#order-post" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
    </div>
</section>
