<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>منازل |تسجيل الدخول </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="front/assets/img/favicon.png" rel="icon">
    <link href="front/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

                <a class="btn-getstarted mx-2" href="{{ route('register') }}"> انشاء حساب </a>

        </nav>
    </header>



    <main class="container mt-2">
        {{-- <div class="container mt-4">
            <div class="row justify-content-center mt-4 mt-4">
                <div class="col-md-8 mt-5">
                    <div class="card mt-5">
                        <div class="card-header"> تسجيل الدخول </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login_success') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('رقم الهاتف') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="" required >
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('كلمة المرور') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required >
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input ml-3" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label mx-4" for="remember">
                                                {{ __('تذكرني') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('تسجيل الدخول') }}
                                        </button>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('هل نسيت كلمة المرور؟') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="custom-wrapper">
            <div class="custom-logo d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/website/logo.png') }}" alt="">
            </div>
            <div class="text-center mt-3 custom-name d-flex align-items-center justify-content-center">
                تسجيل الدخول
            </div>
            <form method="POST" class="p-3 mt-1" action="{{ route('login_success') }}">
                @csrf

                <div class="align-items-center justify-content-center">
                    <span class="far fa-user my-2"></span>
                    <input id="phone" type="text"
                        class="custom-form-field p-2 @error('phone') is-invalid @enderror" name="phone"
                        placeholder="رقم الهاتف" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback mb-4 center">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>


                <div class="align-items-center justify-content-center">
                    <span class="fas fa-key my-2"></span>
                    <input id="password" type="password"
                        class="custom-form-field p-2 @error('password') is-invalid @enderror" name="password"
                        placeholder="كلمة المرور" required>
                    @error('password')
                        <div class="invalid-feedback mb-4 center">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="d-flex align-items-center justify-content-center">
                    <button class="btn-getstarted mt-1" title="تسجيل الدخول">تسجيل الدخول</button>
                </div>


            </form>
            <div class="text-center fs-6">
                <a href="{{ route('register') }}">ليس لديك حساب </a> و <a href="{{ route('register') }}">تريد انشاء حساب جديد</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Main JS File -->
    <script src="front/assets/js/main.js"></script>
    <script src="front/assets/js/sub_service.js"></script>

</body>

</html>
