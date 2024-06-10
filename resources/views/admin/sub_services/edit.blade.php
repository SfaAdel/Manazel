<!-- Layout Extend -->
@extends('admin.layouts.app')
<!-- SEO Section -->
@section('page.title', 'تعديل بيانات ')
<!-- Start Content Section -->
@section('content')
    <!-- Start Card -->
    <div class="card main-card">
        <!-- Start Card Header -->
        <div class="card-header">
            <a href="{{ route('admin.sub_services.index') }}" class="button is-success">
        <span class="icon is-small">
            <i class="fa-solid fa-list"></i>
        </span>
                <span>قائمة الخدمات</span>
            </a>
        </div><!-- End Card Header -->
        <!-- Start Form -->
    {!! Form::model($subService,['method' => 'PATCH', 'files' => true, 'url' => route('admin.sub_services.update', $subService->id)]) !!}
    @include('admin.sub_services._form')
    {!! Form::close() !!}
    <!-- End Form -->
    </div><!-- End Card -->
@endsection<!-- End Content Section -->
