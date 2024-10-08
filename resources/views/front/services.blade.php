@extends('front/layouts.index')
@section('page.title', $category->name)
@section('page.description',   $category->description )

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur"
        style="background-image: url('{{ asset('images/categories_bannars/' . $category->bannar) }}');">
        <div class="container px-4">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">
                        {{ $category->name }}
                    </h1>
                    <hr class="text-light">
                    <p class="mt-2">{{ $category->description }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/categories/' . $category->logo) }}" class="img-fluid animated" alt="{{$category->name}}" title="{{$category->name}}">
                </div>
            </div>
        </div>

    </section>

    <main class="container my-6 p-6">

        <!-- Services Section -->
        <section id="services" class="services section mt-5">

            @if (!$services->isEmpty())

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>جميع الخدمات التي تخص قسم  {{ $category->name }} </h2>
            </div><!-- End Section Title -->


            <div class="container mt-3">

                <div class="row gy-4">
                        @foreach ($services as $service)
                            <div class="col-xl-3 col-md-6 d-flex align-items-center m-auto my-3" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="service-item position-relative center">
                                    <div class="icon">
                                        <img class="custom-card-img-top my-1 new_icon"
                                            src="{{ asset('images/services/' . $service->icon) }}"
                                            alt="{{ $service->name }}" title="{{ $service->name }}">
                                    </div>
                                    <h4><a href="{{ route('service_details', ['id' => $service->id, 'name' => $service->name]) }}"
                                            class="stretched-link" title="{{ $service->name }}">{{ $service->name }} </a></h4>
                                    <p> {{ $service->description }} </p>
                                    <a href="{{ route('service_details', ['id' => $service->id, 'name' => $service->name]) }}" class="btn btn-blue mt-3" title="اختر خدمة">اختر
                                        خدمة</a>

                                </div>
                            </div><!-- End Service Item -->
                        @endforeach
                    </div>

            </div>
            @else
            <div class="center text-secondary">
                <h3>لا يوجد خدمات خاصة بقسم {{ $category->name }}  متاحة بعد</h3>
            </div>
        @endif
        </section><!-- /Services Section -->

    </main>
@endsection
