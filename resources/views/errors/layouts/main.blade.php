<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {!! SEO::generate() !!}
    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/logo.ico') }}" type="image/x-icon" async />
    <!-- CSS only -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" as="style">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" media="print" onload="this.media='all'">
    <!-- Custom Style -->
    <link rel="preload" href="{{ asset('css/style.css?v=)').time() }}" as="style" />
    <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}"/>
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Animate -->
    <link
      rel="preconnect"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">  
    <!-- Font Awesome -->
    <link rel="preload" as="font" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>
    <!-- Google tag (gtag.js) --> 
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-W38ZB6FJ14"></script> 
    <script> 
        window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-W38ZB6FJ14'); 
    </script>
    
    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KS9HNV8C');
    </script>
    <!-- End Google Tag Manager -->
    
    <meta name="google-site-verification" content="tBVxYCKreNQ0x6ZPR85-vxadO9YO1hJHXhoGu5PQ9ac" />
  </head>
  <body>
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KS9HNV8C" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div class="main-wrapper">
        <!-- Topbar start -->
        <div id="top-bar" class="top-bar d-lg-block d-none bg-white">
          <div class="container">
            <div class="d-flex justify-content-between">
              <div class="top-info">
                <ul class="list-unstyled text-center text-md-start">
                  <li>
                    <span class="fw-bold d-flex align-items-center"
                      ><i class="fa-solid fa-clock pb-1"></i> Senin - Jumat: 08.00
                      - 16.30</span
                    >
                  </li>
                </ul>
              </div>
              <!--/ Top info end -->
              <div class="top-contact">
                <ul class="list-unstyled text-end">
                  <li>
                    <span class="fw-bold d-flex align-items-center"
                      ><i class="fa-solid fa-phone pb-1"></i> 0822 2690 0101 </span
                    >
                  </li>
                  <li>
                    <span class="fw-bold d-flex align-items-center"
                      ><i class="fa-solid fa-envelope pb-1"></i>
                      cs@arsatraining.com</span
                    >
                  </li>
                  <li>
                    <a
                      href="https://wa.me/6281333149284"
                       target="_blank" rel="noopener"
                      class="btn btn-tertiary fw-bold"
                    >
                      Konsultasi Layanan
                    </a>
                  </li>
                </ul>
              </div>
              <!--/ Top social end -->
            </div>
            <!--/ Content row end -->
          </div>
          <!--/ Container end -->
        </div>
        <!-- Topbar end -->
        @include('partials.navbar')

        @yield('container')
  
        @include('partials.footer')

    </div>
    
    <!-- foating searching start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="search-modal" aria-hidden="false">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body ">
              <div class="d-flex">
                <form action="/pelatihan" class="custom-form pt-2 mb-lg-0 mb-5 w-100" role="search">
                  <div class="input-group" style="border-radius: 50px">
                      <i class="fa-solid fa-magnifying-glass input-group-text d-flex align-items-center border-0 bg-transparent"></i>
                      <input name="search" value="{{ request('search') }}" type="search" class="form-control border-bottom" id="search" placeholder="Search here ..." required aria-label="Search" style="border: 0;">
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- floating searching end -->

    <!-- floating register start -->
    <div
      class="modal fade"
      id="register-option"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title fs-5 text-center" id="exampleModalLabel">
              Formulir Registrasi Training
            </h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <a
              href="/pendaftaran-sertifikasi-kemnaker-ri"
              type="button"
              class="btn btn-primary w-100 mb-2"
              >Pendaftaran Sertifikasi Kemnaker RI</a
            >
            <a
              href="/pendaftaran-sertifikasi-bnsp"
              type="button"
              class="btn btn-primary w-100 mb-2"
              >Pendaftaran Sertifikasi BNSP</a
            >
            <a
              href="/pendaftaran-training-softskill"
              type="button"
              class="btn btn-primary w-100 mb-2"
              >Pendaftaran Training Softskill</a
            >
          </div>
        </div>
      </div>
    </div>

    <button
      class="blantershow-register"
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#register-option"
    >
      <i class="fa-solid fa-file-pen me-2 text-dark"></i>Formulir Registrasi
    </button>
    <!-- floating end -->

    <!-- whatsapp start -->
    <div id="whatsapp-chat" class="hide">
      <div class="header-chat">
        <div class="head-home">
          <h3>Halo!</h3>
          <p>
            Apabila kamu punya pertanyaan, silahkan chat admin di bawah ini.
          </p>
        </div>
        <div class="get-new hide">
          <div id="get-label"></div>
          <div id="get-nama"></div>
        </div>
      </div>
      <div class="home-chat">
        @foreach(\App\Models\CustomerService::where('status', '=', '1')->get() as $cs)
          <!-- Info Contact Start -->
          <a class="informasi" href="javascript:void" title="Chat Whatsapp">
            <div class="info-avatar">
              {{-- <img src="{{ asset('storage/'.$cs->photo) }}" /> --}}
              <img loading="lazy" src="{{ asset('storage/' .$cs->image) }}"
                alt="{{ $cs->name }}">
            </div>
            <div class="info-chat">
              <span class="chat-label">Admin</span>
              <span class="chat-nama">{{ $cs->name }}</span>
            </div>
            <span class="my-number">{{ $cs->phone }}</span>
          </a>
          <!-- Info Contact End -->
        @endforeach
        <!-- <div class='blanter-msg'>Call us to <b>+62123456789</b> from <i>0:00hs a 24:00hs</i></div> -->
      </div>
      <div class="start-chat hide">
        <div class="first-msg">
          <span>Halo! Ada yang bisa kami bantu ?</span>
        </div>
        <div class="blanter-msg">
          <textarea
            id="chat-input"
            placeholder="Tulis pertanyaanmu disini"
            maxlength="120"
            row="1"
          ></textarea>
          <a href="javascript:void;" id="send-it">Kirim</a>
        </div>
      </div>
      <div id="get-number"></div>
      <a class="close-chat" href="javascript:void">×</a>
    </div>
    <a
      class="blantershow-chat d-none d-sm-block"
      href="javascript:void"
      title="Show Chat"
    >
      <i class="fab fa-whatsapp me-2"></i>Chat Dengan Admin
    </a>
    <a
      class="blantershow-chat d-block d-sm-none"
      href="javascript:void"
      title="Show Chat"
    >
      <i class="fa-brands fa-whatsapp"></i>
    </a>
    <!-- whatsapp end -->

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer="defer" src="https://cdn.jsdelivr.net/npm/jquery-lazy@1.7.11/jquery.lazy.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            jQuery.event.special.touchstart={setup:function(e,t,s){this.addEventListener("touchstart",s,{passive:!t.includes("noPreventDefault")})}},jQuery.event.special.touchmove={setup:function(e,t,s){this.addEventListener("touchmove",s,{passive:!t.includes("noPreventDefault")})}},jQuery.event.special.wheel={setup:function(e,t,s){this.addEventListener("wheel",s,{passive:!0})}},jQuery.event.special.mousewheel={setup:function(e,t,s){this.addEventListener("mousewheel",s,{passive:!0})}};
        });
    </script>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- Owl Carousel -->
    <script defer="defer" src="{{ asset('plugins/owl-carousel/owl.carousel.js?v=)').time() }}"></script>
    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js"></script>
    
    <!-- Custom Script -->
    <script defer="defer" src="{{ asset('js/script.min.js?v=)').time() }}"></script>
    
    @yield('myjsfile')
  </body>
</html>
