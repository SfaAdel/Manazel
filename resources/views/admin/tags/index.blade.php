<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الوسوم')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')

      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.tags.create') }}" class="button is-success">
        <span class="icon">
            <i class="fa-solid fa-tag"></i>
        </span>
              <span>اضافة وسوم</span>
          </a>

      </div><!-- End Card Header -->
    @endif

    <div class="center">
        @include('admin.partials.search_result', ['search' => $search, 'data' => $tags])
    </div>

    @if (!$tags->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth center text-center city_table" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody >
                    @foreach ($tags as $tag)
                        <tr>
                            <td class="center_table">{{ $tag->name }}</td>


                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td class="center_table">
                                <div class="buttons has-addons  center_table">
                                    <a class="button is-info " href="{{ route('admin.tags.edit', $tag->id) }}">
                                        تعديل </a>
                                        <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $tag->id }}" data_name="{{ $tag->name }}" data-url="{{ route('admin.tags.destroy', $tag->id) }}">حذف</a>
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
            {{ $tags->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
