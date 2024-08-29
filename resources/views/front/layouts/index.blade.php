<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>منازل | @yield('page.title')</title>
    <meta content="@yield('page.description')" name="description">
    {{-- <meta content="@yield('page.keywords')" name="keywords"> --}}
    <meta name="google-site-verification" content="xv3B3oKVmPner0pObVzBTf-S-a5AmQRHBI9fr_mF7Q4" />

    <!-- Add Shrinkit SDK -->
    <script src="https://cdn.appgain.io/docs/appgain/appgainSdk/websdk/shrinkit.min.js"></script>


    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('front/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Main CSS File -->
    {{-- <link href="front/assets/css/main.css" rel="stylesheet"> --}}
    <link href="{{ asset('front/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/cards.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/payment_form.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/filter.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/card.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/sub_service.css') }}" rel="stylesheet">
    <link href="{{ asset('front/assets/css/offers.css') }}" rel="stylesheet">


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
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center" title="اذهب لبداية الصفحة">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <a href="tel:+{{ $setting->phone }}" class="fixed-icon phone d-flex align-items-center justify-content-center"
        onclick="registerClick('call')" title="اتصل بنا">
        <i class="fa-solid fa-phone"></i>
    </a>
    <a href="https://wa.me/{{ $setting->whatsapp }}"
        class="fixed-icon whatsapp d-flex align-items-center justify-content-center"
        onclick="registerClick('whatsapp')" title="تواصل معنا عبر واتساب ">
        <i class="fab fa-whatsapp"></i>
    </a>


    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('front/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <!-- Include jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>


    <!-- Main JS File -->
    <script src="{{ asset('front/assets/js/main.js') }}"></script>
    <script src="{{ asset('front/assets/js/sub_service.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 6000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

        });
    </script>

    <script>
        function registerClick(type) {
            $.ajax({
                url: '{{ route('register.click') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    type: type
                },
                success: function(response) {
                    console.log('Click registered successfully');
                },
                error: function(error) {
                    console.log('Error registering click:', error);
                }
            });
        }
    </script>

    <script>
        const shrinkitConfig = {
            projectId: "66b335ef25a8f0e13edab328", // Replace with your Project ID
            apiKey: "8a24ad2f4e3e5850acca8af325e5c51cc46062f2deb82ecab642014d2187747c", // Replace with your API Key
            websiteName: "Mnazel", // Optional
            userId: "Your User ID", // Optional
            useCustomModal: true, // Optional - defaults to false

            // Custom modal config
            title: "Modal Title", // Optional
            description: "Modal Description", // Optional
            yesButton: "YES", // Optional
            noButton: "NO", // Optional
            modalLanguage: "en", // Optional [en, ar] - defaults to en
            modalImage: "https://placehold.co/600x400/png", // Optional
        };

        Shrinkit.init(shrinkitConfig)
            .then((response) => {
                console.log("Shrinkit SDK initialized successfully", response);
            })
            .catch((error) => {
                console.log("Shrinkit SDK initialization failed", error);
            });
    </script>


</body>

</html>
