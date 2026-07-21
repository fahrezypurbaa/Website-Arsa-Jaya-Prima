@extends('layouts.main')
@section('container')

<!-- section banner start -->
<!-- Modal -->
<div class="popup-overlay" id="popup-overlay"></div>
<div class="popup">
  <button id="close">&times;</button>
  <img src="{{asset('storage/'. $popup->file)}}" alt="cek" height="100" width="100%" loading="lazy" /> <br />
  <a href="#" class="btn btn-primary mt-2">Daftar Sekarang</a>
</div>

<section class="banner-video">
  <div class="overlay d-flex align-items-center justify-content-center">
    <div class="responsive-container ">
      <div class="show-hero hero-lg section-padding text-light">
        <div class="col-12 text-center">
          <h1 class="text-white fw-bold">Sertifikasi K3, Upgrade Skill, <br />
            Artikel K3, Berita K3, Info Loker</h1>
          <h1 class="color-secondary fw-bold">Satu Solusi Buat Kamu!</h1>
          <div class="card p-1 company-value text-center mt-5">
            <div class="row">
              <div class="col-4">
                <h2 class="text-primary fw-bold">240+</h2>
                <span class="fw-bold text-small">Judul Training & Sertifikasi</span>
              </div>
              <div class="col-4">
                <h2 class="text-primary fw-bold">100+</h2>
                <span class="fw-bold text-small">Klien Perusahaan Besar dan ternama</span>
              </div>
              <div class="col-4" style="border: none !important">
                <h2 class="text-primary fw-bold">500+</h2>
                <span class="fw-bold text-small">Alumni Sukses Seluruh Indonesia</span>
              </div>
            </div>
          </div>
          <div class="mt-3  d-flex align-items-center justify-content-center">
            <a class="btn btn-outline fw-bold" href="#course">Explore Arsa K3 Onederland</a>
            <a class="btn btn-outline bg-primary fw-bold" href="#schedule">Jadwal Terdekat</a>
          </div>
        </div>
      </div>
      <div class="row text-center hide-hero text-light mx-1 text-light mt-5 d-flex align-items-center justify-content-center">
        <!-- <div class="text-center hide-hero text-light mx-1 hd d-flex justify-content-center align-items-center"> -->
        <div>
          <h1 class="text-white fw-bold">Sertifikasi K3, Upgrade Skill, Artikel K3, Berita K3, Info Loker</h1>
          <h1 class="color-secondary fw-bold">Satu Solusi Buat Kamu!</h1>
          <a class="btn btn-outline fw-bold mt-3" href="#course">Explore Arsa K3 Onederland</a>
          <a class="btn btn-outline bg-primary fw-bold mt-3" href="#schedule">Jadwal Terdekat</a>
        </div>
        <div class="card p-2 company-value text-center mt-5">
          <div class="row">
            <div class="col-4">
              <h2 class="text-primary fw-bold">240+</h2>
              <span class="fw-bold text-small">Judul Training & Sertifikasi</span>
            </div>
            <div class="col-4">
              <h2 class="text-primary fw-bold">100+</h2>
              <span class="fw-bold text-small">Klien Perusahaan Besar dan ternama</span>
            </div>
            <div class="col-4" style="border: none !important">
              <h2 class="text-primary fw-bold">500+</h2>
              <span class="fw-bold text-small">Alumni Sukses Seluruh Indonesia</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <video autoplay muted loop id="myVideo" style="object-fit: cover;" preload="none" poster="{{asset('img/video-placeholder.webp')}}">
    <source src="{{asset('img/footage-arsa.mp4')}}" type="video/mp4">
  </video> -->
  <video autoplay muted loop id="myVideo" style="object-fit: cover;" preload="auto" poster="{{asset('img/video-placeholder.webp')}}">
    <source src="{{asset('img/footage-arsa.mp4')}}" type="video/mp4">
  </video>

</section>
<!-- section banner end -->

