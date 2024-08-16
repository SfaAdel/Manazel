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
    <link href="{{asset('front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Main CSS File -->
    {{-- <link href="front/assets/css/main.css" rel="stylesheet"> --}}
    <link href="{{asset('front/assets/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/nav.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/home_nav.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/cards.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/payment_form.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/filter.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/card.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/sub_service.css')}}" rel="stylesheet">
    <link href="{{asset('front/assets/css/offers.css')}}" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

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
        <header id="header" class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light m-auto text-center px-4 px-lg-5 py-3 py-lg-0" id="navbar">
                <a href="{{ route('home') }}" class="navbar-brand p-0">
                    <img src="{{ asset('images/settings/' . $setting->logo) }}" alt="logo" class="img-thumbnail ml-3">
                </a>

                <button class="navbar-toggler" style="box-shadow: none; border: none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse mr-4 justify-content-center" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ route('home') }}"
                            class="nav-item mx-3 mt-1 nav-link {{ Request::is('home') ? 'active' : '' }}">الرئيسية</a>
                        <a href="{{ route('about') }}"
                            class="nav-item mt-1 nav-link {{ Request::is('about') ? 'active' : '' }}">من نحن</a>
                        <div class="nav-item dropdown">
                            <a href="{{ route('categories') }}"
                                class="nav-link dropdown-toggle {{ Request::is('services') ? 'active' : '' }}"
                                id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                خدماتنا
                                <i class="bi bi-caret-down mr-1"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                                <li><a class="dropdown-item" href="{{ route('categories') }}"> عرض الكل </a></li>

                                @foreach ($navCategories as $navCategory)
                                    <li><a class="dropdown-item" href="{{ route('services', $navCategory->id) }}"> {{ $navCategory->name }} </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('blogs') }}"
                            class="nav-item mt-1 nav-link {{ Request::is('blogs') ? 'active' : '' }}">المدونة</a>
                        <a href="{{ route('contact') }}"
                            class="nav-item mt-1 nav-link {{ Request::is('contact') ? 'active' : '' }}">تواصل معنا</a>
                    </div>
                    <a href="{{ route('provider_form') }}" class="btn-getstarted"> اشترك كمزود خدمة </a>

                    @if (!(auth()->guard('customer')->check()))
                    <a class="btn-getstarted m-3 d-block"  href="{{ route('login') }}"> تسجيل الدخول </a>
                    @else
                    <div class="dropdown">
                        <button class="btn-getstarted mx-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            @if (Auth::guard('customer')->user()->profile_img)
                            <img src="{{ asset('images/customers/' . Auth::guard('customer')->user()->profile_img)}}" alt="{{ Auth::guard('customer')->user()->name }}" class="user-avatar" width="25px" height="25px">
                            @else
                                <img src="{{ asset('front/assets/img/customer-profile/user.png') }}" alt="Default Image" class="user-avatar profile_img">
                            @endif
                            {{ Auth::guard('customer')->user()->name }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{ route('customer_edit') }}">تعديل الحساب الشخصي</a></li>
                            <li><a class="dropdown-item" href="{{ route('customer_orders') }}"> متابعة الطلبات</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">تسجيل الخروج</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endif
                </div>
            </nav>
        </header>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
        <script>
            window.addEventListener('scroll', function() {
                var element = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    element.classList.add('sticky-top', 'shadow-sm');
                } else {
                    element.classList.remove('sticky-top', 'shadow-sm');
                }
            });
        </script>



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
              <a href="tel:+{{$setting->phone}}" class="fixed-icon phone d-flex align-items-center justify-content-center" onclick="registerClick('call')">
                <i class="fa-solid fa-phone"></i>
            </a>
            <a href="https://wa.me/{{$setting->whatsapp}}" class="fixed-icon whatsapp d-flex align-items-center justify-content-center" onclick="registerClick('whatsapp')">
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
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

            {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

            <!-- Swiper JS -->
            <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

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


            </body>

            </html>
