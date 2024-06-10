<!-- resources/views/admin/provider_availabilities/index.blade.php -->

@extends('admin.layouts.app')

@section('page.title', ' اجازات الموظفين')

@section('content')
<div class="card main-card">
    @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
    <div class="card-header is-justify-content-space-between">
        <a href="{{ route('admin.provider_availabilities.create') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-plus-circle"></i>
            </span>
            <span>اضافة اجازات موظف </span>
        </a>
    </div>
    @endif
    <div class="center">
        @include('admin.partials.search_result', ['data' => $providerAvailabilities])
    </div>
    @if (!$providerAvailabilities->isEmpty())
    <div class="card-content">
        <div class="table-container">
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>الموظف</th>
                        <th>ايام الاجازات</th>
                        <th>الشهر</th>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <th>الاجراءات</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($providerAvailabilities as $providerAvailability)
                    <tr>
                        <td>{{ $providerAvailability->provider->name }}</td>
                        <td>
                            @foreach ($providerAvailability->off_days as $offDay)
                                {{ date('d', strtotime($offDay)) }} {{-- Display just the day part --}}
                                /
                            @endforeach
                        </td>

                        <td>{{ $providerAvailability->month->format('Y-m') }}</td>
                        @if (auth('admin')->user()->role == 'super_admin' || auth('admin')->user()->role == 'data_entry')
                        <td>
                            <div class="buttons has-addons">
                                <a class="button is-info" href="{{ route('admin.provider_availabilities.edit', $providerAvailability->id) }}">تعديل</a>
                                <a class="modal-open button is-danger" status-name="Confirm Delete" traget-modal=".delete-modal" data_id="{{ $providerAvailability->id }}" data_name="{{ $providerAvailability->provider->name }}" data-url="{{ route('admin.provider_availabilities.destroy', $providerAvailability->id) }}">حذف</a>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <div class="center d-flex justify-center align-content-center m-4">
        <div class="card-footer with-pagination">
            {{ $providerAvailabilities->links() }}
        </div>
    </div>
</div>
@include('admin.partials.deleteModal')
@endsection
