<?php
/** @var $this View */
/** @var $block Banner */

/** @var $project Project */

use app\controllers\BlockController;
use app\models\blocks\Banner;
use app\models\Project;
use app\models\Unit;
use yii\web\View;

$baseUrl = $this->theme->baseUrl;
$imageUrl = request()->getBaseUrl() . '/' . BlockController::$imgDir . '/' . $block->image;
?>
<section class="full-slide" style="background: url('<?= $imageUrl ?>') no-repeat center bottom;background-size: cover">
    <div class="container-fluid">
        <div class="row">
            <div class="bg-slide">
                <div class="bg-logo-slider">
                </div>
                <?php if (isDesktop()): ?>
                    <div class="center-title">
                        <h1 class="center-text"><?= $project->unit ? $project->unit->getName() : $project->getName() ?></h1>
                        <h2 class="center-text"><?= $project->getSubtitleStr() ?></h2>
                    </div>
                <?php else: ?>
                    <div class="center-title">
                        <h1 class="center-text"><?= $project->unit ? $project->unit->getName() : $project->getName() ?></h1>

                        <h2 class="center-text"><?= $project->getSubtitleStr() ?></h2>
                    </div>
                    <div class="share-icon">
                        <a href="#"><img src="<?= $this->theme->baseUrl . '/images/share.png' ?>" alt="share"></a>
                    </div>
                <?php endif; ?>
                <?php if ($project->type != Project::TYPE_INVESTMENT && get_class($project) != Unit::className()): ?>
                    <div class="container-fluid">
                        <div class="row">
                            <ul class="icon-list-slider">
                                <?= $this->render('//site/_project_side', ['model' => $project, 'withValue' => true]) ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>