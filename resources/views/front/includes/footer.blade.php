
{{-- <hr> --}}
<footer id="footer" class="footer mt-4  center">

    {{-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div> --}}

    <div class="container footer-top ">
      <div class="row gy-4 center">
        <div class="col-lg-4 col-md-6 footer-about ">
          <a href="{{ route('home') }}" class="center">
            <span class="sitename">منازل</span>
          </a>
          <div class="footer-contact pt-3 text-right d-flex flex-column align-items-center">
            <div class="footer-contact pt-3 text-right d-flex flex-column align-items-start">
                <p> <i class="fa fa-location-dot text-custom mx-2"></i> <strong class=""> المقر :</strong> <span> الرياض - المملكة العربية السعودية</span></p>
                <p class="mt-3"> <i class="fa fa-phone text-custom mx-2"></i> <strong class="">رقم الهاتف :</strong> <span>00966542936554</span> </p>
                <p class="mt-3"><i class="fa fa-envelope text-custom mx-2"></i> <strong class="">البريد الالكتروني:</strong> <span>Info@mnazel.com</span></p>
            </div>
        </div>
    </div>


        <div class="col-lg-2 col-md-3 footer-links center" id="footer_web">
            <h4>خدماتنا</h4>
            <ul>
                @foreach ($navCategories as $navCategory)
                <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services', $navCategory->id) }}">  {{ $navCategory->name }} </a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links center" id="footer_mobile">
            <h4>خدماتنا</h4>
            <div class="row">
                <div class="col-6">
                    <ul>
                        @foreach ($navCategories->slice(0, ceil($navCategories->count() / 2)) as $navCategory)
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services', $navCategory->id) }}">  {{ $navCategory->name }} </a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6">
                    <ul>
                        @foreach ($navCategories->slice(ceil($navCategories->count() / 2)) as $navCategory)
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('services', $navCategory->id) }}">  {{ $navCategory->name }} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


        <div class="col-lg-2 col-md-3 footer-links" id="footer_web">
          <h4>لتصل اسرع</h4>
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('blogs') }}">المدونات</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('about') }}">من نحن</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('categories') }}">خدماتنا</a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="{{ route('contact') }}">تواصل معنا </a></li>
                    <li><i class="bi bi-chevron-right"></i> <a href="mailto:Info@mnazel.com"> Info@mnazel.com  </a></li>

                </ul>
        </div>


        <div class="col-lg-4 col-md-12 mb-4">
          <h4>تابعنا</h4>
          <div class="social-links d-flex justify-content-center ">
            <a href="https://x.com/Mnazel_KSA"><i class="fa-brands fa-x-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>

            <a href=""><i class="bi bi-tiktok"></i></a>
            <a href=""><i class="bi bi-youtube"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>

            <a href="https://www.instagram.com/mnazel_sa/"><i class="bi bi-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-2">
      <p> <span></span> <strong class="px-1 sitename">منازل</strong> <span> © جميع الحقوق محفوظة </span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        صنع بكل حب <a href="https://bootstrapmade.com/"><i class="fa fa-heart text-danger"></i></a>
      </div>
    </div>

  </footer>
