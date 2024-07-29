<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'اضافة شعار')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.tags.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
          </span>
          <span>قائمة الشعارات</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.tags.store']]) !!}
      @include('admin.tags._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
