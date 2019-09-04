<?php
$baseUrl = $this->theme->baseUrl;

?>

<header id="header" class="site-header header-style-2">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header-inner clearfix">
                        <div id="site-branding" class="site-branding">
                            <h1 id="site-title" class="logo img-logo">
                                <a href="#">
                                    <img id="site-logo" src="<?= $baseUrl . '/images/logo.png' ?>" alt="rezvan">
                                    <span class="site-title">rezvan</span>
                                </a>
                            </h1>
                        </div>
                        <!-- .site-branding -->
                        <div class="social-icon">
                            <ul class="social-list">
                                <li class="social-item whatsapp"><a href="#" target="_blank"><i
                                                class="fa fa-whatsapp"></i></a></li>
                                <li class="social-item twitter"><a href="#" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                <li class="social-item instagram"><a href="#" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                <li class="social-item facebook"><a href="#" target="_blank"><i
                                                class="fa fa-facebook-f"></i></a></li>
                                <li class="social-item youtube"><a href="#" target="_blank"><i
                                                class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="row">
                        <nav id="menu-main" class="main-menu-container navbar-expand-lg">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                    data-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse" id="language">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="lang-select"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</a>
                                            <div class="dropdown-menu" aria-labelledby="lang-select">
                                                <a class="dropdown-item" href="#">IR</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                            <div id="main-navigation" class="search-container close collapse">
                                <div class="search-box clearfix">
                                    <form role="search" method="get" class="search-form clearfix" action="#">
                                        <input type="search" class="search-field" placeholder="Search" value="" name="s"
                                               title="Search:" autocomplete="off">
                                        <input type="submit" class="search-submit" value="Search">
                                    </form>
                                    <!-- .search-form -->
                                </div>
                            </div>
                            <ul id="main-navigation" class="main-menu collapse">
                                <li class="menu-item"><i class="sprite sprite-services-icon"></i><a
                                            href="#">SERVICES</a></li>
                                <li class="menu-item"><i class="sprite sprite-company-icon"></i><a href="#">COMPANY
                                        REGISTRATION</a></li>
                                <li class="menu-item"><i class="sprite sprite-project-icon"></i><a href="#">PROJECTS</a>
                                </li>
                                <li class="menu-item"><i class="sprite sprite-investment-icon"></i><a href="#">INVESTMENT
                                        OPPORTUNITIES</a></li>
                                <li class="menu-item"><i class="sprite sprite-about-icon"></i><a href="#">ABOUT US</a>
                                </li>
                                <li class="menu-item"><i class="sprite sprite-phone-icon"></i><a href="#">CONTACT US</a>
                                </li>
                            </ul>
                            <!-- #main-navigation -->
                        </nav>
                        <!-- .main-menu-container -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
