@extends('layouts.index')
@section('page.title', ' خدماتنا')

@section('content')

<main class="container my-6 p-6">

    <!-- Services Section -->
    <section id="services" class="section ">
        <!-- Section Title -->
        <div class="container section-title text-center my-4">
            <h2 class="mt-5">خدماتنا</h2>
            <p>نقدم لك جميع الخدمات بكل دقة و احترافية مع فريقنا الفني المتكامل في الرياض – شركة الأنظمة الاولية</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                <!-- Service Item 1 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/1.jpg" class="card-img-top img-fluid" alt="صيانة ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">صيانة غسالات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و صيانة ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <!-- Service Item 2 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/2.jpg" class="card-img-top img-fluid" alt="تصليح ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">تصليح غسالات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و تصليح ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
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
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
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
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

        <div class="container mt-4">

            <div class="row gy-4">
                <!-- Service Item 1 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/1.jpg" class="card-img-top img-fluid" alt="صيانة ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">صيانة غسالات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و صيانة ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <!-- Service Item 2 -->
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="card service-item shadow-sm border-0">
                        <img src="assets/img/services/2.jpg" class="card-img-top img-fluid" alt="تصليح ثلاجات">
                        <div class="card-body d-flex flex-column">
                            <h4 class="card-title text-center"><a href="{{ route('details') }}" class="stretched-link">تصليح غسالات</a></h4>
                            <p class="card-text">فني ثلاجات فلبيني الرياض و تصليح ثلاجات سامسونج الرياض</p>
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
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
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
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
                            <a href="{{ route('details') }}" class="btn btn-primary mt-auto align-self-center">معرفة المزيد</a>
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>
    </section><!-- /Services Section -->

</main>
@endsection
