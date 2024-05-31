@extends('front/layouts.index')
@section('page.title', 'معلومات حولنا')

@section('content')


    <!-- Hero Section -->
    <section id="hero" class="hero section background-blur" style="background-image: url('front/assets/img/background.jpg');">
        <div class="background-blur" style="background-image: url('front/assets/img/service-bg.jpg');"></div>
        <div class="container ">
            <div class="row text-center">
                <div class="d-flex flex-column justify-content-center" data-aos="zoom-out">

                    <h1 class="my-3">  من نحن </h1>

                </div>
            </div>
        </div>
    </section>

<main class="container">

<section id="about" class="about section mt-5 p-5">

    <div class="container mt-3">

        <div class="row gy-4">
            <p> يعود تاريخ شركة الأنظمة الأولية في المملكة العربية السعودية  إلى عام 2000م , عندما قررنا البدء في مجال الصيانة و التصليح لتقديم تجربة استثنائية لجميع العملاء في المملكة . لم تكن الصيانة و التصليح مجرد مهنة نمتهنا بل كانت أكثر من ذلك . نحن نؤمن ان حب العمل و الالتزام به مصدر النجاح الوحيد , تتخصص شركتنا في تقديم خدمات صيانة و تصليح شاملة و موثوقة لجميع أنواع الأجهزة المنزلية مثل الغسالات و الأفران و الثلاجات و الفريزرات , و المكيفات .  بالاضافة لخدمات الصبغ و السباكة و اعمال الكهرباء  . نحن الآن بعد أكثر من 24 سنة من تقديم خدمات الصيانة بكل حب وثقة للعلاء نعد أفضل شركة رائدة في مجالها بجميع أنحاء المملكة العربية السعودية . تتميز شركتنا بفريق مهندسين و فنيين مدربين تدريباً ممتازاً , و ذوي خبرة في مجال صيانة الأجهزة المنزلية . يحمل فريقنا مهارات ومعرفة واسعة في التعامل مع مختلف المشاكل التي قد تواجهك . و أخيراً منذ تأسيس الشركة وحتى يومنا الحالي نلتزم بتقديم خدمات عالية الجودة و موثوقة للعملاء . إذا واجهتك أي مشكلة أو كان لديك أي استفسار فلا تتردد في الاتصال بنا و الاعتماد على خبرتنا للحصول على حل جذري لجميع مشاكلك .
            </p>
        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">

            <h2 class="my-3">لماذا عليك اختيارنا ؟</h2>
            <ul>
            <li><i class="bi bi-check2-circle mx-3"></i> <span>قدرتنا على بناء علاقة مميزة مع العميل . </span></li>
            <li><i class="bi bi-check2-circle mx-3"></i> <span> نحن نعتبر أن رضا العملاء و تحقيق توقعاتهم أمراً حاسماً و مهماً بالنسبة لنا . </span></li>
            <li><i class="bi bi-check2-circle mx-3"></i> <span>يتم بناء العلاقة القوية بين شركتنا و العملاء عن طريق فهم احتياجات العملاء العامة و الخاصة , و محاولة تقديم حلول مناسبة لها .</span></li>
            <li><i class="bi bi-check2-circle mx-3"></i> <span>نهتم بجميع تفاصيلهم و نتفاعل مع ملاحظات و الشكاوي بشكل فعال و جدي . </span></li>
            <li><i class="bi bi-check2-circle mx-3"></i> <span>نعمل بجهد على تحسين خدماتنا بناءً على التعليقات المستلمة من العملاء .</span></li>
            <li><i class="bi bi-check2-circle mx-3"></i> <span>وهكذا بكل حب و احترام و مودة نقوم ببناء علاقة طويلة الأمد مع العملاء و كسب ثقتهم في المرة الاولى و في كل مرة .</span></li>

            </ul>
        </div>

        <div class="col-lg-4 mx-5" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/why-us.png" class="img-fluid animated" alt="">
        </div>
        </div>


    </div>

    <section class="wow fadeIn animated " style="visibility: visible; animation-name: fadeIn;">
        <div class="m-4">
                <div class="row">
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                        <i class="fa fa-beer medium-icon"></i>
                        <span id="anim-number-pizza" class="counter-number"></span>
                        <span class="timer counter alt-font appear" data-to="980" data-speed="7000">2800</span>
                        <p class="counter-title">مشروع منجز</p>
                    </div>
                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                        <i class="fa fa-heart medium-icon"></i>
                        <span class="timer counter_text alt-font appear">الرياض</span>
                        <span class="counter-title">مقر الشركة</span>
                    </div>
                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                        <i class="fa fa-anchor medium-icon"></i>
                        <span class="timer counter alt-font appear" data-to="810" data-speed="7000">18000</span>
                        <span class="counter-title">عملاء سعداء</span>
                    </div>
                    <!-- end counter -->
                    <!-- counter -->
                    <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                        <i class="fa fa-user medium-icon"></i>
                        <span class="timer counter alt-font appear" data-to="600" data-speed="7000">2000</span>
                        <span class="counter-title">تاريخ الانشاء</span>
                    </div>
                    <!-- end counter -->
                </div>
            </div>
    </section>

</section><!-- /About Section -->


