@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')




    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('{{ asset('images/blogs_banners/' . $blog->banner) }}');">
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">  مدونة {{$blog->main_title}} </h1>

                </div>
            </div>
        </div>
    </section>

<main class="container my-6 p-6 mt-4">

        <!-- About Section -->
        <section id="about" class="about section p-5 mt-5">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class=""> {{$blog->main_title}}</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4 mb-5">
                    <div class="col-12 center" data-aos="fade-up">
                        <p class="lead">{{$blog->short_description}}
                        </p>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        {{-- <h2 class="my-3">{{$blog->second_title}}</h2> --}}
                        <div class="row">

                                <div class="col-md-12 mb-4">

                                            <div>{!! $blog->long_description !!}</div>

                                </div>

                        </div>
                    </div>

                    <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('images/blogs/' . $blog->icon) }}" class="img-fluid animated rounded" alt="Why Us">
                    </div>
                </div>



        </section><!-- /About Section -->

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
