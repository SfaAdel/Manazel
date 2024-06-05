<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>منازل | @yield('page.title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('front/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">


    <!-- Main CSS File -->
    {{-- <link href="front/assets/css/main.css" rel="stylesheet"> --}}
    <link href="{{asset('front/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/cards.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/nav.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/payment_form.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/filter.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/card.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/sub_service.css')}}" rel="stylesheet">


    <!-- =======================================================
    * Template Name: Arsha
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Updated: May 13 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>

<body class="index-page ">

        <!-- partial:partials/_sidebar.html -->
        @include('front.includes.navbar')
        <!-- partial -->


            <div class="">
                @yield('content')
            </div>

            <!-- partial:partials/_footer.html -->
            @include('front.includes.footer')
            <!-- partial -->

            <!-- Scroll Top -->
            <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
                <i class="bi bi-arrow-up-short"></i>
              </a>
              <a href="tel:+1234567890" class="fixed-icon phone d-flex align-items-center justify-content-center text-info">
                <i class="bi bi-phone"></i>
              </a>
              <a href="https://wa.me/1234567890" class="fixed-icon whatsapp d-flex align-items-center justify-content-center text-success">
                <i class="fab fa-whatsapp"></i>
              </a>


            <!-- Preloader -->
            <div id="preloader"></div>

            <!-- Vendor JS Files -->
            <script src="{{asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
            <script src="{{asset('front/assets/vendor/php-email-form/validate.js')}}"></script>
            <script src="{{asset('front/assets/vendor/aos/aos.js')}}"></script>
            <script src="{{asset('front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
            <script src="{{asset('front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
            <script src="{{asset('front/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
            <script src="{{asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
            <script src="{{asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

            <!-- Include jQuery, Popper.js, and Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




            <!-- Main JS File -->
            <script src="{{asset('front/assets/js/main.js')}}"></script>
            <script src="{{asset('front/assets/js/sub_service.js')}}"></script>

            <script>
            $(document).ready(function() {

            $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
            Counter: $(this).text()
            }, {
            duration: 6000,
            easing: 'swing',
            step: function (now) {
            $(this).text(Math.ceil(now));
            }
            });
            });

            });

            </script>




            </body>

            </html>
