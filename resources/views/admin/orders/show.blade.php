@extends('admin.layouts.app')

@section('page.title', 'تفاصيل الطلب')

@section('content')
    <div class="card">
        <section class="section main-block">
            <div class="">
                <a href="{{ route('admin.orders.index') }}" class="button is-success">
                  <span class="icon is-small">
                    <i class="fa fa-building"></i>
                  </span>
                  <span>قائمة الطلبات</span>
                </a>
            </div><!-- End Card Header -->


            <!-- Start Card Content -->
            <div class="card-content">
                <div class="table-container">
                  <table class="table is-fullwidth" id="posts">
                    <thead>
                    <tr>
                      <th>الخدمة</th>
                      <th>التاريخ</th>
                      <th>الوقت</th>
                      <th>السعر</th>
                      <th>مقدم الخدمة</th>
                    </tr>
                    </thead>

                    <!-- Update each row to include a form for changing status -->
                    <tbody>
                        @foreach($order->appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->subService->name }}</td>
                                <td>{{ $appointment->day }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>{{ $appointment->subService->price }}</td>
                                <td>
                                  <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST">
                                      @csrf
                                      @method('PATCH')
                                      <div class="field">
                                          <div class="control">
                                              <div class="select">
                                                  <select name="provider_id" {{ $order->status == 'completed' ? 'disabled' : '' }}>
                                                      <option value="" selected disabled>اختر مقدم خدمة</option>
                                                      @foreach($providers as $provider)
                                                          <option value="{{ $provider->id }}" {{ $appointment->provider_id == $provider->id ? 'selected' : '' }}>
                                                              {{ $provider->name }}
                                                          </option>
                                                      @endforeach
                                                  </select>
                                              </div>
                                              <button type="submit" class="button is-primary mx-3" {{ $order->status == 'completed' ? 'disabled' : '' }}>تحديث</button>
                                          </div>
                                      </div>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div><!-- End Card Content -->
        </section>
    </div>
    @include('admin.partials.deleteModal')
@endsection
