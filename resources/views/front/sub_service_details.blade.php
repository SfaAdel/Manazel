@extends('front/layouts.index')
@section('page.title', ' خدماتنا')

@section('content')
@include('front.partials.alerts')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur"
        style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
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
    <main class="container my-6 p-6 ">
        <div class="pd-wrap">
            <div class="container">
                <div class="row p-3">
                    <div class="col-md-9">
                        <div class="product-dtl">

                            {{-- errors --}}
                            @if(session()->has('success'))
                            <div class="alert alert-success" id="success-alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(count($errors) > 0)
                            <alert
                                alert-title="خطأ في البيانات"
                                alert-type="error"
                                :alert-messages="{{ collect($errors->all()) }}">
                            </alert>
                        @endif

                        @if(session()->has('error'))
                            <alert title="خطأ في البيانات" alert-type="error" alert-title="{{ session('error') }}"></alert>
                        @endif
                            {{-- end errors --}}


                            <div class="product-info">
                                <div>

                                    <div class="product-name">
                                        <img src="{{ asset('images/sub_services/' . $sub_service->icon) }}"
                                        class="img-fluid animated rounded m-3" alt="photo">
                                        {{ $sub_service->name }}

                                    </div>

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
                                <p>{{ $sub_service->long_description }}</p>

                                <form method="POST" action="{{ route('book_appointment') }}">
                                    @csrf
                                    <div class="row mt-3">
                                        <!-- Col -->
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
                                        <!-- Col -->
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="time">المعاد</label>
                                                <select id="time" class="form-control" name="time" required>
                                                    <option value="">اختر معاد</option>
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
                                    <input type="hidden" name="sub_service_id" value="{{ $sub_service->id }}" />
                                    @if (auth()->guard('customer')->check())
                                    <input type="hidden" name="customer_id" value="{{ auth('customer')->user()->id }}" />
                                    @endif
<br>
                                    <div class="product-price-discount d-inline m-3">
                                        <h3 class="d-inline">سعر الخدمة :</h3>
                                        <span>{{ $sub_service->price }} ريال</span>
                                    </div>

                                    @if (auth()->guard('customer')->check())
                                        <button type="submit" class="round-black-btn"> تأكيد الحجز </button>
                                    @else
                                        <a  class="round-black-btn" href="{{ route('login') }}"> يجب عليك تسجيل الدخول قبل حجز الخدمة </a>
                                    @endif

                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>
    <script>
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
    </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: 40.712776,
                    lng: -74.005974
                },
                zoom: 13
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: 40.712776,
                    lng: -74.005974
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

        // Initialize the map
        google.maps.event.addDomListener(window, 'load', initMap);
    </script>


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

@endsection
