@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section section-padding" data-background="img/banner/banner-kemnakerRi.webp" style="background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container position-relative">
    <div class="row">
      <div class="col-md-8">
        <h1 class="display-4 fw-bolder text-light">
          Raih Mimpimu Sekarang Juga
        </h1>
        <p class="mb-4 text-light">
          Daftarkan dirimu pada program Pelatihan dan Sertifikasi yang berlisensi KEMNAKER RI (Kementrian Tenaga Kerja RI). Isi formulir dibawah ini dan kami akan segera menghubungi Anda
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- Form Start -->
<section class="registration section-padding">
  <div class="container">
    <div class="form-applicant box">
      <div
        class="tab-pane fade active show"
        id="form"
        role="tabpanel"
        aria-labelledby="form-tab">
        <div class="form">
          <div class="row d-flex justify-content-center mb-md-5">
            <div class="col-4 col-md-3 mb-3 mb-md-0">
              <div class="title text-center">
                <img loading="lazy"
                  src="{{ asset('img/logoArsa.webp') }}"
                  class="p-md-3"
                  alt="Arsa Training & Consultant"
                  width="396"
                  heigth="396"
                  style="width:100%; height:auto" />
              </div>
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center">
              <div class="title">
                <h3 class="text-capitalize mb-2 ">
                  Formulir Registrasi Inhouse Training
                </h3>
                <h4 class="fw-bold mb-4">Arsa Consultant</h4>
                <p>
                  Silakan lakukan pengisian data pada kolom formulir
                  dibawah ini dengan benar dan lengkap, serta sesuai
                  dengan program pelatihan/pembinaan yang ingin Anda ikuti
                  (<a
                    href="/jadwal"
                    class="text-secondary text-underline">Lihat Kalender Program Pelatihan Tahun {{ date('Y') }} sebagai
                    referensi</a>)
                </p>
              </div>
            </div>
          </div>
          <div class="form-registration w-100">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form method="post" action="/pendaftaran-sertifikasi-inhouse" enctype="multipart/form-data">
              @csrf
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="name w-100 mb-2 mb-md-0">
                  <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                  <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
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
                    class="form-control @error('slugInhouse') is-invalid @enderror"
                    id="slugInhouse"
                    name="slugInhouse"
                    required
                    value="{{ old('slugInhouse') }}" />
                  @error('slugInhouse')
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
                <label for="program" class="form-label">Program Sertifikasi yang dipilih
                  <span class="text-danger">*</span></label>
                <select class="form-select" name="training_id" aria-label="select program training">
                  @foreach ($training as $training)
                  <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
                  @endforeach
                </select>
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
</section>
<!-- Form End -->

@endsection

@section('myjsfile')
<script>
  const name = document.querySelector('#name');
  const slugInhouse = document.querySelector('#slugInhouse');

  name.addEventListener('change', function() {
    fetch('/pendaftaran-sertifikasi-inhouse/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slugInhouse.value = data.slugInhouse)
  });
</script>
@endsection

