<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات فريق العمل')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.teams.index') }}" class="button is-success">
        <span class="icon is-small">
          <i class="fa fa-sitemap"></i>
        </span>
        <span>قائمة فرق العمل</span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($team,['method' => 'PATCH', 'files' => true, 'url' => route('admin.teams.update', $team->id)]) !!}
      @include('admin.teams._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


