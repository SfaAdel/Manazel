<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' المدونات')
<!-- Start Content Section -->
@section('content')

  <!-- Start Card -->
  <div class="card main-card">
        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
        <!-- Start Card Header -->
        <div class="card-header is-justify-content-space-between">
            <a href="{{ route('admin.blogs.create') }}" class="button is-success">
            <span class="icon is-small">
            <i class="fa fa-plus-circle"></i>
            </span>
                <span>اضافة مدونة جديدة</span>
            </a>
        </div><!-- End Card Header -->
        @endif
      <div class="center">
        @include('admin.partials.search_result', ['data' => $blogs])
    </div>

    @if (!$blogs->isEmpty())

    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>العنوان الرئيسي </th>
                        <th>التصنيف</th>
                        <th> الوصف القصير</th>
                        <th> العنوان الثانوي</th>
                        <th> الوصف الطويل</th>
                        <th>الصورة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->main_title }}</td>
                            <td>{{ $blog->category ? $blog->category->name : ' - - ' }}</td>
                            <td>{{ $blog->short_description }}</td>
                            <td>{{ $blog->second_title }}</td>
                            <td> ` {{ $blog->long_description }} `</td>
                            @if ($blog->icon)
                            <td>
                                <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif

                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.blogs.edit', $blog->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $blog->id }}" data_name="{{ $blog->name }}" data-url="{{ route('admin.blogs.destroy', $blog->id) }}">حذف</a>

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
            {{ $blogs->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
