<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل  بيانات السؤال ')
<!-- Start Content Section -->
@section('content')
  <!-- Start Card -->
  <div class="card main-card">
    <!-- Start Card Header -->
    <div class="card-header">
      <a href="{{ route('admin.questions.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
        <span>قائمة الاسئلة </span>
      </a>
    </div><!-- End Card Header -->
    <!-- Start Form -->
    {!! Form::model($question,['method' => 'PATCH', 'files' => true, 'url' => route('admin.questions.update', $question->id)]) !!}
      @include('admin.questions._form')
    {!! Form::close() !!}<!-- End Form -->
  </div><!-- End Card -->
@endsection<!-- End Content Section -->


