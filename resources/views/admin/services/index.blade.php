<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الخدمات الاساسية')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.services.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة خدمة رئيسية</span>
          </a>
      </div><!-- End Card Header -->

    <div class="center">
        @include('admin.partials.search_result', ['data' => $services])
    </div>

      @if (!$services->isEmpty())
      <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th>التصنيف</th>
                        <th> الوصف</th>
                        <th>الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->category ? $service->category->name : ' - - ' }}</td>
                            <td>{{ $service->description }}</td>
                            @if ($service->icon)
                            <td>
                                <img src="{{ asset('images/services/' . $service->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.services.edit', $service->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $service->id }}" data_name="{{ $service->name }}" data-url="{{ route('admin.services.destroy', $service->id) }}">حذف</a>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    @endif

    <!-- Start Card Footer -->
    <div class="center d-flex justify-center align-content-center m-4">
        <div class="card-footer with-pagination ">
            {{ $services->links() }}
        </div>
    </div>
    <!-- End Card Footer -->

  </div><!-- End Card -->
  @include('admin.partials.deleteModal')

@endsection
<!-- End Content Section -->
