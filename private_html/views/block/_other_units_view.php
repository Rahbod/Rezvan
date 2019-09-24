<?php
/** @var $this View */

/** @var $block OtherUnits */
/** @var $units Unit[] */

use app\models\blocks\OtherUnits;
use app\models\Unit;
use yii\web\View; ?>
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
                                            <div class="grid col-lg-3">
                                                <div class="img">
                                                    <a title="<?= $unit->getName() ?>" href="<?= $unit->getUrl() ?>">
                                                        <?= $unit->getName() ?>
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
