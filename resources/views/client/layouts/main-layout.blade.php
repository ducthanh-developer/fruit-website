<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slick/slick.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/lightbox2/css/lightbox.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/css/navigation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/revolution/css/settings.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/slide100/slide100.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--===============================================================================================-->
    @stack('style')
</head>

<body class="animsition">

    <!-- Header -->
    @include('client/components/header')

    @yield('content')

    <!-- Logo -->
    <div class="sec-logo bg0">
        <div class="container">
            <div class="flex-w flex-sa-m bo-t-1 bocl13 p-tb-60">
                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{ asset('') }}images/icons/symbol-07.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{ asset('') }}images/icons/symbol-08.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{ asset('') }}images/icons/symbol-09.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{ asset('') }}images/icons/symbol-10.png" alt="IMG">
                </a>

                <a href="#" class="dis-block how2 p-rl-15 m-tb-20">
                    <img class="trans-04" src="{{ asset('') }}images/icons/symbol-11.png" alt="IMG">
                </a>
            </div>
        </div>
    </div>

    <!-- Subscribe -->
    <section class="sec-subscribe bg13 p-t-65 p-b-65">
        <div class="container">
            <div class="row">
                <div class="col-md-5 p-tb-15">
                    <div class="h-full flex-col-m">
                        <h4 class="txt-m-110 cl3 p-b-4">
                            Subscribe Newsletter.
                        </h4>

                        <p class="txt-s-101 cl6">
                            Get e-mail updates about our latest shop and special offers.
                        </p>
                    </div>
                </div>

                <div class="col-md-7 p-tb-15">
                    <form class="flex-w flex-m h-full">
                        <input class="size-a-6 txt-s-106 cl6 plh0 p-rl-30 w-full-sm" type="text" name="email"
                            placeholder="Your email address">
                        <button class="bg10 size-a-5 txt-s-107 cl0 p-rl-15 trans-04 hov-btn2 mt-4 mt-sm-0">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg12">
        <div class="container">
            <div class="wrap-footer flex-w p-t-60 p-b-62">
                <div class="footer-col1">
                    <div class="footer-col-title">
                        <a href="#">
                            <img src="{{ asset('') }}images/icons/logo-01.png" alt="LOGO">
                        </a>
                    </div>

                    <p class="txt-s-101 cl6 size-w-10 p-b-16">
                        There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered
                        alteration
                    </p>

                    <ul>
                        <li class="txt-s-101 cl6 flex-t p-b-10">
                            <span class="size-w-11">
                                <img src="{{ asset('') }}images/icons/icon-mail.png" alt="ICON-MAIL">
                            </span>

                            <span class="size-w-12 p-t-1">
                                markrussell@example.com
                            </span>
                        </li>

                        <li class="txt-s-101 cl6 flex-t p-b-10">
                            <span class="size-w-11">
                                <img src="{{ asset('') }}images/icons/icon-pin.png" alt="ICON-MAIL">
                            </span>

                            <span class="size-w-12 p-t-1">
                                No 40 Baria Sreet 133/2, NewYork
                            </span>
                        </li>

                        <li class="txt-s-101 cl6 flex-t p-b-10">
                            <span class="size-w-11">
                                <img src="{{ asset('') }}images/icons/icon-phone.png" alt="ICON-MAIL">
                            </span>

                            <span class="size-w-12 p-t-1">
                                (785) 977 5767
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="footer-col2">
                    <div class="footer-col-title flex-m">
                        <span class="txt-m-109 cl3">
                            Information
                        </span>
                    </div>

                    <ul>
                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                About our shop
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Top sellers
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Our blog
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                New products
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Secure shopping
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-col3">
                    <div class="footer-col-title flex-m">
                        <span class="txt-m-109 cl3">
                            My Account
                        </span>
                    </div>

                    <ul>
                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                My account
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Discount
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Personal information
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                My address
                            </a>
                        </li>

                        <li class="p-b-16">
                            <a href="#" class="txt-s-101 cl6 hov-cl10 trans-04 p-tb-5">
                                Order history
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer-col4">
                    <div class="footer-col-title flex-m">
                        <span class="txt-m-109 cl3">
                            Instagram
                        </span>
                    </div>

                    <div class="flex-w flex-sb p-t-6">
                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-01.jpg');"></a>
                        </div>

                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-02.jpg');"></a>
                        </div>

                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-03.jpg');"></a>
                        </div>

                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-04.jpg');"></a>
                        </div>

                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-05.jpg');"></a>
                        </div>

                        <div class="size-w-13 m-b-10">
                            <a href="#" class="dis-block size-a-7 bg-img1 hov4"
                                style="background-image: url('images/instagram-06.jpg');"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-w flex-sb-m bo-t-1 bocl14 p-tb-14">
                <span class="txt-s-101 cl9 p-tb-10 p-r-29">
                    Copyright © 2017 Organive. All rights reserved.
                </span>

                <div class="flex-w flex-m">
                    <a href="#" class="m-r-29 m-tb-10">
                        <img src="{{ asset('') }}images/icons/icon-pay-01.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-r-29 m-tb-10">
                        <img src="{{ asset('') }}images/icons/icon-pay-02.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-r-29 m-tb-10">
                        <img src="{{ asset('') }}images/icons/icon-pay-03.png" alt="ICON-PAY">
                    </a>

                    <a href="#" class="m-r-29 m-tb-10">
                        <img src="{{ asset('') }}images/icons/icon-pay-04.png" alt="ICON-PAY">
                    </a>

                    <a href="#">
                        <img src="{{ asset('') }}images/icons/icon-pay-05.png" alt="ICON-PAY">
                    </a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <span class="lnr lnr-chevron-up"></span>
        </span>
    </div>



    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('vendor/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('js/revo-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('js/slick-custom.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/parallax100/parallax100.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/lightbox2/js/lightbox.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/countdowntime/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('vendor/slide100/slide100.js') }}"></script>
    <script src="{{ asset('js/slide100-custom.js') }}"></script>
    <!--===============================================================================================-->
    @stack('script')
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
