@extends('admin.layouts.app')

@section('page.title', 'تفاصيل الطلب')

@section('content')
    <div class="card">
        <section class="section main-block">
            <div class="">
                <a href="{{ route('admin.appointments.index') }}" class="button is-success">
                  <span class="icon is-small">
                    <i class="fa-regular fa-calendar-check"></i>
                  </span>
                  <span>قائمة الطلبات</span>
                </a>
            </div><!-- End Card Header -->


            <!-- Start Card Content -->
            <div class="card-content">
                <collapse class="outer" accordion is-fullwidth>
                    <collapse-item title="تفاصيل الطلب" icon="fa fa-envelope-open" selected>
                        <div class="columns is-vcentered">
                            <div class="column is-12">
                                <div class="info-content">
                                    <div class="info">
                                        <label class="label">اسم العميل</label>
                                        <span class="value">{{ $appointment->customer->name }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label">رقم الهاتف </label>
                                        <span class="value"><a  style="color: rgb(20, 119, 96)" href="tel:{{ $appointment->customer->phone }}">{{ $appointment->customer->phone }}</a></span>
                                    </div>
                                    {{-- <div class="info">
                                        <label class="label">البريد الإلكتروني </label>
                                        <span class="value"><a href="mailto:{{ $appointment->customer->email }}">{{ $appointment->email }}</a></span>
                                    </div> --}}

                                    <div class="info">
                                        <label class="label">اسم الخدمة </label>
                                        <span class="value">{{ $appointment->subService->name }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label">سعر الخدمة </label>
                                        <span class="value">{{ $appointment->subService->price }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> اليوم </label>
                                        <span class="value">{{ $appointment->day }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> المعاد </label>
                                        <span class="value">{{ $appointment->time }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> المدينة </label>
                                        <span class="value">{{ $appointment->district->city->name }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> الحي </label>
                                        <span class="value">{{ $appointment->district->name }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> العنوان </label>
                                        <span class="value">{{ $appointment->address }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> حالة الطلب </label>
                                        <span class="value">{{ $appointment->status ?? 'قيد الانتظار' }}</span>
                                    </div>
                                    <div class="info">
                                        <label class="label"> مقدم الخدمة </label>
                                        <span class="value">{{ $appointment->provider->name ?? 'لم يتم اختياره بعد'}}</span>
                                    </div>
                                    {{-- <div class="info">
                                        <label class="label"> مقدم الخدمة </label>
                                        <span>
                                            <form action="{{ route('admin.appointments.update', $appointment->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <div class="field">
                                                    <div class="control">
                                                    <div class="select d-inline">
                                                        <select name="provider_id" {{ $appointment->status == 'completed' ? 'disabled' : '' }}>
                                                            <option value="" selected disabled>اختر مقدم خدمة</option>
                                                            @foreach($availableProviders as $provider)
                                                                <option value="{{ $provider->id }}" {{ $appointment->provider_id == $provider->id ? 'selected' : '' }}>
                                                                    {{ $provider->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                                                        <button type="submit" class="button is-primary mx-3" {{ $appointment->status == 'completed' ? 'disabled' : '' }}>تحديث</button>
                                                    @endif
                                                    </div>
                                                </div>
                                            </form>
                                        </span>
                                    </div> --}}
                                    <div class="info">
                                        <label class="label">  رقمه </label>
                                        <span class="value" >
                                            <a target="_blank"
style="color: rgb(20, 119, 96)"
                                            href="https://api.whatsapp.com/send?phone=2{{ $appointment->provider->phone ?? '00' }}"
                                            class="text-success mx-2">
                                            {{ $appointment->provider->phone ?? '- -' }}                                        </a>
                                        </span>
                                    </div>
                                    <div class="info">
                                        <label class="label">الموقع على الخريطة</label>
                                        <a  class="text-success" style="color: rgb(20, 119, 96)"

                                        href="https://maps.google.com/?q={{ $appointment->latitude }},{{ $appointment->longitude }}" target="_blank">عرض على خرائط جوجل</a>
                                    </div>

                                    <div class="info left-buttons">
                                        <ul>
                                            <li class=" tooltip is-tooltip-right" data-tooltip="تاريخ الطلب">
                                                <div class="available">
                                                    {{ $appointment->created_at ? $appointment->created_at->toDayDateTimeString() : '--' }}
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </collapse-item>
                </collapse>
            </div><!-- End Card Content -->
        </section>


    </div>
    @include('admin.partials.deleteModal')
@endsection


