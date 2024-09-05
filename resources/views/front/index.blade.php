@extends('front/layouts.home')
@section('page.title', ' منازل الرئيسية')
@section('page.description', $mainSection->short_description)

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur mb-5"
        style="background-image: url('{{ asset('images/pages_banners/' . $mainSection->banner) }}');">
        <div class="container px-4">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">
                        أهلا بك في <span class="text-custom"> منازل </span>
                    </h1>
                    <hr>
                    <p class="mt-2">{{ $mainSection->short_description }}</p>
                    <div class="d-flex mt-3">
                        <a href="tel:+{{ $setting->phone }}" class="btn-get-started" onclick="registerClick('call')"
                            title="{{ $setting->phone }}"> اتصل بنا</a>

                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center" title="شاهد الان">
                            <i class="bi bi-play-circle mx-2"></i><span>شاهد الان</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/titles/' . $mainSection->icon) }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>


    <main class="container ">


        {{-- errors --}}
        @if (session()->has('success'))
            <div class="alert alert-success" id="success-alert">
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


        <!-- offers Section -->
        @if ($subServicesWithOffer->isNotEmpty())

            <section id="offers" class="testimonials section py-5 mt-4">

                <!-- Section Title -->
                <div class="container section-title offer_title" data-aos="fade-up">
                    <h2>العروض والخصومات<i class="fa fa-fire text-custom" style="font-size: 18px"></i></h2>
                    <p>نقدم لكم افضل العروض والخصومات على جميع خدماتنا</p>
                </div>
                <!-- End Section Title -->

                {{-- <div class="container" data-aos="fade-up" data-aos-delay="100">
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
                            @foreach ($subServicesWithOffer as $subService)
                                <div class="swiper-slide offer-banner"
                                    style="background-image: url('{{ asset('images/sub_service_bannars/' . $subService->bannar) }}');">
                                    <div class="testimonial-item"> <!-- Adjusted structure for styling consistency -->
                                        <div class="container px-4">
                                            <div class="row gy-4">
                                                <div class="col-lg-12 order-2 order-lg-1 d-flex flex-column justify-content-center"
                                                    data-aos="zoom-out">
                                                    <div class="d-flex mt-3 align-items-center justify-content-center">
                                                        <a href="{{ route('sub_service_details', $subService->id) }}"
                                                            class="btn-custom offer_btn">
                                                            احصل علي العرض
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>

                    </div>
                </div> --}}

                <!-- Swiper Container -->
                <div class="container" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($subServicesWithOffer as $subService)
                                <div class="swiper-slide">
                                    <div class="card--container card text-white text-left m-2"
                                        style="background-image: url('{{ asset('images/sub_service_bannars/' . $subService->bannar) }}');">
                                        <div class="card--body">
                                            <!-- Your card content here -->
                                        </div>
                                        <br>
                                        <br>
                                        <a href="{{ route('sub_service_details', ['id' => $subService->id, 'name' => $subService->name]) }}"
                                            class="offer_btn" title="{{ $subService->name }}">
                                            احصل علي العرض
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- Add Pagination and Navigation -->
                        <div class="swiper-pagination"></div>
                        {{-- <div class="offer-button-next">..</div>
            <div class="offer-button-prev">..</div> --}}
                    </div>
                </div>

            </section>

        @endif

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var swiper = new Swiper(".mySwiper", {
                    loop: true,
                    loopFillGroupWithBlank: true,
                    pagination: {
                        el: ".swiper-pagination",
                        clickable: true,
                    },
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        // When window width is >= 320px
                        320: {
                            slidesPerView: 1,
                            slidesPerGroup: 1,
                            spaceBetween: 5,
                        },
                        // When window width is >= 640px
                        640: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                            spaceBetween: 20,
                        },
                        // When window width is >= 1024px
                        1024: {
                            slidesPerView: 3,
                            slidesPerGroup: 3,
                            spaceBetween: 30,
                        },
                        // When window width is >= 1280px
                        1280: {
                            slidesPerView: 4,
                            slidesPerGroup: 4,
                            spaceBetween: 40,
                        },
                    }
                });
            });
        </script>

        {{-- <script>
    const swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            480: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            987: {
                slidesPerView: 3,
            },
            1200: {
                slidesPerView: 4,
            }
        }
    });
