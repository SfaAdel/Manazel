@extends('front/layouts.index')
@section('page.title', ' خدماتنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3"> {{ $category->name }} </h1>
                    <p>{{ $category->description }}</p>

                </div>
            </div>
        </div>
    </section>

    <main class="container my-6 p-6">

        <!-- Services Section -->
        <section id="services" class="services section mt-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>جميع خدماتنا</h2>
            </div><!-- End Section Title -->


            <div class="container mt-3">

                <div class="row gy-4">
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="icon"><i class="bi bi-activity icon"></i></div>
                                <h4><a href="{{ route('service_details', $service->id) }}"
                                        class="stretched-link">{{ $service->name }} </a></h4>
                                <p> {{ $service->description }} </p>
                                <a href="{{ route('service_details', $service->id) }}" class="btn btn-blue mt-3">معرفة
                                    المزيد</a>

                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>
            </div>

        </section><!-- /Services Section -->

    </main>
@endsection