<!-- section company profile start -->
<section class="company-profile section-padding">
  <div class="responsive-container">
    <div class="row my-5">
      <div class="col-12 col-lg-6 col-md-8 col-sm-12">
        <h1 class="text-primary fw-bold">Arsa Learning Center</h1>
        <p class="me-2">Dengan brand Arsa Training, merupakan perusahaan jasa bidang K3 yang menyediakan pelatihan, konsultan dan sertifikasi Sertifikat Kemnaker RI.
          Arsa Training juga merupakan perusahaan yang sudah ditunjuk oleh beberapa Lembaga Sertifikasi Profesi sebagai Tempat Uji Kompetensi assesment BNSP.
        </p>
        <p>Beberapa kemampuan bisnis kami mampu memberikan solusi untuk pengembangan seluruh sistem manajemen dalam perusahaan client dengan menghadirkan instruktur-instruktur berpengalaman yang sesuai dengan kompetensinya.
          Arsa Training juga mampu melaksanakan perpanjangan SIO Operator dan ahli bidang K3 serta membantu melaksanakan riksa uji untuk peralatan-peralatan produksi pada perusahaan
        </p>
        <div class="row cp-value text-center">
          <div class="col-6 col-lg-3 col-md-3 col-sm-6 mt-2">
            <img src="{{asset('img/Icon/co@75.png')}}" alt="a" width="75" height="75" loading="lazy" /> <br>
            Customer Oriented
          </div>
          <div class="col-6 col-lg-3 col-md-3 col-sm-6 mt-2">
            <img src="{{asset('img/Icon/honest@75.png')}}" alt="a" width="75" height="75" loading="lazy" /> <br>
            Jujur (Honest)
          </div>
          <div class="col-6 col-lg-3 col-md-3 col-sm-6 mt-2">
            <img src="{{asset('img/Icon/loyal@75.png')}}" alt="a" width="75" height="75" loading="lazy" /> <br>
            Setia (Loyal)
          </div>
          <div class="col-6 col-lg-3 col-md-3 col-sm-6 mt-2" style="border-right: 0px !important;">
            <img src="{{asset('img/Icon/inovatif@75.png')}}" alt="a" width="75" height="75" loading="lazy" /> <br>
            Inovatif
          </div>
        </div>
        <div class="text-center mt-5 btn-download">
          <a href="/company-profile/download" class="btn btn-primary rounded text-center"><i class="fa-solid fa-download"></i> &nbsp; Unduh Company Profie</a>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-md-4 col-sm-12">
        <div class="card mx-5">
          <div class="d-none d-md-block">
            <embed src="https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/files/Company-Profile.pdf&amp;embedded=true" type="application/pdf" width="100%" height="500">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end of company-profile -->

