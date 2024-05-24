{{-- <header id="header" class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img src="assets/img/logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">الرئيسية</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">من نحن</a></li>
                    <li class="nav-item dropdown">
                        <a href="{{ route('services') }}" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">خدماتنا</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة غسالات</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">تصليح غسالات</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة افران الغاز</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة افران</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة ثلاجات</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">تصليح ثلاجات</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة مكيفات</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صيانة مكيفات سبليت</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">كهربائي</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">سباك</a></li>
                            <li><a href="{{ route('details') }}" class="dropdown-item">صباغ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="#portfolio" class="nav-link">الخصوصية</a></li>
                    <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">المدونة</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">تواصل معنا</a></li>
                </ul>
                <a class="btn-getstarted" href="#about">اشترك كمزود خدمة</a>
            </div>
        </div>
    </nav>
</header> --}}




<header id="header" class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light m-auto text-center px-4 px-lg-5 py-3 py-lg-0" id="navbar">
        <a href="{{ route('home') }}" class="navbar-brand p-0">
            <img src="front/assets/img/logo.png" alt="logo" class="img-thumbnail ml-3">
        </a>

        <button class="navbar-toggler" style="box-shadow: none; border: none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse mr-4 justify-content-center" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item mt-1 nav-link {{ Request::is('home') ? 'active' : '' }}">الرئيسية</a>
                <a href="{{ route('about') }}" class="nav-item mt-1 nav-link {{ Request::is('about') ? 'active' : '' }}">من نحن</a>
                <div class="nav-item dropdown">
                    <a href="{{ route('services') }}" class="nav-link dropdown-toggle {{ Request::is('services') ? 'active' : '' }}" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        خدماتنا
                        <i class="bi bi-caret-down mr-1"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة غسالات</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">تصليح غسالات</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة افران الغاز</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة افران</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة ثلاجات</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">تصليح ثلاجات</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة مكيفات</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صيانة مكيفات سبليت</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">كهربائي</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">سباك</a></li>
                        <li><a class="dropdown-item" href="{{ route('service_details') }}">صباغ</a></li>
                        <li><a class="dropdown-item" href="{{ route('services') }}">جميع الخدمات</a></li>

                    </ul>
                </div>
                <a href="#portfolio" class="nav-item mt-1 nav-link">الخصوصية</a>
                <a href="{{ route('blogs') }}" class="nav-item mt-1 nav-link {{ Request::is('blogs') ? 'active' : '' }}">المدونة</a>
                <a href="{{ route('contact') }}" class="nav-item mt-1 nav-link {{ Request::is('contact') ? 'active' : '' }}">تواصل معنا</a>
            </div>
            <a class="btn-getstarted" href="{{ route('general_order') }}">احجز موعد الان</a>
        </div>

        <div class="m-3">
            <a href="{{ route('cart') }}" class="mx-3"><i class=" bi bi-cart"></i></a>
            <a  href="https://api.whatsapp.com/send?phone=201012076064"><i class="bi bi-whatsapp mx-2 text-success"></i></a>
            <a href=""><i class="bi bi-phone mx-2 text-info"></i></a>
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
