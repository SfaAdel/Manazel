@extends('front/layouts.index')
@section('page.title', ' مدونة منازل')
@section('page.description',  $blogSection->short_description )

@section('content')

<!-- Hero Section -->
<section id="hero" class="hero section background-blur" style="background-image: url('{{ asset('images/pages_banners/' . $blogSection->banner) }}');">
    <div class="container">
        <div class="row text-center">
            <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                <h1 class="my-3">مدونة منازل</h1>
                <p>{{ $blogSection->short_description }}</p>

                <div class=" m-2">
                    <div class="dropdown ">
                        <button class="btn btn-filter dropdown-toggle" type="button" data-toggle="dropdown" title="ابحث عن موضوع">ابحث عن موضوع
                            <span class="caret"></span>
                        </button>
                        <ul id="category-list" class="dropdown-menu text-right p-3 search_filter">
                            <li>
                                <a href="{{ route('blogs.filter' ,  ['id' => 0 , 'slug' => 'جميع المواضيع'] ) }}" class="text_gray" title="جميع المواضيع">جميع المواضيع</a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('blogs.filter',  ['id' => $category->id, 'slug' => $category->name]) }}" class="text_gray" title="{{$category->name}}">{{ $category->name }}</a>
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
        <div class="container section-title mb-2" data-aos="fade-up">
            <h2>{{ $blogSection->title }}</h2>
            <p class="mb-2">{{ $blogSection->short_description }}</p>
            <br>
            <div class="m-2">
                <div class="tag-list">
                    @foreach($tags as $tag)
                    <a href="{{ route('blogs.filterByTag', ['id' => $tag->id, 'slug' => $tag->name]) }}" class="mx-1" title="{{ $tag->name }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
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
                        <div class="blog-entry d-flex align-items-center center card p-2 blog_card">
                            <div class="entry-info m-2 center">
                                <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="card-img-top blog_img" alt="{{ $blog->main_title }}">
                                <h4 class="mt-2">{{ $blog->main_title }}</h4>
                                <p class="mt-1">{{ $blog->short_description }}</p>
                                <a href="{{ route('blog_details', ['id' => $blog->id, 'slug' => $blog->main_title]) }}" class="btn btn-blue mt-1" title="{{$blog->name}}">قراءة المزيد</a>
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

    $(document).ready(function() {
    var listItemCount = $('#category-list li').length;
    if (listItemCount > 5) {
        $('#category-list').addClass('scrollable-dropdown');
    }
});

</script>



@endsection
