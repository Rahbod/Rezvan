<?php
/** @var $this View */

/** @var $block Image */

use app\controllers\BlockController;
use app\models\blocks\Banner;
use app\models\blocks\Image;
use yii\helpers\Html;
use yii\web\View;

$path = alias('@webroot') . DIRECTORY_SEPARATOR . BlockController::$imgDir . DIRECTORY_SEPARATOR . $block->image;
$url = request()->getBaseUrl() . '/' . BlockController::$imgDir . '/' . $block->image;
if ($block->image && is_file($path)):
    ?>
    <section class="slide-2">
        <div class="picture-slide-1">
            <img src="<?= $url ?>" alt="<?= Html::encode($block->name) ?>">
        </div>
    </section>
<?php
endif;