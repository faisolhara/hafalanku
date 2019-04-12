<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Hafalanku</title>
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Hafalanku">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Libs CSS -->
    <link href="{{ asset('assets-frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/v-nav-menu.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/v-animation.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/v-bg-stylish.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/v-shortcodes.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/css/theme-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/plugins/owl-carousel/owl.theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />

    <!-- Current Page CSS -->
    <link href="{{ asset('assets-frontend/plugins/rs-plugin/css/settings.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets-frontend/plugins/rs-plugin/css/custom-captions.css') }}" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets-frontend/css/custom.css') }}">
</head>

<body class="no-page-top">

    <!--Header-->
    <!--Set your own background color to the header-->
    <header class="semi-transparent-header" data-bg-color="rgba(9, 103, 139, 0.36)" data-font-color="#fff">
        <div class="container">

            <!--Site Logo-->
            <div class="logo" data-sticky-logo="{{ asset('assets-frontend/img/logo-white.png') }}" data-normal-logo="{{ asset('assets-frontend/img/logo.png') }}">
                <a href="{{ URL('/') }}">
                    <img alt="Hafalanku" src="{{ asset('assets-frontend/img/logo.png') }}" data-logo-height="35">
                    <span id="logo-title" style="font-size: 33px; vertical-align: middle; padding-left: 5px; color: #10608e">
                        Hafalanku
                    </span>
                </a>
            </div>
            <!--End Site Logo-->

            <div class="navbar-collapse nav-main-collapse collapse">
                <!--Main Menu-->
                <nav class="nav-main mega-menu one-page-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <li><a data-hash href="{{ URL('/masuk') }}"><i class="fa fa-sign-in"></i>Masuk</a></li>
                        <li><a data-hash href="{{ URL('/daftar') }}"><i class="fa fa-user"></i>Daftar</a></li>
                    </ul>
                </nav>
                <!--End Main Menu-->
            </div>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </header>
    <!--End Header-->

    <div id="container">

        <!--Set your own slider options. Look at the v_RevolutionSlider() function in 'theme-core.js' file to see options-->
        <div class="home-slider-wrap fullwidthbanner-container" id="home">
            <div class="v-rev-slider" data-slider-options='{ "startheight": 700 }'>

                <ul>

                    <li data-transition="fade" data-slotamount="7" data-masterspeed="600">

                        <img src="{{ asset('assets-frontend/img/slider/image2.png') }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">

                        <div class="tp-caption v-caption-big-white sfl stl"
                            data-x="450"
                            data-y="245"
                            data-speed="600"
                            data-start="600"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <br/>
                            HAFALANKU
                        </div>

                        <div class="tp-caption v-caption-h1 sfl stl"
                            data-x="450"
                            data-y="360"
                            data-speed="700"
                            data-start="1200"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            Sahabat Penghafal Alqur'an
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="450"
                            data-y="450"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <a href="{{ url('/masuk') }}" class="btn v-btn v-second-light">MASUK</a>
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="605"
                            data-y="450"
                            data-speed="600"
                            data-start="2200"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <a href="{{ url('/daftar') }}" class="btn v-btn v-second-light">DAFTAR</a>
                        </div>

                        <div class="tp-caption sfl stl"
                            data-x="110"
                            data-y="130"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power1.easeInOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0"
                            data-endelementdelay="0"
                            data-endspeed="300">
                            <img src="{{ asset('assets-frontend/img/iphone2.png') }}" />
                        </div>


                    </li>
                </ul>
            </div>

            <div class="shadow-right"></div>
        </div>

        <div class="v-page-wrap no-bottom-spacing">

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-small"></div>
            </div>

            <!--Fitur-->
            <div class="container" id="features">

                <div class="row center">

                    <div class="col-sm-12">
                        <p class="v-smash-text-large-2x">
                            <span>Fitur Andalan</span>
                        </p>
                        <div class="horizontal-break"></div>
                        <p class="lead" style="color: #999;">
                            <!--Real time &amp; dan support mobile (hand phone).<br>-->
                            Start, Hafalkan, Lihat Perkembangan
                        </p>
                    </div>
                    <div class="v-spacer col-sm-12 v-height-standard"></div>
                </div>

                <div class="row features">

                    <div class="col-md-6 col-sm-6">
                        <div class="feature-box left-icon v-animation pull-top" data-animation="fade-from-left" data-delay="300">
                            <div class="feature-box-icon small">
                                <i class="fa fa-laptop v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Online</h3>
                                <div class="feature-box-text-inner">
                                    Hafalanku dapat diakses dimanapun dengan koneksi iternet, baik dari device komputer atau mobile.
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-left" data-delay="600">
                            <div class="feature-box-icon small">
                                <i class="fa fa-clock-o v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Real Time</h3>
                                <div class="feature-box-text-inner">
                                    Dengan konsep satu data, anda dapat melihat perkembangan hafalan dimanapun dan kapanpun secara real time.
                                </div>
                            </div>
                        </div>

                        <div class="v-spacer col-sm-12 v-height-standard"></div>

                        <div class="feature-box left-icon v-animation" data-animation="fade-from-left" data-delay="900">
                            <div class="feature-box-icon small">
                                <i class="fa fa-lightbulb-o v-icon"></i>
                            </div>
                            <div class="feature-box-text">
                                <h3>Mudah dan Cepat</h3>
                                <div class="feature-box-text-inner">
                                    Hafalanku didesain simpel agar mudah untuk digunakan. 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                        <img class="img-responsive phone-image v-animation" data-animation="fade-from-bottom" data-delay="250" src="{{ asset('assets-frontend/img/landing/single-iphone.png') }}" />
                    </div>
                </div>
            </div>
            <!--End Fitur-->

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-standard"></div>
            </div>

            <!--Mengapa Hafalanku-->
            <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="why-us">
                <div class="container">
                    <div class="row app-brief">
                        <div class="col-sm-6">
                            <img class="img-responsive phone-image v-animation" data-animation="fade-from-left" data-delay="250" src="{{ asset('assets-frontend/img/landing/2-iphone-left.png') }}" />
                        </div>

                        <div class="col-sm-6">
                            <p class="v-smash-text-large-2x pull-top">
                                <span>Mengapa Hafalanku?</span>
                            </p>
                            <div class="horizontal-break left"></div>
                            <p class="v-lead">
                                Hafalanku merupakan aplikasi yang berguna untuk membantu hafidz dalam menghafal Al-Qur'an.
                                Didesain sedemikian rupa sehingga mudah digunakan oleh siapapun.
                            </p>

                            <div class="v-spacer col-sm-12 v-height-small"></div>

                            <ul class="v-list-v2">
                                <li class="v-animation" data-animation="fade-from-right" data-delay="150"><i class="fa fa-check"></i><span class="v-lead">Simpel dan Mudah.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="300"><i class="fa fa-check"></i><span class="v-lead">Online.</span></li>
                                <li class="v-animation" data-animation="fade-from-right" data-delay="450"><i class="fa fa-check"></i><span class="v-lead">Real Time Data.</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Mengapa Hafalanku-->

            <!--Describe-->
            <div class="v-parallax v-bg-stylish" id="describe">
                <div class="container">
                    <div class="row app-brief">
                        <div class="col-sm-6">
                            <p class="v-smash-text-large-2x pull-top">
                                <span>Penjelasan Hafalanku</span>
                            </p>
                            <div class="horizontal-break left"></div>
                            <p class="v-lead">
                                Hafalanku adalah aplikasi yang berguna untuk membantu hafidz Al-Qur'an dalam mencatat dan memantau perkembangan hafalannya. Di dalamnya terdapat fitur untuk mencatat hafalan baru maupun pengulangan hafalan lama. Dengan catatan ini hafidz bisa melihat progress dan perkembangan hafalan nya seiring berjalannya waktu. Sehingga diharapkan hafidz bisa lebih efektif dalam menghafal Al-Qur'an dan memperoleh hasil yang lebih maksimal. Apabila anda adalah seorang hafidz Al-Qur'an, anda patut mencoba aplikasi ini.
                            </p>

                            <p class="v-lead">
                                Aplikasi ini juga bisa diakses dari manapun dan kapanpun, hanya dengan menggunakan koneksi internet. Anda juga bisa mengaksesnya dari device apapun baik itu komputer, laptop ataupun handphone. Data hafalan anda akan tersimpan di cloud, sehingga tetap bisa anda akses kembali dengan mudah kapan saja dan dimana saja.
                            </p>
                        </div>

                        <div class="col-sm-6">
                            <img class="img-responsive phone-image v-animation" data-animation="fade-from-right" data-delay="300" src="{{ asset('assets-frontend/img/landing/2-iphone-right.png') }}" />
                        </div>
                    </div>
                </div>
            </div>
            <!--End Describe-->

            <!--Layanan-->
            <div class="v-parallax v-parallax-video v-bg-stylish" id="services" style="background-image: url(assets-frontend/img/slider/slider4.jpg);">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="0">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-laptop v-icon"></i>
                                </div>
                                <div class="feature-box-text clearfix">
                                    <h3>Mulai</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Mulai lakukan hafalan dan klik start
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="200">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-clock-o v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Rekam Waktu</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Rekam waktu hafalan kamu sampai akhir.<br />
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="feature-box feature-box-secundary-one v-animation" data-animation="grow" data-delay="400">
                                <div class="feature-box-icon small">
                                    <i class="fa fa-line-chart v-icon"></i>
                                </div>
                                <div class="feature-box-text">
                                    <h3>Evaluasi</h3>
                                    <div class="feature-box-text-inner">
                                        <p>
                                            Evaluasi hasil hafalan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="v-bg-overlay overlay-colored"></div>
                    </div>
                </div>
            </div>
            <!--End Layanan-->

            <div class="container">
                <div class="v-spacer col-sm-12 v-height-big"></div>
            </div>

            <!--Screenshots-->
            <div class="v-parallax v-bg-stylish v-bg-stylish-v4 no-shadow" id="screenshots">
                <div class="container">
                    <div class="row center">
                        <div class="col-sm-12">
                            <p class="v-smash-text-large-2x">
                                <span>Tampilan Aplikasi</span>
                            </p>
                        </div>
                        <div class="v-spacer col-sm-12 v-height-standard"></div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">

                            <div class="carousel-wrap">

                                <div class="owl-carousel" data-plugin-options='{"items": 4, "singleItem": false, "pagination": true}'>
                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{ asset('assets-frontend/img/landing/dashboard.png') }}" class="attachment-full">
                                            <a class="view" href="{{ asset('assets-frontend/img/landing/dashboard.png') }}" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Dashboard</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{ asset('assets-frontend/img/landing/hafalan.png') }}" class="attachment-full">
                                            <a class="view" href="{{ asset('assets-frontend/img/landing/hafalan.png') }}" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Hafalan</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{ asset('assets-frontend/img/landing/hafalan-form.png') }}" class="attachment-full">
                                            <a class="view" href="{{ asset('assets-frontend/img/landing/hafalan-form.png') }}" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Form Hafalan</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{ asset('assets-frontend/img/landing/profil.png') }}" class="attachment-full">
                                            <a class="view" href="{{ asset('assets-frontend/img/landing/profil.png') }}" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Profil</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>

                                    <div class="item">
                                        <figure class="lightbox animated-overlay overlay-alt clearfix">
                                            <img src="{{ asset('assets-frontend/img/landing/change-password.png') }}" class="attachment-full">
                                            <a class="view" href="{{ asset('assets-frontend/img/landing/change-password.png') }}" rel="image-gallery"></a>
                                            <figcaption>
                                                <div class="thumb-info">
                                                    <h4>Ganti Password</h4>
                                                    <i class="fa fa-eye"></i>
                                                </div>
                                            </figcaption>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Screenshots-->

        <!--Footer-Wrap-->
        <div class="footer-wrap">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <section class="widget">
                                <img alt="Hafalanku" src="{{ asset('assets-frontend/img/logo-white.png') }}" style="height: 40px; margin-bottom: 20px;">
                                <span style="font-size: 37px; color: white; padding-left: 5px;">Hafalanku</span>
                                <p class="pull-bottom-small">
                                    Dengan mengucap Bismillahirrahmanirrahiim kami tim Hafalanku bertekad membantu hafidz untuk mempercepat hafalan Al-quran. Semoga Allah meridlai niat baik hambanya.
                                </p>
                            </section>
                        </div>
                        <div class="col-sm-3 col-sm-offset-3">
                            <section class="widget">
                                <div class="widget-heading">
                                    <h4>Hubungi Kami</h4>
                                </div>
                                <div class="footer-contact-info">
                                    <ul>
                                        <li>
                                            <p><i class="fa fa-building"></i>Bakhtiar Arifin</p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-envelope"></i><strong>Email:</strong> <a href="mailto:mail@example.com">bakhtiararifin.88@gmail.com</a></p>
                                        </li>
                                        <li>
                                            <p><i class="fa fa-phone"></i><strong>Phone:</strong> 085645941362</p>
                                        </li>
                                    </ul>
                                    <br />
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </footer>

            <div class="copyright">
                <div class="container">
                    <p>© Copyright 2017 by Hafalanku. All Rights Reserved.</p>
                </div>
            </div>
        </div>
        <!--End Footer-Wrap-->
    </div>

    <!--// BACK TO TOP //-->
    <div id="back-to-top" class="animate-top"><i class="fa fa-angle-up"></i></div>

    <!-- Libs -->
    <script src="{{ asset('assets-frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/jquery.carouFredSel.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/theme-plugins.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/js/imagesloaded.js') }}"></script>

    <script src="{{ asset('assets-frontend/js/view.min.js?auto') }}"></script>

    <script src="{{ asset('assets-frontend/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('assets-frontend/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('assets-frontend/js/theme-core.js') }}"></script>
</body>
</html>
