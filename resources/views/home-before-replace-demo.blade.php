@extends('layouts.main')
@section('container')
<!-- Banner start -->
<div class="banner-slider owl-carousel owl-theme mb-0" id="#bannerCarousel">
    @foreach ($banner as $banner) 
      <div class="banner-carousel-item">
        <img src="{{ asset('./storage/'.$banner->image) }}" width="2000" height="666" style="width:100%; height:auto" alt="{{ $banner->title }}">
      </div>
    @endforeach    
</div>
<!-- Banner end -->

<!-- reason start -->
<section class="reason-section section-padding">
  <div class="container">
    @foreach($about as $about)
    <div class="row justify-content-center">
      <div class="col-lg-4">
        <div class="section-title border-bottom border-5">
          <h1 class="text-capitalize text-primary fw-bold">"One Stop Solution Training Provider" <br/> PT. Arsa Jaya Prima</h1>
        </div>
        <figure class="img-play-video">
          @if(!empty($about->link))
          <a id="play-video" class="video-play-button" data-bs-toggle="modal" data-bs-target="#video-modal" data-fancybox="">
            <span></span>
          </a>
          @endif
          <img src="{{ asset('storage/'. $about->image) }}" loading=”eager” decoding="async" fetchpriority="high" width="720" height="405" style="width:100%; height:auto" alt="PT. Arsa Jaya Prima" class="img-fluid rounded">
        </figure>
      </div>
      <div class="col-lg-8 card-group">
        <div class="reason-box rounded bg-light card border-0">
          <div class="card-body">
            <h2 class="card-title fs-5 fw-bold text-uppercase">Tentang Kami</h2>
            <p>Arsa Training adalah penyedia pelatihan dan sertifikasi K3 yang berlisensi resmi dari Kementrian Tenaga Kerja RI (KEMNAKER RI) dan Badan Nasional Sertifikasi Profesi (BNSP).</p>
            <h3 class="card-title fs-5 fw-bold">Visi</h3>
            {!! $about->vission !!}
          </div>
        </div>
        <div class="reason-box rounded bg-light card border-0">
          <div class="card-body">
            <h3 class="card-title fs-5 fw-bold">Misi</h3>
            {!! $about->mission !!}
          </div>
        </div>
      </div>
    </div>
    <!-- about modal start -->
    <div
      class="modal fade video-modal js-course-preview-modal"
      id="video-modal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
      >
        <div class="modal-dialog modal-lg modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body p-0">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              >
                <i class="fa-solid fa-circle-xmark"></i>
              </button>
              <div class="ratio ratio-16x9">
                <iframe
                  id="player-1"
                  src="{{ $about->link }}"
                  title="Arsa Training & Consulting"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- about modal end -->
    @endforeach
  </div>
</section>
<!-- reason end -->

