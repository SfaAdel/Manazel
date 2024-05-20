@extends('front/layouts.index')
@section('page.title', ' المدونة')

@section('content')




    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">
                    <h1 class="my-3">  مدونة منازل </h1>
                    <p class="">  نقدم لكم آخر الصيحات والأخبار في طرق تصميم منازلكم والحفاظ على سلامتكم بأفضل الطرق وأوفرها
                    </p>
                    <div class="container m-3 ">

                        <div class="dropdown ">
                          <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> ابحث عن موضوع
                          <span class="caret"></span></button>
                          <ul class="dropdown-menu text-right p-3 ">
                            <li ><a href="#" class="text_gray">الاجهزة المنزلية</a></li>
                            <li><a href="#" class="text_gray">التعقيم</a></li>
                            <li><a href="#" class="text_gray">السباكة</a></li>
                            <li><a href="#" class="text_gray">الكهرباء</a></li>
                            <li><a href="#" class="text_gray">المكيفات</a></li>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<main class="container my-6 p-6">

    {{-- <!-- Services Section -->
    <section id="services" class="services section mt-4">

        <div class="container p-3">

            <div class="row gy-4">

              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                  <div class="icon"><i class="bi bi-activity icon"></i></div>
                  <h4><a href="{{ route('blog_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                  <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                    <a href="{{ route('blog_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>

                </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item position-relative">
                  <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
                  <h4><a href="{{ route('blog_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                  <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                  <a href="{{ route('blog_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item position-relative">
                  <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
                  <h4><a href="{{ route('blog_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                  <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                  <a href="{{ route('blog_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                </div>
              </div><!-- End Service Item -->

              <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item position-relative">
                  <div class="icon"><i class="bi bi-broadcast icon"></i></div>
                  <h4><a href="{{ route('blog_details') }}" class="stretched-link">    ترتيب دولاب الملابس بمساعدة العاملات المنزلية    </a></h4>
                  <p>    إن ترتيب دولاب ملابس الأفراد مهمة لطيفة ولا تحتاج إلى المجهود الكبير في حال كان .....  </p>
                  <a href="{{ route('blog_details') }}" class="btn btn-blue mt-3">معرفة المزيد</a>
                </div>
              </div><!-- End Service Item -->

            </div>

          </div>
    </section><!-- /Services Section --> --}}

    <!-- Blog Section -->
    <section id="blog" class="blog section px-4 mt-4">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
        <h2> المدونات</h2>
        <p>تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء  .</p>
        </div><!-- End Section Title -->

        <div class="container">

        <div class="row gy-4">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>قسم الترويج و الإعلان</h4>
                <p class="m-4">مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء</p>
                <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

            </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>  قسم البحث و التطوير </h4>
                <p class="m-4">يتكون هذا القسم من عدد من المهندسين المتخصصين بتحليل البيانات و مهمتهم تحليل سوق العمل وايجاد أفكار جديدة</p>
                <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

            </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>قسم الإدارة</h4>
                <p class="m-4">يتخصص هذا القسم بمتابعة أعمال الشركة ككل و تنسيق العمل بين الأقسام وتوجيهها لتعمل بتناغم</p>
                <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

            </div>
            </div>
            </div><!-- End Blog Entry -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="blog-entry d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="entry-info m-2">
                <h4>  فريق دعم العملاء </h4>
                <p class="m-4">وهو قسم من الخبراء في مجال الصيانة مخصص للرد على اتصالات الزبائن و الردعلى جميع الإستفسارات و الأسئلة</p>
                <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

            </div>
            </div>
            </div><!-- End Blog Entry -->


            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="blog-entry d-flex align-items-start">
                    <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                    <div class="entry-info m-2">
                    <h4>قسم الإدارة</h4>
                    <p class="m-4">يتخصص هذا القسم بمتابعة أعمال الشركة ككل و تنسيق العمل بين الأقسام وتوجيهها لتعمل بتناغم</p>
                    <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

                </div>
                </div>
                </div><!-- End Blog Entry -->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="blog-entry d-flex align-items-start">
                    <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                    <div class="entry-info m-2">
                    <h4>  فريق دعم العملاء </h4>
                    <p class="m-4">وهو قسم من الخبراء في مجال الصيانة مخصص للرد على اتصالات الزبائن و الردعلى جميع الإستفسارات و الأسئلة</p>
                    <a href="{{ route('blog_details') }}" class="btn btn-blue mt-1 mx-3">قراءة المزيد</a>

                </div>
                </div>
                </div><!-- End Blog Entry -->

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
