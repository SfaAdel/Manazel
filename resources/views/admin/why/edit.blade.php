<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.why.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
        <span>قائمة معلومات من نحن</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($why, ['method' => 'PATCH', 'files' => true, 'url' => route('admin.why.update', $why->id)]) !!}
    @include('admin.why._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


