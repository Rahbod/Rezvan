<?php
/** @var $this View */

/** @var $block Map */

use app\controllers\BlockController;
use app\models\blocks\Banner;
use app\models\blocks\Map;
use yii\helpers\Html;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
?>
<section class="slide-2">
    <div class="picture-slide-4">
        <a href="<?= $block->location_link ?>"><img src="<?= $baseUrl ?>./images/picture-post-3.jpg"
                                                    alt="<?= $block->name ?>"></a>
    </div>
</section>