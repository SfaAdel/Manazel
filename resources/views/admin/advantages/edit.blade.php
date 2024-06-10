<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات ميزة ')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.advantages.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>        </span>
        <span>قائمة المميزات </span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($advantage,['method' => 'PATCH', 'files' => true, 'url' => route('admin.advantages.update', $advantage->id)]) !!}
      @include('admin.advantages._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


