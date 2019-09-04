<?php

use yii\helpers\Html;

/**
 * @return \yii\console\Application|\yii\web\Application
 */
function app()
{
    return Yii::$app;
}

/**
 * @param $category
 * @param $key
 * @param array $params
 * @param null $language
 * @return string
 */
function trans($category, $key, $params = [], $language = null)
{
    return Yii::t($category, $key, $params, $language);
}

/**
 * @return \yii\console\Request|\yii\web\Request
 */
function request()
{
    return Yii::$app->request;
}

/**
 * @return \yii\console\Response|\yii\web\Response
 */
function response()
{
    return Yii::$app->response;
}

/**
 * @return array|string|\yii\base\Theme
 */
function theme()
{
    return Yii::$app->view->theme;
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

/**
 * @param $url
 * @return string
 */
function encodeUrl($url)
{
    return str_replace(array(' ', '/', '\\'), '-', $url);
}