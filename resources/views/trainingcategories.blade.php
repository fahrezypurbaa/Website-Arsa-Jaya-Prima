@extends('layouts.main')
@section('container')

<!-- Page Title Section -->
@php
$currentUrl = url()->current();
$isKemnaker = strpos($currentUrl, 'sertifikasi-kemnaker-ri') !== false;
$isBNSP = strpos($currentUrl, 'sertifikasi-bnsp') !== false;
$backgroundImage = $kategori_terpilih->img_kategori;
@endphp

<section
  class="page-title-section"
  data-background="url('{{ asset('storage/' . $backgroundImage) }}')"
  style="
    background-image: url('{{ asset('storage/' . $backgroundImage) }}');
    background-position: 50% 50%;
    background-repeat: no-repeat;
    background-size: cover;"
  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="responsive-container position-relative">
    <div class="row">
      <div class="col-md-8">
        @if ($isKemnaker)
        <h1 class="display-4 fw-bolder text-light">Sertifikasi Kemnaker RI</h1>
        @if($kategori_terpilih->nama_kategori != "Semua")
        <h2 class="display-7 fw-bolder text-light">
          {{ $kategori_terpilih->nama_kategori }}
        </h2>
        @endif
        @elseif($isBNSP)
        <h1 class="display-4 fw-bolder text-light">Sertifikasi BNSP</h1>
        @if($kategori_terpilih->nama_kategori != "Semua")
        <h2 class="display-7 fw-bolder text-light">
          {{ $kategori_terpilih->nama_kategori }}
        </h2>
        @endif
        @else
        <h1 class="display-4 fw-bolder text-light">Upskill Training By Arsa</h1>
        @if($kategori_terpilih->nama_kategori != "Semua")
        <h2 class="display-7 fw-bolder text-light">
          {{ $kategori_terpilih->nama_kategori }}
        </h2>
        @endif
        @endif
      </div>
    </div>
  </div>
</section>
<!-- /Page Title Section -->

