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
      <a href="{{ route('admin.why_us.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-sitemap"></i>
        </span>
        <span>قائمة اسئلة من نحن</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($whyUs,['method' => 'PATCH', 'files' => true, 'url' => route('admin.why_us.update', $whyUs->id)]) !!}
      @include('admin.why_us._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


