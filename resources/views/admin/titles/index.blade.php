<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' العناوين')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.titles.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة عنوان جديد</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th> وصف قصير</th>
                        <th>القسم</th>
                        <th>الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
@php
$sections = [
    'about_us' => 'من نحن',
    'services' => 'الخدمات',
    'testimonials' => 'اراء العملاء',
    'advantages' => 'المزايا',
    'teams' => 'فرق العمل',
    'blogs' => 'المدونات',
    'contacts' => 'اتصل بنا',
];
@endphp
                <tbody>
                    @foreach ($titles as $title)
                        <tr>
                            <td>{{ $title->title }}</td>
                            <td>{{ $title->short_description }}</td>
                            <td>{{ $sections[$title->section] ?? $title->section }}</td>
                            @if ($title->icon)
                            <td>
                                <img src="{{ asset('images/titles/' . $title->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.titles.edit', $title->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $title->id }}" data_name="{{ $title->title }}" data-url="{{ route('admin.titles.destroy', $title->id) }}">حذف</a>

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
  @include('admin.partials.deleteModal')

@endsection
<!-- End Content Section -->
