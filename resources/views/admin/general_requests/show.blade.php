@extends('admin.layouts.app')

@section('page.title', 'تفاصيل الطلب ')

@section('content')
    <div class="card main-card">
        <div class="card-header">
            <a href="{{ route('admin.general_requests.index') }}" class="button is-success">
                <span class="icon is-small"><i class="fa fa-envelope"></i></span>
                <span>قائمة الطلبات الخارجية</span>
            </a>
        </div>

        @php
            $statusTranslations = [
                'canceled' => 'ملغي',
                'pending' => 'قيد الانتظار',
                'completed' => 'مكتمل',
            ];
        @endphp

        <div class="card-content">
            <collapse class="outer" accordion is-fullwidth>
                <collapse-item title="تفاصيل الطلب" icon="fa fa-envelope-open" selected>
                    <div class="columns is-vcentered">
                        <div class="column is-12">
                            <div class="info-content">
                                <div class="info">
                                    <label class="label">اسم العميل</label>
                                    <span class="value">{{ $generalRequest->name }}</span>
                                </div>
                                <div class="info">
                                    <label class="label">رقم الهاتف </label>
                                    <span class="value"><a href="tel:{{ $generalRequest->phone }}">{{ $generalRequest->phone }}</a></span>
                                </div>
                                <div class="info">
                                    <label class="label"> اسم الخدمة </label>
                                    <span class="value">{{ $generalRequest->subService->name }}</span>
                                </div>
                                <div class="info">
                                    <label class="label"> المدينة </label>
                                    <span class="value">{{ $generalRequest->district->city->name }}</span>
                                </div>
                                <div class="info">
                                    <label class="label"> الحي </label>
                                    <span class="value">{{ $generalRequest->district->name }}</span>
                                </div>
                                <div class="info">
                                    <label class="label"> العنوان </label>
                                    <span class="value">{{ $generalRequest->address }}</span>
                                </div>
                                <hr>
                                <div class="info">
                                    <label class="label"> ملاحظات </label>
                                    <form action="{{ route('admin.general_requests.update', $generalRequest->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="field">
                                            <div class="control">
                                                <textarea name="notes" class="textarea">{{ $generalRequest->notes ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="label required">حالة الطلب </label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <select name="status" id="status" class="input select control">
                                                            @foreach ($statusTranslations as $status => $translation)
                                                                <option value="{{ $status }}" {{ $generalRequest->status == $status ? 'selected' : '' }}>
                                                                    {{ $translation }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field is-horizontal" id="price-field" style="display: none;">
                                            <div class="field-label is-normal">
                                                <label class="label required">السعر </label>
                                            </div>
                                            <div class="field-body">
                                                <div class="field">
                                                    <div class="control">
                                                        <input type="number" name="price" class="input control" value="{{ $generalRequest->price ?? $generalRequest->subService->final_price }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="button is-primary">تحديث</button>
                                    </form>
                                </div>
                                <div class="info left-buttons">
                                    <ul>
                                        <li class="tooltip is-tooltip-right" data-tooltip="تاريخ الرسالة">
                                            <div class="available">
                                                {{ $generalRequest->created_at ? $generalRequest->created_at->toDayDateTimeString() : '--' }}
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function togglePriceField() {
                var status = $('#status').val();
                if (status === 'completed') {
                    $('#price-field').show();
                } else {
                    $('#price-field').hide();
                }
            }

            $('#status').change(function() {
                togglePriceField();
            });

            // Initial check
            togglePriceField();
        });
    </script>
@endsection
