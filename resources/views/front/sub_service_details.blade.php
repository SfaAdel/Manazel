@extends('front/layouts.index')
@section('page.title', ' خدماتنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <p class=""> تفاصيل خدمة </p>
                    <h1 class="my-3"> {{ $sub_service->name }} </h1>
                    <div class=" center">
                        {{-- <a href="{{ route('enroll') }}" class="btn-get-started mt-3">احجز خدمتك الان </a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container my-6 p-6">

        <div class="pd-wrap">
            <div class="container">
                {{-- <div class="heading-section">
                <h2>Product Details</h2>
            </div> --}}
                <div class="row p-3">

                    <div class="col-md-6">
                        <div class="product-dtl">
                            <div class="product-info">
                                <div>
                                    <div class="product-name">{{ $sub_service->name }} </div>
                                    <div class="rate mx-1">
                                        <input type="radio" id="star5" name="rate" value="5" checked />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" checked />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" checked />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>

                                <div class="m-2">
                                    <span>3 مراجعات</span>
                                </div>
                            </div>
                            <p>{{ $sub_service->short_description }} </p>

                            <div class="product-count">
                                <a href="#" class="round-black-btn"> اضف الى السلة </a>
                                <div class="product-price-discount d-inline mx-3"><span>{{ $sub_service->price }} ريال</span></div>
                                {{-- <span class="line-through">$29.00</span> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset('images/sub_services/' . $sub_service->icon) }}"
                            class="img-fluid animated rounded m-3" alt="photo">
                    </div>
                </div>
                <div class="product-info-tabs mt-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description"
                                role="tab" aria-controls="description" aria-selected="true">الوصف</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">المراجعات (0)</a>
                        </li>
                    </ul>
                    <hr>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                            aria-labelledby="description-tab">
                            {{ $sub_service->long_description }}
                        </div>
                        <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                            <div class="review-heading">المراجعات</div>
                            @if($sub_service->reviews->isEmpty())
                                <p class="mb-20">لا يوجد مراجعات حتي الان</p>
                            @else
                                @foreach($sub_service->reviews as $review)
                                    <div class="review">
                                        <div class="d-flex align-items-center">
                                            <div class="review-user">
                                                <h6>{{ $review->customer->name }}</h6>
                                            </div>
                                            <div class="rate mx-3">
                                                @for($i = 1; $i <= 5; $i++)
                                                    @if($i <= $review->stars)
                                                        <i class="fas fa-star text-warning"></i>
                                                    @else
                                                        <i class="far fa-star text-secondry"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <p>{{ $review->comment }}</p>
                                    </div>
                                    <hr>
                                @endforeach
                            @endif

                            <form class="review-form" method="POST" action="{{ route('submit_review', $sub_service->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label>اعطي تقيمك</label>
                                    <div class="reviews-counter">
                                        <div class="rate mx-3">
                                            <input type="radio" id="star5" name="rate" value="5" />
                                            <label for="star5" title="text">5 stars</label>
                                            <input type="radio" id="star4" name="rate" value="4" />
                                            <label for="star4" title="text">4 stars</label>
                                            <input type="radio" id="star3" name="rate" value="3" />
                                            <label for="star3" title="text">3 stars</label>
                                            <input type="radio" id="star2" name="rate" value="2" />
                                            <label for="star2" title="text">2 stars</label>
                                            <input type="radio" id="star1" name="rate" value="1" />
                                            <label for="star1" title="text">1 star</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>اترك تعليقك </label>
                                    <textarea class="form-control" name="comment" rows="10"></textarea>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="الاسم" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="البريد الالكتروني" required>
                                        </div>
                                    </div>
                                </div> --}}
                                <button class="round-black-btn" type="submit"> تسجيبل</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </main>
@endsection
