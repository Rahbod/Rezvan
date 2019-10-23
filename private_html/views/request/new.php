<?php

/* @var $this yii\web\View */

use app\components\customWidgets\CustomActiveForm;
use yii\helpers\Html;



?>

<?php $form = CustomActiveForm::begin([
    'id' => 'page-form',
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'validateOnSubmit' => true,
]); ?>
<div class="m-portlet__body">
    <div class="m-form__content"><?= $this->render('//layouts/_flash_message') ?></div>

    <div class="row">
        <?= $model->formRenderer($form,'{field}', 'col-sm-4') ?>
        <?= $model->formRenderer($form,'{field}', 'col-sm-4', 'formGeneralAttributes') ?>
    </div>

</div>
<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions">
        <?= Html::submitButton(trans('words', 'Save'), ['class' => 'btn btn-success']) ?>
        <button type="reset" class="btn btn-secondary"><?= trans('words', 'Cancel')?></button>
    </div>
</div>
<?php CustomActiveForm::end(); ?>

