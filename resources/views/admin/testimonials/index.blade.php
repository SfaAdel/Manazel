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
          <a href="{{ route('admin.testimonials.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة مراجعة جديدة</span>
          </a>
      </div><!-- End Card Header -->

      <div class="center">
        @include('admin.partials.search_result', ['data' => $testimonials])
    </div>

    @if (!$testimonials->isEmpty())
      <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th>النجوم</th>
                        <th> المراجعة</th>
                        <th>الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testimonials as $testimonial)
                    <tr>
                        <td>{{ $testimonial->name }}</td>
                        <td>
                            @for ($i = 0; $i < $testimonial->stars; $i++)
                                <i class="fa-solid fa-star text-warning"></i>
                            @endfor
                        </td>
                        <td>{{ $testimonial->review }}</td>
                        <td>
                            @if ($testimonial->icon)
                                <img src="{{ asset('images/testimonials/' . $testimonial->icon) }}" class="icon rounded-circle" alt="icon">
                            @else
                                <span>لا توجد صورة</span>
                            @endif
                        </td>
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف" target-modal=".delete-modal" data_id="{{ $testimonial->id }}" data_name="{{ $testimonial->name }}" data-url="{{ route('admin.testimonials.destroy', $testimonial->id) }}">حذف</a>
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
            {{ $testimonials->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
