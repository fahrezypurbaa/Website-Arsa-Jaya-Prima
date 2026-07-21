@extends('layouts.main')
@section('container')
    <section class="section-padding">
        <div class="responsive-container">
            <div class="row">
                <div class="col-12">
                    <div class="row text-center align-items-center justify-content-center loker-detail">
                        @if ($loker->logo_perusahaan)
                            {{-- <img loading="lazy" src="{{ asset('storage/' . $loker->logo_perusahaan) }}" class="img-fluid"
                                alt="{{ $loker->title }}" height="200" width="200"> --}}
                            <img loading="lazy" src="{{ $loker->logo_perusahaan }}" class="img-fluid"
                                alt="{{ $loker->title }}" height="200">
                        @endif
                        <h4>{{ $loker->perusahaan }}</h4>
                        <h1 class="display-6 text-center"
                            style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                ">
                            {{ $loker->title }}
                        </h1>
                    </div>
                    <hr>
                    <div class="persyaratan">
                        <h4 class="mt-5 mb-2 fw-bold">
                            Persyaratan
                        </h4>
                        <ul>
                            <li>{{ $loker->pendidikan }}</li>
                            <li>{{ $loker->pengalaman_kerja }} Pengalaman</li>
                        </ul>
                    </div>
                    <div class="loker-description">
                        @if ($loker->deskripsi_pekerjaan != null)
                            <div class="desc-content">
                                <h4 class="mt-5 mb-2 fw-bold">
                                    Tentang Perusahaan
                                </h4>
                                {!! $loker->deskripsi_perusahaan !!} <br />
                                {!! $loker->deskripsi_pekerjaan !!}
                            </div>
                        @endif
                        <i>Sumber : <a href="{{ $loker->sumber }}">{{ $loker->sumber }}</a></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
