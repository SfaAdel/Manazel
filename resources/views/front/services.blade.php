@extends('front/layouts.index')
@section('page.title', ' خدماتنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3">  خدماتنا  </h1>
                    <p>نقدم لك جميع الخدمات بكل دقة و احترافية مع فريقنا الفني المتكامل في الرياض – شركة منازل </p>

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

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-activity icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                      <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>

                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

              </div>


        </div>

        <div class="container mt-4">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-activity icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                      <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>

                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                  <div class="service-item position-relative">
                    <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                    <h4><a href="{{ route('service_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                    <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('service_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                  </div>
                </div><!-- End Service Item -->

              </div>


        </div>
    </section><!-- /Services Section -->

</main>
@endsection
