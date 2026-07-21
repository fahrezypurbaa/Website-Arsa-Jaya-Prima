@extends('dashboard.layouts.main')

@section('container')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- about start -->
    <div
        class="about-section section-padding px-3 py-2 bg-white rounded"
    >
        <div class="row">
        @foreach ($abouts as $about) 
        <div class="row align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    {{-- <a
                        href="/dashboard/posts/create"
                        type="button"
                        class="btn btn-success btn-sm"
                        style="margin-bottom: 20px"
                    >
                        <i class="fa-solid fa-plus me-1"></i> Edit Profil Perusahaan
                    </a> --}}
                    <a
                            href="/dashboard/about/{{ $about->id }}/edit"
                            type="button"
                            class="btn btn-secondary btn-sm"
                            style="margin-bottom: 20px"
                            >
                            <i class="fa-solid fa-pencil me-1"></i> Edit Profil Perusahaan
                            </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-item">
                    <div class="about-box box">
                      <span class="fw-bold">
                        Tentang Kami
                      </span>
                    </div>
                    <div class="about-text">
                      {!! $about->privilege !!}
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-box box">
                      <span class="fw-bold">
                        Visi
                      </span>
                    </div>
                    <div class="about-text">
                      {!! $about->vission !!}
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-box box">
                      <span class="fw-bold">
                        Misi
                      </span>
                    </div>
                    <div class="about-text">
                      {!! $about->mission !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 d-md-inline d-none">
            <div
                class="tab-content d-flex justify-content-center align-items-center h-100"
                id="tabImgReason"
            >
                <div
                class="tab-pane fade show active"
                id="reason-one"
                role="tabpanel"
                aria-labelledby="reason-one-tab"
                style="
                    background-image: url('{{ asset('storage/' .$about->image) }}');
                    width: 75%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center center;
                    height: 450px;
                "
                >
                <!-- <img src="img/sample.jpg" class="reason-img" alt="" /> -->
                @if( $about->link != NULL )
                <a
                    class="icon-video d-flex justify-content-center align-items-center"
                    data-bs-toggle="modal"
                    data-bs-target="#video-modal"
                    type="button"
                    style="margin-left: -40px; margin-top: 38%"
                >
                    <i class="fa-solid fa-play"></i>
                </a>
                @endif
                </div>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- about end -->

    <!-- about modal start -->
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
    <!-- about modal end -->

@endsection

@section('myjsfile')
    {{-- <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            $("#about").DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
                sEmptyTable: "Data Tidak Ditemukan",
            },
            searching: true,
            paging: true,
            ordering: true,
            info: true,
            scrollX: true,
            });
        });
    </script> --}}
@endsection