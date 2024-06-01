@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')




    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">  مدونة منازل </h1>
                    <p>{{ $blogSection->short_description }}</p>

                    <div class="container m-3 ">

                        <div class="dropdown ">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> ابحث عن موضوع
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu text-right p-3 ">
                            @foreach($categories as $category)
                            <li ><a href="#" class="text_gray">{{$category->name}} </a></li>
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
    <section id="blog" class="blog section px-4 mt-4">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
        <h2> {{ $blogSection->title }}</h2>
        <p>{{ $blogSection->short_description }}</p>
        </div><!-- End Section Title -->

        <div class="container">

        <div class="row gy-4">

            @foreach($blogs as $blog)

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>{{$blog->name}}</h4>
                <p class="m-4"> {{$blog->short_description}} </p>
                <a href="{{ route('blog_details', $blog->id) }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

            </div>
            </div>
            </div><!-- End Blog Entry -->
            @endforeach


        </div>

        </div>

    </section><!-- /blog Section -->


</main>

<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

@endsection
