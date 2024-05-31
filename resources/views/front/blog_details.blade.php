@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')




    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">  مدونة (اسم المدونة) </h1>

                </div>
            </div>
        </div>
    </section>

<main class="container my-6 p-6">

    <!-- Services Section -->
    <section id="services" class="services section mt-4">


        <div class="center p-4">
            <h2 class="mb-4" >أهمية ترتيب دولاب ملابس أفراد البيت</h2>

            <img src="assets/img/blogs/books-1.jpg" class="mb-4" alt="">
        </div>

    </section><!-- /Services Section -->

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