<section id="why-us" class="section why-us mt-3" data-builder="section">

    <div class="container-fluid">

      <div class="row gy-4">

        <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">

          <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class=""><strong>الاسئلة الشائعة</strong></h3>
            <p class="">
              عند التعامل مع شركتنا المتخصصة في عمليات الصيانة و التصليح و اعمال السباكة و الصبغ و الكهرباء في الملكة العربية السعودية , يمكن للعملاء الحصول على العديد من المزايا و الخدمات المذهلة . ومن بين هذة الميزات :              </p>
          </div>

          <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-item faq-active mt-3">

              <h3><span>01</span> إصلاح مختلف الأعطال </h3>
              <div class="faq-content">
                <p> يمكن أن تواجه الغسالات أعطالًا متنوعة مثل تسريبات المياه ، أو التوقف التام عن العمل، أو مشاكل في دوران الغسالة أو حوض الغسيل ، وغيرها من المشاكل الفنية. فريقنا المؤهل والمدرب يتمتع بالخبرة في تشخيص وإصلاح هذه المشاكل بفعالية. سواء كانت المشكلة بسيطة أو معقدة، يمكننا تقديم الحلول المناسبة وإصلاح الأعطال بكل دقة و موثوقية .</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>

            </div><!-- End Faq item-->

            <div class="faq-item">
              <h3><span>02 </span>تقديم خدمات صيانة دورية ووقائية </h3>
              <div class="faq-content">
                <p> حيث ننصح بإجراء صيانة دورية للغسالة للحفاظ على أدائها الممتاز وتجنب المشاكل الفجائية المحتملة. تتضمن خدمة الصيانة الوقائية لدينا فحصًا شاملاً لجميع أجزاء الغسالة ، وتنظيف البرميل والمرشحات، والتأكد من سلامة وصلاحية الأجزاء الميكانيكية والكهربائية، وإعادة ضبط الإعدادات إن لزم الأمر. يمكننا أيضاً أن نوفر لك جدول صيانة منتظم وفقًا لاحتياجاتك للمساعدة في المحافظة على أداء الغسالة بأفضل طريقة ممكنة.</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item">
              <h3><span>03</span> أفضل خدمة صيانة</h3>
              <div class="faq-content">
                <p>إذا كنت تبحث عن خدمة الصيانة رقم واحد في المملكة فنحن خيارك الأفضل , نقدم جميع الخدمات الموثوقة للعملاء وعلى يد أفضل فريق فني .</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item">
              <h3><span>04</span>  أفضل قيمة مقابل السعر</h3>
              <div class="faq-content">
                <p>تعد ميزة الحصول على أفضل قيمة مقابل السعر ميزة مهمة للعملاء , فهي تضمن لهم جودة الخدمة و الكفاءة في العمل بالإضافة للحصول على تكلفة معقولة تناسب الجميع .</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

            <div class="faq-item">
              <h3><span>05</span> خدمة في الوقت المحدد</h3>
              <div class="faq-content">
                <p>نحن ندرك اهمية عامل الوقت في تقديم الخدمات , لذلك نحرص على الوصول في الوقت المتفق عليه وانجاز المهمة في الوقت المحدد بدون أي تأخير لجدول مواعيدك .</p>
              </div>
              <i class="faq-toggle bi bi-chevron-right"></i>
            </div><!-- End Faq item-->

          </div>

        </div>

        <div class="col-lg-5 order-1 order-lg-2 why-us-img">
          <img src="assets/img/why-us.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
        </div>
      </div>

    </div>

</section><!-- /Why Us Section -->

    <!-- Team Section -->
<section id="team" class="team section mt-3 p-4">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>فريق العمل</h2>
          <p>تتكون شركتنا من عدة أقسام و كل قسم مسؤول عن انجاز مهام معينة لتحقيق أفضل استفادة مع العمل المشترك بين الأقسام , نعمل معاً كعائلة واحدة لتقديم خدمات عالية الجودة للعملاء  .</p>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4>قسم الترويج و الإعلان</h4>
                  <p class="m-4">مكون من عدد من المتخصصين في مجال الدعاية و التسويق , مهمتهم ايصال خدمات الشركة إلى اكبر عدد من العملاء</p>
                </div>
              </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4>  قسم البحث و التطوير </h4>
                  <p class="m-4">يتكون هذا القسم من عدد من المهندسين المتخصصين بتحليل البيانات و مهمتهم تحليل سوق العمل وايجاد أفكار جديدة</p>
                </div>
              </div>
            </div><!-- End Team Member -->


            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4>قسم الإدارة</h4>
                  <p class="m-4">يتخصص هذا القسم بمتابعة أعمال الشركة ككل و تنسيق العمل بين الأقسام وتوجيهها لتعمل بتناغم</p>
                </div>
              </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4>  فريق دعم العملاء </h4>
                  <p class="m-4">وهو قسم من الخبراء في مجال الصيانة مخصص للرد على اتصالات الزبائن و الردعلى جميع الإستفسارات و الأسئلة</p>
                </div>
              </div>
            </div><!-- End Team Member -->


            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4>الفريق الفني</h4>
                  <p class="m-4">عدد من الفنيين الخاضعين لدورات مكثفة في مجال الصيانة و هم الخط الاول و الأساسي لتقديم خدمات الصيانة للعملاء</p>
                </div>
              </div>
            </div><!-- End Team Member -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
              <div class="team-member d-flex align-items-start">
                <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                <div class="member-info m-2">
                  <h4> الخبراء و المهندسين </h4>
                  <p class="m-4"> وهم عبارة مهندسين الكهرباء و الميكانيك و الخبراء في مجال الصيانة يقومون بتشخيص الأعطال و إعطاء تعليماتهم للفريق الفني</p>
                </div>
              </div>
            </div><!-- End Team Member -->


          </div>

        </div>

</section><!-- /Team Section -->

</main>

@endsection

