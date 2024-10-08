<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>منازل |تسجيل الدخول </title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('front/assets/img/favicon.png') }}" rel="apple-touch-icon">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="front/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="front/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="front/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="front/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="front/assets/css/main.css" rel="stylesheet">
    <link href="front/assets/css/nav.css" rel="stylesheet">
    <link href="front/assets/css/login.css" rel="stylesheet">



    <!-- =======================================================
    * Template Name: Arsha
    * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
    * Updated: May 13 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body class="index-page ">

    <header id="header" class="container-xxl position p-0 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light m-auto text-center px-4 px-lg-5 py-3 py-lg-0" id="navbar">
            <a href="{{ route('home') }}" class="navbar-brand p-2">
                <img src="front/assets/img/logo.png" alt="logo" class="img-thumbnail ml-3">
            </a>


            <button class="navbar-toggler" style="box-shadow: none; border: none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarCollapse" title="القائمة الرئيسية">
                <span><i class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse mr-4 justify-content-center" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0 my-3">
                    <a href="{{ route('home') }}" {{-- class="nav-item mt-1 nav-link text-primary {{ Request::is('home') ? 'active' : '' }}">الرئيسية</a> --}} </div>

                </div>

                <a class="btn-getstarted mx-2" href="{{ route('login') }}"> تسجيل الدخول </a>

        </nav>
    </header>



    <main class="container mt-4">
        <div class="container mt-4">
            <div class="row justify-content-center mt-4">
                <div class="col-md-8 mt-5">
                    <div class="card mt-5">
                        <div class="card-header">انشاء حساب جديد</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="alert alert-warning center" id="danger-alert">
                                    سوف يتم ارسال رمز التأكيد عن طريق واتساب ، تأكد ان الرقم الذي ادخلته رقم سعودي لديه
                                    حساب علي واتساب </div>

                                <div class="form-group row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-right">{{ __('الاسم') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name="phone"
                                            value="{{ old('phone') }}" required placeholder="5x xxx xxxx">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password_confirmation"
                                        class="col-md-4 col-form-label text-md-right">{{ __('تأكيد كلمة المرور') }}</label>
                                    <div class="col-md-6">
                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender"
                                        class="col-md-4 col-form-label text-md-right">{{ __('النوع') }}</label>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="male" value="male" required>
                                            <label class="form-check-label"
                                                for="male">{{ __('ذكر') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="female" value="female" required>
                                            <label class="form-check-label"
                                                for="female">{{ __('أنثى') }}</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary" title="تسجيل">
                                            {{ __('تسجيل') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- partial:partials/_footer.html -->
    {{-- @include('front.includes.footer') --}}
    <!-- partial -->


    <!-- Vendor JS Files -->
    <script src="front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="front/assets/vendor/php-email-form/validate.js"></script>
    <script src="front/assets/vendor/aos/aos.js"></script>
    <script src="front/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="front/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="front/assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="front/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
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
    <script src="front/assets/js/main.js"></script>
    <script src="front/assets/js/sub_service.js"></script>






</body>

</html>
