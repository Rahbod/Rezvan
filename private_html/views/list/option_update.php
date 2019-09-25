<?php

use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Lists */
/* @var $parent app\models\Lists */

Pjax::begin([
    'id' => 'list-modal',
    'options' => [
        'class' => 'custom-modal list-modal',
        'data-pjax' => true
    ],
    'enablePushState' => false,
    'enableReplaceState' => false,
    'timeout' => false,
]);

echo $this->renderAjax('_option_form', [
    'model' => $model,
    'parent' => $parent,
]);

Pjax::end();