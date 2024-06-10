<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات العداد ')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.counters.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
        <span>قائمة العدادات </span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($counter,['method' => 'PATCH', 'files' => true, 'url' => route('admin.counters.update', $counter->id)]) !!}
      @include('admin.counters._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


