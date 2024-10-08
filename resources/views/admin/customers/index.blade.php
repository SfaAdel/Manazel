<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', ' العملاء')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->

    <div class="row justify-content-end mr-4 mt-4">
        <form action="{{ route('admin.customers.index') }}" method="get">
            <div class="field has-addons search-input">
                <div class="control">
                    <input type="text" class="input" name="search" value="{{ isset($search) ? $search : '' }}"
                        placeholder="بحث ...">
                </div>
                <div class="control">
                    <button class="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="center">
        @include('admin.partials.search_result', ['search' => $search, 'data' => $customers])
    </div>

    @if (!$customers->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="books">
          <thead>
          <tr>
            <th>الاسم </th>
            <th>رقم الهاتف</th>
            <th>عدد الطلبات المكتملة</th>
            <th>عدد الطلبات المعلقة</th>
            <th>إجمالي الطلبات</th>
            <th>الاجراءات</th>
          </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
              <tr>
                <td>{{ $customer->name }}</td>
                <td>
                    <a href="tel:{{ $customer->phone }}">{{ $customer->phone }}</a>
                </td>
                <td>{{ $customer->completed_appointments_count }}</td>
                <td>{{ $customer->pending_appointments_count }}</td>
                <td>{{ $customer->appointments_count }}</td>
                <td>
                    <div class="buttons has-addons">
                        {{-- <a class="button is-info" href="{{ route('admin.customers.edit', $customer->id) }}">
                            تعديل
                        </a> --}}
                        <a target="_blank"
                        href="https://api.whatsapp.com/send?phone={{ '966' . substr($customer->phone, 1) }}"
                        class="text-success mx-2">
                        <i class="fa-brands fa-whatsapp text-success fa-2x"></i>
                        </a>
                        <a class="modal-open button is-danger" status-name="تأكيد الحذف"  traget-modal=".delete-modal" data_id="{{ $customer->id }}" data_name="{{ $customer->name }}" data-url="{{ route('admin.customers.destroy', $customer->id) }}">حذف</a>
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
            {{ $customers->links() }}
        </div>
    </div>
    <!-- End Card Footer -->
    </div>
    @include('admin.partials.deleteModal')
@endsection


