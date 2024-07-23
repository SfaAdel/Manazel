@extends('front/layouts.index')
@section('page.title', 'معلومات حولنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur"
        style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3">{{ $aboutSection->title }}</h1>

                </div>
            </div>
        </div>
    </section>

    <main class="container">

        @if ($aboutSection->long_description)
            <section id="why-us" class="section why-us px-4 mt-4 spikes" data-builder="section">

                <div>{!! $aboutSection->long_description !!}</div>
            </section>
        @endif


        <!-- About Section -->
        <section id="about" class="about section p-5 mt-4">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="">{{ $aboutSection->title }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 mb-5">
                    <div class="col-12" data-aos="fade-up">
                        <p class="lead">{{ $aboutSection->short_description }}</p>
                    </div>

                    <div id="advantage_mobile" class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
                        <div id="advantagesCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($advantages as $index => $advantage)
                                    <div class="carousel-item @if ($index == 0) active @endif">
                                        <div class="card border-secondry">
                                            <div class="card-body text-center">
                                                <i class="bi bi-check2-circle display-4 text-custom mb-3"></i>
                                                <p class="card-text">{{ $advantage->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="my-4 align-items-center" data-aos="zoom-in" data-aos-delay="200">
                            <img src="{{ asset('images/titles/' . $aboutSection->icon) }}"
                                class="img-fluid animated rounded" alt="Why Us">
                        </div>
                    </div>

                    <div id="advantage_web" class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
                        <div class="row">
                            @foreach ($advantages as $advantage)
                                <div class="col-md-6 mb-4">
                                    <div class="card border-custom">
                                        <div class="card-body text-center">
                                            <i class="bi bi-check2-circle display-4 text-custom mb-3"></i>
                                            <p class="card-text">{{ $advantage->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div id="advantage_web" class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('images/titles/' . $aboutSection->icon) }}" class="img-fluid animated rounded"
                            alt="Why Us">
                    </div>
                </div>


            </div>

            <div class=" mycounter carousel slide" id="advantagesCarousel" data-bs-ride="carousel">
                <div class="row">


                    <!-- counter -->
                    @foreach ($counters as $counter)
                        <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated my-3"
                            data-wow-duration="900ms"
                            style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                            <img src="{{ asset('images/counters/' . $counter->icon) }}" class="img ml-1" alt="icon">
                            <span class="timer counter alt-font appear" data-to="810"
                                data-speed="7000">{{ $counter->number }}</span>
                            <span class="counter-title">{{ $counter->title }}</span>
                        </div>
                    @endforeach
                    <!-- end counter -->

                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated my-3"
                        data-wow-duration="600ms"
                        style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                        <img src="{{ asset('images/counters/' . 'place.png') }}" class="img ml-1"
                            alt="Main Company Headquarters">
                        <span class="timer counter_text alt-font appear mb-1">الرياض</span>
                        <span class="counter-title">مقر الشركة</span>
                    </div>
                    <!-- end counter -->
                </div>
            </div>

        </section>
        <!-- /About Section -->



        <!-- Why Us Section -->
        <section id="why-us" class="section why-us px-4 mt-4 spikes" data-builder="section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class=""><strong>{{ $whyUsSection->title }}</strong></h3>
                            <p class=""> {{ $whyUsSection->short_description }} </p>
                        </div>

                        <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                            @foreach ($whyUsAnsweres as $whyUsAnswer)
                                <div class="faq-item">
                                    <h3 class="mx-0 my-2"><span>{{ $loop->iteration }}</span>
                                        {{ $whyUsAnswer->question }}</h3>
                                    <div class="">
                                        <p>{{ $whyUsAnswer->answer }}</p>
                                    </div>
                                    {{-- <i class="faq-toggle bi bi-chevron-right"></i> --}}
                                </div><!-- End Faq item-->
                            @endforeach

                        </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                        <img src="front/assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in"
                            data-aos-delay="100">
                    </div>
                </div>

            </div>

        </section><!-- /Why Us Section -->


        <!-- Team Section -->
        <section id="team" class="testimonials section px-4 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2> {{ $teamSection->title }} </h2>
                <p>{{ $teamSection->short_description }}</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper">
                    <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 3000
                },
                "slidesPerView": "auto",
                "pagination": {
                  "el": ".swiper-pagination",
                  "type": "bullets",
                  "clickable": true
                }
              }
            </script>
                    <div class="swiper-wrapper">


                        @foreach ($teams as $team)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ asset('images/teams/' . $team->icon) }}" class="testimonial-img"
                                        alt="">

                                    <h3> {{ $team->name }}</h3>
                                    <p>
                                        <span>{{ $team->description }}</span>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </section><!-- /Testimonials Section -->

        <!-- place Section -->
        <section id="why-us" class="section why-us px-4 mt-4 spikes" data-builder="section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-12 d-flex flex-column justify-content-center order-2 order-lg-1">


                        <!-- Section Title -->
                        <div class="container section-title" data-aos="fade-up">
                            <h2>أماكن تواجدنا في المملكة</h2>
                        </div><!-- End Section Title -->


                        <div class="row">
                            @foreach ($cities as $city)
                                <div class="col-md-6 mb-4">
                                    <div class="card border-secondry">
                                        <div class="card-body text-center">
                                            <i class="fa fa-location display-4 text-custom mb-3"></i>
                                            <p class="card-text">{{ $city->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>

        </section><!-- /place Section -->


    </main>

@endsection
