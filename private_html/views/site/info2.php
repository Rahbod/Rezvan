<?php
/** @var $this View */
/** @var $sections \app\models\ProjectSection[] */

use yii\web\View;
use yii\helpers\Url;

?>
<section class="main-text infography">
    <div class="slide-title">
        <div class="title-left">
            <div class="text">
                <h2 class="slide"><strong>title</strong></h2>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="main-section-page">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 right-box">
                            <div class="title">
                                <h2><?= trans('words', 'How to own?')?><small><?= trans('words', 'A foreigner does not own a company registration in Iran')?></small></h2>
                                <i class="line"></i>
                                <span class="desc"><?= trans('words', 'Here are the steps to register a company')?></span>
                            </div>
                            <ul class="infography-menu">
                                <?php $i = 0; foreach($sections as $section):?>
                                    <?php if ($src = $section->getIconSrc()) {
                                        $srcHover = $section->getIconHoverSrc();
                                        $this->registerCss('
                                            .section-icon-' . $section->id . ' {
                                                background-image: url("'.$src.'");
                                            }
                                            .infography-menu > li.active .section-icon-' . $section->id . ',
                                            .infography-menu > li:hover .section-icon-' . $section->id . ' {
                                                background-image: url("'.$srcHover.'");
                                            }', [], 'section-style-'.$section->id);
                                    }?>
                                    <li>
                                        <a href="#" data-toggle="tab" data-target="#section-tab-<?= $section->id ?>"<?= $i++ == 0 ? ' class="active"' : '' ?>>
                                            <span class="num"><?php echo $i;?></span>
                                            <div class="section-content">
                                                <?php if ($src): ?><span class="section-icon section-icon-<?= $section->id ?>"></span><?php endif; ?>
                                                <div class="section-title">
                                                    <b><?= $section->getName() ?></b>
                                                    <small><?= $section->getDescriptionStr() ?></small>
                                                </div>
                                                <span class="icon-arrow"></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="tab-content">
                                <?php $i = 0; foreach ($sections as $section): ?>
                                    <div class="tab-pane fade<?= $i++ == 0 ? ' active in' : '' ?>"
                                         id="project-info-tab-<?= $section->id ?>">
                                        <div class="left-side--image">
                                            <img src="<?= $section->getImageSrc() ?>" alt="<?= $section->getName() ?>">
                                        </div>
                                        <div class="left-side--info">
                                            <h3 class="left-side--info__title"><?= $section->getName() ?></h3>
                                            <div class="left-side--info__text">
                                                <div class="left-side--info__text--inner"><?= $section->getBodyStr() ?></div>
                                            </div>
                                        </div>
                                        <div class="left-side--btn">
                                            <a href="<?= Url::to(['/payment']) ?>" class="left-side--btn__btn-donate"><?= trans('words',
                                                    '<b>Donate</b> now') ?><i class="left-side--btn__heart svg-heart-r"><i
                                                            class="left-side--btn__heart-inner svg-heart-filled-r"></i></i></a>
                                        </div>
                                        <div class="left-side--btn">
                                            <a href="<?= $section->getMoreUrl() ?>"
                                               class="left-side--btn__btn-more"><?= trans('words', 'More<br>Information') ?>
                                                <span class="left-side--btn__arrow"></span>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>