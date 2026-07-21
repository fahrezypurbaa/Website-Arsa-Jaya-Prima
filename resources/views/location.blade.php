@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section section-padding"
    data-background="url('{{ asset('img/banner/banner-locations.webp') }}')"
    style="
    background-image: url('{{ asset('img/banner/banner-locations.webp') }}');
    background-position: center top;
    background-repeat: no-repeat;
    background-size: cover;"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="responsive-container position-relative">
        <div class="row">
            <div class="col-md-8 section-padding">
                <h1 class="display-4 fw-bolder text-light mb-0 text-uppercase">
                    Lokasi Training
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->

<!-- Location Start -->
    <section id="location" class="location-section section-padding">
        <div class="responsive-container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card list-location p-3 my-4" style="position:sticky; top:100px">
                        <h5 class="fw-bold">Tempat Training</h5>
                        <ul>
                            @foreach ($places_location as $place)
                                <a href="/lokasi-training/region/{{ $place->city }}"
                                    style="color: hsl(0, 0%, 30%);width:100%">
                                    <li>{{ $place->city }}</li>
                                </a>
                            @endforeach
                            <li><a href="/lokasi-training">Semua Tempat</a></li>
                        </ul>
                    </div>
                    <div class="card location-notes p-3 my-4" style="position:sticky; top:500px">
                        <span>* Kami tidak menjalin kerja sama promosi dengan tempat-tempat dalam daftar. Untuk pertanyaan
                            seputar sewa, pemesanan, atau detail lainnya, silakan langsung menghubungi kontak yang tertera
                            di masing-masing tempat. Terima kasih.</span>
                    </div>
                </div>
                <div class="col-lg-9">
                    @if ($places->count())
                        @foreach ($places as $location)
                            <div class="fl-location my-4 card rounded" style="overflow:hidden">
                                <div class="location-img">
                                    <img src="{{ asset('/storage/place->images/' . $location->first_image->image) }}"
                                        alt="{{ $location->name }}">
                                </div>
                                <div class="location-desc p-2">
                                    <div class="d-flex">
                                        <div class="loc-place">
                                            <h5 class="text-primary text-capitalize">{{ $location->name }}</h5>
                                            <span>
                                                {{ $location->city }}
                                            </span>
                                        </div>
                                        <a href="{{ $location->link }}" target="_blank" rel="noopener"
                                            class="btn btn-tertiary fw-bold">Lihat Google Maps</a>
                                    </div>
                                    <hr>
                                    <div class="desc-desktop">
                                        @php
                                            $location_words = strip_tags($location->desc);
                                        @endphp
                                        <p class="mb-0">{!! substr($location_words, 0, 570) !!} ......</p>
                                        <a href="/lokasi-training/{{ $location->slug }}">Selengkapnya</a>
                                    </div>
                                    <div class="desc-mobile">
                                        @php
                                            $location_words = strip_tags($location->desc);
                                        @endphp
                                        <p class="mb-0">{!! substr($location_words, 0, 70) !!} ......</p>
                                        <a href="/lokasi-training/{{ $location->slug }}">Selengkapnya</a>
                                        <a href="{{ $location->link }}" target="_blank" rel="noopener"
                                            class="btn btn-tertiary fw-bold desc-mobile mt-2">Lihat Google Maps</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="row">
                            <div class="col-12 text-center">
                                <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
                                <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
                                <p class="mb-4 text-center">Mohon maaf artikel belum tersedia</p>
                            </div>
                        </div>
                    @endif
                    <div class="d-flex justify-content-center">
                        {{ $places->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Location End -->

@endsection
