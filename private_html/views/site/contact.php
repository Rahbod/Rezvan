<?php

/* @var $this yii\web\View */

/* @var $model ContactForm */

use app\components\customWidgets\CustomActiveForm;
use app\components\FormRendererTrait;
use app\models\ContactForm;
use yii\helpers\Html;
use yii\helpers\Url;


$this->registerJs("
    $('#request-verifycode-image').trigger('click');
");

?>

<section class="main-submit">
    <?php if (isDesktop()): ?>
        <div class="slide-title">
            <div class="title-left">
                <i class="svg-icon-contact-w"></i>
                <div class="text">
                    <h2 class="slide"><strong><?= trans('words', 'CONTACT US') ?></strong></h2>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="title-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="title">
                        <div class="text-title">
                            <h1><?= trans('words', 'CONTACT US') ?></h1>
                            <span><?= trans('words', 'CONTACT US') ?></span>
                        </div>
                        <div class="share-icon">
                            <a href="#"><img src="<?= $this->theme->baseUrl ?>/images/share.png" alt="share"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="main-section-page container-fluid">
        <div class="register-text row">
            <div class="col-lg-6 top-section">
                <?php if (isDesktop()): ?>
                    <h2><?= trans('words', '<strong>CONTACT</strong> US') ?></h2>
                <?php endif; ?>
                <p><?= trans('words', 'contact_us_text') ?></p>
            </div>

            <?php $form = CustomActiveForm::begin([
                'id' => 'page-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'validateOnSubmit' => true,
                'options' => ['class' => 'w-100']
            ]); ?>
            <div class="col-lg-12 center-section"><?= $this->render('//layouts/_flash_message') ?></div>
            <div class="col-lg-12 bottom-section">
                <div class="back-general-post massage row">
                    <?= $model->formRenderer($form, '{field}', 'col-lg-3') ?>
                    <?php if (isDesktop()): ?>
                        <?= $this->render('//layouts/_socials') ?>
                    <?php endif; ?>
                </div>
                <div class="row flex-end">
                    <div class="buttons">
                        <div class="captcha">
                            <?= $form->field($model, 'verifyCode')->widget(\app\components\customWidgets\CustomCaptcha::className(), [
                                'captchaAction' => ['/site/captcha'],
                                'template' => '{image}{input}',
                                'linkOptions' => ['label' => trans('words', 'CAPTCHA'), 'class' => 'btn btn-primary capatcha-button'],
                                'options' => [
                                    'class' => 'input',
                                    'placeholder' => trans('words', 'Verify Code'),
                                    'tabindex' => ++FormRendererTrait::$tabindex,
                                    'autocomplete' => 'off'
                                ],
                            ])->label(false)->hint(false) ?>
                        </div>
                        <div class="submit">
                            <?= Html::submitButton(trans('words', 'Submit'), ['class' => 'btn btn-primary submit-button']) ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php CustomActiveForm::end(); ?>
        </div>

        <?php if (!isDesktop()): ?>
            <div class="container-fluid">
                <div class="back-button">
                    <a href="<?= Url::to(['/']) ?>">
                        <p><strong><?= trans('words', 'Back') ?></strong></br>
                            <?= trans('words', 'Available Apartments') ?></p>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>
</section>