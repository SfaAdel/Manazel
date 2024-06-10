<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل بيانات الموظف')
<!-- Start Content Section -->
@section('content')
<!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.providers.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
        <span>قائمة الموظفين</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($provider,['method' => 'PATCH', 'files' => true, 'url' => route('admin.providers.update', $provider->id)]) !!}
      @include('admin.providers._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
