<?php


use yii\helpers\Html;
$baseUrl = $this->theme->baseUrl;
?>

<?php if (isset($apartmentProvider)): ?>
    <section class="full-slide">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl ?>. /images/apartment-icon-w.png" alt="apartment-icon">
                        <div class="text">
                            <h2 class="slide"><strong>found </strong> apartment</h2>
                        </div>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="available-project">found<br>
									apartment </span>
                            <span class="num"><?= $apartmentProvider->count ?></span>
                        </p>
                    </div>
                </div>
                <div class="container-fluid project-list">
                    <div class="row">
                        <?php foreach ($apartmentProvider as $key => $project): ?>
                            <div class="grid col-lg-3">
                                <img src="<?= $project->getModelImage() ?>"
                                     alt="<?= Html::encode($project->name) ?> ">
                                <a title="<?= Html::encode($project->name) ?>"
                                   href="<?= Url::to(['/apartment/show/', 'id' => $project->id]) ?>">
                                    <h2 class="item-title"><?= Html::encode($project->name) ?></h2>
                                </a>
                                <span class="description"><?= $project->location ?></span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($investmentProvider)): ?>
    <section class="full-slide">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl ?>. /images/apartment-icon-w.png" alt="apartment-icon">
                        <div class="text">
                            <h2 class="slide"><strong>found </strong> investment opportunities</h2>
                        </div>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="available-project">found<br>
									investment opportunities </span>
                            <span class="num"><?= $investmentProvider->count ?></span>
                        </p>
                    </div>
                </div>
                <div class="container-fluid project-list">
                    <div class="row">
                        <?php foreach ($investmentProvider as $key => $project): ?>
                            <div class="grid col-lg-3">
                                <img src="<?= $project->getModelImage() ?>"
                                     alt="<?= Html::encode($project->name) ?> ">
                                <a title="<?= Html::encode($project->name) ?>"
                                   href="<?= Url::to(['/apartment/show/', 'id' => $project->id]) ?>">
                                    <h2 class="item-title"><?= Html::encode($project->name) ?></h2>
                                </a>
                                <span class="description"><?= $project->location ?></span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php if (isset($constructionProvider)): ?>
    <section class="full-slide">
        <div class="container-fluid">
            <div class="row">
                <div class="slide-title">
                    <div class="title-left">
                        <img src="<?= $baseUrl ?>. /images/apartment-icon-w.png" alt="apartment-icon">
                        <div class="text">
                            <h2 class="slide"><strong>found </strong> other constructions</h2>
                        </div>
                    </div>
                    <div class="title-right">
                        <p class="slide">
                            <span class="available-project">found<br>
									other constructions </span>
                            <span class="num"><?= $constructionProvider->count ?></span>
                        </p>
                    </div>
                </div>
                <div class="container-fluid project-list">
                    <div class="row">
                        <?php foreach ($constructionProvider as $key => $project): ?>
                            <div class="grid col-lg-3">
                                <img src="<?= $project->getModelImage() ?>"
                                     alt="<?= Html::encode($project->name) ?> ">
                                <a title="<?= Html::encode($project->name) ?>"
                                   href="<?= Url::to(['/apartment/show/', 'id' => $project->id]) ?>">
                                    <h2 class="item-title"><?= Html::encode($project->name) ?></h2>
                                </a>
                                <span class="description"><?= $project->location ?></span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
