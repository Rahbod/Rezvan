<?php

use yii\helpers\Html;
use app\components\customWidgets\CustomActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\projects\Apartment */
/* @var $form app\components\customWidgets\CustomActiveForm */
?>
<?php $form = CustomActiveForm::begin([
    'id' => 'apartment-form',
    //'action' => $model->isNewRecord ? ['create'] : ['update', 'id' => $model->id],
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'validateOnSubmit' => true,
]); ?>
    <div class="m-portlet__body">
        <div class="m-form__content"><?= $this->render('//layouts/_flash_message') ?></div>

        <?= $model->formRenderer($form, '{field}', 'formAttributes'); ?>

    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <?= Html::submitButton(Yii::t('words', 'Save'), ['class' => 'btn btn-success']) ?>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </div>
<?php CustomActiveForm::end(); ?>
