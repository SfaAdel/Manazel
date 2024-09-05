<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', '  الخدمات')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">

        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.sub_services.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
                <span>اضافة خدمة جديدة</span>
            </a>
        </div>
        @endif

        <div class="center">
            @include('admin.partials.search_result', ['data' => $subServices])
        </div>

        @if (!$subServices->isEmpty())
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        {{-- <th> الوصف</th> --}}
                        <th>الخدمة التابعة لها</th>
                        <th> السعر</th>
                        <th>عدد مقدمين الخدمة</th>
                        <th> الحالة</th>
                        <th> يوجد خصم </th>
                        <th> نسبة الخصم </th>
                        <th> السعر النهائي</th>
                        <th> الصورة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subServices as $subService)
                    <tr>
                        <td>{{ $subService->id }}</td>
                        <td>{{ $subService->name }}</td>
                        {{-- <td>{{ $subService->description }}</td> --}}
                        <td>{{ $subService->service ? $subService->service->name : ' - - ' }}</td>
                        <td>
                            @if($subService->price_on_serve)
                                 عند الزيارة
                            @else
                                {{ $subService->price }}
                            @endif
                        </td>
                        <td>{{ $subService->providers }}</td>
                        <td>{{ $subService->active ? 'مفعل' : 'غير مفعل' }}</td>
                        <td>{{ $subService->offer ? 'نعم' : ' لا' }}</td>
                        <td>{{ $subService->discount_percentage ?? '- -'}}</td>
                        <td>{{ $subService->final_price }}</td>

                        @if ($subService->icon)
                            <td>
                                <img src="{{ asset('images/sub_services/' . $subService->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @else
                            <td> -- </td>
                        @endif
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.sub_services.edit', $subService->id) }}"> تعديل </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $subService->id }}" data_name="{{ $subService->name }}" data-url="{{ route('admin.sub_services.destroy', $subService->id) }}">حذف</a>

                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Start Card Footer -->
        <div class="center d-flex justify-center align-content-center m-4">
            <div class="card-footer with-pagination ">
                {{ $subServices->links() }}
            </div>
        </div>
        <!-- End Card Footer -->
        </div>
        @include('admin.partials.deleteModal')
    @endsection
