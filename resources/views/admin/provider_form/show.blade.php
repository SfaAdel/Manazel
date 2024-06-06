@extends('admin.layouts.app')

@section('page.title', 'مشاهدة تفاصيل الطلب')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.provider_form.index') }}" class="button is-success">
        <span class="icon is-small"><i class="fa fa-bell"></i></span>
            <span>قائمة الطلبات</span>
        </a>
    </div>
    <div class="card-content">
        <collapse class="outer" accordion is-fullwidth>
            <collapse-item title="محتوي الرسالة" icon="fa fa-envelope-open" selected>
                <div class="columns is-vcentered">
                    <div class="column is-12">
                        <div class="info-content">
                            <div class="info">
                                <label class="label">الاسم</label>
                                <span class="value">{{ $providerForm->name }}</span>
                            </div>
                            <div class="info">
                                <label class="label">رقم الهاتف </label>
                                <span class="value"><a href="tel:{{ $providerForm->phone }}">{{ $providerForm->phone }}</a></span>
                            </div>
                            <div class="info">
                                <label class="label">البريد الإلكتروني </label>
                                <span class="value"><a href="mailto:{{ $providerForm->email }}">{{ $providerForm->email }}</a></span>
                            </div>

                            <div class="info">
                                <label class="label">القسم الذي يود الانضمام اليه </label>
                                <span class="value">{{ $providerForm->category }}</span>
                            </div>
                            <div class="info left-buttons">
                                <ul>
                                    <li class=" tooltip is-tooltip-right" data-tooltip="تاريخ الطلب">
                                        <div class="available">
                                            {{ $providerForm->created_at ? $providerForm->created_at->toDayDateTimeString() : '--' }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </collapse-item>
        </collapse>
    </div>
</div>
@endsection



