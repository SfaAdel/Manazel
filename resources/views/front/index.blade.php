@extends('front/layouts.index')
@section('page.title', 'الرئيسية')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur mb-5"
        style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/background.jpg');"></div>
        <div class="container px-4">
            <div class="row gy-4 mr-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3"> اهلا بك في منازل</h1>
                    <hr>
                    <p class="mt-2">لتقديم جميع خدمات الصيانة و التصليح للغسالات و الثلاجات و الفريزرات و الأفران و
                        المكيفات بالاضافة الى خدمات الصبغ و السباكة و الكهرباء في المملكة العربية السعودية 0542936554</p>
                    <div class="d-flex mt-3">
                        <a href="#" class="btn-get-started"> اشترك كمزود خدمة </a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
                            class="glightbox btn-watch-video d-flex align-items-center">
                            <i class="bi bi-play-circle mx-2"></i><span>شاهد الان</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="front/assets/img/logo2.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>


    <main class="container ">

        <!-- About Section -->
        <section id="about" class="about section p-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="">من نحن</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col-12" data-aos="fade-up">
                        <p class="lead">
                            يعود تاريخ شركة الأنظمة الأولية في المملكة العربية السعودية إلى عام 2000م , عندما قررنا البدء في
                            مجال الصيانة و التصليح لتقديم تجربة استثنائية لجميع العملاء في المملكة . لم تكن الصيانة و
                            التصليح مجرد مهنة نمتهنا بل كانت أكثر من ذلك .
                        </p>
                    </div>



                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
                        <div class="row">
                            @foreach ($advantages as $advantage)
                                <div class="col-md-6 mb-4">
                                    <div class="card border-info">
                                        <div class="card-body text-center">
                                            <i class="bi bi-check2-circle display-4 text-info mb-3"></i>
                                            <p class="card-text">{{ $advantage->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <img src="front/assets/img/why-us.png" class="img-fluid animated rounded" alt="Why Us">
                    </div>
                </div>

                <section class="wow fadeIn animated " style="visibility: visible; animation-name: fadeIn;">
                    <div class="m-4 mycounter">
                        <div class="row">
                            <!-- counter -->
                            <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated my-3"
                                data-wow-duration="600ms"
                                style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                                <i class="fa fa-building medium-icon text-info"></i>
                                <span class="timer counter_text alt-font appear mb-1">الرياض</span>
                                <span class="counter-title">مقر الشركة</span>
                            </div>
                            <!-- end counter -->

                            <!-- counter -->
                            @foreach ($counters as $counter)
                                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated my-3"
                                    data-wow-duration="900ms"
                                    style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                                    {{-- <i class="fa fa-smile-beam medium-icon text-info"></i> --}}
                                    <img src="{{ asset('images/counters/' . $counter->icon) }}" class="img ml-1"
                                        alt="icon">

                                    <span class="timer counter alt-font appear" data-to="810"
                                        data-speed="7000">{{ $counter->number }}</span>
                                    <span class="counter-title">{{ $counter->title }}</span>
                                </div>
                            @endforeach
                            <!-- end counter -->

                        </div>
                    </div>
                </section>

        </section><!-- /About Section -->


<!-- /Services Section -->
<section id="services" class="services section mt-4">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>خدماتنا</h2>
        <p>نقدم لك جميع الخدمات بكل دقة و احترافية مع فريقنا الفني المتكامل في الرياض – شركة الأنظمة الاولية</p>
    </div><!-- End Section Title -->

    <div class="container p-3">
        <div class="row gy-4 justify-content-evenly">
            @foreach ($categories as $category)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-6 d-flex">
                    <div class="service-item position-relative" data-aos="fade-up"
                        data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="icon">
                            <h4>
                                <img src="{{ asset('images/categories/' . $category->icon) }}"
                                    class="service_icon ml-1" alt="icon">
                                {{ $category->name }}
                            </h4>
                        </div>
                        <p>{{ $category->description }}</p>
                        <a href="{{ route('services', $category->id) }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                    </div>
                </div><!-- End Service Item -->
            @endforeach
        </div>

        <div class="center mt-4">
            {{-- <a href="{{ route('services') }}" class="btn btn-custom mt-3">معرض الخدمات</a> --}}
        </div>
    </div>
</section><!-- /Services Section -->



        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section px-4 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>اراء عملائنا</h2>
                <p>تحقق من رأي العملاء في خدمتنا </p>
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
                                        class="testimonial-img" alt="icon">

                                    <h3>{{ $testimonial->name }}</h3>
                                    {{-- <h4>Ceo &amp; Founder</h4> --}}
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
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

        </section><!-- /Testimonials Section -->

        {{-- <hr> --}}


        <!-- Why Us Section -->
        <section id="why-us" class="section why-us px-4 mt-4 spikes" data-builder="section">

            <div class="container-fluid">

                <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                        <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                            <h3 class=""><strong>ماهي الأمور المذهلة التي يمكنك الحصول عليها معنا ؟</strong></h3>
                            <p class="">
                                عند التعامل مع شركتنا المتخصصة في عمليات الصيانة و التصليح و اعمال السباكة و الصبغ و
                                الكهرباء في الملكة العربية السعودية , يمكن للعملاء الحصول على العديد من المزايا و الخدمات
                                المذهلة . ومن بين هذة الميزات : </p>
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


        {{-- <hr> --}}

        <!-- Team Section -->
        <section id="team" class="testimonials section px-4 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2> فريق العمل</h2>
                <p>تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين
                    الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء .</p>
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

        {{-- <hr> --}}

        <!-- Blog Section -->
        <section id="blog" class="blog section px-4 mt-4 spikes">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <!-- Section Title and Description -->
                @if (isset($blogSection))
                    <h2>{{ $blogSection->title }}</h2>
                    <p>{{ $blogSection->short_description }}</p>
                @endif

                <!-- Blog Entries -->
                @if (!isset($blogs) || $blogs->isEmpty())
                    <h4>لا يوجد مدونات بعد</h4>
                @else
                    <div class="container" data-aos="fade-up" data-aos-delay="100">

                        <div class="swiper blog-swiper">
                            <script type="application/json" class="swiper-config">
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
        </script>


                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($blogs as $blog)
                                        <div class="swiper-slide">
                                            <div class="blog-entry d-flex align-items-start bg-light">
                                                <div class="pic">
                                                    <img src="{{ asset('images/teams/' . $blog->icon) }}"
                                                        class="img-fluid" alt="">
                                                </div>
                                                <div class="entry-info m-2">
                                                    <h4>{{ $blog->name }}</h4>
                                                    <p class="m-4">{{ $blog->short_description }}</p>
                                                </div>
                                            </div>
                                        </div><!-- End Blog Entry -->
                                    @endforeach
                                </div>
                            </div>

                            <div class="center mt-4">
                                <a href="{{ route('blogs') }}" class="btn btn-custom mt-3">عرض كل المدونات</a>
                            </div>
                @endif
            </div>

        </section><!-- /Blog Section -->


        {{-- <hr> --}}

        <!-- Contact Section -->
        <section id="contact" class="contact section px-4 mt-4">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>تواصل معنا</h2>
                <p>اذا كان لديك أي استفسار أو تساؤل بخصوص شركة الأنظمة الأولية في المملكة العربية السعودية نرجو منك ملئ
                    النموذج التالي و سنكون مسرورين بالإجابة على جميع الإستفسارات و الرد في أسرع وقت ممكن ، فريق خدمة العملاء
                    يتمنى لكم دوام الصحة و العافية
                    <i class="bi bi-heart text-danger"></i>
                </p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">

                    <div class="col-lg-5">

                        <div class="info-wrap">
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-geo-alt flex-shrink-0 mx-3"></i>
                                <div>
                                    <h3>العنوان</h3>
                                    <p>الرياض</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-telephone flex-shrink-0 mx-3"></i>
                                <div>
                                    <h3>رقم الهاتف</h3>
                                    <p>+1 5589 55488 55</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                <i class="bi bi-envelope flex-shrink-0 mx-3"></i>
                                <div>
                                    <h3>البريد الالكتروني</h3>
                                    <p>info@example.com</p>
                                </div>
                            </div><!-- End Info Item -->
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <label for="name-field" class="pb-2">الاسم</label>
                                    <input type="text" name="name" id="name-field" class="form-control"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <label for="email-field" class="pb-2">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" id="email-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="subject-field" class="pb-2">عنوان الموضوع</label>
                                    <input type="text" class="form-control" name="subject" id="subject-field"
                                        required="">
                                </div>

                                <div class="col-md-12">
                                    <label for="message-field" class="pb-2">الرسالة</label>
                                    <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">جاري التحميل</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">تم استلام رسالتك بنجاح ، شكرا لتواصلك معنا !</div>

                                    <button type="submit">ارسال</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>
@endsection
