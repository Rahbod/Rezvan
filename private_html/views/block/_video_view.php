<?php
/** @var $this View */

/** @var $block Video */

use app\controllers\BlockController;
use app\models\blocks\Banner;
use app\models\blocks\Video;
use yii\helpers\Html;
use yii\web\View;

?>
<section class="slide-4">
    <div class="picture-slide-1">
        <?php $block->getContent() ?>
    </div>
</section>