<!-- course start -->
<section class="course-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="section-title text-center">
            <h3 class="text-capitalize">Program Pelatihan & Pembinaan</h3>
            <p class="text-center">
              Dengan berbagai pilihan program K3 dan Softskill, kami menawarkan beragam pilihan pelatihan untuk memenuhi kebutuhan berbagai industri
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <ul
          class="nav nav-tabs border-0 d-flex justify-content-center align-items-center mb-4"
          id="courseTab"
          role="tablist"
        >
          <div class="course-tab-category">
            <div class="container-course-btn hidden-sm text-center m-auto">
              <div
                class="nav-link active mb-1"
                id="course-one-tab"
                data-bs-toggle="tab"
                data-bs-target="#course-one-tab-pane"
                type="button"
                role="tab"
                aria-controls="course-one-tab-pane"
                aria-selected="true"
              >
                <span>Sertifikasi Kemnaker RI</span>
              </div>
              <div
                class="nav-link mb-1"
                id="course-two-tab"
                data-bs-toggle="tab"
                data-bs-target="#course-two-tab-pane"
                type="button"
                role="tab"
                aria-controls="course-two-tab-pane"
                aria-selected="false"
              >
                <span>Sertifikasi BNSP</span>
              </div>
              <div
                class="nav-link mb-1"
                id="course-three-tab"
                data-bs-toggle="tab"
                data-bs-target="#course-three-tab-pane"
                type="button"
                role="tab"
                aria-controls="course-three-tab-pane"
                aria-selected="false"
              >
                <span>Training Softskill</span>
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
            tabindex="0"
          >
            <div class="row bg-light section-padding rounded">
              <div class="col-md-4 ms-md-3">
                <h4 class="course-title text-capitalize">
                  Sertifikasi Kemnaker RI
                </h4>
                <p class="course-count">
                  <i class="fa-solid fa-table-list me-1"></i> {{ $kemnaker->count() }} Pelatihan
                </p>
                <hr />
                <p class="course-desc">
                  Kami menawarkan beragam program sertifikasi K3 resmi dari Kementerian Ketenagakerjaan RI, memberikan Anda landasan yang diakui secara nasional untuk keselamatan di tempat kerja. Dari Basic hingga Advanced, program-program kami mencakup berbagai industri dan risiko. Bergabunglah untuk mendapatkan keahlian yang diakui dan tingkatkan karir Anda dengan percaya diri dalam menjaga keselamatan tempat kerja.
                </p>
                <a href="/sertifikasi-kemnaker-ri" class="program-direct text-primary fw-bold">
                  Sertifikasi KEMNAKER RI Lainnya
                  <i class="fa-solid fa-circle-right ms-2"></i>
                </a>
              </div>
              <div class="col-md-7 mt-4 mt-md-0">
                <div class="row justify-content-center">
                  <div class="course-carousel owl-carousel owl-theme">
                    @foreach($kemnaker as $kemnaker)
                    <div class="course-box course-carousel-item">
                      <img src="{{ asset('storage/' . $kemnaker->thumbnail) }}" width="2782" height="1956" style="width:100%; height:auto" alt="{{ $kemnaker->name }}" />
                      <div class="card-body">
                        <a href="/pelatihan/{!! $kemnaker->slug !!}">
                          <span
                            class="card-title text-capitalize fw-bold mb-2 mt-2"
                          >
                            {{ $kemnaker->name }}
                          </span>
                        </a>
                        <p>
                          {!! Str::limit($kemnaker->excerpt, '150')  !!}
                        </p>
                        <a href="/pelatihan/{!! $kemnaker->slug !!}" class="btn btn-primary btn-sm"
                          >Selengkapnya</a
                        >
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="course-two-tab-pane"
            role="tabpanel"
            aria-labelledby="course-two-tab"
            tabindex="0"
          >
            <div class="row bg-light section-padding">
              <div class="col-md-4 ms-md-3">
                <h4 class="course-title text-capitalize">
                  Sertifikasi BNSP
                </h4>
                <p class="course-count">
                  <i class="fa-solid fa-table-list me-1"></i> {{ $bnsp->count() }} Pelatihan
                </p>
                <hr />
                <p class="course-desc">
                  Dapatkan pengakuan BNSP melalui program sertifikasi K3 kami. Didesain sesuai standar nasional, program-program kami memberikan kredibilitas tak tertandingi dalam memastikan lingkungan kerja yang aman. Pilih dari rangkaian luas program, tingkatkan kompetensi K3 Anda, dan buktikan kemampuan Anda dengan sertifikasi yang diakui industri.
                </p>
                <a href="/sertifikasi-bnsp" class="program-direct text-primary fw-bold">
                  Sertifikasi BNSP Lainnya
                  <i class="fa-solid fa-circle-right ms-2"></i>
                </a>
              </div>
              <div class="col-md-7 mt-4 mt-md-0">
                <div class="row justify-content-center">
                  <div class="course-carousel owl-carousel owl-theme">
                    @foreach($bnsp as $bnsp)
                    <div class="course-box course-carousel-item">
                      <img src="{{ asset('storage/' . $bnsp->thumbnail) }}" width="2782" height="1956" style="width:100%; height:auto" alt="{{ $bnsp->name }}" />
                      <div class="card-body">
                        <a href="/pelatihan/{!! $bnsp->slug !!}">
                          <span
                            class="card-title text-capitalize fw-bold mb-2 mt-2"
                          >
                            {{ $bnsp->name }}
                          </span>
                        </a>
                        <p>
                          {!! Str::limit($bnsp->excerpt, '150')  !!}
                        </p>
                        <a href="/pelatihan/{!! $bnsp->slug !!}" class="btn btn-primary btn-sm"
                          >Selengkapnya</a
                        >
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div
            class="tab-pane fade"
            id="course-three-tab-pane"
            role="tabpanel"
            aria-labelledby="course-three-tab"
            tabindex="0"
          >
            <div class="row bg-light section-padding">
              <div class="col-md-4 ms-md-3">
                <h4 class="course-title text-capitalize">
                  Training Softskill
                </h4>
                <p class="course-count">
                  <i class="fa-solid fa-table-list me-1"></i> {{ $softskills->count() }} Pelatihan
                </p>
                <hr />
                <p class="course-desc">
                  Selain keahlian teknis, kami juga menawarkan beragam program pelatihan soft skill yang membekali Anda dengan komunikasi yang efektif, kepemimpinan tangguh, dan kerja tim yang solid. Dalam dunia yang terus berubah, keterampilan ini penting untuk sukses lintas industri. Tingkatkan aspek personal dan profesional Anda bersama kami.
                </p>
                <a href="/training-softskill" class="program-direct text-primary fw-bold">
                  Training Softskill Lainnya
                  <i class="fa-solid fa-circle-right ms-2"></i>
                </a>
              </div>
              <div class="col-md-7 mt-4 mt-md-0">
                <div class="row justify-content-center">
                  <div class="course-carousel owl-carousel owl-theme">
                    @foreach($softskills as $softskill)
                    <div class="course-box course-carousel-item">
                      @if(!empty($softskill->thumbnail))
                      <img src="{{ asset('storage/' . $softskill->thumbnail) }}" width="2782" height="1956" style="width:100%; height:auto" alt="{{ $softskill->name }}" />
                      @endif
                      <div class="card-body">
                        <a href="/pelatihan/{!! $softskill->slug !!}">
                          <span
                            class="card-title text-capitalize fw-bold mb-2 mt-2"
                          >
                            {{ $softskill->name }}
                          </span>
                        </a>
                        <p>
                          {!! Str::limit($softskill->excerpt, '150')  !!}
                        </p>
                        <a href="/pelatihan/{!! $softskill->slug !!}" class="btn btn-primary btn-sm"
                          >Selengkapnya</a
                        >
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- course end -->

