
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

    <div class="pd-wrap">
        <div class="container">
            {{-- <div class="heading-section">
                <h2>Product Details</h2>
            </div> --}}
            <div class="row p-3">

                <div class="col-md-6">
                    <div class="product-dtl">
                        <div class="product-info">
                            <div class="product-name">اسم الخدمة</div>
                            <div class="reviews-counter">
                                <div class="rate">
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
                                <span>3 مراجعات</span>
                            </div>
                            <div class="product-price-discount"><span>$39.00</span><span class="line-through">$29.00</span></div>
                        </div>
                        <p>إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان عدد أفراد الأسرة لديكِ صغير، أما إن كنتِ ربة بيت لعائلة عدد أفرادها كبير، فتصبح هذه المهمة تحتاج إلى الوقت والمجهود، فإن أمر الترتيب لا يعتمد على طي الملابس أو تعليقها فقط، فهو يحتاج إلى كيفية أو آلية يتم من خلالها ترتيب دولاب الملابس بطريقة معينة للوصول إليها بسهولة في كل وقت من الأوقات. </p>

                        <div class="product-count">
                            <a href="#" class="round-black-btn"> اضف الى السلة  </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                <img src="assets/img/why-us.png" class="img-fluid animated rounded m-3" alt="photo">
                </div>
            </div>
            <div class="product-info-tabs mt-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">الوصف</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">المراجعات (0)</a>
                      </li>
                </ul>
                <hr>
                <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                      </div>
                      <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                          <div class="review-heading">المراجعات</div>
                          <p class="mb-20">لا يوجد مراجعات حتي الان</p>
                          <form class="review-form">
                            <div class="form-group">
                                <label> اعطي تقيمك</label>
                                <div class="reviews-counter">
                                    <div class="rate">
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
                                <textarea class="form-control" rows="10"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="الاسم">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="" class="form-control" placeholder="البريد الالكتروني">
                                    </div>
                                </div>
                            </div>
                            <button class="round-black-btn"> تسجيبل</button>
                        </form>
                      </div>
                </div>
            </div>

        </div>
    </div>


</main>
@endsection
