<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'الطلبات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <span class="icon is-small">
        <i class="fa fa-plus-circle"></i>
      </span>
      <span>قائمة الطلبات</span>
    </div><!-- End Card Header -->

    <div class="row justify-content-end mr-4">
        <div class="col-md-4 search">
            <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex mb-3">
                <input type="text" class="form-control me-2" placeholder="ابحث بالاسم او التاريخ" name="search" />
                <button class="btn btn-link" type="submit">
                    <i class="link-icon" data-feather="search"></i>
                    بحث
                </button>
            </form>
        </div>
    </div>

    <div class="center">
        @include('admin.partials.search_result', ['search' => $search, 'data' => $orders])

    </div>

    @if (!$orders->isEmpty())
    <!-- Start Card Content -->
    <div class="card-content">
      <div class="table-container">
        <table class="table is-fullwidth" id="posts">
          <thead>
            <tr>
              <th>اسم العميل</th>
              <th>تاريخ الطلب</th>
              <th>السعر الاجمالي</th>
              <th>حالة الطلب</th>
              <th>الاجراءات</th>
            </tr>
          </thead>

          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->order_date }}</td>
                <td>{{ $order->total_price }}</td>
                <td>
                  <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="status-form">
                    @csrf
                    @method('PATCH')
                    <div class="field">
                      <div class="select">
                        <select name="status" onchange="this.form.submit()" {{ in_array($order->status, ['canceled', 'completed']) ? 'disabled' : '' }}>
                          <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>قيد الانتظار</option>
                          <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>تم بنجاح</option>
                          <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>تم إلغاؤه</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </td>
                <td>
                  <div class="buttons has-addons">
                    @if($order->status === 'canceled')
                      <a class="button is-warning is-disabled" disabled>عرض تفاصيل الطلب</a>
                    @else
                      <a class="button is-warning" href="{{ route('admin.orders.show', $order->id) }}">عرض تفاصيل الطلب</a>
                    @endif
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
    <div class="card-footer with-pagination">
      {{-- {{ $posts->links('vendor.pagination.bulma') }} --}}
    </div><!-- End Card Footer -->
  </div><!-- End Card -->

  <!-- Include Modals -->
  @include('admin.partials.deleteModal')
@endsection<!-- End Content Section -->

<!-- JavaScript to disable the select box if status is canceled or completed -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.status-form select').forEach(function (select) {
      select.addEventListener('change', function () {
        if (this.value === 'canceled' || this.value === 'completed') {
          this.setAttribute('disabled', 'disabled');
          disableProviders(this.closest('tr').dataset.orderId);
        }
      });
    });

    function disableProviders(orderId) {
      document.querySelectorAll(`.appointment-provider[data-order-id='${orderId}']`).forEach(function (select) {
        select.setAttribute('disabled', 'disabled');
      });
    }
  });
</script>
