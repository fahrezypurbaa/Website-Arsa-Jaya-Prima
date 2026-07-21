<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{-- {!! SEO::generate() !!} --}}

    @yield('seo')

    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/x-icon" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
      integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Slick -->
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"
      integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Animate -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}" />

    <!-- slick -->
    <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
  </head>
  <body>
    <div class="main-wrapper">
        <!-- Topbar start -->
        <div id="top-bar" class="top-bar d-lg-block d-none bg-primary">
          <div class="container">
            <div class="row">
              <div class="top-info col-xl-6 col-lg-4 m-auto">
                <ul class="list-unstyled text-center text-md-start">
                  <li>
                    <span class="fw-bold d-flex align-items-center text-white"
                      ><i class="fa-solid fa-clock pb-1"></i> Senin - Jumat: 08.00
                      - 16.30</span
                    >
                  </li>
                </ul>
              </div>
              <!--/ Top info end -->
              <div class="top-contact col-xl-6 col-lg-8 m-auto">
                <ul class="list-unstyled text-end">
                  <li>
                    <span class="fw-bold d-flex align-items-center text-white"
                      ><i class="fa-solid fa-phone pb-1"></i> 0274 4297535</span
                    >
                  </li>
                  <li>
                    <span class="fw-bold d-flex align-items-center text-white"
                      ><i class="fa-solid fa-envelope pb-1"></i>
                      cs@arsaconsultant.com</span
                    >
                  </li>
                  <li>
                    <a
                      href="https://wa.me/6281333149284"
                      target="_blank"
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
            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">
              Formulir Registrasi Training
            </h1>
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
    <script
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <!-- JavaScript Bundle with Popper -->
    <script 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- Slick -->
    <script defer="defer"
      type="text/javascript"
      src="https:///cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
    ></script>
    <script defer="defer" src="{{ asset('plugins/slick-animation/slick-animation.min.js') }}"></script>
    <script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" ></script>
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.lazy/1.7.9/jquery.lazy.min.js"></script> --}}
    {{-- Custom Script --}}
    <script defer="defer" src="{{ asset('js/script.js?v=)').time() }}"></script>
    {{-- <script type="text/javascript">
      $(function() {
          $('.lazy').lazy()
      });
    </script> --}}
    @yield('myjsfile')
  </body>
</html>
