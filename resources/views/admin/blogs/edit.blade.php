<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات المدونة')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.blogs.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
        <span>قائمة المدونات </span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($blog,['method' => 'PATCH', 'files' => true, 'url' => route('admin.blogs.update', $blog->id)]) !!}
      @include('admin.blogs._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


