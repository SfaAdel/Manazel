@extends('front/layouts.index')
@section('page.title', 'طلباتك')

@section('content')

<section id="hero" class="hero section background-blur"
    style="background-image: url('{{ asset('images/website/background.png') }}');">
    <div class="container">
        <div class="row text-center">
            <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1 class="my-3">مرحبا ، {{ $customer->name }}</h1>
                <h3 class="my-3">تابع هنا جميع طلباتك</h3>
            </div>
        </div>
    </div>
</section>

<br><br>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
<i class="fa-regular fa-calendar-check text-success"></i>
                    الطلبات
                </div>
                <div class="card-body">
                    @if($appointments->isEmpty())
                        <p>لم تقم بــ أى طلبات بعد . . اطلب  <a href="{{ route('categories') }}" title="اطلب الان">  خدمتك </a> الان </p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الخدمة </th>
                                    <th>اليوم</th>
                                    <th>الوقت</th>
                                    <th>الحالة</th>
                                    <th>السعر النهائي</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $appointment->subService->name }}</td>
                                        <td>{{ $appointment->day }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td>
                                            @if($appointment->subService->price_on_serve)
                                                عند الزيارة
                                            @else
                                                    {{ $appointment->subService->price }} ريال
                                            @endif
                                        </td>
                                        <td>
                                            @if($appointment->status != 'canceled')
                                                <form method="POST" action="{{ route('customer.appointments.cancel', $appointment->id) }}">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-danger btn-sm">إلغاء</button>
                                                </form>
                                            @else
                                                <span class="text-danger">ملغي</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
