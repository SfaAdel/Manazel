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


<header id="header" class="header d-flex align-items-center fixed-top navbar navbar-expand-lg bg-body-tertiary" style="display: none">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-around">
      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="logo" class="img-thumbnail ">

        {{-- <h1 class="sitename ms-3 m-2">منازل</h1> --}}
      </a>
      <nav id="navmenu" class="navmenu">
        <ul class="d-flex center">
          <li><a href="{{ route('home') }}" class="">الرئيسية</a></li>
          <li><a href="{{ route('about') }}">من نحن</a></li>
          <li class="dropdown"><a href="{{ route('services') }}"><span>خدماتنا</span> <i class="bi bi-chevron-down toggle-dropdown mx-2"></i></a>
            <ul class="center">
              <li><a href="{{ route('details') }}">صيانة غسالات </a></li>
              <li><a href="{{ route('details') }}">تصليح غسالات </a></li>
              <li><a href="{{ route('details') }}">صيانة افران الغاز </a></li>
              <li><a href="{{ route('details') }}">صيانة افران</a></li>
              <li><a href="{{ route('details') }}">صيانة ثلاجات</a></li>
              <li><a href="{{ route('details') }}">تصليح ثلاجات</a></li>
              <li><a href="{{ route('details') }}">صيانة مكيفات</a></li>
              <li><a href="{{ route('details') }}">صيانة مكيفات سبليت</a></li>
              <li><a href="{{ route('details') }}"> كهربائي</a></li>
              <li><a href="{{ route('details') }}">  سباك</a></li>
              <li><a href="{{ route('details') }}">  صباغ</a></li>
            </ul>
          </li>
          <li><a href="#portfolio">الخصوصية</a></li>
          <li><a href="{{ route('blogs') }}"> المدونة</a></li>
          <li><a href="{{ route('contact') }}">تواصل معنا</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="#about"> اشترك كمزود خدمة</a>
    </div>
  </header>
