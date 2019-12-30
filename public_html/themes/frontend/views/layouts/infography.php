<?php
/* @var $this \yii\web\View */

/* @var $content string */

use app\themes\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html dir="rtl" lang="<?= Yii::$app->language; ?>">
<head>
    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= (($this->title) ? $this->title . ' - ' : '') . Yii::$app->name; ?></title>
    <link rel="shortcut icon" href="<?= $this->theme->baseUrl . '/favicon.ico' ?>"/>

    <link href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">

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
    <link href="<?= $this->theme->baseUrl . '/info.css' ?>" rel="stylesheet">
    <link href="<?= $this->theme->baseUrl . '/custom.css' ?>" rel="stylesheet">
</head>
<body>
<?php $this->beginBody(); ?>

<?= $content ?>

<?php $this->endBody(); ?>

<script src="<?= $this->theme->baseUrl . '/assets/bootstrap/js/bootstrap.min.js' ?>"></script>
<script src="<?= $this->theme->baseUrl . '/assets/js/custom.js' ?>"></script>
</body>
</html>
<?php $this->endPage(); ?>