<!-- schedule start -->
<section class="schedule-section section-padding bg-light" id="schedule">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="text-primary fw-semibold">
        INFO
      </h1>
      <h2 class="bg-text">JADWAL PELATIHAN TERDEKAT</h2>
    </div>
    <!-- desktop -->
    <div class="section-content show-hero">
      <div class="card p-3">
        <div class="row">
          <table class="table table-bordered m-3 m-auto " style="width: 98%;">
            <tr>
              <th class="bg-secondary text-center">Jenis Kelas</th>
              <th colspan="5" class="text-center bg-primary text-white">Pilihan Judul Program 2025</th>
            </tr>
            <tr>
              <td class="text-center bg-primary text-white pt-3" style="width:12%;">Sertifikasi Kemnaker RI</td>
              @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 1)->take(5) as $schedule)
              @php
              $dateString = $schedule->start_date;
              $endDateString = $schedule->end_date;
              $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
              $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
              $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
              $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
              $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
              $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
              $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
              $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
              $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
              $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
              @endphp
              <td>
                <div class="text-center mx-2">
                  <span style="color:#073c87; font-weight:900">
                    {{$schedule->training->name}}
                  </span>
                  <br>
                  <span> @if($start_month=== $end_month)
                    {{ $start_date}} - {{ $end }}
                    @else
                    {{ $dateNY}} - {{ $end }}
                    @endif</span>
                  <span>Offline Training</span>
                </div>
              </td>
              @endforeach
            </tr>
          </table>
        </div>
        <div class="text-center mt-3">Pendaftaran dan Persyaratan Calon Peserta Wajib Lengkap H-7 Sebelum Hari Pelaksanaan</div>
      </div>

      <div class="card p-3 mt-3">
        <div class="row">
          <table class="table table-bordered m-3 m-auto " style="width: 98%;">
            <tr>
              <th class="bg-secondary text-center">Jenis Kelas</th>
              <th colspan="5" class="text-center bg-primary text-white">Pilihan Judul Program 2025</th>
            </tr>
            <tr>
              <td class="text-center bg-primary text-white pt-5 " style="width:12%;">Sertifikasi BNSP</td>
              @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 2)->take(5) as $schedule)
              @php
              $dateString = $schedule->start_date;
              $endDateString = $schedule->end_date;
              $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
              $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
              $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
              $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
              $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
              $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
              $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
              $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
              $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
              $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
              @endphp
              <td>
                <div class="text-center mx-2">
                  <span style="color:#073c87; font-weight:900">
                    {{$schedule->training->name}}
                  </span>
                  <br>
                  <span> @if($start_month=== $end_month)
                    {{ $start_date}} - {{ $end }}
                    @else
                    {{ $dateNY}} - {{ $end }}
                    @endif</span>
                  <span>Offline Training</span>
                </div>
              </td>
              @endforeach
            </tr>
          </table>
        </div>
        <div class="text-center mt-3">Lihat Jadwal Selengkapnya</div>
      </div>

      <div class="card p-3 mt-3">
        <div class="row">
          <table class="table table-bordered m-3 m-auto" style="width: 98%;">
            <tr>
              <th class="bg-secondary text-center">Jenis Kelas</th>
              <th colspan="5" class="text-center bg-primary text-white">Pilihan Judul Program 2025</th>
            </tr>
            <tr>
              <td class="text-center bg-primary text-white pt-4" style="width:12%;">Upskill Training by Arsa</td>
              @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 3)->take(5) as $schedule)
              @php
              $dateString = $schedule->start_date;
              $endDateString = $schedule->end_date;
              $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
              $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
              $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
              $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
              $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
              $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
              $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
              $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
              $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
              $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
              @endphp
              <td>
                <div class="text-center mx-2">
                  <span style="color:#073c87; font-weight:900">
                    {{$schedule->training->name}}
                  </span>
                  <br>
                  <span> @if($start_month=== $end_month)
                    {{ $start_date}} - {{ $end }}
                    @else
                    {{ $dateNY}} - {{ $end }}
                    @endif</span>
                  <span>Offline Training</span>
                </div>
              </td>
              @endforeach
            </tr>
          </table>
        </div>
        <div class="text-center mt-3">Lihat Jadwal Selengkapnya</div>
      </div>
    </div>
    <!-- mobile -->
    <div class="section-content hide-hero ">
      <div class="card p-3">
        <div class="row p-2 text-center">
          <span>SERTIFIKASI KEMNAKER RI</span> <br />
          <span class="bg-blue py-2">Jadwal Kelas Almost Running</span>
          <table class="table table-bordered m-3 m-auto">
            <tr>
              <th class="bg-secondary">Judul Program</th>
              <th colspan="5" class="bg-primary text-white">Rincian Pelaksanaan</th>
            </tr>
            @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 1)->take(5) as $schedule)
            @php
            $dateString = $schedule->start_date;
            $endDateString = $schedule->end_date;
            $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
            $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
            $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
            $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
            $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
            $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
            $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
            $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
            $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
            $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
            @endphp
            <tr>
              <td>
                {{$schedule->training->name}}
              </td>
              <td>
                @if($start_month=== $end_month)
                {{ $start_date}} - {{ $end }}
                @else
                {{ $dateNY}} - {{ $end }}
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="card p-3 my-2">
        <div class="row p-2 text-center">
          <span>SERTIFIKASI BNSP</span> <br>
          <span class="bg-blue py-2">Jadwal Kelas Almost Running</span>
          <table class="table table-bordered m-3 m-auto">
            <tr>
              <th class="bg-secondary">Judul Program</th>
              <th colspan="5" class="bg-primary text-white">Rincian Pelaksanaan</th>
            </tr>
            @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 2)->take(5) as $schedule)
            @php
            $dateString = $schedule->start_date;
            $endDateString = $schedule->end_date;
            $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
            $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
            $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
            $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
            $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
            $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
            $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
            $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
            $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
            $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
            @endphp
            <tr>
              <td>
                {{$schedule->training->name}}
              </td>
              <td>
                @if($start_month=== $end_month)
                {{ $start_date}} - {{ $end }}
                @else
                {{ $dateNY}} - {{ $end }}
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="card p-3 my-2">
        <div class="row p-2 text-center">
          <span>UPSKILL TRAINING BY ARSA</span> <br />
          <span class="bg-blue py-2">Jadwal Kelas Almost Running</span>
          <table class="table table-bordered m-3 m-auto">
            <tr>
              <th class="bg-secondary">Judul Program</th>
              <th class="bg-primary text-white">Rincian Pelaksanaan</th>
            </tr>
            @foreach($schedules->filter(fn($schedule) => $schedule->training->training_categories_id === 3)->take(5) as $schedule)
            @php
            $dateString = $schedule->start_date;
            $endDateString = $schedule->end_date;
            $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
            $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
            $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
            $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
            $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
            $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
            $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
            $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
            $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
            $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
            @endphp
            <tr>
              <td>
                {{$schedule->training->name}}
              </td>
              <td>
                @if($start_month=== $end_month)
                {{ $start_date}} - {{ $end }}
                @else
                {{ $dateNY}} - {{ $end }}
                @endif
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="text-center download-click mt-3 btn-download">
    <a href="/jadwal/download" class="btn btn-primary rounded"><i class="fa-solid fa-download"></i> &nbsp; Unduh Jadwal Training 2024</a>
  </div>
  </div>
