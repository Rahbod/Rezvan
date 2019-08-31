<?php

use app\models\Block;
use yii\helpers\Html;
use app\components\customWidgets\CustomActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Block */
/* @var $form app\components\customWidgets\CustomActiveForm */
?>
<?php $form = CustomActiveForm::begin([
    'id' => 'block-form',
    //'action' => $model->isNewRecord ? ['create'] : ['update', 'id' => $model->id],
    'enableAjaxValidation' => true,
    'enableClientValidation' => true,
    'validateOnSubmit' => true,
]); ?>
    <div class="m-portlet__body">
        <div class="m-form__content"><?= $this->render('//layouts/_flash_message') ?></div>

        <?= $form->field($model, 'type')->dropDownList(Block::getTypeLabels());?>

        <?= $model->formRenderer($form, '{field}', 'formAttributes'); ?>

    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
        <div class="m-form__actions">
            <?= Html::submitButton(Yii::t('words', 'Save'), ['class' => 'btn btn-success']) ?>
            <button type="reset" class="btn btn-secondary"><?php echo Yii::t('words', 'Cancel') ?></button>
        </div>
    </div>
<?php CustomActiveForm::end(); ?>
