@extends('layouts.main')
@section('container')

<!-- course detail start -->
<section class="course-detail section-padding course-bg">
    <div class="container">
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
        <div class="col-lg-7 col-md-9">
          <div class="img box p-0">
            @if ($training->thumbnail)
                <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail) }}" class="img-fluid w-100"
                alt="{{ $training->thumbnail }}">
            @endif
          </div>
          <div
            class="title-group box d-grid bg-white top-0 d-inline d-md-none"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
              {{ $training->name }}
              </h1>
            </div>
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              {!! $training->facility !!}
            </div>
            <hr />
            @if($training->pricelist != NULL)
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span>{{ $training->pricelist }}</span>
            </div>
            @endif
            <button
              type="button"
              class="btn btn-primary w-100"
              data-bs-toggle="modal"
              data-bs-target="#register-modal"
            >
              Daftar Sekarang
            </button>
          </div>
          @if($training->event->count())
          <div class="schedule-section box">
            <h4 class="course-title text-capitalize text-center">
              Jadwal Training Terdekat
            </h4>
            <div class="course-schedules mb-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Skema</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($events as $event)
                  <tr>
                    <td>{{ $event->scheme }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          @endif
          @if($training->description != NULL)
          <div class="description-section box">
            <h4 class="course-title text-capitalize text-center">
              Deskripsi
            </h4>
            <div class="desc-content">
                {!! $training->description !!}
            </div>
          </div>
          @endif
          @if($training->outline != NULL)
          <div class="outline-section box">
            <h4 class="course-title text-capitalize text-center">Materi</h4>
            <div class="outline-content">
              {!! $training->outline !!}
            </div>
          </div>
          @endif

          @if($training->requirement != NULL)
          <div class="participant-section box">
            <h4 class="course-title text-capitalize text-center">
              Persyaratan
            </h4>
            <div class="participant-content">
              {!! $training->requirement !!}
            </div>
          </div>
          @endif
          @if($training->method != NULL)
          <div class="method-section box">
            <h4 class="course-title text-capitalize text-center">Metode</h4>
            <div class="objective-content">
                {!! $training->method !!}
            </div>
          </div>
          @endif
        </div>
        <div class="col-md-5 d-none d-md-inline">
          <div
            class="title-group box d-grid bg-white position-sticky"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
              {{ $training->name }}
              </h1>
            </div>
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              {!! $training->facility !!}
            </div>
            <hr />
            @if($training->pricelist != NULL)
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span>{!! $training->pricelist !!}</span>
            </div>
            @endif
            <button
              type="button"
              class="btn btn-primary w-100"
              data-bs-toggle="modal"
              data-bs-target="#register-modal"
            >
              Daftar Sekarang
            </button>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- course detail end -->

<!-- register modal start -->
<div
  class="modal fade"
  id="register-modal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">
              Formulir Registrasi
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ><i class="fa-solid fa-xmark"></i></button>
        </div>
        <div class="modal-body">
          <div class="form-registration w-100">
            @if($training->training_categories_id == '1')
            <form action="/pelatihan/{{ $training->slug }}" method="POST">
              @csrf
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="name w-100 mb-2 mb-md-0">
                  <label for="name" class="form-label"
                    >Nama <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="nameKemnaker"
                    name="name"
                    required=""
                    value="{{ old('name') }}"
                  />
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
                      value="{{ old('slugKemnaker') }}"
                  />
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
                    Alamat Email <span class="text-danger">*</span></label
                  >
                  <input
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      name="email"
                      required
                      value="{{ old('email') }}"
                  />
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="phone w-100">
                  <label for="phone" class="form-label"
                    >Nomor Telepon (Whatsapp)
                    <span class="text-danger">*</span></label
                  >
                  <input
                      type="text"
                      class="form-control @error('phone') is-invalid @enderror"
                      id="phone"
                      name="phone"
                      required
                      value="{{ old('phone') }}"
                  />
                      @error('phone')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="company w-100">
                  <label for="company" class="form-label"
                    >Asal Perusahaan</label
                  >
                  <input
                      type="text"
                      class="form-control @error('company') is-invalid @enderror"
                      id="company"
                      name="company"
                      value="{{ old('company') }}"
                  />
                      @error('company')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="mb-2">
                <label for="company_address" class="form-label"
                  >Alamat Perusahaan</label
                >
                <textarea type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" style="height: 150px">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
              </div>
              <div class="mb-3">
                <label for="program" class="form-label"
                  >Program Sertifikasi Kemnaker RI yang dipilih
                  <span class="text-danger">*</span></label
                >
                <select class="form-select" name="training_id">
                      <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
                </select>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary py-3 px-5">
                  <i class="ri-save-3-line me-1"></i>Daftar
                </button>
              </div>
            </form>
            @elseif($training->training_categories_id == '2')
            {{-- <span>{{ $training->kategori->name }}</span> --}}
            <form action="/pelatihan/{{ $training->slug }}" method="POST">
              @csrf
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="name w-100 mb-2 mb-md-0">
                  <label for="name" class="form-label"
                    >Nama <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="nameBnsp"
                    name="name"
                    required=""
                    value="{{ old('name') }}"
                  />
                      @error('name')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                </div>
                <div class="mb-3">
                  <input
                      type="text"
                      class="form-control @error('slugBnsp') is-invalid @enderror"
                      id="slugBnsp"
                      name="slugBnsp"
                      required
                      value="{{ old('slugBnsp') }}"
                  />
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
                    Alamat Email <span class="text-danger">*</span></label
                  >
                  <input
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      name="email"
                      required
                      value="{{ old('email') }}"
                  />
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="phone w-100">
                  <label for="phone" class="form-label"
                    >Nomor Telepon (Whatsapp)
                    <span class="text-danger">*</span></label
                  >
                  <input
                      type="text"
                      class="form-control @error('phone') is-invalid @enderror"
                      id="phone"
                      name="phone"
                      required
                      value="{{ old('phone') }}"
                  />
                      @error('phone')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="company w-100">
                  <label for="company" class="form-label"
                    >Asal Perusahaan</label
                  >
                  <input
                      type="text"
                      class="form-control @error('company') is-invalid @enderror"
                      id="company"
                      name="company"
                      value="{{ old('company') }}"
                  />
                      @error('company')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="mb-2">
                <label for="company_address" class="form-label"
                  >Alamat Perusahaan</label
                >
                <textarea type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" style="height: 150px">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
              </div>
              <div class="mb-3">
                <label for="program" class="form-label"
                  >Program Sertifikasi BNSP yang dipilih
                  <span class="text-danger">*</span></label
                >
                <select class="form-select" name="training_id">
                      <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
                </select>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary py-3 px-5">
                  <i class="ri-save-3-line me-1"></i>Daftar
                </button>
              </div>
            </form>
             @else
            <form method="post" action="/pelatihan/{{ $training->slug }}" enctype="multipart/form-data">
              @csrf
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="name w-100 mb-2 mb-md-0">
                  <label for="name" class="form-label"
                    >Nama <span class="text-danger">*</span></label
                  >
                  <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="nameSoftskill"
                    name="name"
                    required=""
                    value="{{ old('name') }}"
                  />
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
                      value="{{ old('slugSoftskill') }}"
                  />
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
                    Alamat Email <span class="text-danger">*</span></label
                  >
                  <input
                      type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      id="email"
                      name="email"
                      required
                      value="{{ old('email') }}"
                  />
                      @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="phone w-100">
                  <label for="phone" class="form-label"
                    >Nomor Telepon (Whatsapp)
                    <span class="text-danger">*</span></label
                  >
                  <input
                      type="text"
                      class="form-control @error('phone') is-invalid @enderror"
                      id="phone"
                      name="phone"
                      required
                      value="{{ old('phone') }}"
                  />
                      @error('phone')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="d-md-flex pt-2 pb-2 mb-2">
                <div class="company w-100">
                  <label for="company" class="form-label"
                    >Asal Perusahaan</label
                  >
                  <input
                      type="text"
                      class="form-control @error('company') is-invalid @enderror"
                      id="company"
                      name="company"
                      value="{{ old('company') }}"
                  />
                      @error('company')
                      <div class="invalid-feedback">{
                          { $message }}
                      </div>
                      @enderror
                </div>
              </div>
              <div class="mb-2">
                <label for="company_address" class="form-label"
                  >Alamat Perusahaan</label
                >
                <textarea type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" value="{{ old('company_address') }}" style="height: 150px">@error('message')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
              @enderror</textarea>
              </div>
              <div class="mb-3">
                <label for="program" class="form-label"
                  >Program Training Softskill yang dipilih
                  <span class="text-danger">*</span></label
                >
                <select class="form-select" name="training_id">
                  <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
                </select>
              </div>
              <div class="d-flex">
                <button type="submit" class="btn btn-primary py-3 px-5">
                  <i class="ri-save-3-line me-1"></i>Daftar
                </button>
              </div>
            </form> 
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
<!-- register modal end -->
@endsection

@section('myjsfile')
    @if($training->training_categories_id == '1')
        <script>
            function slugKemnaker() {
                const name = document.querySelector('#nameKemnaker');
                const slugKemnaker = document.querySelector('#slugKemnaker');
            
                name.addEventListener('change', function() {
                    fetch('/pelatihan/{{ $training->slug }}/checkKemnakerSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugKemnaker.value = data.slugKemnaker)
                });
            }
            slugKemnaker();
        </script>
    @elseif($training->training_categories_id == '2')
        <script>
            function slugBnsp() {
                const name = document.querySelector('#nameBnsp');
                const slugBnsp = document.querySelector('#slugBnsp');
            
                name.addEventListener('change', function() {
                    fetch('/pelatihan/{{ $training->slug }}/checkBnspSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugBnsp.value = data.slugBnsp)
                });
            }
            slugBnsp();
        </script>
    @else
        <script>
            function slugSoftskill() {
                const name = document.querySelector('#nameSoftskill');
                const slugSoftskill = document.querySelector('#slugSoftskill');
            
                name.addEventListener('change', function() {
                    fetch('/pelatihan/{{ $training->slug }}/checkSoftskillSlug?name=' + name.value)
                        .then(response => response.json())
                        .then(data => slugSoftskill.value = data.slugSoftskill)
                });
            }
            slugSoftskill();
        </script>
    @endif
@endsection