<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'اضافة قسم')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
        <a href="{{ route('admin.departments.index') }}" class="button is-success">
          <span class="icon is-small">
            <i class="fa fa-sitemap"></i>
          </span>
          <span>قائمة اقسام الكليات</span>
        </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::open(['method' => 'POST','files' => true, 'route' => ['admin.departments.store']]) !!}
      @include('admin.departments._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->
