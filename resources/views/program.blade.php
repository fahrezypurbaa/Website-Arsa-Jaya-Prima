@extends('layouts.main')
@section('container')
    <!-- course detail start -->
    <section class="course-detail section-padding">
        <div class="responsive-container">
            <div class="row">
                <div class="col-12">
                    @if (session()->has('success'))
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
                <div class="col-lg-6 course-detail-img ">
                    @if ($training->thumbnail)
                        <img src="{{ asset('storage/' . $training->thumbnail_mobile) }}"
                            srcset="{{ asset('storage/' . $training->thumbnail_mobile) }} 380w, {{ asset('storage/' . $training->thumbnail) }} 800w"
                            sizes="(max-width: 480px) 380px, 800px" fetchpriority="high" class="mb-2"
                            alt="{{ $training->name }}" style="width:100%; height:auto;" />
                    @endif
                </div>
                <div class="col-lg-6 title-group d-grid top-0">
                    <div class="course-title pt-3">
                        @if ($training->metode != null)
                            @if (Str::contains($training->metode, 'Online'))
                                <h1 class="display-6 inline text-uppercase fw-bold">
                                    <b>Online Training {{ $training->name }}</b>
                                </h1>
                            @elseif (Str::contains($training->metode, 'Blended Training'))
                                <h1 class="display-6 inline text-uppercase fw-bold">
                                    <b>Blended Training {{ $training->name }}</b>
                                </h1>
                            @else
                                <h1 class="display-6 inline text-uppercase fw-bold">
                                    <b>Offline Training {{ $training->name }}</b>
                                </h1>
                            @endif
                        @else
                            <h1 class="display-6 inline text-uppercase fw-bold">
                                <b>{{ $training->name }}</b>
                            </h1>
                        @endif
                        <h5 class="text-uppercase fw-bold">{{ $training->kategori->name }}</h5>
                    </div>
                    <div class="row course-detail-price outline-section">
                        @if ($training->pricelist != 0)
                            <div class="price col-12 col-lg-6 col-sm-12">
                                <span>Harga mulai dari*</span>
                                <h1 class="display-6 fw-bold">
                                    {{ 'Rp ' . number_format($training->pricelist, 0, ',', '.') }},-
                                </h1>
                                <span>*Dapatkan paket terbaik untuk Anda</span>
                            </div>
                            @if ($training->metode != null)
                                <div class="mt-3 col-12 col-lg-6 col-sm-12" style="line-height: 2">
                                    <span><img src="{{ asset('../img/Icon/ic_time.png') }}" alt='daftar' width="25"
                                            height="25" class="me-2" />Durasi : {!! $training->durasi !!} hari</span><br>
                                    <span><img src="{{ asset('../img/Icon/ic_metode.png') }}" alt='daftar' width="30"
                                            height="30" class="me-2" />Metode : {!! $training->metode !!}</span>
                                </div>
                            @endif
                        @else
                            @if ($training->metode != null)
                                <div class="col-12" style="line-height: 2">
                                    <span><img src="{{ asset('../img/Icon/ic_time.png') }}" alt='daftar' width="25"
                                            height="25" class="me-2" />Durasi : {!! $training->durasi !!} hari</span><br>
                                    <span><img src="{{ asset('../img/Icon/ic_metode.png') }}" alt='daftar' width="30"
                                            height="30" class="me-2" />Metode : {!! $training->metode !!}</span>
                                </div>
                            @endif
                        @endif
                        <div class="col-12 mt-2">
                            <div class="d-flex">
                                <button type="button" data="basic" class="btn-primary sub-btn me-2 w-100"
                                    data-paket="basic" data-bs-toggle="modal" data-bs-target="#register-modal">
                                    <img src="{{ asset('../img/Icon/ic_daftar.png') }}" alt='daftar' width="20"
                                        class="me-1" height="20" class="me-1" />
                                    Daftar Sekarang
                                </button>
                                @if ($training->paket_harga != null)
                                    <a href="#paket-harga" class="btn-outline-primary sub-btn w-100 text-center">
                                        <img src="{{ asset('../img/Icon/ic_pil_paket.png') }}" alt='daftar'
                                            width="20" class="me-1" height="20" class="me-1" />
                                        @if ($training->id == 6)
                                            Pilihan Kelas
                                        @else
                                            Pilihan Paket
                                        @endif
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($jadwals->count() != 0)
                        <div class="course-detail-shedule outline-section row"
                            style="padding-top: 0px; margin-right:0px; margin-left:0px">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('../img/Icon/ic_almost_running.png') }}" alt='daftar' width="30"
                                    class="me-1" height="30" class="me-1 mt-2" />
                                <h5 class="mt-4">
                                    Jadwal <span class="en-italic">Almost Running</span></h5>
                            </div>
                            <h4 class="fw-bold" style="margin-bottom: 0px">
                                @php
                                    $dateRanges = [];
                                @endphp
                                @foreach ($jadwals as $jadwal)
                                    @php
                                        $dateString = $jadwal->start_date;
                                        $endDateString = $jadwal->end_date;
                                        $end = \Carbon\Carbon::parse($endDateString)
                                            ->locale('id')
                                            ->isoFormat('D MMMM YYYY');
                                        $start_date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D');
                                        $dateRanges[] = "$start_date - $end";
                                    @endphp
                                @endforeach
                                {{ implode(' | ', $dateRanges) }}
                            </h4>
                        </div>
                    @endif
                    @php
                        $html = $training->facility;
                        preg_match_all('/<li[^>]*>(.*?)<\/li>/i', $html, $matches);
                        $items = $matches[1] ?? [];
                        $half = ceil(count($items) / 2);
                        $leftColumn = array_slice($items, 0, $half);
                        $rightColumn = array_slice($items, $half);
                    @endphp
                    <div class="course-detail-facility mt-3  d-none d-lg-inline">
                        <h5 class="fw-bold">Fasilitas dan Benefit Training di Arsa:</h5>
                        <div style="display: flex;" class="facility">
                            <ul style="flex: 1;" class="online-facility">
                                @foreach ($leftColumn as $item)
                                    <li>{!! $item !!}</li>
                                @endforeach
                            </ul>
                            <ul style="flex: 1;" class="offline-facility">
                                @foreach ($rightColumn as $item)
                                    <li>{!! $item !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="course-detail-facility mt-3  d-inline d-lg-none">
                        <h5 class="fw-bold">Fasilitas dan Benefit Training di Arsa:</h5>
                        <div class="facility">
                            {!! $training->facility !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 mt-5">
                    @if ($training->description != null)
                        <div class="outline-section-top">
                            @if ($training->training_categories_id == 2)
                                <h2 class="course-title fs-4 text-capitalize">Deskripsi Pelatihan {!! $training->name !!}
                                </h2>
                            @else
                                <h2 class="course-title fs-4 text-capitalize">Deskripsi Pembinaan</h2>
                            @endif
                            {!! $training->description !!}
                        </div>
                    @endif
                    @if ($training->tujuan != null)
                        <div class="outline-section">
                            @if ($training->training_categories_id == 2)
                                <h2 class="course-title fs-4 text-capitalize">Tujuan Pelatihan
                                    {!! $training->name !!}</h2>
                            @else
                                <h2 class="course-title fs-4 text-capitalize">Tujuan Pembinaan</h2>
                            @endif
                            <p>Dengan Mengikuti pelatihan ini, peserta akan memiliki kompetensi: </p>
                            {!! $training->tujuan !!}
                        </div>
                    @endif
                    @if ($training->method != null)
                        <div class="outline-section">
                            @if ($training->training_categories_id == 2)
                                <h2 class="course-title fs-4 text-capitalize">Metode Pelatihan
                                    {!! $training->name !!}</h2>
                            @else
                                <h2 class="course-title fs-4 text-capitalize">Metode Pembinaan</h2>
                            @endif
                            {!! $training->method !!}
                        </div>
                    @endif
                    @if ($training->outline != null)
                        <div class="outline-section materi">
                            @if ($training->training_categories_id == 2)
                                <h2 class="course-title fs-4 text-capitalize">Materi Pelatihan dan SKKNI
                                    {!! $training->name !!}</h2>
                            @else
                                <h2 class="course-title fs-4 text-capitalize">Materi Pembinaan</h2>
                            @endif
                            {!! $training->outline !!}
                        </div>
                    @endif
                    @if ($training->paket_harga != null)
                        <div class="outline-section mb-3" id="paket-harga" class="paket">
                            {!! $training->paket_harga !!}
                        </div>
                    @endif
                    @if ($training->paket_harga_2 != null)
                        <div class="outline-section" id="paket-harga2" class="paket">
                            {!! $training->paket_harga_2 !!}
                        </div>
                    @endif
                    @if ($training->id == 6)
                        <div class="course-detail-facility mt-3 d-none d-lg-inline">
                            <h2 class="course-title fs-4 text-capitalize">Fasilitas dan Benefit Pembinaan Juru
                                Las</h2>
                            <p>Berlaku untuk semua kelas pembinaan Juru Las dengan metode Blended atau Offline</p>
                            <div style="display: flex;" class="facility">
                                <ul style="flex: 1;" class="online-facility">
                                    @foreach ($leftColumn as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                                <ul style="flex: 1;" class="offline-facility">
                                    @foreach ($rightColumn as $item)
                                        <li>{!! $item !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="course-detail-facility mt-3  d-inline d-lg-none">
                            <h2 class="course-title fs-4 text-capitalize">Fasilitas dan Benefit Pembinaan Juru
                                Las</h2>
                            <p>Berlaku untuk semua kelas pembinaan Juru Las dengan metode Blended atau Offline</p>
                            <div class="facility">
                                {!! $training->facility !!}
                            </div>
                        </div>
                    @endif
                    @if ($training->requirement != null)
                        <div class="outline-section mt-3">
                            <h2 class="course-title fs-4 text-capitalize">
                                Persyaratan
                            </h2>
                            <p>Peserta pelatihan wajib melampirkan berkas persyaratan sebagai berikut: </p>
                            {!! $training->requirement !!}
                        </div>
                    @endif
                    @if ($training->jadwal != null)
                        <div class="outline-section ">
                            <div class="row mt-2">
                                <h2 class="course-title fs-4 text-capitalize">Jadwal
                                    Bulanan Arsa Training</h2>
                                <div class="col-lg-7 box-schedule">
                                    {!! $training->jadwal !!}
                                </div>
                                @if ($training->thumbnail_jadwal != null)
                                    <div class="col-lg-5">
                                        <img decoding="async" src="{{ asset('storage/' . $training->thumbnail_jadwal) }}"
                                            alt="{{ $training->name }}" style="width: 100%; height: auto;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    @if ($training->pemateri != null)
                        <div class="outline-section">
                            @if ($training->training_categories_id == 2)
                                <h2 class="course-title fs-4 text-capitalize">Instruktur Pelatihan
                                    {!! $training->name !!}</h2>
                                <p>Instruktur pelatihan {!! $training->name !!} berasal dari tenaga ahli sebagai berikut :
                                </p>
                            @else
                                <h2 class="course-title fs-4 text-capitalize">Instruktur Pembinaan</h2>
                                <p>Instruktur pembinaan {!! $training->name !!} berasal dari tenaga ahli sebagai berikut :
                                </p>
                            @endif
                            {!! $training->pemateri !!}
                        </div>
                    @endif
                    @if ($training->rundown != null)
                        <div class="outline-section rundown">
                            <h2 class="course-title fs-4 text-capitalize">Rundown</h2>
                            @if ($training->training_categories_id == 2)
                                <p>Pelatihan {!! $training->name !!} dilaksanakan selama {{ $training->durasi }} hari
                                    dengan susunan acara
                                    sebagai berikut : </p>
                            @else
                                <p>Pembinaan {!! $training->name !!} dilaksanakan selama {{ $training->durasi }} hari
                                    dengan susunan acara
                                    sebagai berikut : </p>
                            @endif
                            {!! $training->rundown !!}
                            <p style="font-size: 12px">
                                <span class="text-danger">*</span> <i><b>Rundown di atas untuk referensi jalanya
                                        pelatihan. Rundown bisa berubah sesuai dengan situasi dan kondisi saat hari
                                        pelatihan</b></i>
                            </p>
                        </div>
                    @endif
                    <div class="mt-2 text-center">
                        <h3 class="display-7 fw-bolder mt-2"><b>Bergabunglah
                                Bersama 1000+ Alumni Lainnya!</b></h3>
                        <button type="button" data="basic" class="btn-primary sub-btn me-2 text mt-2"
                            data-paket="basic" data-bs-toggle="modal" data-bs-target="#register-modal">
                            <img src="{{ asset('../img/Icon/ic_daftar.png') }}" alt='daftar' width="20"
                                class="me-1" height="20" class="me-1" />
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- course detail end -->

    <!-- register modal start -->
    <div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5 text-center text-capitalize" id="exampleModalLabel"
                        style="letter-spacing:0px">
                        Formulir Registrasi <span id="kategori-paket"></span>
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <div class="form-registration w-100">
                        @if ($training->training_categories_id == '1')
                            <form action="/pelatihan/{{ $training->slug }}" method="POST" id="registerForm">
                                @csrf
                                <div class="d-md-flex pt-2 pb-2 mb-2">
                                    <div class="name w-100 mb-2 mb-md-0">
                                        <label for="name" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="nameKemnaker" name="name" required=""
                                            value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" hidden>
                                        <input type="text"
                                            class="form-control @error('slugKemnaker') is-invalid @enderror"
                                            id="slugKemnaker" name="slugKemnaker" required
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
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" required value="{{ old('email') }}" />
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
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required value="{{ old('phone') }}"
                                            minlength="10" />
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="kategori_peserta" class="form-label">Kategori Peserta</label>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="pribadi" value="pribadi" checked>
                                                <label for="pribadi" class="form-check-label">Pribadi</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="utusan_perusahaan" kategori-id="kemnaker"
                                                    value="utusan_perusahaan">
                                                <label for="utusan_perusahaan" class="form-check-label">Utusan
                                                    Perusahaan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 utusan_perusahaan">
                                    <div class="company w-100">
                                        <label for="company" class="form-label">Asal Perusahaan</label>
                                        <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company" value="{{ old('company') }}" />
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
                                    <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror"
                                        id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">
                                      @error('message')
<div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
@enderror
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="program" class="form-label">Sumber Informasi
                                        <span class="text-danger">*</span></label>
                                    <select class="form-select" name="sumber_informasi"
                                        aria-label="select program training">
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
                                    <select class="form-select" name="training_id">
                                        <option value="{{ $training->id }}"
                                            {{ old('training_id') == $training->id ? 'selected' : null }}>
                                            {{ $training->name }}</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="kategori_paket" name="kategori_paket"
                                    hidden />
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary py-3 px-5">
                                        <i class="ri-save-3-line me-1"></i>Daftar
                                    </button>
                                </div>
                            </form>
                        @elseif($training->training_categories_id == '2')
                            <form action="/pelatihan/{{ $training->slug }}" method="POST" id="registerForm">
                                @csrf
                                <div class="d-md-flex pt-2 pb-2 mb-2">
                                    <div class="name w-100 mb-2 mb-md-0">
                                        <label for="name" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="nameBnsp" name="name" required="" value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" hidden>
                                        <input type="text" class="form-control @error('slugBnsp') is-invalid @enderror"
                                            id="slugBnsp" name="slugBnsp" required value="{{ old('slugBnsp') }}" />
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
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" required value="{{ old('email') }}" />
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
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required value="{{ old('phone') }}"
                                            minlength="10" />
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
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="pribadi_bnsp" value="pribadi" checked>
                                                <label for="pribadi" class="form-check-label">Pribadi</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="utusan_perusahaan_bnsp" value="utusan_perusahaan">
                                                <label for="utusan_perusahaan_bnsp" class="form-check-label">Utusan
                                                    Perusahaan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 utusan_perusahaan_bnsp">
                                    <div class="company w-100">
                                        <label for="company" class="form-label">Asal Perusahaan</label>
                                        <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company" value="{{ old('company') }}" />
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
                                    <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror"
                                        id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">
@error('message')
<div class="invalid-feedback">
                    {{ $message }}
                </div>
@enderror
</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="program" class="form-label">Sumber Informasi
                                        <span class="text-danger">*</span></label>
                                    <select class="form-select" name="sumber_informasi"
                                        aria-label="select program training">
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
                                    <select class="form-select" name="training_id">
                                        <option value="{{ $training->id }}"
                                            {{ old('training_id') == $training->id ? 'selected' : null }}>
                                            {{ $training->name }}</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="kategori_paket" name="kategori_paket"
                                    hidden />
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-primary py-3 px-5">
                                        <i class="ri-save-3-line me-1"></i>Daftar
                                    </button>
                                </div>
                            </form>
                        @else
                            <form method="post" action="/pelatihan/{{ $training->slug }}" enctype="multipart/form-data"
                                id="registerForm">
                                @csrf
                                <div class="d-md-flex pt-2 pb-2 mb-2">
                                    <div class="name w-100 mb-2 mb-md-0">
                                        <label for="name" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="nameSoftskill" name="name" required=""
                                            value="{{ old('name') }}" />
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3" hidden>
                                        <input type="text"
                                            class="form-control @error('slugSoftskill') is-invalid @enderror"
                                            id="slugSoftskill" name="slugSoftskill" required
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
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" required value="{{ old('email') }}" />
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
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" required value="{{ old('phone') }}"
                                            minlength="10" />
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
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="pribadi_softskill" value="pribadi" checked>
                                                <label for="pribadi" class="form-check-label">Pribadi</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-10 col-md-9 col-sm-8">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" name="kategori_peserta"
                                                    id="utusan_perusahaan_softskill" value="utusan_perusahaan">
                                                <label for="utusan_perusahaan_softskill" class="form-check-label">Utusan
                                                    Perusahaan</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 utusan_perusahaan_softskill">
                                    <div class="company w-100">
                                        <label for="company" class="form-label">Asal Perusahaan</label>
                                        <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('company') is-invalid @enderror"
                                            id="company" name="company" value="{{ old('company') }}" />
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
                                    <textarea type="text" class="form-control h-auto @error('company_address') is-invalid @enderror"
                                        id="company_address" name="company_address" value="{{ old('company_address') }}" rows="5">
                                    @error('message')
<div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
@enderror
                                    </textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="program" class="form-label">Sumber Informasi
                                        <span class="text-danger">*</span></label>
                                    <select class="form-select" name="sumber_informasi"
                                        aria-label="select program training">
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
                                    <label for="program" class="form-label">Program Training Softskill yang dipilih
                                        <span class="text-danger">*</span></label>
                                    <select class="form-select" name="training_id">
                                        <option value="{{ $training->id }}"
                                            {{ old('training_id') == $training->id ? 'selected' : null }}>
                                            {{ $training->name }}</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" id="kategori_paket" name="kategori_paket"
                                    hidden />
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const isDual = @json($training->paket_harga_2 != null);
            const cat = @json($training->training_categories_id);
            const icon = {
                true: `<img src="{{ asset('../img/Icon/check.png') }}" alt="check" width="20" height="20" class="check" />`,
                false: `<img src="{{ asset('../img/Icon/x.png') }}" alt="x" width="20" height="20" class="x" />`
            };
            const addButtons = (selector, cls) => {
                const table = document.querySelector(selector);
                if (!table) return;

                table.classList.add('table', 'mt-2', 'pricelist-package');
                const lastRow = table.querySelectorAll('tbody tr:last-child td');
                ['basic', 'premium', '3c'].forEach((pkg, i) => {
                    if (lastRow[i + 1]) {
                        lastRow[i + 1].innerHTML += `
                <button type="button" class="btn-primary ${cls} me-2" data-paket="${pkg}" data-bs-toggle="modal" data-bs-target="#register-modal">
                    <img src="/../img/Icon/ic_daftar.png" alt="daftar" width="20" height="20" class="me-1" />Daftar
                </button>`;
                    }
                });
                table.querySelectorAll('td').forEach(td => {
                    const val = td.textContent.trim().toLowerCase();
                    if (val === 'true' || val === 'false') {
                        td.innerHTML = icon[val];
                        td.style.textAlign = 'center';
                        td.style.verticalAlign = 'middle';
                    }
                });
            };
            const setBtnEvents = cls => {
                document.querySelectorAll(cls).forEach(btn => {
                    btn.addEventListener('click', () => {
                        document.getElementById("kategori_paket").value = btn.dataset.paket;
                    });
                });
            };
            @if ($training->id != 6 || $training->id != 13)
                addButtons('#paket-harga figure.table > table', 'sub-btn');
            @endif
            if (isDual) addButtons('#paket-harga2 figure.table > table', 'sub-btn2');
            setBtnEvents('.sub-btn');
            setBtnEvents('.sub-btn2');
            const iconMap = {
                "Sertifikat & Buku Kerja Las KEMNAKER RI": "ic-kemnaker",
                "Sertifikat BNSP": "ic-kemnaker",
                "Sertifikat Arsa": "ic-kemnaker",
                "Sertifikat KEMNAKER RI": "ic-kemnaker",
                "SK Mengikuti Pembinaan": "ic-kemnaker",
                "SK Kompeten": "ic-kemnaker",
                "Sertifikat Internal": "ic-kemnaker",
                "Sertifikat AK3U": "ic-kemnaker",
                "SKP dan Lisensi AK3U (Utusan perusahaan)": "ic-kemnaker",
                "Modul Pelatihan": "ic-module",
                "Training Kit": "ic-kit",
                "Souvenir Eksklusif": "ic-souvenir",
                "Meeting Room Eksklusif": "ic-meeting",
                "Transport Lokal": "ic-transport",
                "Transport Lokal Penginapan - Workshop": "ic-transport",
                "Free Lunch & Coffee Break": "ic-lunch",
                "Qualified Instructor": "ic-instructor",
                "Dokumentasi Kegiatan": "ic-docs",
                "Polo Shirt": "ic-polo",
                "Goodiebag & Handbag": "ic-goodiebag",
                "Gratis Ongkir": "ic-ongkir",
                "SK Dalam Proses": "ic-kemnaker"
            };


            document.querySelectorAll('.facility li').forEach(function(li) {
                const text = li.textContent.trim();
                if (iconMap[text]) {
                    li.classList.add(iconMap[text]);
                }
            });
        });
    </script>
    <script>
        const paragraphs = document.querySelectorAll("p");

        paragraphs.forEach(p => {
            if (p.innerHTML.trim() === "&nbsp;") {
                p.style.display = "inline-block";
                p.style.minWidth = "100%";
                p.style.borderBottom = "2px solid #ffb624";
            }
        });
    </script>


    @if ($training->training_categories_id == '1')
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
        </script>
    @endif

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
