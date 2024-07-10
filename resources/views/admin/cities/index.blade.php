<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'المدن')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
      <!-- Start Card Header -->
      @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')

      <div class="card-header is-justify-content-space-between">
          <a href="{{ route('admin.cities.create') }}" class="button is-success">
        <span class="icon">
            <i class="fa-solid fa-city"></i>
        </span>
              <span>اضافة مدينة</span>
          </a>
          <a href="{{ route('admin.districts.create') }}" class="button is-success">
            <span class="icon">
                <i class="fa-solid fa-plus"></i>
            </span>
                  <span>اضافة حي</span>
              </a>
      </div><!-- End Card Header -->
    @endif

      <div class="center">
        @include('admin.partials.search_result', ['data' => $cities])
    </div>

    @if (!$cities->isEmpty())
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
                    @foreach ($cities as $city)
                        <tr>
                            <td class="center_table">{{ $city->name }}</td>


                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td class="center_table">
                                <div class="buttons has-addons  center_table">
                                    <a class="button is-info " href="{{ route('admin.cities.edit', $city->id) }}">
                                        تعديل </a>
                                        <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $city->id }}" data_name="{{ $city->name }}" data-url="{{ route('admin.cities.destroy', $city->id) }}">حذف</a>
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
            {{ $cities->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->
