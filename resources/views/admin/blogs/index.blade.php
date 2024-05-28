<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' المدونات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.blogs.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة مدونة جديدة</span>
          </a>
      </div><!-- End Card Header -->
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>العنوان </th>
                        <th>التصنيف</th>
                        <th> الوصف</th>
                        <th>الصورة</th>
                        <th>الاجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->name }}</td>
                            <td>{{ $blog->category ? $blog->category->name : ' - - ' }}</td>
                            <td>{{ $blog->description }}</td>
                            @if ($blog->icon)
                            <td>
                                <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="icon rounded-circle" alt="icon">
                            </td>
                        @endif
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.blogs.edit', $blog->id) }}">
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
