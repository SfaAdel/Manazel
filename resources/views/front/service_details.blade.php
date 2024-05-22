@extends('front/layouts.index')
@section('page.title', ' خدماتنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <p class=""> تفاصيل خدمة  </p>
                    <h1 class="my-3">  صيانة الغسالات </h1>
                    <div class=" center">
                        <a href="{{ route('enroll') }}" class="btn-get-started mt-3">احجز خدمتك الان </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<main class="container my-6 p-6">

    <!-- Services Section -->
    <section id="services" class="section ">



        <div class="container mt-5">
            <div class="row">

                        {{-- card 1 --}}


                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">
                            <div class="card">
                              <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                              <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link text-danger like">
                                  {{-- <i class="fas fa-heart"></i> --}}
                                </a>
                              </div>
                              <div class="card-body">
                                <h4 class="card-title"><a href="{{ route('sub_service_details') }}" class="stretched-link">    تصليح غسالة سامسونج   </a>  </h4>
                                <h6 class="card-subtitle mb-2 text-muted my-1">التصنيف : تصليح غسالات </h6>
                                <p class="card-text">
                                    توفر الراحة النفسية لدى ربة البيت وأفراد العائلة بأن عملية ترتيب الملابس بمختلف أنواعها والخاصة بمواسم معينة كالشتاء مثلًا قد تمّت على أكمل وجه.            </p>

                                <div class="buy d-flex  align-items-center mt-3">
                                    <a href="#" class="btn btn-danger ml-3"><i class="fas fa-shopping-cart"></i>   اضف الى السلة</a>
                                  <div class="price text-success"><h5 class="mr-3"> 120 ريال سعودي  </h5></div>
                                </div>
                              </div>
                            </div>
                          </div>


                        {{-- card 2 --}}



                        <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-3">
                            <div class="card">
                              <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                              <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link text-danger like">
                                  {{-- <i class="fas fa-heart"></i> --}}
                                </a>
                              </div>
                              <div class="card-body">
                                <h4 class="card-title"><a href="{{ route('sub_service_details') }}" class="stretched-link">    تصليح غسالة سامسونج   </a>  </h4>
                                <h6 class="card-subtitle mb-2 text-muted my-1">التصنيف : تصليح غسالات </h6>
                                <p class="card-text">
                                    توفر الراحة النفسية لدى ربة البيت وأفراد العائلة بأن عملية ترتيب الملابس بمختلف أنواعها والخاصة بمواسم معينة كالشتاء مثلًا قد تمّت على أكمل وجه.            </p>

                                <div class="buy d-flex  align-items-center mt-3">
                                    <a href="#" class="btn btn-danger ml-3"><i class="fas fa-shopping-cart"></i>   اضف الى السلة</a>
                                  <div class="price text-success"><h5 class="mr-3"> 120 ريال سعودي  </h5></div>
                                </div>
                              </div>
                            </div>
                          </div>



                        {{-- card 3 --}}

                      <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                          <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png" alt="Vans">
                          <div class="card-img-overlay d-flex justify-content-end">
                            <a href="#" class="card-link text-danger like">
                              {{-- <i class="fas fa-heart"></i> --}}
                            </a>
                          </div>
                          <div class="card-body">
                            <h4 class="card-title"><a href="{{ route('sub_service_details') }}" class="stretched-link">    تصليح غسالة سامسونج   </a>  </h4>
                            <h6 class="card-subtitle mb-2 text-muted my-1">التصنيف : تصليح غسالات </h6>
                            <p class="card-text">
                                توفر الراحة النفسية لدى ربة البيت وأفراد العائلة بأن عملية ترتيب الملابس بمختلف أنواعها والخاصة بمواسم معينة كالشتاء مثلًا قد تمّت على أكمل وجه.            </p>

                            <div class="buy d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i>   اضف الى السلة</a>
                              <div class="price text-success"><h5 class="mt-4"> 120 ريال سعودي  </h5></div>
                            </div>
                          </div>
                        </div>
                      </div>



                <!-- More product cards can be added here -->
            </div>
        </div>



        <!-- Section Title -->
        <div class="container section-title text-center my-4">
            <h2 class="mt-5">صيانة الغسالات</h2>
            <p>صيانة غسالات الرياض , صيانة غسالات اتوماتيك الرياض , صيانة غسالات سامسونغ الرياض مع شركة الأنظمة الأولية في الرياض . تعتبر الغسالة من الأجهزة الأساسية في المنزل التي تساعدنا في إتمام مهام الغسيل بكفاءة و سرعة , ومع زيادة استخدامها في حياتنا اليومية أصبح الحفاظ على صحة وأداء الغسالة أمرًا ذا أهمية قصوى. لذلك توفر شركتنا في الرياض خدمة صيانة الغسالات المتخصصة للمساعدة في الحفاظ على أداء أمثل للغسالة وتمديد عمرها الافتراضي.</p>
        </div><!-- End Section Title -->

        <div class="container mt-4">

            <section id="why-us" class="section why-us" data-builder="section">

                <div class="container-fluid">

                  <div class="row gy-4">

                    <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

                      <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                        <h3 class=""><strong> و أهم المزيات التي تقدمها شركة الأنظمة الأولية في مجال صيانة الغسالات هو :</strong></h3>
                      </div>

                      <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

                        <div class="faq-item faq-active mt-3">

                          <h3><span>01</span> إصلاح مختلف الأعطال </h3>
                          <div class="faq-content">
                            <p> يمكن أن تواجه الغسالات أعطالًا متنوعة مثل تسريبات المياه ، أو التوقف التام عن العمل، أو مشاكل في دوران الغسالة أو حوض الغسيل ، وغيرها من المشاكل الفنية. فريقنا المؤهل والمدرب يتمتع بالخبرة في تشخيص وإصلاح هذه المشاكل بفعالية. سواء كانت المشكلة بسيطة أو معقدة، يمكننا تقديم الحلول المناسبة وإصلاح الأعطال بكل دقة و موثوقية .</p>
                          </div>
                          <i class="faq-toggle bi bi-chevron-right"></i>

                        </div><!-- End Faq item-->

                        <div class="faq-item">
                          <h3><span>02 </span>تقديم خدمات صيانة دورية ووقائية </h3>
                          <div class="faq-content">
                            <p> حيث ننصح بإجراء صيانة دورية للغسالة للحفاظ على أدائها الممتاز وتجنب المشاكل الفجائية المحتملة. تتضمن خدمة الصيانة الوقائية لدينا فحصًا شاملاً لجميع أجزاء الغسالة ، وتنظيف البرميل والمرشحات، والتأكد من سلامة وصلاحية الأجزاء الميكانيكية والكهربائية، وإعادة ضبط الإعدادات إن لزم الأمر. يمكننا أيضاً أن نوفر لك جدول صيانة منتظم وفقًا لاحتياجاتك للمساعدة في المحافظة على أداء الغسالة بأفضل طريقة ممكنة.</p>
                          </div>
                          <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                          <h3><span>03</span> أفضل خدمة صيانة</h3>
                          <div class="faq-content">
                            <p>إذا كنت تبحث عن خدمة الصيانة رقم واحد في المملكة فنحن خيارك الأفضل , نقدم جميع الخدمات الموثوقة للعملاء وعلى يد أفضل فريق فني .</p>
                          </div>
                          <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                          <h3><span>04</span>  أفضل قيمة مقابل السعر</h3>
                          <div class="faq-content">
                            <p>تعد ميزة الحصول على أفضل قيمة مقابل السعر ميزة مهمة للعملاء , فهي تضمن لهم جودة الخدمة و الكفاءة في العمل بالإضافة للحصول على تكلفة معقولة تناسب الجميع .</p>
                          </div>
                          <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                          <h3><span>05</span> خدمة في الوقت المحدد</h3>
                          <div class="faq-content">
                            <p>نحن ندرك اهمية عامل الوقت في تقديم الخدمات , لذلك نحرص على الوصول في الوقت المتفق عليه وانجاز المهمة في الوقت المحدد بدون أي تأخير لجدول مواعيدك .</p>
                          </div>
                          <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                      </div>

                    </div>

                    <div class="col-lg-5 order-1 order-lg-2 why-us-img">
                      <img src="assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
                    </div>
                  </div>

                </div>

            </section><!-- /Why Us Section -->

        </div>
        <div class="center mt-4">
            <a class="btn-getstarted btn btn-blue" href="{{ route('enroll') }}" >احجز خدمتك الان</a>
        </div>
    </section><!-- /Services Section -->


</main>
@endsection
