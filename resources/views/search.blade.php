@extends('layouts.main')
@section('container')

<!-- Certificate Start -->
<section class="search-section section-padding">
    <div class="container">
        <div class="row d-flex search-data">
            <div class="col-12">
                <h1 class="fw-bolder">
                    Search result for: {{ request('search') }}
                </h1>
            </div>
        </div>
        @if($trainings->count() || $posts->count())
        @foreach ($trainings as $training) 
        <div class="row d-flex latest-course mt-3 mt-md-5">
          <div class="col-md-6 order-1 order-md-0 pe-md-0">
            <div class="course-intro bg-light h-100">
              <div class="course-category">
                <div class="course-tag">
                  <span> {{ $training->kategori->name }}</span>
                </div>
              </div>
              <div class="course-title mt-3">
                <a href="/pelatihan/{{ $training->slug }}">
                  <h4 class="post-title text-capitalize">
                    {{ $training->name }}
                  </h4>
                </a>
              </div>
              <div class="course-excerpt">
                <p>
                {!! $training->excerpt !!}
                </p>
              </div>
              <hr />
              <a href="/pelatihan/{{ $training->slug }}"
                type="button"
                class="btn btn-primary"
                >Selengkapnya</a>
            </div>
          </div>
          <div class="col-md-6 order-0 order-md-1 course-thumb ps-md-0">
            <!--<img loading="lazy" src="{{ asset('storage/' .$training->thumbnail) }}" alt="{{ $training->name }}" width="100%" />-->
            <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail_mobile) }}" alt="{{ $training->name }}" width="100%; min-height:100%"/>
          </div>
        </div>
        @endforeach
        @else
        <div class="col-12 text-center">
            <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
            <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
            <p class="mb-4 text-center">Mohon maaf program pelatihan dan pembinaan belum tersedia</p>
        </div>
        @endif
    </div>
</section>
<!-- Certificate End -->

@endsection

@section('myjsfile')
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');
    
        name.addEventListener('change', function() {
            fetch('/kontak-kami/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
  </script>
@endsection