<!-- schedule start -->
<section class="schedule-section section-padding">
    <div class="container">
      <div class="row bg-light section-padding rounded">
        <div class="col-md-4 ms-md-3 mb-4">
          <div class="section-title">
            <h3 class="schedule-item-title text-capitalize mt-2">
              Jadwal Training Terdekat
            </h3>
          </div>
          <p class="schedule-item-desc">
            Jangan lewatkan kesempatan pelatihan terdekat kami. Segera bergabung dengan sesi pelatihan mendatang dan tingkatkan pemahaman Anda tentang K3 maupun Softskill yang dapat berguna bagi Anda serta lingkungan kerja.
          </p>
          <a
            href="/jadwal"
            class="schedule-direct text-primary fw-bold"
          >
            Lihat Jadwal Lainnya
            <i class="fa-solid fa-circle-right ms-2"></i>
          </a>
        </div>
        <div class="col-md-7">
          <div class="row justify-content-center">
            <div class="schedule-carousel owl-carousel owl-theme mb-0" id="#scheduleCarousel">
              @foreach ($schedules as $schedule) 
                <div class="schedule-box box schedule-item">
                    <a href="/storage/{{ $schedule->image }}" target="_blank" rel="noopener">
                      <img src="{{ asset('storage/'. $schedule->image) }}" width="942" height="1328" style="width:100%; height:auto" alt="{{ $schedule->name }}" />
                    </a>
                 </div>
              @endforeach    
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- schedule end -->

<!-- facilities start -->
<div class="facility-slider owl-carousel owl-theme mb-0" id="#facilityCarousel">
  @foreach ($facilities as $facility) 
    <div class="facility-carousel-item" >
      <img src="{{ asset('./storage/'.$facility->image) }}" width="2000" height="666" style="width:100%; height:auto" alt="{{ $facility->name }}" />
    </div>
  @endforeach   
</div>
<!-- facilities end -->

<!-- testimony start -->
<section class="testimony-section section-padding">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="section-title">
            <h3 class="text-capitalize">Testimoni</h3>
          </div>
        </div>
      </div>
      <div class="testimony-carousel owl-carousel owl-theme mb-0" id="#tertimonyCarousel">
      @foreach($reviews as $review)
        <div class="card me-2 ms-2 bg-body">
          <div class="row g-0 d-flex no-wrap">
            <div class="col-md-8 order-1 order-md-0">
              <div class="card-body p-3">
                <i class="fa fa-quote-left"></i>
                <p class="card-testimony fw-bold">
                  {!! $review->review !!}
                </p>
                <p class="card-job">
                  <small class="text-muted name">{{ $review->name }}</small>
                  <br />
                  @if($review->company != NULL)
                  <small class="text-muted job-position"
                    >{{ $review->company }}
                  </small>
                  <br />
                  @endif
                  <small class="text-muted course"
                    >{{ $review->training }}</small
                  >
                </p>
              </div>
            </div>
            <div class="col-md-4 order-0 order-md-1">
              <img src="{{ asset('storage/'. $review->image) }}" width="400" height="400" style="width: 100%; height: auto;" alt="{{ $review->name }}" />
            </div>
          </div>
        </div>
        @endforeach  
       </div>
    </div>
</section>
<!-- testimony end -->


@if($ads != NULL)
<!-- ads start -->
<div class="modal " id="adsModal" aria-label="Promo Arsa Training & Consulting">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-transparent border-0">
      <div class="modal-body">
        <img src="{{ asset('./storage/'.$ads->image) }}" width="100%" height="100%" alt="{{ $ads->name }}">
      </div>
      <div class="modal-footer m-auto border-0 p-0">
        <a href="{{ $ads->link }}" class="btn btn-tertiary schedule" data-dismiss="modal" aria-hidden="true">{{ $ads->button }}</a>
      </div>
    </div>
  </div>
</div>
<!-- ads end -->
@endif
@endsection

@section('myjsfile')
<script>
    $(document).ready(function() {
        console.log($.cookie('pop'));
        if (!$.cookie('pop')) {
            $('#adsModal').modal('show');
            $.cookie('pop', '1');
        }
    })
</script>
@endsection
