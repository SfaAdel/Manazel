@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')




    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur"
        style="background-image: url('{{ asset('images/blogs_banners/' . $blog->banner) }}');">
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3"> مدونة {{ $blog->main_title }} </h1>

                </div>
            </div>
        </div>
    </section>

    <main class="container my-6 p-6 mt-4">
        {{-- errors --}}
        @if (session()->has('success'))
            <div class="alert alert-success mt-3" id="success-alert">
                {{ session('success') }}
            </div>
        @endif

        @if (count($errors) > 0)
            <alert alert-title="خطأ في البيانات" alert-type="error" :alert-messages="{{ collect($errors->all()) }}">
            </alert>
        @endif

        @if (session()->has('error'))
            <alert title="خطأ في البيانات" alert-type="error" alert-title="{{ session('error') }}"></alert>
        @endif
        {{-- end errors --}}

        <!-- About Section -->
        <section id="about" class="about section p-5 mt-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class=""> {{ $blog->main_title }}</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col-12 center" data-aos="fade-up">
                        <p class="lead">{{ $blog->short_description }}
                        </p>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        {{-- <h2 class="my-3">{{$blog->second_title}}</h2> --}}
                        <div class="row">

                            <div class="col-md-12 mb-4">

                                <div>{!! $blog->long_description !!}</div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="img-fluid animated rounded"
                            alt="Why Us">
                    </div>
                </div>



        </section><!-- /About Section -->


        {{-- start general request section --}}
        <section id="contact" class="contact section px-4 mt-4">

            <div class="container py-5">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>اطلب خدمتك الان</h2>
                    <p>
                        وسنتواصل معك فى اقرب وقت
                        <i class="bi bi-heart text-danger"></i>
                    </p>
                </div><!-- End Section Title -->
                <div class="d-flex justify-content-center">
                    <div class="col-lg-9 info-wrap">
                        <form action="{{ route('general_request_store') }}" method="POST" data-aos="fade-up"
                            data-aos-delay="200" class="form">
                            @csrf
                            <!-- Start Card Content -->
                            {{-- <div class="card-content"> --}}

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="services">اختر القسم </label>
                                            <select id="services" class="form-select" placeholder="اختر قسم" required>
                                                <option value="" disabled selected>اختر قسم</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}" {{ old('sub_service_id->service') == $service->id ? 'selected' : '' }}>
                                                        {{ $service->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="sub_services">اخترالخدمة </label>
                                            <select id="sub_services" class="form-select" placeholder="اختر خدمة" disabled name="sub_service_id" required>
                                                <option value="" disabled selected>اختر خدمة</option>
                                                @foreach ($subServices as $subService)
                                                    <option value="{{ $subService->id }}" data-service-id="{{ $subService->service_id }}" {{ old('sub_service_id') == $subService->id ? 'selected' : '' }}>
                                                        {{ $subService->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            <hr />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">الاسم</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="ادخل اسمك ثلاثي" name="name" required minlength="9"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">رقم الهاتف </label>
                                        <input type="text" id="phone" class="form-control"
                                            placeholder="ادخل رقم هاتفك (05xxxxxxxx)*" name="phone" required minlength="10"
                                            maxlength="10" value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>
                            <hr />

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="city">المدينة</label>
                                        <select name="" id="city" class="form-control" required>
                                            <option value="" disabled selected>اختر المدينة</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label" for="district">الحي</label>
                                        <select name="district_id" id="district" class="form-control" disabled required>
                                            <option value="">اختر الحي </option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}"
                                                    data-city-id="{{ $district->city_id }}">{{ $district->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-1 mx-1">
                                    <label class="form-label" for="address">العنوان</label>
                                    <input type="text" name="address" value=""
                                        placeholder="من فضلك ادخل عنوانك بالتفصيل" class="form-control" required>
                                </div>
                            </div>




                            {{-- </div> --}}
                            <!-- End Card Content -->

                            <!-- Start Card Footer -->
                            <div class="card-footer mt-3">
                                <div class="buttons has-addons">
                                    <a class="btn btn-secondary submit" href="{{ route('home') }}"> الغاء </a>
                                    <button type="submit" class="btn btn-blue submit">تأكيد الطلب </button>
                                </div>
                            </div><!-- End Card Footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
        {{-- start general request section --}}

    </main>

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to filter sub-services based on selected service
            $('#services').change(function() {
                var serviceId = $(this).val();
                $('#sub_services').prop('disabled', false);
                $('#sub_services option').each(function() {
                    var subServiceId = $(this).data('service-id');
                    if (subServiceId == serviceId) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                $('#sub_services').val('');
            });

            // Initial hide all sub-services options except the default one
            $('#sub_services option').not('[value=""]').hide();

            // Function to filter districts based on selected city
            $('#city').change(function() {
                var cityId = $(this).val();
                if (cityId) {
                    $('#district').prop('disabled', false);
                    $('#district option').each(function() {
                        var districtCityId = $(this).data('city-id');
                        if (districtCityId == cityId) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                    $('#district').val('');
                } else {
                    $('#district').prop('disabled', true);
                    $('#district option').hide();
                    $('#district option[value=""]').show(); // Show the placeholder option
                }
            });

            // Initial hide all district options except the default one
            $('#district option').not('[value=""]').hide();
        });
    </script>


@endsection
