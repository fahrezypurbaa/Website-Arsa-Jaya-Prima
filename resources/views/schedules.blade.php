@extends('layouts.main')
@section('container')


@foreach($kemnaker as $kemnaker)
@endforeach
@foreach($bnsp as $bnsp)
@endforeach
@foreach($softskills as $softskill)
@endforeach
<section class="page-title-section" data-background="img/banner/banner-jadwal.webp" style="background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="responsive-container position-relative">
    <div class="row">
      <div class="col-md-8 section-padding">
        <h1 class="display-4 fw-bolder text-light text-uppercase">Jadwal Terdekat</h1>
        <p class="mb-4 text-light">
          Segera bergabung dengan sesi pelatihan mendatang dan tingkatkan pemahaman mengenai K3 maupun Softskill yang dapat berguna bagi Anda serta lingkungan kerja.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- Schedule Start -->
<section class="schedule-section section-padding bg-light">
  <div class="responsive-container">
    <div class="section-content">
      <div class="row">
        @if($schedules->count())
        <div class="slick-wrapper">
          <div id="slick-schedule">
            @foreach($schedules as $schedule)
            <div class="slide-item mb-3">
              <div class="card p-3">
                <div class="row" style="height: 100% !important">
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
                  <div class="col-12 col-md-4 mb-2 mt-2 nama_sertif">
                    <h5>Nama Sertifikasi</h5>
                    <span style="color:#073c87; font-weight:900">
                      <span>{{$schedule->training->name}}</span>
                    </span>
                  </div>
                  <div class="col-12 deadline-mobile">
                    <div class="deadline rounded" style="color: #898121; font-weight:900">
                      Pendaftaran ditutup pada {{$close_register}}
                    </div>
                  </div>
                  <div class="col-12 col-md-3 mb-2 mt-2 jenis-sertifikasi">
                    <h5>Jenis Sertifikasi</h5>
                    @if($schedule->training->training_categories_id === 1)
                    <span>Kemnaker RI</span>
                    @elseif($schedule->training->training_categories_id === 2)
                    <span>BNSP</span>
                    @elseif($schedule->training->training_categories_id === 3)
                    <span>Softskill</span>
                    @else
                    <span>Lainya</span>
                    @endif
                  </div>
                  <div class="col-12 col-md-3 mb-2 mt-2 schedule-date">
                    <h5>Tanggal</h5>
                    @if($start_month=== $end_month)
                    {{ $start_date}} - {{ $end }}
                    @else
                    {{ $dateNY}} - {{ $end }}
                    @endif
                  </div>
                  <div class="col-12 col-md-2 mb-2 mt-2 schedule-day">
                    <h5>Hari</h5>
                    {{ $start_day }} - {{ $end_day }}
                  </div>
                  <hr style="width:95%; margin:auto">
                  <div class="d-flex mr-2 mt-2 schedule-flex">
                    <div class="deadline deadline-desktop rounded" style="color: #898121; font-weight:900">
                      Pendaftaran ditutup pada {{$close_register}}
                    </div>
                    @if($schedule->training->training_categories_id === 1)
                    <button class="btn btn-primary rounded schedule-register" data-bs-toggle="modal" data-bs-target="#register-modal-kemnaker" training-id="{{$schedule->training->id}}" training-name-id="{{$schedule->training->name}}" onclick="showModalFormulirKemnaker(this)">
                      Daftar Sekarang
                    </button>
                    @elseif($schedule->training->training_categories_id === 2)
                    <button class="btn btn-primary rounded schedule-register" data-bs-toggle="modal" data-bs-target="#register-modal-bnsp" training-id="{{$schedule->training->id}}" training-name-id="{{$schedule->training->name}}" onclick="showModalFormulirBnsp(this)">
                      Daftar Sekarang
                    </button>
                    @elseif($schedule->training->training_categories_id === 3)
                    <button class="btn btn-primary rounded schedule-register" data-bs-toggle="modal" data-bs-target="#register-modal-softskill" training-id="{{$schedule->training->id}}" training-name-id="{{$schedule->training->name}}" onclick="showModalFormulirSoftskill(this)">
                      Daftar Sekarang
                    </button>
                    @else
                    <span>Lainya</span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>

      </div>
      <div class="text-center mt-5 schedule-download">
        <a href="/jadwal/download" class="btn btn-primary rounded text-center"><i class="fa-solid fa-download"></i> &nbsp; Unduh Jadwal Training 2026</a>
      </div>
      @else
      <div class="col-12 text-center">
        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
        <p class="mb-4 text-center">Mohon maaf jadwal pelatihan dan pembinaan belum tersedia</p>
      </div>
      @endif
    </div>
  </div>