<!-- Course Section Start -->
<section id="courses" class="section-padding">
  <div class="responsive-container courses-list-desktop">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-lg-3 col-md-4">
        <form action="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri' : ($isBNSP ? '/sertifikasi-bnsp' : '/training-softskill') }}" class="custom-form mb-3 w-100" role="search" style="position:sticky; top:40px; font-size: 16px;">
          <div class="courses-search d-flex align-items-center justify-content-between">
            <input name="search" value="{{ request('search') }}" type="search" class="form-control border-bottom" id="search" placeholder="Cari Program ..." required aria-label="Search" style="border: 0;">
            <button class="courses-search-icon d-flex align-items-center justify-content-center" style="background-color: transparent; border: none">
              <i class="fa-solid fa-magnifying-glass border-0"></i>
            </button>
          </div>
        </form>
        <div class="card p-3" style="position:sticky; top:100px">
          <h5 class="fw-bold">Kategori</h5>
          <ul>
            @foreach($kategori as $category_desktop)
            @if($category_desktop->nama_kategori != "Semua")
            <li style="margin: 15px 0;">
              <a href="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri/' : ($isBNSP ? '/sertifikasi-bnsp/' : '/training-softskill/') }}{{ $category_desktop->nama_kategori }}"
                class="{{ Request::is($isKemnaker ? 'sertifikasi-kemnaker-ri/'.$category_desktop->nama_kategori: ($isBNSP ? 'sertifikasi-bnsp/'.$category_desktop->nama_kategori : 'training-softskill/'.$category_desktop->nama_kategori)) ? 'active-link' : '' }}"
                style="width:100%;">
                {{ $category_desktop->nama_kategori }}
              </a>
            </li>
            @endif
            @endforeach
            <li style="margin: 15px 0;">
              <a href="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri' : ($isBNSP ? '/sertifikasi-bnsp' : '/training-softskill') }}"
                class="{{ Request::is($isKemnaker ? 'sertifikasi-kemnaker-ri' : ($isBNSP ? 'sertifikasi-bnsp' : 'training-softskill')) ? 'active-link' : '' }}"
                style="width:100%;">
                Semua Kategori
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Main Content -->
      @if($training_result)
      @if($training_result->count())
      <div class="col-lg-9 col-md-8">
        <div class="courses-list">
          @foreach ($training_result as $training_search)
          <div class="courses-section card">
            <div class="course-item h-100">
              @if(!empty($training_search->thumbnail_mobile))
              <div>
                <img loading="lazy" src="{{ asset('storage/' .$training_search->thumbnail_mobile) }}" style="width:100%; height:auto" alt="{{ $training_search->name }}" />
              </div>
              @endif
              <div class="card-body p-2">
                <ol class="tags d-flex">
                  {!! $training_search->platform !!}
                </ol>
                <a href="/pelatihan/{{ $training_search->slug }}">
                  <span class="card-title text-capitalize fw-bold mb-2 mt-2 single-line" title="{{ $training_search->name }}">
                    {{ $training_search->name }}
                  </span>
                </a>
                <ul class="requirements-list deskripsi-persyaratan">
                  {!! $training_search->deskripsi_persyaratan !!}
                </ul>
                <div class="detail-btn text-center mt-2 rounded">
                  <a href="/pelatihan/{{ $training_search->slug }}" class="text-center detail-click" style="font-size: 14px !important">
                    Lihat Detail Kelas
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @else
      <div class="col-lg-9 col-md-8 mt-4 text-center">
        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
        <p class="mb-4 text-center">
          Mohon maaf program pelatihan dan pembinaan di kategori
          <span>
            @if($isKemnaker)
            Sertifikasi Kemnaker
            @elseif($isBNSP)
            Sertifikasi BNSP
            @else
            Upskill Training By Arsa
            @endif
          </span>
          belum tersedia
        </p>
      </div>
      @endif
      @elseif($trainings->count())
      <div class="col-lg-9 col-md-8">
        <div class="courses-list">
          @foreach ($trainings as $training)
          <div class="courses-section card">
            <div class="course-item h-100">
              @if(!empty($training->thumbnail_mobile))
              <div>
                <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail_mobile) }}" style="width:100%; height:auto" alt="{{ $training->name }}" />
              </div>
              @endif
              <div class="card-body p-2">
                <ol class="tags d-flex">
                  {!! $training->platform !!}
                </ol>
                <a href="/pelatihan/{{ $training->slug }}">
                  <span class="card-title text-capitalize fw-bold mb-2 mt-2 single-line" title="{{ $training->name }}">
                    {{ $training->name }}
                  </span>
                </a>
                <ul class="requirements-list deskripsi-persyaratan">
                  {!! $training->deskripsi_persyaratan !!}
                </ul>
                <div class="detail-btn text-center mt-2 rounded">
                  <a href="/pelatihan/{{ $training->slug }}" class="text-center detail-click" style="font-size: 14px !important">
                    Lihat Detail Kelas
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @else
      <div class="col-lg-9 col-md-8 mt-2 text-center">
        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
        <p class="mb-4 text-center">Mohon maaf program pelatihan dan pembinaan belum tersedia</p>
      </div>
      @endif
    </div>
  </div>

  <div class="responsive-container courses-list-mobile">
    <div class="kategory_mobile text-center mx-2" style="border-radius: 17px">
      <form action="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri' : ($isBNSP ? '/sertifikasi-bnsp' : '/training-softskill') }}" class="custom-form mb-3 w-100" role="search" style="font-size: 16px;">
        <div class="courses-search d-flex align-items-center justify-content-between">
          <input name="search" value="{{ request('search') }}" type="search" class="form-control border-bottom" id="search" placeholder="Cari Program ..." required aria-label="Search" style="border: 0;">
          <button class="courses-search-icon d-flex align-items-center justify-content-center" style="background-color: transparent; border: none">
            <i class="fa-solid fa-magnifying-glass border-0"></i>
          </button>
        </div>
      </form>
      <div class="btn-group row">
        <div class="d-flex justify-content-center align-items-center">
          <div class="btn-title">
            <b>Kategori Program</b>
          </div>
          <div class="btn-desc text-center">
            <span type="button" class="dropdown-toggle single-line" style="height: 40px; line-height: 40px; padding-left:10px" data-bs-toggle="dropdown" aria-expanded="false">
              @if($kategori_terpilih->nama_kategori)
              {{$kategori_terpilih->nama_kategori}}
              @else
              Pilih Kategori
              @endif
            </span>
            <ul class="dropdown-menu" style="width: 200px !important;">
              @foreach($kategori as $category_mobile)
              @if($category_mobile->nama_kategori != 'Semua')
              <li><a class="dropdown-item" href="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri/' : ($isBNSP ? '/sertifikasi-bnsp/' : '/training-softskill/') }}{{ $category_mobile->nama_kategori }}" style="word-wrap: break-word; white-space: normal; border-bottom:1px solid grey">{{ $category_mobile->nama_kategori }}</a></li>
              @endif
              @endforeach
              <li><a class="dropdown-item" href="{{ $isKemnaker ? '/sertifikasi-kemnaker-ri' : ($isBNSP ? '/sertifikasi-bnsp' : '/training-softskill') }}" style="word-wrap: break-word; white-space: normal; border-bottom:1px solid grey">Semua Kategori</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    @if($training_result)
    @if($training_result->count())
    <div class="courses-list">
      @foreach ($training_result as $training_search)
      <div class="courses-section card">
        <div class="course-item h-100">
          @if(!empty($training_search->thumbnail_mobile))
          <div>
            <img loading="lazy" src="{{ asset('storage/' .$training_search->thumbnail_mobile) }}" style="width:100%; height:auto" alt="{{ $training_search->name }}" />
          </div>
          @endif
          <div class="card-body p-2">
            <ol class="tags d-flex">
              {!! $training_search->platform !!}
            </ol>
            <a href="/pelatihan/{{ $training_search->slug }}">
              <span class="card-title text-capitalize fw-bold mb-2 mt-2 single-line" title="{{ $training_search->name }}">
                {{ $training_search->name }}
              </span>
            </a>
            <ul class="requirements-list deskripsi-persyaratan">
              {!! $training_search->deskripsi_persyaratan !!}
            </ul>
            <div class="detail-btn text-center mt-2 rounded">
              <a href="/pelatihan/{{ $training_search->slug }}" class="text-center detail-click" style="font-size: 14px !important">
                Lihat Detail Kelas
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="col-12 text-center">
      <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
      <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
      <p class="mb-4 text-center">
        Mohon maaf program pelatihan dan pembinaan di kategori
        <span>
          @if($isKemnaker)
          Sertifikasi Kemnaker
          @elseif($isBNSP)
          Sertifikasi BNSP
          @else
          Upskill Training By Arsa
          @endif
        </span>
        belum tersedia
      </p>
    </div>
    @endif
    @elseif($trainings->count())
    <div class="courses-list">
      @foreach ($training_mobile as $training)
      <div class="courses-section card">
        <div class="course-item h-100">
          @if(!empty($training->thumbnail_mobile))
          <div>
            <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail_mobile) }}" style="width:100%; height:auto" alt="{{ $training->name }}" />
          </div>
          @endif
          <div class="card-body p-2">
            <ol class="tags d-flex">
              {!! $training->platform !!}
            </ol>
            <a href="/pelatihan/{{ $training->slug }}">
              <span class="card-title text-capitalize fw-bold mb-2 mt-2 single-line" title="{{ $training->name }}">
                {{ $training->name }}
              </span>
            </a>
            <ul class="requirements-list deskripsi-persyaratan">
              {!! $training->deskripsi_persyaratan !!}
            </ul>
            <div class="detail-btn text-center mt-2 rounded">
              <a href="/pelatihan/{{ $training->slug }}" class="text-center detail-click" style="font-size: 14px !important">
                Lihat Detail Kelas
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="col-12 text-center">
      <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
      <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
      <p class="mb-4 text-center">Mohon maaf program pelatihan dan pembinaan belum tersedia</p>
    </div>
    @endif
    <div class="d-flex justify-content-center mt-3 mb-3">
      {{ $training_mobile->onEachSide(5)->links() }}
    </div>

  </div>
</section>
<!-- Course Section End -->

@endsection