<?php
/** @var $this View */

/** @var $block OtherUnits */
/** @var $units Unit[] */

use app\models\blocks\OtherUnits;
use app\models\Unit;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
?>
<?php if ($units): ?>
    <section class="order-post">
        <div class="container-fluid">
            <div class="row">
                <div class="title-order-post">
                    <h2 id="txt-order-post">
                        <strong><?= trans('words', 'other units') ?></strong>
                    </h2>
                </div>
                <div id="order-post" class="carousel slide col-lg-12" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php for ($i = 0; $i <= count($units); $i = $i + 4): ?>
                            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                                <div class="posts">
                                    <div class="row">
                                        <?php for ($j = $i; $j < $i+ 4; $j++):
                                            if (!isset($units[$j]))
                                                break;
                                            $unit = $units[$j]; ?>
                                            <div class="grid little-post col-lg-3 col-md-6  col-sm-12 col-xs-12">
                                                <img src="<?= $unit->getModelImage() ?>" alt="<?= $unit->getName() ?>">
                                                <a href="<?= $unit->getUrl() ?>"><h2 class="item-title"><?= $unit->getName() ?></h2></a>
                                                <span class="description"><?= $unit->getSubtitleStr() ?><?= $unit->getSubtitle2Str()?' / ':'' ?></span>
                                                <span class="description-2"><?= $unit->getSubtitle2Str() ?></span>
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
