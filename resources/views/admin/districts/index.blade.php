<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الأحياء')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.districts.create') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-plus-circle"></i>
        </span>
              <span>اضافة حي</span>
          </a>
      </div><!-- End Card Header -->
    @endif
    <div class="center">
        @include('admin.partials.search_result', ['data' => $districts])
    </div>

      @if (!$districts->isEmpty())
      <!-- Start Card Content -->
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth" id="categories">
                <thead>
                    <tr>
                        <th>الاسم </th>
                        <th>المدينة</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $district)
                        <tr>
                            <td>{{ $district->name }}</td>
                            <td>{{ $district->city ? $district->city->name : ' - - ' }}</td>

                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.districts.edit', $district->id) }}">
                                    تعديل
                                </a>
                                <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $district->id }}" data_name="{{ $district->name }}" data-url="{{ route('admin.districts.destroy', $district->id) }}">حذف</a>
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
            {{ $districts->links() }}
        </div>
    </div>
    <!-- End Card Footer -->

  </div><!-- End Card -->
  @include('admin.partials.deleteModal')

@endsection
<!-- End Content Section -->
