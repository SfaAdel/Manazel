<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'التصنيفات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.categories.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة تصنيف</span>
          </a>
      </div><!-- End Card Header -->


      <div class="center">
        @include('admin.partials.search_result', ['data' => $categories])
    </div>

    @if (!$categories->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th> الوصف</th>
                        <th>الصورة</th>
                        @if (auth('admin')->user()->role == 'super_admin')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            @if ($category->icon)
                            <td>
                                <img src="{{ asset('images/categories/' . $category->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif

                        @if (auth('admin')->user()->role == 'super_admin')
                            <td>
                                <div class="buttons has-addons">
                                    <a class="button is-info" href="{{ route('admin.categories.edit', $category->id) }}">
                                        تعديل </a>
                                        <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $category->id }}" data_name="{{ $category->name }}" data-url="{{ route('admin.categories.destroy', $category->id) }}">حذف</a>

                                </div>
                            </td>
                        @endif
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
            {{ $categories->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
