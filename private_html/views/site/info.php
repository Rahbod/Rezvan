<?php
/** @var $this View */

use app\components\Setting;
use yii\helpers\Url;
use yii\web\View;

?>

<header id="header" class="site-header header-style-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 icon-info-box">
                <img id="icon-info-2" src="<?= $this->theme->baseUrl ?>/images/icon-info-2.png" alt="icon2">
                <img id="icon-info-1" src="<?= $this->theme->baseUrl ?>/images/icon-info-1.png" alt="icon">
                <p class="icon-info">تسجيل</br>
                    الشركة في ايران
                </p>
            </div>
            <div class="col-2 logo-3">
                <div class="header-inner clearfix">
                    <div id="site-branding" class="site-branding">
                        <h1 id="site-title" class="logo img-logo">
                            <a href="<?= Url::to(['/site/index']) ?>" title="<?= app()->name ?>">
                                <img id="site-logo-3" src="<?= $this->theme->baseUrl ?>/images/Logo-3.png" alt="rezvan">
                                <span class="site-title"><?= app()->name ?></span>
                            </a>
                        </h1>
                    </div>
                    <!-- .site-branding -->
                </div>
            </div>
        </div>
    </div>
</header>
<main class="infography">
    <section class="main-info">
        <div class="container-fluid">
            <div class="row">
                <div class="way-bg">
                    <div class="way-line"><img id="way-line" src="<?= $this->theme->baseUrl ?>/images/way-line.png"
                                               alt="way-line"></div>
                    <div class="way"><img id="way" src="<?= $this->theme->baseUrl ?>/images/way.png" alt="way"></div>
                </div>
                <div class="first-item">
                    <div class="first-icon">
                        <img id="first-icon" src="<?= $this->theme->baseUrl ?>/images/first-icon.png" alt="first-icon">
                        <div class="first-icon-text">
                            <p class="icon-text">01</p>
                        </div>
                    </div>
                    <div class="first-desc">
                        <img id="first-icon-desc" src="<?= $this->theme->baseUrl ?>/images/info-icon-1.png"
                             alt="first-icon-desc">
                        <div class="description-text">
                            <p class="desc-title">المدة</p>
                            <p class="desc-text">20 يوم (غير العطل)</p>
                        </div>
                    </div>
                </div>
                <div class="second-item">
                    <div class="second-icon">
                        <img id="second-icon" src="<?= $this->theme->baseUrl ?>/images/second-icon.png"
                             alt="second-icon">
                        <div class="second-icon-text">
                            <p class="icon-text">02</p>
                        </div>
                    </div>
                    <div class="second-desc"><img id="second-icon-desc"
                                                  src="<?= $this->theme->baseUrl ?>/images/info-icon-2.png"
                                                  alt="second-icon-desc">
                        <div class="description-text"><p class="desc-title"> الوثائق الضرورية</p>
                            <p class="desc-text">جواز سفر جميع الشركاء + الترجمة الرسمية المصدّقة من الحكومة لجميع
                                الجوازات </p></div>
                    </div>
                </div>
                <div class="third-item">
                    <div class="third-icon">
                        <img id="third-icon" src="<?= $this->theme->baseUrl ?>/images/third-icon.png" alt="third-icon">
                        <div class="third-icon-text">
                            <p class="icon-text">03</p>
                        </div>
                    </div>
                    <div class="third-desc"><img id="third-icon-desc"
                                                 src="<?= $this->theme->baseUrl ?>/images/info-icon-3.png"
                                                 alt="third-icon-desc">
                        <div class="description-text"><p class="desc-title">تعيين أسهم الشركاء </p>
                            <p class="desc-text">[ضرورة وجود شريكين كحد أدنى]</p></div>
                    </div>
                </div>
                <div class="fourth-item">
                    <div class="fourth-icon">
                        <img id="fourth-icon" src="<?= $this->theme->baseUrl ?>/images/fourth-icon.png"
                             alt="fourth-icon">
                        <div class="fourth-icon-text">
                            <p class="icon-text">04</p>
                        </div>
                    </div>
                    <div class="fourth-desc"><img id="fourth-icon-desc"
                                                  src="<?= $this->theme->baseUrl ?>/images/info-icon-4.png"
                                                  alt="fourth-icon-desc">
                        <div class="description-text"><p class="desc-title">كتابة نظام الشركة الداخلي</p>
                            <p class="desc-text">[ اساسنامه ] + توقيعها من قبل الشركاء </p></div>
                    </div>
                </div>
                <div class="fifth-item">
                    <div class="fifth-icon">
                        <img id="fifth-icon" src="<?= $this->theme->baseUrl ?>/images/fifth-icon.png" alt="fifth-icon">
                        <div class="fifth-icon-text">
                            <p class="icon-text">05</p>
                        </div>
                    </div>
                    <div class="fifth-desc"><img id="fifth-icon-desc"
                                                 src="<?= $this->theme->baseUrl ?>/images/info-icon-5.png"
                                                 alt="fifth-icon-desc">
                        <div class="description-text"><p class="desc-title">تعيين حقّ التوقيع</p>
                            <p class="desc-text">[البيع و الشراء و باقي الأمور الإدارية تكون بتوقيع واحد عن جميع الشركاء
                                أم إثنين أم أكثر] </p></div>
                    </div>
                </div>
                <div class="sixth-item">
                    <div class="sixth-icon">
                        <img id="sixth-icon" src="<?= $this->theme->baseUrl ?>/images/sixth-icon.png" alt="sixth-icon">
                        <div class="sixth-icon-text">
                            <p class="icon-text">06</p>
                        </div>
                    </div>
                    <div class="sixth-desc"><img id="sixth-icon-desc"
                                                 src="<?= $this->theme->baseUrl ?>/images/info-icon-6.png"
                                                 alt="sixth-icon-desc">
                        <div class="description-text"><p class="desc-title">عنوان السكن</p>
                            <p class="desc-text">عنوان السكن في إيران و كود البريد Post Code </p></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="footnote">
            <h3>
                ملاحظة
            </h3>
            <p>
                الشركة تدخل ضمن الشركات الغير عاملة و لا يترتّب عليها ضرائب حكومية سنوية.
            </p>
            <p>
                الشركة تورّث ، فإذا لا سمح الله توفّي احد الشريكين - الشركاء - يرث الورثة الشركة و ما تملك.
            </p>
            <p>
                بعد ذلك يمكن للشركة أن تملك العقار أو السيارة أو ... .
            </p>
        </div>
        <div class="container-fluid footer-info">
            <div class="row">
                <div class="col-6 footer-right-box">
                    <h3><?= trans('words', 'CONTACT US') ?></h3>
                    <a class="address-link" target="_blank" href="<?= Setting::get('address_link') ?>">
                        <p><?= Setting::get(app()->language == 'fa' ? 'address' : app()->language . '_address') ?></p>
                    </a>
                    <a href="tel:<?= str_replace(' ', '', Setting::get('tell')) ?>"><p><?= Setting::get('tell') ?></p></a>
                    <?= $this->render('//layouts/_socials') ?>
                </div>
                <div class="col-6 footer-left-box">
                    <a href="<?= Url::to(['/site/index']) ?>" title="<?= app()->name ?>">
                        <img id="site-logo-3" src="<?= $this->theme->baseUrl ?>/images/Logo-3.png" alt="rezvan">
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>