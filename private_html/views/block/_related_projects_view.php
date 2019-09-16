<?php
/** @var $this View */
/** @var $block Banner */
/** @var $project Project */

use app\models\blocks\Banner;
use app\models\Project;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
?>
<section class="order-post">
    <div class="container-fluid">
        <div class="row">
            <div class="title-order-post">
                <h2 id="txt-order-post">
                    <strong><?= trans('words', 'related projects') ?></strong>
                </h2>
            </div>
            <div id="order-post" class="carousel slide col-lg-12" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="posts">
                            <div class="row">
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-1.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-2.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="posts">
                            <div class="row">
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-3.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-2.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-1.png" alt="Chicago">
                                    </div>
                                </div>
                                <div class="grid col-lg-3">
                                    <div class="img">
                                        <img src="<?= $baseUrl ?>/images/post-3.png" alt="Chicago">
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