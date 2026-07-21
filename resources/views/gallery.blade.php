@extends('layouts.main')
@section('container')
<!-- page title -->
<section class="page-title-section" data-background="img/banner/banner-galleries.webp" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="responsive-container position-relative">
    <div class="row">
      <div class="col-md-8 section-padding">
        <h1 class="display-4 fw-bolder text-light">Galeri Kegiatan</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- Gallery Start -->
<section id="gallery" class="gallery-section section-padding">
  <div class="responsive-container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title text-center">
          <h3 class="text-capitalize fw-semibold">Galeri Pelatihan & Pembinaan</h3>
          <p class="text-center">
            Rangkuman dokumentasi dari berbagai pelatihan yang telah diselenggarakan oleh PT Arsa Jaya Prima
          </p>
        </div>
      </div>
    </div>
    @if($galleries->count())
    <div class="row justify-content-center">
      <div class="slick-wrapper">
        <div id="slick-gallery">
          @foreach ($galleries as $gallery)
          <div class="slide-item p-2">
            <div class="image-container" style="border-radius: 10px; overflow:hidden">
              <img src="{{ asset('/storage/'.$gallery->image) }}"
                alt="{{$gallery->name}}"
                height="100%"
                width="100%" />
              <div class="gallery-overlay">
                <a href="/pelatihan/{!! $gallery->training->slug !!}">
                  <ul>
                    @php
                    $detail = $gallery->name;
                    $detail_length = strlen($detail);
                    @endphp
                    @if($detail_length>=55)
                    <li class="title-long"><i class="fa-solid fa-caret-up"></i> {{$detail}}</li>
                    @else
                    <li class="title-short"><i class="fa-solid fa-caret-up"></i> {{$detail}}</li>
                    @endif
                    @php
                    $dateString = $gallery->start_date;
                    $endDateString = $gallery->end_date;
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
                    <li><i class="fa-solid fa-calendar-days"></i> @if($start_month === $end_month)
                      {{ $start_date}} - {{ $end }}
                      @else
                      {{ $dateNY}} - {{ $end }}
                      @endif
                    </li>
                    <li><i class="fa-solid fa-map-pin"></i> {{$gallery->platform}}</li>
                  </ul>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @else
    <div class="row">
      <div class="col-12 text-center">
        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
        <p class="mb-4 text-center">Mohon maaf galeri belum tersedia</p>
      </div>
    </div>
    @endif
  </div>
</section>
<!-- Gallery End -->
@endsection