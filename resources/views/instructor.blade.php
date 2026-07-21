@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section" data-background="img/banner/banner-instructor.webp" style=" background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="responsive-container position-relative">
    <div class="row">
      <div class="col-md-8 section-padding">
        <h1 class="display-4 fw-bolder text-light">Instruktur</h1>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- Instructor Start -->
<section id="instructor" class="instructor-section section-padding pb-0 pb-md-auto">
  <div class="responsive-containerr">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-title text-center">
          <h3 class="text-capitalize">Instruktur Pelatihan & Pembinaan</h3>
          <p class="text-center">
            Daftar berbagai Instruktur Berlisensi & Profesional dari PT Arsa Jaya Prima
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 text-center">
        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
        <p class="mb-4 text-center">Mohon maaf instruktur belum tersedia</p>
      </div>
    </div>
  </div>
</section>
<!-- Instructor End -->
@endsection