</section>
<!-- schedule end -->

<!-- start training -->
<section class="course-section section-padding bg-primary" id="course">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="fw-semibold text-light">
        LAYANAN
      </h1>
      <h2 class="text-light">PILIHAN PROGRAM PELATIHAN </h2>
    </div>
    <div class="row justify-content-center">
      <ul
        class="nav nav-tabs border-0 d-flex justify-content-center align-items-center mb-2"
        id="courseTab"
        role="tablist">
        <div class="course-tab-category">
          <div class="container-course-btn hidden-sm text-center m-auto">
            <div
              class="nav-link active mb-1"
              style="border-radius: 10px 0 0 10px !important"
              id="course-one-tab"
              data-bs-toggle="tab"
              data-bs-target="#course-one-tab-pane"
              type="button"
              role="tab"
              aria-controls="course-one-tab-pane"
              aria-selected="true">
              <span>Kemnaker RI</span>
            </div>
            <div
              class="nav-link mb-1"
              id="course-two-tab"
              data-bs-toggle="tab"
              data-bs-target="#course-two-tab-pane"
              type="button"
              role="tab"
              aria-controls="course-two-tab-pane"
              aria-selected="false">
              <span>BNSP</span>
            </div>
            <div
              class="nav-link mb-1"
              style="border-radius: 0px 10px 10px 0px !important"
              id="course-three-tab"
              data-bs-toggle="tab"
              data-bs-target="#course-three-tab-pane"
              type="button"
              role="tab"
              aria-controls="course-three-tab-pane"
              aria-selected="false">
              <span>Softskill</span>
            </div>
          </div>
        </div>
      </ul>
      <div class="tab-content" id="courseTabContent">
        <div
          class="tab-pane fade show active"
          id="course-one-tab-pane"
          role="tabpanel"
          aria-labelledby="course-one-tab"
          tabindex="0">
          <div class="row bg-light rounded">
            <div class="col-md-12 mt-2 mt-md-0 m-auto">
              <div class="row justify-content-center">
                <div class="course-carousel owl-carousel owl-theme">
                  @foreach($kemnaker as $kemnaker)
                  @if($kemnaker->home_view == 1)
                  <div class="course-box course-carousel-item">
                    <img src="{{ asset('storage/' . $kemnaker->thumbnail_mobile) }}"
                      srcset="{{ asset('storage/' . $kemnaker->thumbnail_mobile) }} 900w,   {{ asset('storage/' . $kemnaker->thumbnail) }} 2000w"
                      loading="lazy" class="mb-2" alt="{{ $kemnaker->name }}" />
                    <div class="card-body">
                      <ol class="tags d-flex">
                        {!! $kemnaker->platform !!}
                      </ol>
                      <a href="/pelatihan/{!! $kemnaker->slug !!}">
                        <span
                          class="card-title text-capitalize fw-bold mb-2 mt-2">
                          {{ $kemnaker->name }}
                        </span>
                      </a>
                      <ul class="requirements-list">
                        {!! $kemnaker->deskripsi_persyaratan !!}
                      </ul>
                      <div class="detail-btn text-center mt-2 rounded">
                        <a href="/pelatihan/{!! $kemnaker->slug !!}" class="text-center detail-click">
                          Lihat Detail Kelas
                        </a>
                      </div>
                      <button class="register-btn text-center mt-2 rounded text-center register-click" data-bs-toggle="modal" data-bs-target="#register-modal-kemnaker" training-id="{{$kemnaker->id}}" training-name-id="{{$kemnaker->name}}" onclick="showModalFormulirKemnaker(this)">
                        Daftar Sekarang
                      </button>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="detail-btn text-center mt-3 rounded">
                <a href="/sertifikasi-kemnaker-ri" class="text-center detail-click">
                  Lihat Semua Kelas Kemnaker
                </a>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="course-two-tab-pane"
          role="tabpanel"
          aria-labelledby="course-two-tab"
          tabindex="0">
          <div class="row bg-light rounded">
            <div class="col-md-12 mt-2 mt-md-0 m-auto">
              <div class="row justify-content-center">
                <div class="course-carousel owl-carousel owl-theme">
                  @foreach($bnsp as $bnsp)
                  @if($bnsp->home_view == '1')
                  <div class="course-box course-carousel-item">
                    <img src="{{ asset('storage/' . $bnsp->thumbnail_mobile) }}"
                      srcset="{{ asset('storage/' . $bnsp->thumbnail_mobile) }} 900w,   {{ asset('storage/' . $bnsp->thumbnail) }} 2000w"
                      loading="lazy" class="mb-2" alt="{{ $bnsp->name }}" />
                    <div class="card-body">
                      <ol class="tags d-flex">
                        {!! $bnsp->platform !!}
                      </ol>
                      <a href="/pelatihan/{!! $bnsp->slug !!}">
                        <span
                          class="card-title text-capitalize fw-bold mb-2 mt-2">
                          {{ $bnsp->name }}
                        </span>
                      </a>
                      <ul class="requirements-list">
                        {!! $bnsp->deskripsi_persyaratan !!}
                      </ul>
                      <div class="detail-btn text-center mt-2 rounded">
                        <a href="/pelatihan/{!! $bnsp->slug !!}" class="text-center detail-click">
                          Lihat Detail Kelas
                        </a>
                      </div>
                      <button class="register-btn text-center mt-2 rounded text-center register-click" data-bs-toggle="modal" data-bs-target="#register-modal-bnsp" training-id="{{$bnsp->id}}" training-name-id="{{$bnsp->name}}" onclick="showModalFormulirBnsp(this)">
                        Daftar Sekarang
                      </button>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="detail-btn text-center mt-3 rounded">
                <a href="/sertifikasi-bnsp" class="text-center detail-click">
                  Lihat Semua Kelas BNSP
                </a>
              </div>
            </div>
          </div>
        </div>
        <div
          class="tab-pane fade"
          id="course-three-tab-pane"
          role="tabpanel"
          aria-labelledby="course-three-tab"
          tabindex="0">
          <div class="row bg-light rounded">
            <div class="col-md-12 mt-2 mt-md-0 m-auto">
              <div class="row justify-content-center">
                <div class="course-carousel owl-carousel owl-theme">
                  @foreach($softskills as $softskill)
                  @if($softskill->home_view == 1)
                  <div class="course-box course-carousel-item">
                    <img src="{{ asset('storage/' . $softskill->thumbnail_mobile) }}"
                      srcset="{{ asset('storage/' . $softskill->thumbnail_mobile) }} 900w,   {{ asset('storage/' . $softskill->thumbnail) }} 2000w"
                      loading="lazy" class="mb-2" alt="{{ $softskill->name }}" />
                    <div class="card-body">
                      <ol class="tags d-flex">
                        {!! $softskill->platform !!}
                      </ol>
                      <a href="/pelatihan/{!! $softskill->slug !!}">
                        <span
                          class="card-title text-capitalize fw-bold mb-2 mt-2">
                          {{ $softskill->name }}
                        </span>
                      </a>
                      <ul class="requirements-list">
                        {!! $softskill->deskripsi_persyaratan !!}
                      </ul>
                      <div class="detail-btn text-center mt-2 rounded">
                        <a href="/pelatihan/{!! $softskill->slug !!}" class="text-center detail-click">
                          Lihat Detail Kelas
                        </a>
                      </div>
                      <button class="register-btn text-center mt-2 rounded text-center register-click" data-bs-toggle="modal" data-bs-target="#register-modal-softskill" training-id="{{$softskill->id}}" training-name-id="{{$softskill->name}}" onclick="showModalFormulirSoftskill(this)">
                        Daftar Sekarang
                      </button>
                    </div>
                  </div>
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="detail-btn text-center mt-3 rounded">
                <a href="/training-softskill" class="text-center detail-click">
                  Lihat Semua Kelas Softskill
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- course end -->

