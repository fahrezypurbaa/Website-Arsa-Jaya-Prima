@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section" data-background="/img/banner-gallery.webp" style="background-position: 50% 50%; background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container position-relative">
      <div class="row">
        <div class="col-md-8">
          <h1 class="display-4 fw-bolder text-light mb-0">
            @if(!empty($category->gallery_categories))
              Galeri {{ ucfirst($category->gallery_categories->name) }}
            @else
              Galeri {{ ucfirst($id)}} 
            @endif
          </h1>
        </div>
      </div>
    </div>
</section>
<!-- /page title -->

<!-- Gallery Start -->
<section id="gallery" class="gallery gallery-section py-5 px-4">
    <div class="container">
        @if(!empty($category->gallery_categories))
        <div class="row">
          @foreach ($data as $data)
            @foreach($data->galleries as $photo)
            <div class="col-lg-4 col-md-6 p-2 mt-1">
                <div class="gallery-detail-item h-100">
                  <img src="{{ asset('/storage/photo->images/' . $photo->photo) }}" class="img-fluid" alt="{{ $data->name }}" width"1600" height="1200" style="width:100%;height:100%;">
                  <div class="gallery-links d-flex align-items-center justify-content-center">
                    <a href="{{ asset('/storage/photo->images/' . $photo->photo) }}" data-glightbox="title: {{ $data->name }}; description: {{ $data->training }} | {{ $data->schedule }}" class="glightbox preview-link"><i class="fa-solid fa-magnifying-glass-plus fa-2x"></i></a>
                  </div>
                </div>
            </div>
            @endforeach
          @endforeach
        </div>
      @else
      <div class="row">
          <div class="col-12 text-center">
              <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
              <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
              <p class="mb-4 text-center">Mohon maaf galeri {{ucfirst($id)}} belum tersedia</p>
          </div>
        </div>
      @endif
    </div>
</section>
<!-- Gallery End -->
@endsection

@section('myjsfile')
<script type="module">
    import 'https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js';
    
    const lightbox = GLightbox({ selector: '.glightbox' });
</script>
@endsection