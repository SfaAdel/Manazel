@extends('front/layouts.index')
@section('page.title', 'جميع {{$categoriesSection->title}}')
@section('page.description',  $categoriesSection->short_description )

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('{{ asset('images/pages_banners/' . $categoriesSection->banner) }}');">

        <div class="container px-4">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">
                        جميع {{$categoriesSection->title}}
                    </h1>
                    <hr class="text-light">
                    <p class="mt-2">{{ $categoriesSection->short_description }}</p>

                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/titles/' . $categoriesSection->icon) }}" class="img-fluid animated" alt="">
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
                          <img class="custom-card-img-top my-3 new_icon" src="{{ asset('images/categories/' . $navCategory->icon) }}" alt="{{ $navCategory->name }}">
                        </div>
                        <h4><a href="{{ route('services', ['id' => $navCategory->id, 'name' => $navCategory->name]) }}" class="stretched-link" title="{{ $navCategory->name }}">{{ $navCategory->name }}</a></h4>
                        <p>{{ $navCategory->description }}</p>
                        <a href="{{ route('services', ['id' => $navCategory->id, 'name' => $navCategory->name]) }}" class="btn btn-blue mt-3" title="{{$navCategory->name}}"> تعرف علي الخدمات</a>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>


        </section><!-- /Services Section -->

    </main>
@endsection
