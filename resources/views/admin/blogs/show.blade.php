@extends('admin.layouts.app')

@section('page.title', 'تفاصيل المدونة')

@section('content')
    <div class="card">
        <section class="section main-block">
            <h1 class="title">
                <a href="{{ route('admin.blogs.index') }}" class="button">
                    <span class="icon is-small"><i class="fa fa-newspaper"></i></span>
                    <span>قائمة المدونات</span>
                </a>
            </h1>
            <!-- Start Card Content -->
            <div class="card-content">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">التصنيف التابع لها</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">

{{$blog->category->name}}
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">العنوان الرئيسي</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" value="{{ $blog->main_title }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">وصف قصير</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" value="{{ $blog->short_description }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                {{-- <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">العنوان الثانوي</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input" value="{{ $blog->second_title }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr /> --}}
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">وصف طويل</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <div>{!! $blog->long_description !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">صورة</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <img src="{{ asset('images/blogs/' . $blog->icon) }}" alt="Blog Image" style="max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">صورة البانر</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <img src="{{ asset('images/blogs_banners/' . $blog->banner) }}" alt="Blog Image" style="max-width: 100%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Card Content -->
        </section>
    </div>
    @include('admin.partials.deleteModal')
@endsection
