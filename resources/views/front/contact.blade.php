@extends('front/layouts.index')
@section('page.title', ' تواصل معنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('{{ asset('images/pages_banners/' . $contactSection->banner) }}');">
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3">{{$contactSection->title}}</h1>
                    <p>
                        {{$contactSection->short_description}}

                    </p>

                </div>
            </div>
        </div>
    </section>


<section id="contact" class="contact section px-4 mt-4">

    <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2> سعداء بتواصلك معنا <i class="fa-regular fa-heart text-custom"></i> </h2>
            </div><!-- End Section Title -->


    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-5">

                <div class="info-wrap ">
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


                    {{-- <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div>
                            <img  class="img" src="{{ asset('images/titles/' . $contactSection->icon) }}" alt="">
                        </div>
                    </div><!-- End Info Item --> --}}

                </div>
            </div>

            <div class="col-lg-7 info-wrap">
                <form action="{{ route('contact_store') }}" method="POST" data-aos="fade-up" data-aos-delay="200">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name-field" class="form-label">الاسم</label>
                                <input type="text" name="name" id="name-field" class="form-control" required="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email-field" class="form-label">البريد الالكتروني</label>
                                <input type="email" class="form-control" name="email" id="email-field" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="phone-field" class="form-label">رقم الهاتف</label>
                                <input type="text" class="form-control" name="phone" id="phone-field" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="title-field" class="form-label">عنوان الموضوع</label>
                                <input type="text" class="form-control" name="title" id="title-field" required="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="message-field" class="form-label">الرسالة</label>
                                <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-custom">ارسال</button>
                        </div>
                    </div>
                </form>



            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->


@endsection
