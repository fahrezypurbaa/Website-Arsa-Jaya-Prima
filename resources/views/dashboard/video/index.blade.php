@extends('dashboard.layouts.main')

@section('container')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- video start -->
    <div
        class="video-section section-padding px-3 py-2 bg-white rounded"
    >
        <div class="container">
            @foreach ($video as $data) 
            <div class="row justify-content-between align-items-center">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <a href="/dashboard/video/{{ $data->id }}/edit"
                            type="button"
                            class="btn btn-secondary btn-sm"
                            style="margin-bottom: 20px"
                            >
                            <i class="fa-solid fa-pencil me-1"></i> Edit Video dan Deskripsi Galeri
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                  <figure class="img-play-video">
                    <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mwtbEGNABWU" data-fancybox="">
                      <span></span>
                    </a>
                    <img src="{{ asset('storage/'.$data->thumbnail) }}" alt="{{ $data->title }}" class="img-fluid rounded">
                  </figure>
                </div>
                <div class="col-md-6">
                  <div class="section-title mb-0">
                    <h3 class="text-capitalize">{{ $data->title }}</h3>
                    {!! $data->description !!}
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

     <!-- video modal start -->
     <div
     class="modal fade video-modal js-course-preview-modal"
     id="video-modal"
     tabindex="-1"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true"
 >
     <div class="modal-dialog modal-lg modal-dialog-centered">
     <div class="modal-content">
         <div class="modal-body p-0">
         <button
             type="button"
             class="btn-close"
             data-bs-dismiss="modal"
             aria-label="Close"
         >
             <i class="fa-solid fa-circle-xmark"></i>
         </button>
         <div class="ratio ratio-16x9">
             <iframe
             id="player-1"
             src="https://www.youtube.com/embed/wrbqeygx8Z0"
             title="Arsa Consultant"
             allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
             allowfullscreen
             ></iframe>
         </div>
         </div>
     </div>
     </div>
 </div>
 <!-- video modal end -->
@endsection