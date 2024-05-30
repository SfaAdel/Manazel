<!-- resources/views/admin/provider_availabilities/edit.blade.php -->

@extends('admin.layouts.app')

@section('page.title', 'تعديل اجازات الموظف')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.provider_availabilities.index') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa fa-list"></i>
            </span>
            <span>قائمة اجازات الموظفين </span>
        </a>
    </div>
    {!! Form::model($providerAvailability, ['route' => ['admin.provider_availabilities.update', $providerAvailability->id], 'method' => 'PATCH']) !!}
    @include('admin.provider_availabilities._form')
    {!! Form::close() !!}
</div>
@endsection
