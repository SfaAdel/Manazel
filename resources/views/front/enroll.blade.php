@extends('front/layouts.index')
@section('page.title', 'خدماتنا')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section background-blur" style="background-image: url('assets/img/background.jpg');">
    <div class="background-blur" style="background-image: url('assets/img/service-bg.jpg');"></div>
    <div class="container">
        <div class="row text-center">
            <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                <p class="">احجز الان خدمة</p>
                <h1 class="my-3">صيانة الغسالات</h1>
            </div>
        </div>
    </div>
</section>

<main class="container my-6 p-6">
    <!-- Combined User Information and Payment Section -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <!-- User Information Section -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mt-4">معلومات المستخدم</h2>
                        <form>
                            <div class="form-group mb-3">
                                <label for="userName"><h6>الاسم الكامل</h6></label>
                                <input type="text" class="form-control" id="userName" placeholder="الاسم الكامل" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="userPhone"><h6>رقم الهاتف</h6></label>
                                <input type="tel" class="form-control" id="userPhone" placeholder="رقم الهاتف" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="userAddress"><h6>العنوان</h6></label>
                                <input type="text" class="form-control" id="userAddress" placeholder="العنوان" required>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <h2 class="text-center"> بيانات الدفع</h2>

                        <div class="bg-white shadow-sm pt-4 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item">
                                    <a data-bs-toggle="pill" href="#credit-card" class="nav-link active">
                                        <i class="bi bi-credit-card"></i> فيزا
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="pill" href="#paypal" class="nav-link">
                                        <i class="fab fa-paypal mr-2"></i> باي بال
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="pill" href="#net-banking" class="nav-link">
                                        <i class="fas fa-mobile-alt mr-2"></i>   فودافون كاش
                                    </a>
                                </li>
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info -->
                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <form role="form" onsubmit="event.preventDefault()">
                                    <div class="form-group my-3">
                                        <label for="username">
                                            <h6>اسم مالك البطاقة</h6>
                                        </label>
                                        <input type="text" name="username" placeholder="اسم مالك البطاقة" required class="form-control">
                                    </div>
                                    <div class="form-group my-3">
                                        <label for="cardNumber">
                                            <h6>رقم البطاقة</h6>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" name="cardNumber" placeholder="رقم بطاقة صالحة" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="row my-3">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label>
                                                    <span class="hidden-xs">
                                                        <h6>تاريخ الانتهاء</h6>
                                                    </span>
                                                </label>
                                                <div class="input-group">
                                                    <input type="number" placeholder="MM" name="" class="form-control" required>
                                                    <input type="number" placeholder="YY" name="" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mb-4">
                                                <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                    <h6 class="mx-2">CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label>
                                                <input type="text" required class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer center">
                                        <button type="button" class="subscribe btn btn-primary btn-block">تأكيد الحجز</button>
                                    </div>
                                </form>
                            </div>
                        </div> <!-- End -->
                        {{-- <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade pt-3">
                            <h6 class="pb-2">اختر نوع حسابك على باي بال</h6>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" checked> محلي
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" class="ml-5"> دولي
                                </label>
                            </div>
                            <p>
                                <button type="button" class="btn btn-primary">
                                    <i class="fab fa-paypal mr-2"></i> تسجيل الدخول إلى باي بال
                                </button>
                            </p>
                            <p class="text-muted">
                                ملاحظة: بعد النقر على الزر، ستتم إعادة توجيهك إلى بوابة آمنة للدفع. بعد إكمال عملية الدفع، ستتم إعادتك إلى الموقع لمشاهدة تفاصيل طلبك.
                            </p>
                        </div> <!-- End -->
                        <!-- bank transfer info -->
                        <div id="net-banking" class="tab-pane fade pt-3">
                            <div class="form-group">
                                <label for="Select Your Bank">
                                    <h6>اختر البنك الخاص بك</h6>
                                </label>
                                <select class="form-control" id="ccmonth">
                                    <option value="" selected disabled>--الرجاء اختيار البنك الخاص بك--</option>
                                    <option>بنك 1</option>
                                    <option>بنك 2</option>
                                    <option>بنك 3</option>
                                    <option>بنك 4</option>
                                    <option>بنك 5</option>
                                    <option>بنك 6</option>
                                    <option>بنك 7</option>
                                    <option>بنك 8</option>
                                    <option>بنك 9</option>
                                    <option>بنك 10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>
                                    <button type="button" class="btn btn-primary">
                                        <i class="fas fa-mobile-alt mr-2"></i> متابعة الدفع
                                    </button>
                                </p>
                            </div>
                            <p class="text-muted">
                                ملاحظة: بعد النقر على الزر، ستتم إعادة توجيهك إلى بوابة آمنة للدفع. بعد إكمال عملية الدفع، ستتم إعادتك إلى الموقع لمشاهدة تفاصيل طلبك.
                            </p>
                        </div> <!-- End -->
                        <!-- End --> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Include Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

<!-- Include jQuery, Popper.js, and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@endsection
