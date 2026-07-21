@extends('layouts.main')
@section('container')
    <!-- page title -->
    <section class="page-title-section page-location" data-background="url('{{ asset('img/banner/banner-karir.webp') }}')"
        style="background-image: url('{{ asset('img/banner/banner-karir.webp') }}');
        background-position: center top;
        background-repeat: no-repeat;
        background-size: cover;">
        <div class="overlay"></div>
        <div class="responsive-container position-relative">
            <div class="row">
                <div class="col-md-8 section-padding">
                    <h1 class="display-4 fw-bolder text-light mb-0 text-uppercase">
                        Info Loker
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <section id="location" class="location-section section-padding">
        <div class="responsive-container">
            <div class="col-12 mb-4">
                <h2 class="fw-bold text-primary border-bottom pb-2">Loker Terkini</h2>
            </div>
            <!--<div class="col-12 text-center">-->
            <!--    <p class="mb-4 text-center">Mohon maaf lowongan Arsa belum tersedia</p>-->
            <!--</div>-->
            {{-- Bagian Loker Grid --}}
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <a href="{{ url('loker-arsa-detail') }}" class="text-decoration-none text-dark">
                        <div class="card p-3">
                            <img src="{{ asset('img/banner/telemarketing.jpeg') }}" 
                                class="card-img-top" 
                                alt="lowongan kerja team climbing"
                                style="height: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize fw-bold mt-2 single-line">Telemarketing</h5>
                                <p class="mb-1">
                                    <i class="text-secondary"></i>
                                    PT Arsa Jaya Prima
                                </p>
                                <p class="mb-1">
                                    <span class="text-muted">Yogyakarta</span>
                                </p>
                                <p class="mb-1">
                                    <i class="font-size:14px !important"></i>
                                    Kisaran Gaji
                                </p>
                                <p class="mb-1">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    Kompetitif
                                </p>
                            </div>
                        </div>
                    <!--</a>-->
                </div>
                <div class="col-md-4 mb-4">
                    <!--<a href="{{ url('loker-arsa-detail') }}" class="text-decoration-none text-dark">-->
                        <div class="card p-3">
                            <img src="{{ asset('img/banner/loker-team-climbing.jpeg') }}" 
                                class="card-img-top" 
                                alt="lowongan kerja team climbing"
                                style="height: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize fw-bold mt-2 single-line">Team Climbing</h5>
                                <p class="mb-1">
                                    <i class="text-secondary"></i>
                                    PT CareFast Indonesia
                                </p>
                                <p class="mb-1">
                                    <span class="text-muted">Surabaya Timur</span>
                                </p>
                                <p class="mb-1">
                                    <i class="font-size:14px !important"></i>
                                    Kisaran Gaji
                                </p>
                                <p class="mb-1">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    Kompetitif
                                </p>
                            </div>
                        </div>
                    <!--</a>-->
                </div>
                <div class="col-md-4 mb-4">
                    <!--<a href="{{ url('loker-arsa-detail') }}" class="text-decoration-none text-dark">-->
                        <div class="card p-3">
                            <img src="{{ asset('img/banner/loker-operator-logistik.jpeg') }}" 
                                class="card-img-top" 
                                alt="lowongan kerja team climbing"
                                style="height: 100%; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title text-capitalize fw-bold mt-2 single-line">Operator Logistik</h5>
                                <p class="mb-1">
                                    <i class="text-secondary"></i>
                                    PT BINA TALENTA
                                </p>
                                <p class="mb-1">
                                    <span class="text-muted">Wanaherang, Bogor</span>
                                </p>
                                <p class="mb-1">
                                    <i class="font-size:14px !important"></i>
                                    Kisaran Gaji
                                </p>
                                <p class="mb-1">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    Kompetitif
                                </p>
                            </div>
                        </div>
                    <!--</a>-->
                </div>
            </div>



            {{-- Bagian Loker Lainnya (hasil scraping) --}}
            <div class="row">
                <div class="col-12 mb-4">
                    <h2 class="fw-bold text-primary border-bottom pb-2">Loker Lainnya</h2>
                </div>
                @if ($lokers->count())
                    @foreach ($lokers as $loker)
                        <div class="col-md-4 col-sm-12 mb-3">
                            <a href="/loker/{{ $loker->slug }}">
                                <div class="card p-3">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <img loading="lazy" src="{{ $loker->logo_perusahaan }}" class="img-fluid w-100"
                                                alt="{{ $loker->title }}" height="200">
                                        </div>
                                        <div class="col-12">
                                            <span class="card-title text-capitalize fw-bold mt-2 single-line"
                                                title="{{ $loker->title }}">
                                                {{ $loker->title }}
                                            </span> <br />
                                            <span>{{ $loker->perusahaan }}</span> <br />
                                            <span class="text-muted">{{ $loker->lokasi }}</span>
                                        </div>
                                        <div class="col-12 mt-2">
                                            <ul>
                                                <li>
                                                    <span style="font-size:14px !important"> Kisaran Gaji</span>
                                                </li>
                                                <li><i class="fa-solid fa-dollar-sign"></i>
                                                    @if ($loker->gaji == 'Kompetitif')
                                                        {{ $loker->gaji }}
                                                    @else
                                                        Rp {{ $loker->gaji }}
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
                        <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
                        <p class="mb-4 text-center">Mohon maaf instruktur belum tersedia</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