</script> --}}




        <!-- About Section -->
        <section id="about" class="about section py-5 px-1 mt-4">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="">{{ $aboutSection->title }}</h2>
            </div><!-- End Section Title -->

            <div class="container">
                <div class="row gy-4 mb-5">
                    <div class="col-12" data-aos="fade-up">
                        <p class="lead">{{ $aboutSection->short_description }}</p>
                    </div>

                    <div class="center mt-4">
                        <a href="{{ route('about') }}" class="btn btn-custom mt-3" title="معرفة المزيد">معرفة المزيد</a>
                    </div>

                    <div id="advantage_mobile" class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
                        <div id="advantagesCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($advantages as $index => $advantage)
                                    <div class="carousel-item @if ($index == 0) active @endif">
                                        <div class="card border-custom">
                                            <div class="card-body text-center">
                                                {{-- <i class="bi bi-check2-circle display-4 text-custom mb-3"></i> --}}
                                                <img src="{{ asset('images/advantages/' . $advantage->icon) }}"
                                                    class="img ml-1 new_icon" alt="icon">
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
                                            {{-- <i class="bi bi-check2-circle display-4 text-custom mb-3"></i> --}}
                                            <img src="{{ asset('images/advantages/' . $advantage->icon) }}"
                                                class="img ml-1 new_icon" alt="icon">
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

            <div id="advantage_mobile" class="mycounter carousel slide" id="advantagesCarousel" data-bs-ride="carousel"
                data-bs-interval="3000">
                <div class="carousel-inner">
                    <!-- Grouping counters in slides -->
                    @php
                        $countersWithPlace = $counters
                            ->concat([(object) ['icon' => 'place.png', 'number' => '', 'title' => 'مقر الشركة']])
                            ->chunk(2); // Split counters including place into chunks of 2
                    @endphp
                    @foreach ($countersWithPlace as $index => $counterChunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($counterChunk as $counter)
                                    <div
                                        class="col-md-3 col-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated my-3">
                                        <img src="{{ asset('images/counters/' . $counter->icon) }}" class="img new_icon"
                                            alt="icon">
                                        @if ($counter->number)
                                            <span class="timer counter alt-font appear" data-to="810"
                                                data-speed="7000">{{ $counter->number }}</span>
                                        @else
                                            <span class="timer counter_text alt-font appear mb-1">الرياض</span>
                                        @endif
                                        <span class="counter-title">{{ $counter->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel controls if needed -->
                <button class="carousel-control-prev" type="button" data-bs-target="#advantagesCarousel"
                    data-bs-slide="prev" title="السابق">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#advantagesCarousel"
                    data-bs-slide="next" title="التالى">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div id="advantage_web" class=" mycounter carousel slide" id="advantagesCarousel" data-bs-ride="carousel">
                <div class="row">


                    <!-- counter -->
                    @foreach ($counters as $counter)
                        <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated my-3"
                            data-wow-duration="900ms"
                            style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                            <img src="{{ asset('images/counters/' . $counter->icon) }}" class="img new_icon"
                                alt="icon">
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
                        <img src="{{ asset('images/counters/' . 'place.png') }}" class="img  new_icon"
                            alt="Main Company Headquarters">
                        <span class="timer counter_text alt-font appear mb-1">الرياض</span>
                        <span class="counter-title">مقر الشركة</span>
                    </div>
                    <!-- end counter -->
                </div>
            </div>



        </section><!-- /About Section -->


        <!-- /Services Section -->
        <section id="services" class="services section p-3 mt-4">

            <!-- Section Title -->
            <div class=" section-title mb-5" data-aos="fade-up">
                <h2>{{ $serviceSection->title }}</h2>
                <p>{{ $serviceSection->short_description }}</p>
            </div><!-- End Section Title -->

            <div>
                <div class="row gy-4 ">
                    @foreach ($categories as $category)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 d-flex align-items-center  my-2">
                            <div class="service-item position-relative" data-aos="fade-up"
                                data-aos-delay="{{ $loop->iteration * 100 }}">
                                <div class="icon">
                                    <h4>
                                        <img src="{{ asset('images/categories/' . $category->icon) }}"
                                            class="service_icon mb-1" alt="icon">
                                        <br>
                                        {{ $category->name }}
                                    </h4>
                                </div>
                                <p class="my-1">{{ $category->description }}</p>
                                <a href="{{ route('services', ['id' => $category->id, 'name' => $category->name]) }}"
                                    class="btn btn-custom mt-3" title="{{ $category->name }}">تعرف على
                                    الخدمات </a>
                            </div>
                        </div><!-- End Service Item -->
                    @endforeach
                </div>

                <div class="center my-3">
                    <a href="{{ route('categories') }}" class="btn btn-custom" title="عرض جميع التصنيفات">عرض جميع
                        التصنيفات</a>
                </div>
            </div>
        </section><!-- /Services Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section py-5 px-1 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $testimonialSection->title }}</h2>
                <p>{{ $testimonialSection->short_description }} </p>
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

                        @foreach ($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    {{-- <img src="front/assets/img/testimonials/1.png" class="testimonial-img" alt=""> --}}
                                    <img src="{{ asset('images/testimonials/' . $testimonial->icon) }}"
                                        class="testimonial-img mobile_icon" alt="icon">

                                    <h3>{{ $testimonial->name }}</h3>
                                    {{-- <h4>Ceo &amp; Founder</h4> --}}
                                    <div class="stars">
                                        @for ($i = 0; $i < $testimonial->stars; $i++)
                                            <i class="fa-solid fa-star text-warning"></i>
                                        @endfor
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span> {{ $testimonial->review }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            </div>

        </section><!-- /Testimonials Section -->

        {{-- <hr> --}}

        <!-- Team Section -->
        <section id="teams" class="testimonials section py-5 px-1 mt-4">

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
                                    <img src="{{ asset('images/teams/' . $team->icon) }}"
                                        class="mobile_icon testimonial-img " alt="">

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

        {{-- <hr> --}}
        @if ($blogs->isNotEmpty())
            <!-- Blog Section -->
            <section id="services" class="services section p-3 mt-4">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <!-- Section Title and Description -->
                    @if (isset($blogSection))
                        <h2>{{ $blogSection->title }}</h2>
                        <p class="mb-4">{{ $blogSection->short_description }}</p>
                    @endif

                    <!-- Blog Entries -->
                    @if (!isset($blogs) || $blogs->isEmpty())
                        <h4 class="mt-3">لا يوجد مدونات بعد</h4>
                    @else
                        <div class="container" data-aos="fade-up" data-aos-delay="100">

                            {{-- <div class="swiper blog-swiper"> --}}
                            {{-- <script type="application/json" class="swiper-config">
                                {
                                    "loop": true,
                                    "speed": 600,
                                    "autoplay": {
                                    "delay": 3000
                                    },
                                    "slidesPerView": 1,
                                    "pagination": {
                                    "el": ".swiper-pagination",
                                    "type": "bullets",
                                    "clickable": true
                                    }
                                }
                                </script> --}}


                            {{-- <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ($blogs as $blog)
                                            <div class="swiper-slide">
                                                <div class="blog-entry d-flex align-items-start bg-light">
                                                    <div class="pic">
                                                        <img src="{{ asset('images/blogs/' . $blog->icon) }}"
                                                            class="img-fluid" alt="">
                                                    </div>
                                                    <div class="entry-info m-2 mx-3">
                                                        <h4 class="mb-4 ">{{ $blog->main_title }}</h4>
                                                        <p class="d-inline mt-4">{{ $blog->short_description }}</p>

                                                        <a href="{{ route('blog_details', ['id' => $blog->id, 'slug' => $blog->main_title]) }}"
                                                            class="btn mt-3 d-inline text-primary" title="{{$blog->name}}">قراءة المزيد . . .
                                                        </a>

                                                    </div>
                                                </div>

                                            </div><!-- End Blog Entry -->
                                        @endforeach
                                    </div>
                                </div> --}}

                            <div>
                                <div class="row gy-4 m-2 mx-auto">
                                    @foreach ($blogs as $blog)
                                        <div
                                            class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 d-flex align-items-center  my-2">
                                            <div class="service-item position-relative" data-aos="fade-up"
                                                data-aos-delay="{{ $loop->iteration * 100 }}">
                                                <div class="icon">
                                                    <h4>
                                                        <img src="{{ asset('images/blogs/' . $blog->icon) }}"
                                                            class="service_icon mb-1" alt="icon">
                                                        <br>
                                                        {{ $blog->main_title }}
                                                    </h4>
                                                </div>
                                                <p class="my-1">{{ $blog->short_description }}</p>
                                                <a href="{{ route('blog_details', ['id' => $blog->id, 'slug' => $blog->main_title]) }}"
                                                    class="btn btn-custom mt-3" title="{{ $category->name }}">
                                                    قراءةالمزيد . .
                                                </a>
                                            </div>
                                        </div><!-- End Service Item -->
                                    @endforeach
                                </div>
                            </div>

                            <div class="center mt-4">
                                <a href="{{ route('blogs') }}" class="btn btn-custom mt-3" title="عرض كل المدونات">عرض
                                    كل المدونات</a>
                            </div>
                            {{-- </div> --}}
                        </div>
                    @endif
                </div>

            </section><!-- /Blog Section -->
        @endif
        {{-- <hr> --}}

        <!-- Contact Section -->
        <section id="contact" class="testimonials section py-5 px-1 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>{{ $contactSection->title }} </h2>
                <p>
                    {{ $contactSection->short_description }}
                    <i class="bi bi-heart text-danger"></i>
                </p>
            </div><!-- End Section Title -->


            <div class="center mt-4">
                <a href="{{ route('contact') }}" class="btn btn-custom mt-3" title="تواصل معنا"> تواصل معنا</a>
            </div>



        </section><!-- /Contact Section -->

    </main>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const successAlert = document.getElementById('success-alert');
        if (successAlert) {
            setTimeout(() => {
                successAlert.style.transition = 'opacity 1s ease-out';
                successAlert.style.opacity = '0';
                setTimeout(() => {
                    successAlert.remove();
                }, 1000); // Ensure the alert is completely hidden before removing it
            }, 3000); // 3 seconds
        }
    });
</script>
