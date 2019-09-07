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

    <meta charset="<?= Yii::$app->charset; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= (($this->title) ? $this->title . ' - ' : '') . Yii::$app->name; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="<?= $this->theme->baseUrl . '/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?= $this->theme->baseUrl . '/css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?= $this->theme->baseUrl . '/css/style.css' ?>" rel="stylesheet">
    <script src="<?= $this->theme->baseUrl .'/js/jquery.min.js' ?>"></script>
    <script src="<?= $this->theme->baseUrl .'/js/custom.js' ?>"></script>


</head>
<?php

$url = app()->request->url;
$url_array = explode('/', $url);
$pageName = end($url_array);


if ($pageName == 'one-more') {
    $bodyClass = 'more-one';
    $headerClass = 'header-style-2';
} else {
    $bodyClass = 'home';
    $headerClass = 'header-style-1';
}

?>

<body class="<?= app()->controller->bodyClass ?>">
<?php $this->beginBody(); ?>

<?php if (app()->controller->innerPage)
    echo $this->render('_inner_header');
else
    echo $this->render('_header');
?>
<main>
    <?= $content ?>
</main>

<?php if (app()->controller->innerPage)
    echo $this->render('_inner_footer');
else
    echo $this->render('_footer');
?>

<?php echo $this->render('_public_alert'); ?>
<?php $this->endBody(); ?>

<script src="<?= $this->theme->baseUrl . '/js/jquery.min.js' ?>"></script>
<script src="<?= $this->theme->baseUrl . '/js/bootstrap.min.js' ?>"></script>

</body>
</html>
<?php $this->endPage(); ?>
