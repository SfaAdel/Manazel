@extends('front/layouts.index')
@section('page.title', ' جميع التصنيفات')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3">جميع التصنيفات  </h1>
                    {{-- <p>{{ $category->description }}</p> --}}

                </div>
            </div>
        </div>
    </section>

    <main class="container my-6 p-6">

        <!-- Services Section -->
        <section id="services" class="services section mt-5">

            {{-- <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>جميع خدماتنا</h2>
            </div><!-- End Section Title --> --}}


            <div class="container mt-3">
                <div class="row gy-4">
                  @foreach ($navCategories as $navCategory)
                    <div class="col-xl-3 col-md-6 col-sm-12 d-flex" data-aos="fade-up" data-aos-delay="100">
                      <div class="service-item position-relative center">
                        <div class="icon">
                          <img class="custom-card-img-top my-3" src="{{ asset('images/categories/' . $navCategory->icon) }}" alt="{{ $navCategory->name }}">
                        </div>
                        <h4><a href="{{ route('services', $navCategory->id) }}" class="stretched-link">{{ $navCategory->name }}</a></h4>
                        <p>{{ $navCategory->description }}</p>
                        <a href="{{ route('services', $navCategory->id) }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>


        </section><!-- /Services Section -->

    </main>
@endsection
