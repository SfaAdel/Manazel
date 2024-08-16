@extends('front/layouts.index')
@section('page.title', 'خدماتنا')

@section('content')
    @include('front.partials.alerts')

    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur"
        style="background-image: url('{{ asset('images/categories_bannars/' . $sub_service->service->category->bannar) }}');">

        <div class="container px-4">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">
                        {{ $sub_service->service->category->name }}
                    </h1>
                    <hr class="text-light">
                    <p class="mt-2">{{ $sub_service->service->category->description }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('images/categories/' . $sub_service->service->category->logo) }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    <main class="container my-6 p-6">
        <div class="pd-wrap">
            <div class="container">
                <div class="row p-3">
                    <div class="col-md-12">
                        <div class="product-dtl">
                            @if (session()->has('success'))
                                <div class="alert alert-success" id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="product-info">
                                <div>
                                    <div class="product-name center mb-2">
                                        <img src="{{ asset('images/sub_services/' . $sub_service->icon) }}"
                                            class="product_img img-fluid animated rounded mb-3" alt="photo">
                                        <br>
                                        {{ $sub_service->name }}
                                    </div>
                                    <br>
                                </div>
                                {{-- <div class="rate mx-1 center">
                                    <input type="radio" id="star5" name="rate" value="5" checked />
                                    <label for="star5" title="text">★</label>
                                    <input type="radio" id="star4" name="rate" value="4" checked />
                                    <label for="star4" title="text">★</label>
                                    <input type="radio" id="star3" name="rate" value="3" checked />
                                    <label for="star3" title="text">★</label>
                                    <input type="radio" id="star2" name="rate" value="2" />
                                    <label for="star2" title="text">★</label>
                                    <input type="radio" id="star1" name="rate" value="1" />
                                    <label for="star1" title="text">★</label>
                                </div> --}}
                                <br>

                                <form method="POST" action="{{ route('book_appointment') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="day">اليوم</label>
                                                <select id="day" class="form-control" name="day" required>
                                                    <option value="">اختر يوم</option>
                                                    @foreach ($availabilities as $date => $times)
                                                        <option value="{{ $date }}">{{ $date }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="time">المواعيد المتاحة</label>
                                                <select id="time" class="form-control" name="time" required>
                                                    <option value="">اختر معاد</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="city">المدينة</label>
                                                <select name="" id="city" class="form-control" required>
                                                    <option value="" disabled selected>اختر المدينة</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label" for="district">الحي</label>
                                                <select name="district_id" id="district" class="form-control" disabled
                                                    required>
                                                    <option value="">اختر الحي </option>
                                                    @foreach ($districts as $district)
                                                        <option value="{{ $district->id }}"
                                                            data-city-id="{{ $district->city_id }}">{{ $district->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mt-3">
                                        <label class="form-label" for="address">العنوان</label>
                                        <input type="text" name="address" value=""
                                            placeholder="من فضلك ادخل عنوانك بالتفصيل" class="form-control" required>
                                    </div>
                                    <div class="row mt-3">
                                        <label class="form-label" for="map">اختر عنوان</label>
                                        <div id="map" style="width: 100%; height: 270px;"></div>
                                    </div>
                                    <input type="hidden" id="latitude" name="latitude">
                                    <input type="hidden" id="longitude" name="longitude">
                                    <input type="hidden" name="sub_service_id" value="{{ $sub_service->id }}">
                                    @if (auth()->guard('customer')->check())
                                        <input type="hidden" name="customer_id"
                                            value="{{ auth('customer')->user()->id }}">
                                    @endif
                                    <br>
                                    <div class="product-price-discount d-inline m-3">
                                        <h3 class="d-inline">سعر الخدمة:</h3>

                                        @if ($sub_service->price_on_serve)
                                            <span class="final-price">
                                                تسعر عند الزيارة
                                            </span>
                                        @else
                                            @if ($sub_service->offer && $sub_service->discount_percentage > 0)
                                                <span class="original-price mx-"
                                                    style="text-decoration: line-through; color: red;">
                                                    {{ $sub_service->price }}
                                                </span>
                                                <span class="final-price" style="color: green;">
                                                    {{ $sub_service->final_price }} ريال
                                                </span>
                                            @else
                                                <span class="final-price">
                                                    {{ $sub_service->price }} ريال
                                                </span>
                                            @endif
                                        @endif


                                    </div>
                                    @if (auth()->guard('customer')->check())
                                        <button type="submit" class="round-black-btn btn btn-custom">تأكيد الحجز</button>
                                    @else
                                        <a class="btn btn-blue m-3" href="{{ route('login') }}">يجب عليك تسجيل الدخول أولا</a>
                                    @endif
                                </form>


                            {{-- reviews section --}}

                            <section id="about" class="about section px-2 mt-2">
                                <!-- Section Title -->
                                <div class="container section-title" data-aos="fade-up">
                                </div><!-- End Section Title -->
                                @if ($sub_service->reviews->count())
                                <div class="reviews">
                                    <div class="container section-title review-section-title p-2" data-aos="fade-up">
                                        <h2 class="">تقيمات العملاء</h2>
                                    </div>
                                    <section id="customers_testimonials">
                                        <div class="testimonial-box-container">
                                            @foreach ($sub_service->reviews as $review)

                                                <div class="testimonial-box">
                                                    <div class="testimonial-box-top">
                                                        <div class="profile">
                                                            <div class="profile-img">
                                                                <img src="{{ asset('images/customers/' . $review->customer->profile_img)}}" />
                                                            </div>
                                                            <div class="name-user">
                                                                <strong>{{ $review->customer->name }}</strong>
                                                                <span>@ {{ $review->customer->name }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="star_reviews">

                                                            @for ($i = 0; $i < $review->stars; $i++)
                                                            <i class="fas fa-star"></i>
                                                            @endfor

                                                        </div>
                                                        <div class="client-comment">
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                                @else
                                    <p>لا توجد تقيمات بعد.</p>
                                @endif

                                @if (auth()->guard('customer')->check())

                                <div class="container">

                                    <div class=" mt-1 container section-title review-section-title p-2 mt-4" data-aos="fade-up">
                                        <h2 class="">شارك بـرأيك</h2>
                                    </div>
                                    <form class="review-form" method="POST" action="{{ route('submit_review', $sub_service->id) }}">
                                        @csrf

                                        <div class="form-group mt-1">
                                            {{-- <label>اعطي تقيمك</label> --}}
                                            <div class="reviews-counter center">
                                                <div class="rate mx-3">
                                                    <input type="radio" id="star5" name="stars" value="5"/>
                                                    <label for="star5" title="5 stars">★</label>
                                                    <input type="radio" id="star4" name="stars" value="4" />
                                                    <label for="star4" title="4 stars">★</label>
                                                    <input type="radio" id="star3" name="stars" value="3"  />
                                                    <label for="star3" title="3 stars">★</label>
                                                    <input type="radio" id="star2" name="stars" value="2" />
                                                    <label for="star2" title="2 stars">★</label>
                                                    <input type="radio" id="star1" name="stars" value="1"  />
                                                    <label for="star1" title="1 star">★</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group my-2">
                                            <textarea class="form-control" name="comment" rows="10"></textarea>
                                        </div>

                                        <button class="btn btn-custom" type="submit">نشر</button>
                                    </form>

                                </div>

                                @endif

                            </section>
                                {{--end reviews section --}}

                                <hr class="my-3">
                                <div class="my-3">{!! $sub_service->long_description !!}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDHZzBR9t3gE648cp8FRHfs0qUP5S6f1o&callback=initMap" async
        defer></script>



    {{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> --}}

    {{-- <script>
            (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
              key: "AIzaSyCDHZzBR9t3gE648cp8FRHfs0qUP5S6f1o",
              v: "weekly",
              // Use the 'v' parameter to indicate the version to use (weekly, beta, alpha, etc.).
              // Add other bootstrap parameters as needed, using camel case.
            });
          </script> --}}

    {{-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDHZzBR9t3gE648cp8FRHfs0qUP5S6f1o&loading=async&callback=initMap">
</script> --}}

    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 24.7136,
                    lng: 46.6753
                }, // Center the map to Riyadh, Saudi Arabia
                zoom: 13
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: 24.7136,
                    lng: 46.6753
                },
                map: map,
                draggable: true
            });

            google.maps.event.addListener(marker, 'dragend', function(event) {
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });

            map.addListener('click', function(event) {
                marker.setPosition(event.latLng);
                document.getElementById('latitude').value = event.latLng.lat();
                document.getElementById('longitude').value = event.latLng.lng();
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const availabilities = @json($availabilities);

            document.getElementById('day').addEventListener('change', function() {
                const selectedDate = this.value;
                const timeSelect = document.getElementById('time');

                // Clear previous options
                timeSelect.innerHTML = '<option value="">اختر معاد</option>';

                if (availabilities[selectedDate]) {
                    availabilities[selectedDate].forEach(function(availability) {
                        const option = document.createElement('option');
                        option.value = availability.time;
                        option.textContent = availability.time;
                        timeSelect.appendChild(option);
                    });
                }
            });
        });

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#city').change(function() {
                var cityId = $(this).val();
                if (cityId) {
                    $('#district').prop('disabled', false);
                    $('#district option').each(function() {
                        var districtCityId = $(this).data('city-id');
                        if (districtCityId == cityId) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                    $('#district').val('');
                } else {
                    $('#district').prop('disabled', true);
                    $('#district option').hide();
                    $('#district option[value=""]').show(); // Show the placeholder option
                }
            });
        });
    </script>




@endsection
