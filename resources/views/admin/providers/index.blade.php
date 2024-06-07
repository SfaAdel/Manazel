<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' الموظفين')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
      <div class="card-header">
        <a href="{{ route('admin.providers.create') }}" class="button is-success">
            <span class="icon is-small">
              <i class="fa fa-plus-circle"></i>
            </span>
                  <span>اضافة موظف جديد</span>
              </a>
      </div><!-- End Card Header -->

      <div class="center">
        @include('admin.partials.search_result', ['data' => $providers])
    </div>

    @if (!$providers->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="books">
          <thead>
          <tr>
            <th>الاسم </th>
            <th>رقم الهاتف</th>
            <th> التصنيف التابع له</th>
            <th>الحالة </th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
            @foreach($providers as $provider)
              <tr>
                <td>{{ $provider->name }}</td>
                <td>{{ $provider->phone }}</td>
                <td>{{  ($provider->category_id ? $provider->category->name : ' - - ') }}</td>
                <td>{{ $provider->status ? 'متاح' : 'غير متاح '}}</td>
                <td>
                    <div class="buttons has-addons">
                        <a class="button is-info" href="{{ route('admin.providers.edit', $provider->id) }}">
                            تعديل
                        </a>
                        <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $provider->id }}" data_name="{{ $provider->name }}" data-url="{{ route('admin.providers.destroy', $provider->id) }}">حذف</a>

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
            {{ $providers->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection


