@php use Illuminate\Support\Facades\Route; @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="keywords" content="{{ $settings->keywords }}"/>
    <meta name="author" content="{{ $settings->author }}"/>
    <meta name="description" content="{{ $settings->description }}"/>
    <meta property="og:title" content="{{ $settings->title }}"/>
    <meta property="og:description" content="{{ $settings->description }}"/>
    <meta name="format-detection" content="telephone=no"/>
    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/x-icon" href="{{asset("storage/". $settings->favicon)}}"/>
    <!-- PAGE TITLE HERE -->
    <title>
        @yield('title', $settings->title)
    </title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- STYLESHEETS -->
    <link rel="stylesheet" href="{{ asset("front/vendor/bootstrap-select/dist/css/bootstrap-select.min.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/icons/themify/themify-icons.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/icons/flaticon/flaticon_mooncart.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/magnific-popup/magnific-popup.min.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/icons/fontawesome/css/all.min.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/swiper/swiper-bundle.min.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/animate/animate.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/lightgallery/dist/css/lightgallery.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/lightgallery/dist/css/lg-thumbnail.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/vendor/lightgallery/dist/css/lg-zoom.css")}}"/>
    <link rel="stylesheet" href="{{ asset("front/css/style.css")}}"/>

    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com/"/>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin/>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap"/>
    @yield('css')
</head>
<body>
<div class="page-wraper">
    <div id="loading-area" class="preloader-wrapper-1">
        <div>
            <span class="loader-2"></span>
            <img src="{{asset("storage/".$settings->logo)}}" alt="/">
            <span class="loader"></span>
        </div>
    </div>
    <!-- Header -->
    @include('front.layouts.header')
    <!-- Header End -->
    <div class="page-content bg-white">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('front.layouts.footer')
    <!-- Footer End -->
    <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script data-cfasync="false"
        src="{{ asset("front/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js")}}"></script>
<script src="{{ asset("front/js/jquery.min.js")}}"></script><!-- JQUERY MIN JS -->
<script src="{{ asset("front/vendor/wow/wow.min.js")}}"></script><!-- WOW JS -->
<script src="{{ asset("front/vendor/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script><!-- BOOTSTRAP MIN JS -->
<script src="{{ asset("front/vendor/bootstrap-select/dist/js/bootstrap-select.min.js")}}"></script><!-- BOOTSTRAP
SELECT MIN JS-->
<script src="{{ asset("front/vendor/bootstrap-touchspin/bootstrap-touchspin.js")}}"></script><!-- BOOTSTRAP TOUCHSPIN JS
-->
<script src="{{ asset("front/vendor/magnific-popup/magnific-popup.js")}}"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset("front/vendor/counter/waypoints-min.js")}}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset("front/vendor/counter/counterup.min.js")}}"></script><!-- COUNTERUP JS -->
<script src="{{ asset("front/vendor/swiper/swiper-bundle.min.js")}}"></script><!-- SWIPER JS -->
<script src="{{ asset("front/vendor/imagesloaded/imagesloaded.js")}}"></script><!-- IMAGESLOADED-->
<script src="{{ asset("front/vendor/masonry/masonry-4.2.2.js")}}"></script><!-- MASONRY -->
<script src="{{ asset("front/vendor/masonry/isotope.pkgd.min.js")}}"></script><!-- ISOTOPE -->
<script src="{{ asset("front/vendor/countdown/jquery.countdown.js")}}"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="{{ asset("front/js/dz.carousel.js")}}"></script><!-- DZ CAROUSEL JS -->
<script src="{{ asset("front/vendor/lightgallery/dist/lightgallery.min.js")}}"></script>
<script src="{{ asset("front/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js")}}"></script>
<script src="{{ asset("front/vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js")}}"></script>
<script src="{{ asset("front/js/dz.ajax.js")}}"></script><!-- AJAX -->
<script src="{{ asset("front/js/custom.js")}}"></script><!-- CUSTOM JS -->
@yield('js')
</body>
</html>
