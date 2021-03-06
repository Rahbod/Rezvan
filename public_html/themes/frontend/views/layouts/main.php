<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\themes\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169336352-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-169336352-1');
    </script>

    <?php $this->head(); ?>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= (($this->title) ? $this->title . ' - ' : '') . Yii::$app->name; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= $this->theme->baseUrl . '/favicon.ico' ?>"/>

    <?php if (app()->language != 'en'): ?>
        <link href="<?= $this->theme->baseUrl . '/assets/bootstrap/rtl/css/bootstrap.min.css' ?>" rel="stylesheet">
    <?php else: ?>
        <link href="<?= $this->theme->baseUrl . '/assets/bootstrap/css/bootstrap.min.css' ?>" rel="stylesheet">
    <?php endif; ?>

    <link href="<?= $this->theme->baseUrl . '/assets/css/all.css' ?>" rel="stylesheet">
    <link href="<?= $this->theme->baseUrl . '/style.css' ?>" rel="stylesheet">
    <?php if (app()->language != 'en'): ?>
        <link href="<?= $this->theme->baseUrl . '/rtl.css' ?>" rel="stylesheet">
    <?php endif; ?>
    <link href="<?= $this->theme->baseUrl . '/custom.css' ?>" rel="stylesheet">
    <?php if (!isDesktop()): ?>
        <link href="<?= $this->theme->baseUrl . '/responsive.css' ?>" rel="stylesheet">
    <?php endif; ?>
</head>
<?php

$url = app()->request->url;
$url_array = explode('/', $url);
$pageName = end($url_array);


if ($pageName == 'more-one') {
    $bodyClass = 'more-one';
    $headerClass = 'header-style-2';
} else {
    $bodyClass = 'home';
    $headerClass = 'header-style-1';
}

?>

<body class="<?= app()->controller->bodyClass ?><?= app()->language != 'en' ? ' rtl' : '' ?>">
<?php $this->beginBody(); ?>

<?php if (app()->controller->innerPage)
    echo $this->render(isDesktop() ? '_inner_header' : '_mobile_header');
else
    echo $this->render(isDesktop() ? '_header' : '_mobile_header');
?>
<main class="<?= isset(app()->controller->mainTag) ? app()->controller->mainTag : '' ?>">
    <?= $content ?>
</main>

<?php
if (app()->controller->innerPage)
    echo $this->render(isDesktop() ? '_inner_footer' : '_mobile_footer');
else
    echo $this->render(isDesktop() ? '_footer' : '_mobile_footer');
?>

<?php echo $this->render('_public_alert'); ?>
<?php if (!isDesktop()) echo $this->render('_social_share_modal'); ?>
<?php $this->endBody(); ?>

<!--<script src="--><? //= $this->theme->baseUrl . '/assets/js/jquery.min.js' ?><!--"></script>-->
<script src="<?= $this->theme->baseUrl . '/assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?= $this->theme->baseUrl . '/assets/js/custom.js' ?>"></script>
</body>
</html>
<?php $this->endPage(); ?>
