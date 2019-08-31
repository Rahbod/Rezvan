<?php

use yii\helpers\Html;

/**
 * @return \yii\console\Application|\yii\web\Application
 */
function app(){
    return Yii::$app;
}

/**
 * @param $vars
 */
function dd($vars)
{
    $args = func_get_args();
    echo Html::beginTag('pre', ['class' => 'xdebug-var-dump', 'dir' => 'ltr']);
    foreach ($args as $arg) {
        var_dump($arg);
        echo "\n";
    }
    echo Html::endTag('pre');
    exit();
}