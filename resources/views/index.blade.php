@extends('layouts.index')
@section('page.title', 'الرئيسية')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur mb-5" style="background-image: url('assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('assets/img/background.jpg');"></div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">شركة منازل</h1>
                    <hr>
                    <p>لتقديم جميع خدمات الصيانة و التصليح للغسالات و الثلاجات و الفريزرات و الأفران و المكيفات بالاضافة الى خدمات الصبغ و السباكة و الكهرباء في المملكة العربية السعودية 0542936554</p>
                    <div class="d-flex">
                        <a href="#about" class="btn-get-started">اتصل بنا</a>
                        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox btn-watch-video d-flex align-items-center">
                            <i class="bi bi-play-circle mx-2"></i><span>شاهد الان</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="assets/img/logo2.png" class="img-fluid animated" alt="">
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

            <div class="row gy-4">
                <p>
                يعود تاريخ شركة الأنظمة الأولية في المملكة العربية السعودية  إلى عام 2000م , عندما قررنا البدء في مجال الصيانة و التصليح لتقديم تجربة استثنائية لجميع العملاء في المملكة . لم تكن الصيانة و التصليح مجرد مهنة نمتهنا بل كانت أكثر من ذلك .
                </p>
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">

                <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
                <ul>
                <li><i class="bi bi-check2-circle mx-3"></i> <span>قدرتنا على بناء علاقة مميزة مع العميل . </span></li>
                <li><i class="bi bi-check2-circle mx-3"></i> <span> نحن نعتبر أن رضا العملاء و تحقيق توقعاتهم أمراً حاسماً و مهماً بالنسبة لنا . </span></li>
                <li><i class="bi bi-check2-circle mx-3"></i> <span>يتم بناء العلاقة القوية بين شركتنا و العملاء عن طريق فهم احتياجات العملاء العامة و الخاصة , و محاولة تقديم حلول مناسبة لها .</span></li>
                <li><i class="bi bi-check2-circle mx-3"></i> <span>نهتم بجميع تفاصيلهم و نتفاعل مع ملاحظات و الشكاوي بشكل فعال و جدي . </span></li>
                <li><i class="bi bi-check2-circle mx-3"></i> <span>نعمل بجهد على تحسين خدماتنا بناءً على التعليقات المستلمة من العملاء .</span></li>
                <li><i class="bi bi-check2-circle mx-3"></i> <span>وهكذا بكل حب و احترام و مودة نقوم ببناء علاقة طويلة الأمد مع العملاء و كسب ثقتهم في المرة الاولى و في كل مرة .</span></li>

                </ul>
            </div>

            <div class="col-lg-4 mx-5" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/why-us.png" class="img-fluid animated" alt="">
            </div>
            </div>


        </div>

        <section class="wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
            <div class="m-4">
                    <div class="row">
                        <!-- counter -->
                        <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                            <i class="fa fa-beer medium-icon"></i>
                            <span id="anim-number-pizza" class="counter-number"></span>
                            <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                            <p class="counter-title">مشروع منجز</p>
                        </div>
                        <!-- end counter -->
                        <!-- counter -->
                        <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                            <i class="fa fa-heart medium-icon"></i>
                            <span class="timer counter_text alt-font appear">الرياض</span>
                            <span class="counter-title">مقر الشركة</span>
                        </div>
                        <!-- end counter -->
                        <!-- counter -->
                        <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                            <i class="fa fa-anchor medium-icon"></i>
                            <span class="timer counter alt-font appear" data-to="810" data-speed="7000">18000</span>
                            <span class="counter-title">عملاء سعداء</span>
                        </div>
                        <!-- end counter -->
                        <!-- counter -->
                        <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                            <i class="fa fa-user medium-icon"></i>
                            <span class="timer counter alt-font appear" data-to="600" data-speed="7000">2000</span>
                            <span class="counter-title">تاريخ الانشاء</span>
                        </div>
                        <!-- end counter -->
                    </div>
                </div>
        </section>

    </section><!-- /About Section -->

{{-- <hr> --}}

    <!-- Why Us Section -->
    <section id="why-us" class="section why-us px-4 mt-4" data-builder="section">

      <div class="container-fluid">

        <div class="row gy-4">

          <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

            <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
              <h3 class=""><strong>ماهي الأمور المذهلة التي يمكنك الحصول عليها معنا ؟</strong></h3>
              <p class="">
                عند التعامل مع شركتنا المتخصصة في عمليات الصيانة و التصليح و اعمال السباكة و الصبغ و الكهرباء في الملكة العربية السعودية , يمكن للعملاء الحصول على العديد من المزايا و الخدمات المذهلة . ومن بين هذة الميزات :              </p>
            </div>

            <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

              <div class="faq-item">

                <h3 class="mx-0 my-2"><span> (1) </span> استخدام أفضل الأدوات</h3>
                <div class="">
                  <p>نقوم بتزويد فريقنا بأفضل الأدوات و معدات الصيانة لتقديم خدمات صيانة موثوقة , بالإضافة إلى استخدام أحدث المعدات في عالم الصيانة .</p>
                </div>
                {{-- <i class="faq-toggle bi bi-chevron-right"></i> --}}
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3 class="mx-0 my-2"><span> (2)</span> خدمة متنوعة و شاملة</h3>
                <div class="">
                  <p>يمكن لفريقنا الفني بزيارة واحدة لمنزلك أو مكتبك فحص جميع الأعطال و المشاكل في أجهزتك المنزلية و إصلاحها على الفور بدقة و حرفية .</p>
                </div>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3 class="mx-0 my-2"><span> (3)</span> أفضل خدمة صيانة</h3>
                <div class="">
                  <p>إذا كنت تبحث عن خدمة الصيانة رقم واحد في المملكة فنحن خيارك الأفضل , نقدم جميع الخدمات الموثوقة للعملاء وعلى يد أفضل فريق فني .</p>
                </div>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3 class="mx-0 my-2"><span> (4)</span>  أفضل قيمة مقابل السعر</h3>
                <div class="">
                  <p>تعد ميزة الحصول على أفضل قيمة مقابل السعر ميزة مهمة للعملاء , فهي تضمن لهم جودة الخدمة و الكفاءة في العمل بالإضافة للحصول على تكلفة معقولة تناسب الجميع .</p>
                </div>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3 class="mx-0 my-2"><span> (5)</span> خدمة في الوقت المحدد</h3>
                <div class="">
                  <p>نحن ندرك اهمية عامل الوقت في تقديم الخدمات , لذلك نحرص على الوصول في الوقت المتفق عليه وانجاز المهمة في الوقت المحدد بدون أي تأخير لجدول مواعيدك .</p>
                </div>
              </div><!-- End Faq item-->

            </div>

          </div>

          <div class="col-lg-5 order-1 order-lg-2 why-us-img">
            <img src="assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>
        </div>

      </div>

    </section><!-- /Why Us Section -->

{{-- <hr> --}}

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
                  "delay": 5000
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

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                  <h3>أحمد</h3>
                  {{-- <h4>Ceo &amp; Founder</h4> --}}
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span> كنت أواجه مشكلة في غسالتي منذ فترة طويلة، ولم أتمكن من حلها بنفسي. قمت بالاتصال بشركتكم لصيانة الغسالات، وكانت التجربة مذهلة. فريق الفنيين كان محترفًا للغاية وأصلحوا العطل بسرعة. أنا ممتن جدًا لخدمتكم الرائعة.</span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/2.png" class="testimonial-img" alt="">
                  <h3>لمى</h3>
                  {{-- <h4>Designer</h4> --}}
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>كانت أفران البيت تعاني من أعطال متكررة، وكانت تحتاج إلى إصلاح مستمر. لكن عندما استدعيت شركتكم لصيانة الأفران، تغيرت الأمور تمامًا. قام الفنيون بإصلاح الأفران وتبديل القطع التالفة. الآن تعمل الأفران بشكل ممتاز ولم أواجه مشاكل منذ ذلك الحين.

                    </span>

                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/3.png" class="testimonial-img" alt="">
                  <h3>ريما</h3>
                  {{-- <h4>Store Owner</h4> --}}
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>أردت تنظيف وصيانة فريزري الذي كان يعمل بشكل بطيء. اتصلت بفريقكم وأتوا في الموعد المحدد. قاموا بتنظيف الفريزر بعناية فائقة وتشحيم المفصلات. الآن يعمل الفريزر بشكل رائع وأنا سعيدة بالنتيجة.

                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/4.png" class="testimonial-img" alt="">
                  <h3>نورة</h3>
                  {{-- <h4>Freelancer</h4> --}}
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>كان لدي مشكلة في ثلاجتي حيث كانت لا تبرد بشكل صحيح. اتصلت بشركتكم وجاء فني سريعًا لإصلاحها. تعاملهم محترف وودود، وتم إصلاح الثلاجة بسرعة. الآن تعمل بشكل ممتاز وأنا سعيدة جدًا بالنتيجة.

                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/5.png" class="testimonial-img" alt="">
                  <h3>خالد</h3>
                  {{-- <h4>Entrepreneur</h4> --}}
                  <div class="stars">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                  </div>
                  <p>
                    <i class="bi bi-quote quote-icon-left"></i>
                    <span>أواجه مشكلة في مكيفي حيث كان يقوم بتسريب الماء. قام فريق الصيانة بفحصه وتشخيص المشكلة بسرعة. قاموا بإصلاح التسريب وتنظيف المكيف بشكل جيد. الآن يعمل المكيف بكفاءة وأنا سعيد جدًا بالخدمة المقدمة.

                    </span>
                    <i class="bi bi-quote quote-icon-right"></i>
                  </p>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>

    </section><!-- /Testimonials Section -->


{{-- <hr> --}}

    <!-- Services Section -->
    <section id="services" class="services section px-4 mt-4">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>خدماتنا</h2>
        <p>نقدم لك جميع الخدمات بكل دقة و احترافية مع فريقنا الفني المتكامل في الرياض – شركة الأنظمة الاولية</p>
      </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4 mx-3">
                <!-- Service Item 1 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch " data-aos="fade-up" data-aos-delay="100">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/1.jpg" class="card-img-top img-fluid" alt="صيانة ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">صيانة ثلاجات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و صيانة ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-3 align-self-center"> عرض الخدمة</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <!-- Service Item 2 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/2.jpg" class="card-img-top img-fluid" alt="تصليح ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">تصليح ثلاجات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و تصليح ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-3 align-self-center"> عرض الخدمة</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <!-- Service Item 3 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/3.jpg" class="card-img-top img-fluid" alt="صيانة افران الغاز">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">صيانة افران الغاز</a></h4>
                            <p class="card-text">صيانة افران غاز بالرياض و تصليح افران شرق الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-3 align-self-center"> عرض الخدمة</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <!-- Service Item 4 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/4.jpg" class="card-img-top img-fluid" alt="صيانة مكيفات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">صيانة مكيفات</a></h4>
                            <p class="card-text">صيانة مكيفات بالرياض و صيانة مكيفات 24 ساعة الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-3 align-self-center"> عرض الخدمة</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->
            </div>

            <div class="center mt-4">
                <a href="{{ route('services') }}" class="btn btn-custom mt-3">معرض الخدمات</a>
            </div>

        </div>

    </section><!-- /Services Section -->

{{-- <hr> --}}

    <!-- Team Section -->
    <section id="team" class="testimonials section px-4 mt-4">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2> فريق العمل</h2>
          <p>تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء  .</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

          <div class="swiper">
            <script type="application/json" class="swiper-config">
              {
                "loop": true,
                "speed": 600,
                "autoplay": {
                  "delay": 5000
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



              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                  <h3> قسم الترويج و الإعلان </h3>
                  <p>

                    <span>
                         مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء
                    </span>

                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                  <h3> قسم الترويج و الإعلان </h3>
                  <p>

                    <span>
                         مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء
                    </span>

                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                  <h3> قسم الترويج و الإعلان </h3>
                  <p>

                    <span>
                         مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء
                    </span>

                  </p>
                </div>
              </div><!-- End testimonial item -->

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/1.png" class="testimonial-img" alt="">
                  <h3> قسم الترويج و الإعلان </h3>
                  <p>

                    <span>
                         مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء
                    </span>

                  </p>
                </div>
              </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
          </div>

        </div>

    </section><!-- /Testimonials Section -->

{{-- <hr> --}}

    <!-- Blog Section -->
    <section id="blog" class="blog section px-4 mt-4">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
        <h2> المدونات</h2>
        <p>تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء  .</p>
        </div><!-- End Section Title -->

        <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>قسم الترويج و الإعلان</h4>
                <p class="m-4">مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>  قسم البحث و التطوير </h4>
                <p class="m-4">يتكون هذا القسم من عدد من المهندسين المتخصصين بتحليل البيانات و مهمتهم تحليل سوق العمل وايجاد أفكار جديدة</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>قسم الإدارة</h4>
                <p class="m-4">يتخصص هذا القسم بمتابعة أعمال الشركة ككل و تنسيق العمل بين الأقسام وتوجيهها لتعمل بتناغم</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>  فريق دعم العملاء </h4>
                <p class="m-4">وهو قسم من الخبراء في مجال الصيانة مخصص للرد على اتصالات الزبائن و الردعلى جميع الإستفسارات و الأسئلة</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>الفريق الفني</h4>
                <p class="m-4">عدد من الفنيين الخاضعين لدورات مكثفة في مجال الصيانة و هم الخط الاول و الأساسي لتقديم خدمات الصيانة للعملاء</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4> الخبراء و المهندسين </h4>
                <p class="m-4">وهم عبارة مهندسين الكهرباء و الميكانيك و الخبراء في مجال الصيانة يقومون بتشخيص الأعطال و إعطاء تعليماتهم للفريق الفني</p>
                </div>
            </div>
            </div><!-- End Blog Entry -->

        </div>

        </div>

    </section><!-- /blog Section -->


{{-- <hr> --}}

    <!-- Contact Section -->
    <section id="contact" class="contact section px-4 mt-4">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>تواصل معنا</h2>
        <p>اذا كان لديك أي استفسار أو تساؤل بخصوص شركة الأنظمة الأولية في المملكة العربية السعودية نرجو منك ملئ النموذج التالي و سنكون مسرورين بالإجابة على جميع الإستفسارات و الرد في أسرع وقت ممكن ، فريق خدمة العملاء يتمنى لكم دوام الصحة و العافية
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

              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">الاسم</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">البريد الالكتروني</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">عنوان الموضوع</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
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

