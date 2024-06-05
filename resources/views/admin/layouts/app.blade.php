<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="locale" content="{{ config('app.locale') }}">
    <!-- Title -->
    <title>لوحة التحكم | @yield('page.title')</title>
    <!-- SEO Tags -->
    <meta name="description" content="Dashboard, Code, Ideas, settings, laravel, bulma">
    <meta name="author" content="Code Ideas">
    <!-- Type Tags -->
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  {{-- <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
  <!-- Bootstrap CSS -->
  {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
  <!-- Bootstrap Datepicker CSS -->
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"> --}}
    <!-- Styles -->
    <link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet" type="text/css">

{{-- main --}}
<link href="{{ asset('/admin/css/main.css') }}" rel="stylesheet" type="text/css">
{{-- Font Awesome --}}
<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">


    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/admin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/admin/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/admin/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/admin/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="/admin/img/favicon/safari-pinned-tab.svg" color="#54cc96">

    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-xX2qm/2s5QTH3BgKu8E0bM2Dr52XYXaRb1XoQ3Dd8r6LOIF6cHDuHFq3TR96EzD2F2CCURQAxufbAqx8g+stMw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}


    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <div class="wrapper" id="app">
        <!--========Admin Loader============-->
        <div class="pageloader is-active"><span class="title">DashBoard</span></div>
        <!--========Admin Login layout============-->
        @if (Route::current()->getName() === 'login_form')
            <main class="login-page">
                <img class="wave" src="{{ asset('/admin/img/wave.png') }}">
                @include('admin.partials.alerts')
                <div class="login-page-child">
                    <div class="container">
                        <div class="columns-container">
                            <div class="columns is-centered is-vcentered">
                                <div class="column is-6">
                                    @yield('content')
                                </div>
                                <div class="column is-6">
                                    <img class="side-vector" src="{{ asset('/admin/img/bg.svg') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <!--========Admin landing layout (feel free to remove it and change route)============-->
        @elseif(Route::current()->getName() === 'admin_landing')
            @yield('content')
        <!--========Admin Area layout============-->
        @else
            @include('admin.partials.alerts')
            @include('admin.includes.header')
            <main class="main-content">
                <div class="columns is-gapless">
                    <div class="column is-2" id="aside-container">
                        @include('admin.includes.side_bar')
                    </div>
                    <div class="column is-10" id="main-container">
                        <div class="page-container">
                            <div class="page-content">
                                @include('admin.includes.breadcrumb')
                                @yield('content')
                                @include('admin.includes.footer')
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @endif
    </div>
    <!-- Scripts -->
    <script src="{{ asset('/admin/js/app.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    @stack('scripts')

    @push('scripts')
    <script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            multidate: true,
            startDate: '{{ now()->startOfMonth()->toDateString() }}',
            endDate: '{{ now()->addMonth()->endOfMonth()->toDateString() }}'
        }).on('changeDate', function(e) {
            var selectedDates = $(this).datepicker('getFormattedDate');
            $(this).val(selectedDates.split(','));
        });
    });
    </script>
    @endpush


    @yield('scripts')
</body>

</html>
