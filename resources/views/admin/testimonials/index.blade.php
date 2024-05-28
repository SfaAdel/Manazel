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
                            @if ($testimonial->icon)
                            <td>
                                <img src="{{ asset('images/testimonials/' . $testimonial->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                                    تعديل
                                </a>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div><!-- End Card Content -->
    <!-- Start Card Footer -->
    <div class="card-footer with-pagination">
        {{-- {{ $departments->links('vendor.pagination.bulma') }} --}}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->
@endsection
<!-- End Content Section -->
