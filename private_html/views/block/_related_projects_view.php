<?php
/** @var $this View */
/** @var $block Banner */

/** @var $projects Apartment[] */
/** @var $apartment Apartment */

use app\controllers\ApartmentController;
use app\models\blocks\Banner;
use app\models\projects\Apartment;
use yii\web\View;

$baseUrl = alias('@web').'/'.ApartmentController::$imgDir.'/';
?>
<?php if ($projects): ?>
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
                        <?php for ($i = 0; $i <= count($projects); $i = $i + 4): ?>
                            <div class="carousel-item active">
                                <div class="posts">
                                    <div class="row">
                                        <?php for ($j = $i; $j <=4; $j++): $apartment = $projects[$j];?>
                                            <div class="grid col-lg-3">
                                                <div class="img">
                                                    <a href="<?= $apartment->getUrl() ?>">
                                                        <img src="<?= $baseUrl.$apartment->image ?>" alt="<?= $apartment->getName() ?>">
                                                    </a>
                                                </div>
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