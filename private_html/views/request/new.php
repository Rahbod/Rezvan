<?php

/* @var $this yii\web\View */

use app\components\customWidgets\CustomActiveForm;
use app\components\FormRendererTrait;
use yii\helpers\Html;



?>

<section class="main-submit">
    <div class="title-page">
        <div class="container-fluid">
            <div class="row">
                <div class="title">
                    <i></i>
                    <h1><strong><?= trans('words', 'REGISTER YOUR REQUEST') ?></strong></h1>
                </div>
            </div>
        </div>
    </div>
    <div class="main-section-page container-fluid">
        <div class="register-text row">
            <div class="col-lg-6 top-section">
                <h2><?= trans('words', '<strong>REGISTER</strong> YOUR PROPERTY DETAILS') ?></h2>
                <p><?= trans('words', 'register_your_property_details_text') ?></p>
            </div>

            <?php $form = CustomActiveForm::begin([
                'id' => 'page-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'validateOnSubmit' => true,
            ]); ?>
            <div class="col-lg-12 center-section"><?= $this->render('//layouts/_flash_message') ?></div>
            <div class="col-lg-12 center-section">
                <h2><?= trans('words', '<strong>GENERAL</strong> PROPERTY SPECIFICATIONS') ?></h2>
                <div class="back-general-post switch row">
                    <?= $model->formRenderer($form,'{field}', 'col-lg-3', 'formGeneralAttributes') ?>

                    <div class="col-lg-3">
                        <p>CLOSET
                            <input class="container_toggle" type="checkbox" id="switch-10" name="mode">
                            <label for="switch-10">Toggle</label></p>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 bottom-section">
                <h2><strong>Contact</strong> Information</h2>
                <div class="back-general-post massage row">
                    <?= $model->formRenderer($form,'{field}', 'col-lg-3') ?>
                </div>
                <div class="buttons">
                    <div class="captcha">
                        <?= $form->field($model, 'verifyCode')->widget(\app\components\customWidgets\CustomCaptcha::className(), [
                            'captchaAction' => ['/user/captcha'],
                            'template' => '{image}{url}{input}',
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
            <?php CustomActiveForm::end(); ?>
        </div>
    </div>
</section>