<!-- Ongoing training -->
<section class="ongoing-section section-padding" style="min-height:500px">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="text-primary fw-semibold">
        FIX RUNNING
      </h1>
      <h2 class="bg-text">KELAS-KELAS YANG SUDAH BERJALAN</h2>
    </div>
    <div class="row">
      @foreach($ongoing as $ongoing)
      @php
      $dateString = $ongoing->start_date;
      $endDateString = $ongoing->end_date;
      $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
      $dateNY = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM');
      $end = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D MMMM YYYY');
      $start_day = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('dddd');
      $end_day = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('dddd');
      $start_month = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('MMMM');
      $end_month = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('MMMM');
      $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
      $end_date = \Carbon\Carbon::parse($endDateString)->locale('id')->isoFormat('D');
      $close_register= \Carbon\Carbon::parse($dateString)->subDays(7)->locale('id')->isoFormat('D MMMM YYYY');
      @endphp
      <div class="col-6 col-md-3 col-sm-6 col-lg-3 mt-4">
        <div class="card rounded bg-white">
          <img
            srcset="{{ asset('storage/' . $ongoing->image) }} 480w,
                {{ asset('storage/' . $ongoing->image) }} 800w"
            loading="lazy" alt="{{ $ongoing->name }}" width="50" height="50" style="width:100%; height:auto" />
          <div class="card-body">
            <a href="/pelatihan/{!! $ongoing->training->slug !!}">
              <span
                class="text-capitalize fw-bold mb-2">
                {{ $ongoing->name }}
              </span>
            </a>
            <ul class="requirements-list">
              <li><i class="fa-solid fa-lightbulb"> </i> {!! $ongoing->platform !!}</li>
              <li><i class="fa-solid fa-calendar-days"></i>
                @if($start_month === $end_month)
                {{ $start_date}} - {{ $end }}
                @else
                {{ $dateNY}} - {{ $end }}
                @endif
              </li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center download-click mt-5 btn-download">
      <a href="/galeri" class="btn btn-primary rounded text-center">Lihat galeri lainya</a>
    </div>
  </div>
  </div>
