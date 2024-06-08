@extends('admin.layouts.app')

@section('page.title', 'الرئيسية')

@section('content')

<div class="container my-4">
    <h2 class="my-4 text-center">لوحة التحكم</h2>

    <!-- Technicians statistics -->
    <div class="custom-card mb-4">
        <div class="custom-card-header">
            <h3 class="text-center">إحصائيات الفنيين</h3>
        </div>
        <div class="custom-card-body">
            <form method="GET" action="{{ route('dashboard') }}" class="form-inline mb-4">
                <div class="form-group mr-2">
                    <label for="off_day_filter" class="mr-2">عرض الفنيين بناءً على:</label>
                    <select id="off_day_filter" name="off_day_filter" class="form-control">
                        <option value="">اختر الفلتر</option>
                        <option value="on" {{ request('off_day_filter') == 'on' ? 'selected' : '' }}>الذين لديهم عطلة اليوم</option>
                        <option value="off" {{ request('off_day_filter') == 'off' ? 'selected' : '' }}>الذين ليس لديهم عطلة اليوم</option>
                    </select>
                </div>
                <button type="submit" class="filter_btn mx-3">تصفية</button>
            </form>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>المجال</th>
                            <th>رقم الهاتف</th>
                            <th>الحالة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($technicians as $technician)
                        <tr>
                            <td>{{ $technician->name }}</td>
                            <td>{{ $technician->category->name }}</td>
                            <td>{{ $technician->phone }}</td>
                            <td>{{ $technician->status == 1 ? 'متاح' : 'غير متاح' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

  <!-- Requests -->
<div class="custom-card mb-4">
    <div class="custom-card-header">
        <h3 class="text-center">الطلبات</h3>
    </div>
    <div class="custom-card-body">
        <form method="GET" action="{{ route('dashboard') }}" class="form-inline mb-4">
            <div class="form-group mr-2">
                <label for="day" class="mr-2">اليوم:</label>
                <input type="date" id="day" name="day" class="form-control" value="{{ request('day') }}">
            </div>
            <div class="form-group mr-2">
                <label for="sub_service_id" class="mr-2">الخدمة :</label>
                <select id="sub_service_id" name="sub_service_id" class="form-control">
                    <option value="">اختر الخدمة </option>
                    @foreach($serviceStats as $service)
                        <option value="{{ $service->id }}" {{ request('sub_service_id') == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mr-2">
                <label for="status" class="mr-2">الحالة:</label>
                <select id="status" name="status" class="form-control">
                    <option value="">اختر الحالة</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                    <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>تم الانجاز</option>
                </select>
            </div>
            <button type="submit" class="filter_btn mx-3">تصفية</button>
        </form>
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>الخدمة الفرعية</th>
                        <th>اليوم</th>
                        <th>الوقت</th>
                        {{-- <th>مقدم الخدمة</th> --}}
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $request)
                    <tr>
                        {{-- <td>
                            <a href="{{ route('admin.appointments.show', ['appointment' => $request->appointment_id]) }}">
                                             {{ $request->subService->name }}
                            </a>
                        </td> --}}
                        <td> {{ $request->subService->name }}</td>
                        <td>{{ $request->day }}</td>
                        <td>{{ $request->time }}</td>
                        {{-- <td>{{ $request->provider_id ?? 'لم يتم تحديده بعد' }}</td> --}}
                        <td>{{ $request->status ?? 'لم يتم تحديدها بعد' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>




<!-- Profits -->
<div class="custom-card mb-4">
    <div class="custom-card-header">
        <h3 class="text-center">الأرباح</h3>
    </div>

<!-- Filters for Profits -->
<div class="btn-group m-4 mt-5 center">
    <a href="{{ route('dashboard', ['profit_period' => 'today']) }}" class="btn btn-primary mx-2">خلال اليوم</a>
    <a href="{{ route('dashboard', ['profit_period' => 'month']) }}" class="btn btn-primary mx-2">خلال الشهر الحالى</a>
    <a href="{{ route('dashboard', ['profit_period' => 'year']) }}" class="btn btn-primary mx-2">خلال السنة الحالية</a>
    <a href="{{ route('dashboard', ['profit_period' => 'all']) }}" class="btn btn-primary mx-2">عرض الكل</a>
</div>

    <div class="custom-card-body">
        <p>عدد الطلبات: <strong>{{ $profits->number_of_orders }}</strong></p>
        <p>إجمالي الأرباح: <strong>{{ $profits->total_profits }} ريال</strong></p>
    </div>
</div>




<!-- Click Counters -->
<div class="custom-card mb-4">
    <div class="custom-card-header">
        <h3 class="text-center">عدد النقرات</h3>
    </div>

<!-- Filters -->
<div class="btn-group m-4 mt-5 center">
    <a href="{{ route('dashboard', ['period' => 'today']) }}" class="btn btn-primary mx-2">خلال اليوم</a>
    <a href="{{ route('dashboard', ['period' => 'month']) }}" class="btn btn-primary mx-2">خلال الشهر الحالى</a>
    <a href="{{ route('dashboard', ['period' => 'year']) }}" class="btn btn-primary mx-2">خلال السنة الحالية</a>
    <a href="{{ route('dashboard', ['period' => 'all']) }}" class="btn btn-primary mx-2">عرض الكل</a>
</div>

    <div class="custom-card-body">
        <p>عدد النقرات على الهاتف: <strong>{{ $callClicks }}</strong></p>
        <p>عدد النقرات على الواتساب : <strong>{{ $whatsappClicks }}</strong></p>
    </div>
</div>


    <!-- Service Statistics -->
    <div class="custom-card mb-4">
        <div class="custom-card-header">
            <h3 class="text-center">إحصائيات الخدمات</h3>
        </div>
        <div class="custom-card-body">
            <form method="GET" action="{{ route('dashboard') }}" class="form-inline mb-4">
                <div class="form-group mr-2">
                    <label for="sub_category_id" class="mr-2">التصنيف الفرعي:</label>
                    <select id="sub_category_id" name="sub_category_id" class="form-control">
                        <option value="">اختر التصنيف الفرعي</option>
                        @foreach($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ request('sub_category_id') == $subCategory->id ? 'selected' : '' }}>
                                {{ $subCategory->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="filter_btn mx-3">تصفية</button>
            </form>
            <div class="table-responsive">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>الخدمة</th>
                            <th>عدد الطلبات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceStats as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->request_count }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
