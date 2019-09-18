<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\components\Setting;
use yii\helpers\ArrayHelper;
use app\models\ContactForm;
use app\models\Department;
use app\models\Message;

$this->title = trans('words', 'Contact us');
$this->params['breadcrumbs'][] = $this->title;

$baseUrl = $this->theme->baseUrl;
$apartmentCounts = isset($availableApartments) ? count($availableApartments) : 0;
?>
<section class="main-text">
    <div class="title-page">
        <div class="container-fluid">
            <div class="row">
                <div class="title">
                    <h1><strong><?= Html::encode($this->title) ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="main-section-page">
                    <div class="txt-post-page-test">
                        <p><strong>Where does it come from?</strong></p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                            classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a
                            Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure
                            Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the
                            word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from
                            sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                            Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very
                            popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit
                            amet..", comes from a line in section 1.10.32.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="order-post">
    <div class="container-fluid">
        <div class="row">
            <div class="title-order-post">
                <h2 id="txt-order-post">
                    <strong><?= trans('words', 'projects') ?></strong>
                </h2>
            </div>
            <div id="order-post" class="carousel slide col-lg-12" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    for ($i = 0; $i < $apartmentCounts; $i = $i + 3): ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <div class="posts">
                                <div class="row">
                                    <?php
                                    if (!isset($availableApartments[$i])) break;
                                    $apartment = $availableApartments[$i];
                                    ?>
                                    <div class="grid col-lg-4">
                                        <div class="img">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                        </div>
                                    </div>

                                    <?php if (!isset($availableApartments[$i + 1])) break;
                                    $apartment = $availableApartments[$i + 1];
                                    ?>
                                    <div class="grid col-lg-4">
                                        <div class="img">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                        </div>
                                    </div>

                                    <?php if (!isset($availableApartments[$i + 2])) break;
                                    $apartment = $availableApartments[$i + 2];
                                    ?>
                                    <div class="grid col-lg-4">
                                        <div class="img">
                                            <img src="<?= $apartment->getModelImage() ?>"
                                                 alt="<?= Html::encode($apartment->getName()) ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                    <a class="carousel-control-prev" href="#order-post" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#order-post" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>