</section>

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
                  type="number"
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
            <div class="mb-3">
              <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="pribadi" value="pribadi" checked>
                    <label for="pribadi" class="form-check-label">Pribadi</label>
                  </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-8">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="utusan_perusahaan" kategori-id="kemnaker" value="utusan_perusahaan">
                    <label for="utusan_perusahaan" class="form-check-label">Utusan Perusahaan</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 utusan_perusahaan">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <span class="text-danger">*</span></label>
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
            <div class="mb-3 utusan_perusahaan">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <span class="text-danger">*</span></label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Sumber Informasi
                <span class="text-danger">*</span></label>
              <select class="form-select" name="sumber_informasi" aria-label="select program training">
                <option value="">Pilih Opsi</option>
                <option value="Iklan">Iklan</option>
                <option value="Instagram">Instagram</option>
                <option value="Facebook">Facebook</option>
                <option value="Linkedin">Linkedin</option>
                <option value="TikTok">TikTok</option>
                <option value="Website">Website</option>
                <option value="Google">Google</option>
                <option value="Keluarga/Teman/Kerabat">Keluarga/Teman/Kerabat</option>
              </select>
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
                  type="number"
                  class="form-control @error('phone') is-invalid @enderror"
                  id="phone"
                  name="phone"
                  required
                  value="{{ old('phone') }}" />
                @error('phone')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="pribadi_bnsp" value="pribadi" checked>
                    <label for="pribadi" class="form-check-label">Pribadi</label>
                  </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-8">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="utusan_perusahaan_bnsp" value="utusan_perusahaan">
                    <label for="utusan_perusahaan_bnsp" class="form-check-label">Utusan Perusahaan</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 utusan_perusahaan_bnsp">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <span class="text-danger">*</span></label>
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
            <div class="mb-3 utusan_perusahaan_bnsp">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <span class="text-danger">*</span></label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Sumber Informasi
                <span class="text-danger">*</span></label>
              <select class="form-select" name="sumber_informasi" aria-label="select program training">
                <option value="">Pilih Opsi</option>
                <option value="Iklan">Iklan</option>
                <option value="Instagram">Instagram</option>
                <option value="Facebook">Facebook</option>
                <option value="Linkedin">Linkedin</option>
                <option value="TikTok">TikTok</option>
                <option value="Website">Website</option>
                <option value="Google">Google</option>
                <option value="Keluarga/Teman/Kerabat">Keluarga/Teman/Kerabat</option>
              </select>
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
              <div class="invalid-feedback">
                {{ $message }}
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
                  type="number"
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
            <div class="mb-3">
              <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="pribadi_softskill" value="pribadi" checked>
                    <label for="pribadi" class="form-check-label">Pribadi</label>
                  </div>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-8">
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="kategori_peserta" id="utusan_perusahaan_softskill" value="utusan_perusahaan">
                    <label for="utusan_perusahaan_softskill" class="form-check-label">Utusan Perusahaan</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 utusan_perusahaan_softskill">
              <div class="company w-100">
                <label for="company" class="form-label">Asal Perusahaan</label>
                <span class="text-danger">*</span></label>
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
            <div class="mb-3 utusan_perusahaan_softskill">
              <label for="company_address" class="form-label">Alamat Perusahaan</label>
              <span class="text-danger">*</span></label>
              <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">@error('message')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror</textarea>
            </div>
            <div class="mb-3">
              <label for="program" class="form-label">Sumber Informasi
                <span class="text-danger">*</span></label>
              <select class="form-select" name="sumber_informasi" aria-label="select program training">
                <option value="">Pilih Opsi</option>
                <option value="Iklan">Iklan</option>
                <option value="Instagram">Instagram</option>
                <option value="Facebook">Facebook</option>
                <option value="Linkedin">Linkedin</option>
                <option value="TikTok">TikTok</option>
                <option value="Website">Website</option>
                <option value="Google">Google</option>
                <option value="Keluarga/Teman/Kerabat">Keluarga/Teman/Kerabat</option>
              </select>
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
<!-- register modal softski8ll end -->

@section('myjsfile')
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    console.log($.cookie('pop'));
    if (!$.cookie('pop')) {
      $('#adsModal').modal('show');
      $.cookie('pop', '1');
    }
  });
</script>
<script>
  function slugKemnaker() {
    const name = document.querySelector('#nameKemnaker');
    const slugKemnaker = document.querySelector('#slugKemnaker');
    name.addEventListener('change', function() {
      fetch('/pelatihan/{{ $kemnaker->slug }}/checkKemnakerSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slugKemnaker.value = data.slugKemnaker)
    });
    document.getElementById('utusan_perusahaan').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan').forEach(element => {
          element.style.display = "block";
        });
        document.getElementById("company").required = true;
        document.getElementById("company_address").required = true;
      }
    });
    document.getElementById('pribadi').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan').forEach(element => {
          element.style.display = "none";
        });
        document.getElementById("company").required = false;
        document.getElementById("company_address").required = false
      }
    });
  }
  slugKemnaker();

  function slugBnsp() {
    const name = document.querySelector('#nameBnsp');
    const slugBnsp = document.querySelector('#slugBnsp');
    name.addEventListener('change', function() {
      fetch('/pelatihan/{{ $bnsp->slug }}/checkBnspSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => slugBnsp.value = data.slugBnsp)
    });
    document.getElementById('utusan_perusahaan_bnsp').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan_bnsp').forEach(element => {
          element.style.display = "block";
        });
        document.getElementById("company").required = true;
        document.getElementById("company_address").required = true;
      }
    });
    document.getElementById('pribadi_bnsp').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan_bnsp').forEach(element => {
          element.style.display = "none";
        });
        document.getElementById("company").required = false;
        document.getElementById("company_address").required = false
      }
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
    document.getElementById('utusan_perusahaan_softskill').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan_softskill').forEach(element => {
          element.style.display = "block";
        });
        document.getElementById("company").required = true;
        document.getElementById("company_address").required = true;
      }
    });
    document.getElementById('pribadi_softskill').addEventListener('change', function() {
      if (this.checked) {
        document.querySelectorAll('.utusan_perusahaan_softskill').forEach(element => {
          element.style.display = "none";
        });
        document.getElementById("company").required = false;
        document.getElementById("company_address").required = false
      }
    });
  }
  slugSoftskill();
</script>
@endsection
@endsection