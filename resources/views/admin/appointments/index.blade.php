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
                <i class="bi bi-plus-circle"></i>
            </span>
            <span>قائمة الطلبات</span>
        </div><!-- End Card Header -->

        <div class="row justify-content-end mr-4">
            <form action="{{ route('admin.appointments.index') }}" method="get">
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
            @include('admin.partials.search_result', ['search' => $search, 'data' => $appointments])
        </div>

        @if (!$appointments->isEmpty())
            <!-- Start Card Content -->
            <div class="card-content">
                <div class="table-container">
                    <table class="table is-fullwidth" id="posts">
                        <thead>
                            <tr>
                                <th>اسم العميل</th>
                                <th>رقم الهاتف </th>
                                <th>الخدمة</th>
                                <th>التاريخ</th>
                                <th>الوقت</th>
                                <th>السعر</th>
                                {{-- <th>العنوان</th> --}}
                                <th>حالة الطلب</th>
                                @if (auth('admin')->user()->role == 'super_admin')
                                <th> الاجراءات</th>
                                @endif
                            </tr>
                        </thead>

                        <!-- Update each row to include a form for changing status -->
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->customer->name }}</td>
                                    {{-- <td>
                            <a
                                target="_blank"
                                href="https://api.whatsapp.com/send?phone=2{{ $appointment->customer->phone }}&text={{ urlencode('عزيزي ' . $appointment->customer->name . ' تم بنجاح حجز موعد يوم ' . $appointment->day . ' الساعة ' . $appointment->time . ' من اجل خدمة ' . $appointment->subService->name . ' اذا كان لديك اى استفسارات تواصل معنا من خلال الرقم التالى') }}"
                                class="text-black"
                            >
                                {{ $appointment->customer->phone }}
                            </a>
                        </td> --}}
                                    <td>
                                        <a
                                            href="tel:{{ $appointment->customer->phone }}">{{ $appointment->customer->phone }}</a>
                                    </td>
                                    <td>{{ $appointment->subService->name }}</td>
                                    <td>{{ $appointment->day }}</td>
                                    <td>{{ $appointment->time }}</td>
                                    <td>{{ $appointment->subService->price }}</td>
                                    {{-- <td>{{ $appointment->latitude }}</td>
                        <td>{{ $appointment->longitude }}</td> --}}
                                    {{-- <td>{{ $appointment->address }}</td> --}}

                                    <td>
                                        <form action="{{ route('admin.appointments.update', $appointment->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="field">
                                                <div class="control">
                                                    {{-- <div class="select d-inline">
                                          <select name="provider_id" {{ $appointment->status == 'completed' ? 'disabled' : '' }}>
                                              <option value="" selected disabled>اختر مقدم خدمة</option>


                                              @foreach ($providers[$appointment->id] ?? [] as $provider)
                                              <option value="{{ $provider->id }}" {{ $appointment->provider_id == $provider->id ? 'selected' : '' }}>
                                                  {{ $provider->name }}
                                              </option>
                                          @endforeach

                                          </select>
                                      </div> --}}

                                                    <div class="field d-inline">
                                                        <div class="select">
                                                            <select name="status" onchange="this.form.submit()"
                                                                {{ in_array($appointment->status, ['canceled', 'completed']) ? 'disabled' : '' }}>
                                                                <option value="" selected disabled>اختر حالة الطلب
                                                                </option>
                                                                <option value="pending"
                                                                    {{ $appointment->status == 'pending' ? 'selected' : '' }}>
                                                                    قيد الانتظار</option>
                                                                <option value="completed"
                                                                    {{ $appointment->status == 'completed' ? 'selected' : '' }}>
                                                                    تم بنجاح</option>
                                                                <option value="canceled"
                                                                    {{ $appointment->status == 'canceled' ? 'selected' : '' }}>
                                                                    تم إلغاؤه</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if (auth('admin')->user()->role == 'super_admin')
                                                    <button type="submit" class="button is-primary mx-3"
                                                        {{ $appointment->status == 'completed' ? 'disabled' : '' }}> تحديث

                                                    </button>
                                                    @endif
                                                    </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="buttons has-addons">
                                            @if ($appointment->status === 'canceled')
                                                <a class="button is-warning is-disabled" disabled>عرض تفاصيل الطلب</a>
                                            @else
                                                <a class="button is-warning"
                                                    href="{{ route('admin.appointments.show', $appointment->id) }}">عرض
                                                    تفاصيل الطلب</a>
                                            @endif


                                            @if ($appointment->status == 'completed')
                                                <span class="text-success mx-2">
                                                    <i class="fa-brands fa-whatsapp text-success fa-2x"></i>
                                                </span>
                                            @else
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=2{{ $appointment->customer->phone }}&text={{ urlencode('عزيزي ' . $appointment->customer->name . ' تم بنجاح حجز موعد يوم ' . $appointment->day . ' الساعة ' . $appointment->time . ' من اجل خدمة ' . $appointment->subService->name . ' اذا كان لديك اى استفسارات تواصل معنا من خلال الرقم التالى') }}"
                                                    class="text-success mx-2">
                                                    <i class="fa-brands fa-whatsapp text-success fa-2x"></i>
                                                </a>
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

        <div class="center d-flex justify-center align-content-center m-4">
            <div class="card-footer with-pagination ">
                {{-- {{ $appointments->links() }} --}}
            </div>
        </div>
        <!-- End Card Footer -->

    </div><!-- End Card -->

    <!-- Include Modals -->
    @include('admin.partials.deleteModal')
@endsection
<!-- End Content Section -->

<!-- JavaScript to disable the select box if status is canceled or completed -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.status-form select').forEach(function(select) {
            select.addEventListener('change', function() {
                if (this.value === 'canceled' || this.value === 'completed') {
                    this.setAttribute('disabled', 'disabled');
                    disableProviders(this.closest('tr').dataset.orderId);
                }
            });
        });

        function disableProviders(orderId) {
            document.querySelectorAll(`.appointment-provider[data-order-id='${orderId}']`).forEach(function(
                select) {
                select.setAttribute('disabled', 'disabled');
            });
        }
    });
</script>
