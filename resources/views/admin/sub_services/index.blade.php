<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', '  الخدمات')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.sub_services.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
                <span>اضافة خدمة جديدة</span>
            </a>
        </div>
        <!-- End Card Header -->
        <div class="card-content">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                    <tr>
                        <th>الاسم</th>
                        <th> الوصف</th>
                        <th>الخدمة التابعة لها</th>
                        <th> السعر</th>
                        <th>عدد مقدمين الخدمة</th>
                        <th> الحالة</th>
                        <th> الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subServices as $subService)
                    <tr>
                        <td>{{ $subService->name }}</td>
                        <td>{{ $subService->description }}</td>
                        <td>{{ $subService->service ? $subService->service->name : ' - - ' }}</td>
                        <td>{{ $subService->price }}</td>
                        <td>{{ $subService->providers }}</td>
                        <td>{{ $subService->active ? 'مفعل' : 'غير مفعل' }}</td>
                        @if ($subService->icon)
                            <td>
                                <img src="{{ asset('images/sub_services/' . $subService->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.sub_services.edit', $subService->id) }}"> تعديل </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer with-pagination">
            {{-- {{ $staffMembers->links('vendor.pagination.bulma') }} --}}
        </div>
    </div>
    <!-- End Card -->
@endsection
<!-- End Content Section -->
