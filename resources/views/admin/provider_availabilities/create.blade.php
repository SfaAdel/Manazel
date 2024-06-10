<!-- resources/views/admin/provider_availabilities/create.blade.php -->

@extends('admin.layouts.app')

@section('page.title', '  اضافة اجازات موظف')

@section('content')
<div class="card main-card">
    <div class="card-header">
        <a href="{{ route('admin.provider_availabilities.index') }}" class="button is-success">
            <span class="icon is-small">
                <i class="fa-solid fa-list"></i>
            </span>
            <span>قائمة اجازات الموظفين </span>
        </a>
    </div>
    {!! Form::open(['route' => 'admin.provider_availabilities.store', 'method' => 'POST']) !!}
    @include('admin.provider_availabilities._form')
    {!! Form::close() !!}
</div>
@endsection
