@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
    <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
    <div class="container">
        <div class="row text-center">
            <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1 class="my-3">مدونة منازل</h1>
                <p>{{ $blogSection->short_description }}</p>

                <div class="container m-3">
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">ابحث عن موضوع
                            <span class="caret"></span>
                        </button>
                        <ul id="category-list" class="dropdown-menu text-right p-3">
                            <li>
                                <a href="{{ route('blogs.filter') }}" class="text_gray">جميع المواضيع</a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blogs.filter', $category->id) }}" class="text_gray">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<main class="container my-6 p-6">
    <!-- Blog Section -->
    <section id="blog" class="section px-4 mt-4">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ $blogSection->title }}</h2>
            <p>{{ $blogSection->short_description }}</p>
        </div><!-- End Section Title -->

        @if (!isset($blogs) || $blogs->isEmpty())
        <h4 class="my-3 center" >لا يوجد مدونات بعد <i class="fa-solid fa-ban mx-2"></i> </h4>
        @else
        <div class="container">
            <div class="row gy-4">
                @if(!empty($noBlogsMessage))
                    <div class="col-12">
                        <p class="alert alert-warning">{{ $noBlogsMessage }}</p>
                    </div>
                @endif

                @foreach($blogs as $blog)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="blog-entry d-flex align-items-start center card bg-success-subtle p-4 blog_card">
                            <div class="entry-info m-2 center">
                                <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="card-img-top blog_img" alt="">
                                <h4 class="mt-4">{{ $blog->main_title }}</h4>
                                <p class="mt-2">{{ $blog->short_description }}</p>
                                <a href="{{ route('blog_details', $blog->id) }}" class="btn btn-blue mt-2 mx-3">قراءة المزيد</a>
                            </div>
                        </div>
                    </div><!-- End Blog Entry -->
                @endforeach
            </div>
        </div>
        @endif
    </section><!-- /blog Section -->
</main>

<script>
    $(document).ready(function(){
        $("#category-search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#category-list li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

@endsection
