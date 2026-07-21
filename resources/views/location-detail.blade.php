@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section" data-background="/img/banner-location.webp" style="background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container position-relative">
      <div class="row">
        <div class="col-md-8">
          <h1 class="display-4 fw-bolder text-light mb-0">
            {{ $location->name }}
          </h1>
        </div>
      </div>
    </div>
</section>
<!-- /page title -->

<!-- Location Start -->
<section id="location" class="location-section py-5 px-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-2">
                <div class="location-img-bg h-100">
                  <div class="owl-carousel location-carousel">
                    @foreach($images as $image)
                    <div class="location-box location-item">
                      <img src="{{ asset('storage/place->images/'. $image->image) }}" alt="{{ $location->name }}" width="692" height="1038" style="width:100%; height:auto;"/>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="location-desc mb-2 rounded d-md-flex">
                    <div class="align-self-center">
                        <h2 class="text-primary text-capitalize">{{ $location->city }}</h2>
                        <h3 class="text-capitalize">{{ $location->name }}</h3>
                        <p class="mb-0">{!! $location->desc !!}</p>
                    </div>
                </div>
                <div class="location-desc mb-2 rounded d-md-flex">
                  <div class="justify-content-center">
                    <h2 class="text-primary text-capitalize">Daftar Program Training</h2>
                    <p class="mb-0">{!! $location->training_list !!}</p>
                  </div>
              </div>
              <div class="location-desc rounded d-md-flex">
                <div class="justify-content-center">
                  <h2 class="text-primary text-capitalize">Alamat Lokasi</h2>
                  <p class="mb-0">{!! $location->address !!}</p>
                  <a href="{{ $location->link }}"  target="_blank" rel="noopener" class="btn btn-tertiary fw-bold">Lihat Google Maps</a>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- Location End -->

@endsection