</section>
<!-- end ongoing training -->


<!-- testimony start -->
<section class="testimony-section section-padding bg-light">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="text-primary fw-semibold">
        TESTIMONI
      </h1>
      <h2 class="bg-text">APA YANG MEREKA KATAKAN TENTANG KAMI?</h2>
    </div>
    <div class="section-content">
      <div class="row">
        @foreach($reviews as $review)
        <div class="col-12 col-md-4 col-lg-4 section-testimoni">
          <div class="bg-white rounded m-2 p-4 card">
            <div class="avatar">
              <img src="{{ asset('storage/'. $review->image) }}" alt="{{ $review->name }}" loading="lazy" width="50\" height="50" /> <br>
            </div>
            <div class="testimoni-identity mt-4">
              <span>{{ $review->name }}</span>
              <p class="text-muted" style="font-size: 11px;">{{ $review->training }}</p>
            </div>
            <div class="testimoni-content">
              {{$review->review}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- testimony end -->

<!-- facilities start -->
@foreach ($facilities as $facility)
<img src="{{ asset('storage/' . $facility->image_mobile) }} 750w" srcset="{{ asset('storage/' . $facility->image_mobile) }} 850w, {{ asset('storage/' . $facility->image) }}  , {{ asset('storage/' . $facility->image) }} 2500w" width="100" height="100"
  loading="lazy" class="facility-section" style="width:100%; min-height:50vh" alt="{{ $facility->title }}">
@endforeach
<!-- facilities end -->

<!-- service start -->
<section class="reason-section section-padding bg-light">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="text-primary fw-semibold">
        KEUNGGULAN
      </h1>
      <h2>MENGAPA HARUS MENGIKUTI PELATIHAN DI ARSA?</h2>
    </div>
    <div class="section-content">
      <div class="row">
        @foreach($layanans as $layanan)
        <div class="col-12 col-sm-12 col-md-6 col-lg-4">
          <div class="card mx-2 my-3 reason-card text-center py-2 px-4">
            <img src="{{asset('storage/'.$layanan->icon)}}" loading="lazy" alt="{{$layanan->title}}" width="75px" height="75px" class="m-auto">
            <span style="font-weight: 700; font-size:20px; text-transform: uppercase" class="service-title mt-3">{!!$layanan->title!!}</span> <br>
            <span class="service-deskripsi">{!! $layanan->description !!}</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- end of service -->

<!-- client start-->
<section class="our-client section-padding">
  <div class="responsive-container">
    <div class="section-title my-3 text-center">
      <h1 class="text-primary fw-semibold">
        Vendor Training Terpercaya
      </h1>
      <h2>PULUHAN PERUSAHAAN DAN INSTANSI BESAR</h2>
    </div>
    <div id="clients">
      @foreach($clients as $client)
      <img src="{{ asset('storage/' . $client->image) }}" loading="lazy" width="128" height="128" style="width:80px !important; height:50px !important; margin:20px !important" alt="{{$client->name}}">
      @endforeach
    </div>
  </div>
</section>
<!-- end of client -->

<!-- register modal kemnaker start -->
<div
  class="modal fade"
  id="register-modal-kemnaker"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5 text-center text-capitalize" id="exampleModalLabel" style="letter-spacing:0px">
          Formulir Registrasi
        </h3>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body">
        <div class="form-registration w-100">
          <form action="/pelatihan/{{ $kemnaker->slug }}" method="POST">
            @csrf
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="name w-100 mb-2 mb-md-0">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="nameKemnaker"
                  name="name"
                  required=""
                  value="{{ old('name') }}" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3" hidden>
                <input
                  type="text"
                  class="form-control @error('slugKemnaker') is-invalid @enderror"
                  id="slugKemnaker"
                  name="slugKemnaker"
                  required
                  value="{{ old('slugKemnaker') }}" />
                @error('slugKemnaker')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="email w-100 mb-2 mb-md-0">
                <label for="email" class="form-label">
                  Alamat Email <span class="text-danger">*</span></label>
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  required
                  value="{{ old('email') }}" />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="phone w-100">
                <label for="phone" class="form-label">Nomor Telepon (Whatsapp)
                  <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('phone') is-invalid @enderror"
                  id="phone"
                  name="phone"
                  required
                  value="{{ old('phone') }}" />
                @error('phone')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <input
                  type="text"
                  class="form-control @error('company') is-invalid @enderror"
                  id="company"
                  name="company"
                  value="{{ old('company') }}" />
                @error('company')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Program Sertifikasi Kemnaker RI yang dipilih
                <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_kemnaker_name"
                name="training_id"
                readonly />
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_kemnaker_id"
                name="training_id"
                hidden />
              @error('training_id')
              <div class="invalid-feedback">{
                { $message }}
              </div>
              @enderror
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-primary py-3 px-5">
                <i class="ri-save-3-line me-1"></i>Daftar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- register modal kemnaker end -->

<!-- register modal bnsp start -->
<div
  class="modal fade"
  id="register-modal-bnsp"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5 text-center text-capitalize" id="exampleModalLabel" style="letter-spacing:0px">
          Formulir Registrasi BNSP
        </h3>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body">
        <div class="form-registration w-100">
          <form action="/pelatihan/{{ $bnsp->slug }}" method="POST">
            @csrf
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="name w-100 mb-2 mb-md-0">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="nameBnsp"
                  name="name"
                  required=""
                  value="{{ old('name') }}" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3" hidden>
                <input
                  type="text"
                  class="form-control @error('slugBnsp') is-invalid @enderror"
                  id="slugBnsp"
                  name="slugBnsp"
                  required
                  value="{{ old('slugBnsp') }}" />
                @error('slugBnsp')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="email w-100 mb-2 mb-md-0">
                <label for="email" class="form-label">
                  Alamat Email <span class="text-danger">*</span></label>
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  required
                  value="{{ old('email') }}" />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="phone w-100">
                <label for="phone" class="form-label">Nomor Telepon (Whatsapp)
                  <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('phone') is-invalid @enderror"
                  id="phone"
                  name="phone"
                  required
                  value="{{ old('phone') }}" />
                @error('phone')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <input
                  type="text"
                  class="form-control @error('company') is-invalid @enderror"
                  id="company"
                  name="company"
                  value="{{ old('company') }}" />
                @error('company')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Program Sertifikasi BNSP yang dipilih
                <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_bnsp_name"
                name="training_id"
                readonly />
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_bnsp_id"
                name="training_id"
                hidden />
              @error('training_id')
              <div class="invalid-feedback">{
                { $message }}
              </div>
              @enderror
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-primary py-3 px-5">
                <i class="ri-save-3-line me-1"></i>Daftar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- register modal bnsp end -->

<!-- register modal softskill start -->
<div
  class="modal fade"
  id="register-modal-softskill"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title fs-5 text-center text-capitalize" id="exampleModalLabel" style="letter-spacing:0px">
          Formulir Registrasi
        </h3>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
      </div>
      <div class="modal-body">
        <div class="form-registration w-100">
          <form action="/pelatihan/{{ $softskill->slug }}" method="POST">
            @csrf
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="name w-100 mb-2 mb-md-0">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="nameSoftskill"
                  name="name"
                  required=""
                  value="{{ old('name') }}" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3" hidden>
                <input
                  type="text"
                  class="form-control @error('slugSoftskill') is-invalid @enderror"
                  id="slugSoftskill"
                  name="slugSoftskill"
                  required
                  value="{{ old('slugSoftskill') }}" />
                @error('slugSoftskill')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="email w-100 mb-2 mb-md-0">
                <label for="email" class="form-label">
                  Alamat Email <span class="text-danger">*</span></label>
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  required
                  value="{{ old('email') }}" />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="phone w-100">
                <label for="phone" class="form-label">Nomor Telepon (Whatsapp)
                  <span class="text-danger">*</span></label>
                <input
                  type="text"
                  class="form-control @error('phone') is-invalid @enderror"
                  id="phone"
                  name="phone"
                  required
                  value="{{ old('phone') }}" />
                @error('phone')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="d-md-flex pt-2 pb-2 mb-2">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <input
                  type="text"
                  class="form-control @error('company') is-invalid @enderror"
                  id="company"
                  name="company"
                  value="{{ old('company') }}" />
                @error('company')
                <div class="invalid-feedback">{
                  { $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-2">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Program Sertifikasi Softskill yang dipilih
                <span class="text-danger">*</span></label>
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_softskill_name"
                name="training_id"
                readonly />
              <input
                type="text"
                class="form-control @error('training_id') is-invalid @enderror"
                id="training_softskill_id"
                name="training_id"
                hidden />
              @error('training_id')
              <div class="invalid-feedback">{
                { $message }}
              </div>
              @enderror
            </div>
            <div class="d-flex">
              <button type="submit" class="btn btn-primary py-3 px-5">
                <i class="ri-save-3-line me-1"></i>Daftar
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- register modal softskill end -->
@section('myjsfile')
<script>
  document.querySelector("#close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
    document.getElementById('popup-overlay').classList.remove('overlayed-popup');
  });
  document.addEventListener("DOMContentLoaded", function() {
    if (document.cookie.indexOf("visited=true") === -1) {
      // Menentukan waktu kedaluwarsa cookie (1 hari dari sekarang)
      var year = 1000 * 60 * 60 * 24 * 1;
      var expires = new Date((new Date()).valueOf() + year);

      // Menetapkan cookie "visited=true" dengan waktu kedaluwarsa
      document.cookie = "visited=true;expires=" + expires.toUTCString() + ";path=/";

      // Menampilkan elemen popup
      document.querySelector(".popup").style.display = "block";
      document.getElementById('popup-overlay').classList.add('overlayed-popup');
    }
  });


  function slugKemnaker() {
    const name = document.querySelector('#nameKemnaker');
    const slugKemnaker = document.querySelector('#slugKemnaker');

    name.addEventListener('change', function() {
      fetch('/pelatihan/{{ $kemnaker->slug }}/checkKemnakerSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slugKemnaker.value = data.slugKemnaker)
    });
  }
  slugKemnaker();

  function slugBnsp() {
    const name = document.querySelector('#nameBnsp');
    const slugBnsp = document.querySelector('#slugBnsp');;

    name.addEventListener('change', function() {
      fetch('/pelatihan/{{ $bnsp->slug }}/checkBnspSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slugBnsp.value = data.slugBnsp)
    });
  }
  slugBnsp();

  function slugSoftskill() {
    const name = document.querySelector('#nameSoftskill');
    const slugSoftskill = document.querySelector('#slugSoftskill');

    name.addEventListener('change', function() {
      fetch('/pelatihan/{{ $softskill->slug }}/checkSoftskillSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slugSoftskill.value = data.slugSoftskill)
    });
  }
  slugSoftskill();
</script>
@endsection
@endsection