@extends('front/layouts.index')
@section('page.title', 'خدماتنا')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('{{ asset('images/pages_banners/7.png') }}');">
        <div class="container">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    {{-- <p class="">اشترك الان كمزود خدمة</p> --}}
                    <h1 class="my-3">اشترك الان كمزود خدمة</h1>
                </div>
            </div>
        </div>
    </section>

    <main class="container my-6 p-6 p-2">

                        {{-- errors --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success mt-3" id="success-alert">
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

        <!-- Combined User Information and Payment Section -->
        <section id="contact" class="contact section px-4 mt-4">

            <div class="container py-5">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>من فضلك ادخل بياناتك </h2>
                    <p>
                        وسنتواصل معك فى اقرب وقت
                        <i class="bi bi-heart text-danger"></i>
                    </p>
                </div><!-- End Section Title -->
                <div class="d-flex justify-content-center">
                    <div class="col-lg-9 info-wrap">
                        <form action="{{ route('provider_form_store') }}" method="POST" data-aos="fade-up"
                            data-aos-delay="200" class="form">
                            @csrf
                            <!-- Start Card Content -->
                            {{-- <div class="card-content"> --}}

                            <div class="col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="category">اختر القسم الذي تود الانضمام اليه </label>
                                    <select id="category" class="form-select" placeholder="Select the course"
                                        name="category" required>
                                        <option value="" disabled selected>اختر قسم </option>
                                        @foreach ($navCategories as $navCategory)
                                            <option value="{{ $navCategory->name }}"
                                                {{ old('category') == $navCategory->name ? 'selected' : '' }}>
                                                {{ $navCategory->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">الاسم</label>
                                        <input type="text" id="name" class="form-control"
                                            placeholder="ادخل اسمك ثلاثي" name="name" required minlength="9"
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="dob">تاريخ الميلاد </label>
                                        <input type="date" id="dob" class="form-control"
                                            placeholder="ادخل تاريخ ميلادك" name="birth_date" required
                                            value="{{ old('date_of_birth') }}" />
                                    </div>
                                </div>
                            </div>
                            <hr />


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="email"> البريد الالكتروني</label>
                                        <input type="email" id="email" class="form-control"
                                            placeholder="ادخل عنوان بريدك الالكتروني" name="email" required
                                            value="{{ old('email') }}" />
                                    </div>
                                </div>
                                <!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">رقم الهاتف </label>
                                        <input type="text" id="phone" class="form-control"
                                            placeholder="ادخل رقم هاتفك" name="phone" required minlength="10"
                                            maxlength="10" value="{{ old('phone') }}" />
                                    </div>
                                </div>
                            </div>
                            {{-- </div> --}}
                            <!-- End Card Content -->

                            <!-- Start Card Footer -->
                            <div class="card-footer mt-3">
                                <div class="buttons has-addons">
                                    <a class="btn btn-secondary submit" href="{{ route('home') }}"> الغاء </a>
                                    <button type="submit" class="btn btn-blue submit">حفظ</button>
                                </div>
                            </div><!-- End Card Footer -->
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection


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
            }, 10000); // 10 seconds
        }
    });
</script>
