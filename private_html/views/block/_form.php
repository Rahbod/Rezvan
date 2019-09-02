<?php

use app\components\customWidgets\CustomActiveForm;
use app\models\Block;
use yii\helpers\Html;
use yii\helpers\Url;

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

    <div class="row">
        <div class="col-sm-12   ">
            <div class="form-group m-form__group field-block-name">
                <?= Html::label($model->getAttributeLabel('type'), 'type', ['class' => 'col-form-label control-label']) ?>
                <?= Html::dropDownList('type', $model->type, Block::getTypeLabels(), [
                    'id' => 'type-trigger',
                    'class' => 'form-control m-input m-input--solid',
                    'prompt' => 'لطفا نوع بنر را انتخاب کنید',
                    'data-url' => app()->request->url,
                    'disabled' => !$model->isNewRecord,
                    'readonly' => !$model->isNewRecord,
                ]); ?>
                <?= $form->field($model, 'type', ['template' => '{error}'])->error() ?>
            </div>
        </div>
        <?= $model->formRenderer($form, '{field}', 'col-lg-4'); ?>

    </div>
</div>
<div class="m-portlet__foot m-portlet__foot--fit">
    <div class="m-form__actions">
        <?= Html::submitButton(Yii::t('words', 'Save'), ['class' => 'btn btn-success']) ?>
        <a href="<?= Url::to(['index', 'id' => $model->itemID]) ?>" data-pjax="false" class="btn btn-danger">
            <?php echo Yii::t('words', 'Cancel') ?></a>
        <button type="reset" class="btn btn-secondary"><?php echo Yii::t('words', 'Reset') ?></button>
    </div>
</div>
<?php CustomActiveForm::end(); ?>
