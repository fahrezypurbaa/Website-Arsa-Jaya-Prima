@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section" style="max-height: 80vh; height: 35em" data-background="https://www.arsatraining.com/storage/slider-%3Eimages/jWcOyJpW1knBr2Je6IOkglh6PBTA4WqwRtbxDYZg.webp">
    <div class="overlay"></div>
</section>

<section class="course-detail section-padding course-bg">
  <div class="responsive-container">
    <div class="row justify-content-center">
      <div class="col-12">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif (session()->has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <span>Data Anda belum terkirim, harap isi formulir kembali</span>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
      </div>
      @foreach($training as $t)
      <div class="col-lg-6">
        @if($t->requirement != NULL)
        <div class="participant-section box">
          <span class="course-title fs-4 text-capitalize d-flex justify-content-center mb-3">
            Persyaratan Perpanjangan {{$t->kategori->name}}
          </span>
          <div class="participant-content">
            {!! $t->requirement !!}
          </div>
        </div>
        @endif
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- /page title -->

<!-- Form Start -->
<section class="registration section-padding">
  <div class="responsive-container">
    <div class="form-applicant box">
      <div class="tab-pane fade active show" id="form" role="tabpanel" aria-labelledby="form-tab">
        <div class="form">
          <div class="row d-flex justify-content-center mb-md-5">
            <div class="col-4 col-md-3 mb-3 mb-md-0">
              <div class="title text-center">
                <img loading="lazy" src="{{ asset('img/logoArsa.webp') }}" class="p-md-3" alt="Arsa Training & Consultant" width="396" height="396" style="width:100%; height:auto" />
              </div>
            </div>
            <div class="col-12 col-md-8 d-flex align-items-center">
              <div class="title">
                <h1 class="text-capitalize mb-2 fs-1">
                  Formulir Registrasi Perpanjangan SIO/SKP/Lisensi
                </h1>
                <h4 class="fw-bold mb-4">Arsa Consultant</h4>
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
            <form method="post" action="/pendaftaran-sertifikasi-lainnya" enctype="multipart/form-data" id="registerForm">
              @csrf
              @method('post')
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="name w-100 mb-2 mb-md-0">
                  <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name') }}" />
                  @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="email w-100 mb-2 mb-md-0">
                  <label for="email" class="form-label">Alamat Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') }}" />
                  @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="phone w-100">
                  <label for="phone" class="form-label">Nomor Telepon (Whatsapp) <span class="text-danger">*</span></label>
                  <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required value="{{ old('phone') }}" />
                  @error('phone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="company w-100">
                  <label for="company" class="form-label">Asal Perusahaan</label>
                  <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" value="{{ old('company') }}" />
                  @error('company')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mb-2">
                <label for="company_address" class="form-label">Alamat Perusahaan</label>
                <textarea class="form-control h-auto @error('company_address') is-invalid @enderror" id="company_address" name="company_address" rows="5">{{ old('company_address') }}</textarea>
                @error('company_address')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="program" class="form-label">Program Perpanjangan SIO/SKP/Lisensi yang dipilih <span class="text-danger">*</span></label>
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
<script>
    document.getElementById("registerForm").addEventListener("submit", function(e) {
        const phoneInput = document.getElementById("phone").value;
        const regex = /^(?:\+62|62|0)[2-9][0-9]{7,10}$/;
        const feedback = document.querySelector('.invalid-feedback');
        if (!regex.test(phoneInput)) {
            e.preventDefault();
            document.getElementById("phone").classList.add("is-invalid");
            feedback.textContent = "Nomor HP tidak valid. Gunakan format 08xxx atau +62xxx.";
        } else {
            document.getElementById("phone").classList.remove("is-invalid");
            feedback.textContent = "";
        }
    });
</script>

@endsection