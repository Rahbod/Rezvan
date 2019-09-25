<?php
/** @var $this View */
/** @var $block Banner */

/** @var $projects Apartment[] */

/** @var $apartment Apartment */

use app\controllers\ApartmentController;
use app\models\blocks\Banner;
use app\models\projects\Apartment;
use yii\web\View;

$baseUrl = alias('@web') . '/' . ApartmentController::$imgDir . '/';
?>
<?php if ($projects): ?>
    <section class="order-post">
        <div class="container-fluid">
            <div class="row">
                <div class="title-order-post">
                    <h2 id="txt-order-post">
                        <strong><?= trans('words', 'other Projects') ?></strong>
                    </h2>
                </div>
                <div id="order-post" class="carousel slide col-lg-12" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i <= count($projects); $i = $i + 4): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <?php for ($j = $i; $j < $i+ 4; $j++):
                                            if (!isset($projects[$j]))
                                                break;
                                            $apartment = $projects[$j]; ?>
                                            <div class="grid little-post col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                                <img src="<?= $baseUrl . $apartment->image ?>"
                                                     alt="<?= $apartment->getName() ?>">
                                                <a href="<?= $apartment->getUrl() ?>">
                                                    <h2 class="item-title"><?= $apartment->getName() ?></h2>
                                                </a>
                                                <span class="description"><?= $apartment->getSubtitleStr() ?></span>
                                            </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>
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
<?php endif;