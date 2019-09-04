<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Block */

$this->title = trans('words', 'Update block: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => trans('words', 'Blocks'), 'url' => ['index', 'id' => $model->itemID]];
$this->params['breadcrumbs'][] = $model->name;
$this->params['breadcrumbs'][] = trans('words', 'Update');
?>


<div class="m-portlet m-portlet--tab">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
                <h3 class="m-portlet__head-text">
                    <?= Html::encode($this->title) ?>
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
    <!--end::Form-->
</div>