<?php

/* @var $this yii\web\View */

use app\components\customWidgets\CustomActiveForm;
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
                <h2><?= trans('words', '<b>REGISTER</b> YOUR PROPERTY DETAILS') ?></h2>
                <p><?= trans('words', 'register_your_property_details_text') ?></p>
            </div>

            <?php $form = CustomActiveForm::begin([
                'id' => 'page-form',
                'enableAjaxValidation' => true,
                'enableClientValidation' => true,
                'validateOnSubmit' => true,
            ]); ?>
            <div class="col-lg-12 center-section">
                <div class="alert alert-success">
                    <b>Success</b>
                    <p>Success message</p>
                </div>
                <?= $this->render('//layouts/_flash_message') ?>
            </div>
            <div class="col-lg-12 center-section">
                <h2><?= trans('words', '<b>GENERAL</b> PROPERTY SPECIFICATIONS') ?></h2>
                <div class="back-general-post switch row">
                    <?= $model->formRenderer($form,'{field}', 'col-sm-3', 'formGeneralAttributes') ?>

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
                    <?= $model->formRenderer($form,'{field}', 'col-sm-3') ?>
                    <div class="col-lg-3">
                        <label class="name">First Name And Last Name</label>
                        <input type="text" name="name" id="name" class="input" value="" autocapitalize="off">
                    </div>
                    <div class="col-lg-3">
                        <label class="email">E-Mail</label>
                        <input type="text" name="email" id="email" class="input" value="" autocapitalize="off">
                    </div>
                    <div class="col-lg-3">
                        <label class="mobile-number">Mobile Number</label>
                        <input type="text" name="mobile" id="mobile" class="input" value="" autocapitalize="off">
                    </div>
                    <div class="col-lg-3">
                        <label class="phone-number">Phone Number</label>
                        <input type="text" name="phone" id="phone" class="input" value="" autocapitalize="off">
                    </div>
                    <div class="col-lg-12">
                        <label class="details">More DETAILS</label>
                        <textarea name="your-message" cols="40" rows="10" class="message-input" aria-invalid="false"></textarea>
                    </div>
                </div>
                <div class="buttons">
                    <div class="captcha">
                        <img src="images/captcha.png" alt="captcha">
                        <button type="button" class="btn btn-primary capatcha-button">Captcha</button>
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

