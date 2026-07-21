@extends('layouts.main')
@section('container')

<!-- page title -->
<section class="page-title-section" data-background="img/banner/banner-article.webp" style="background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="responsive-container position-relative">
        <div class="row">
            <div class="col-md-8">
                <h1 class="display-4 fw-bolder text-light text-uppercase">Artikel</h1>
                <p class="mb-4 text-light">
                    Kumpulan artikel informatif yang berfokus pada topik seputar industri K3 dan berbagai tips softskill kerja
                </p>
            </div>
        </div>
    </div>
</section>
<!-- /page title -->
<!-- Blog Start -->
<section id="blog" class="blog-section section-padding">
    <div class="responsive-container py-4">
        <div class="row posts-list">
            <div class="col-lg-8 mb-5 mb-lg-0">
                @if($posts->count())
                <div class="grid-3">
                    @foreach($posts as $post)
                    <div class="card card-article" style="overflow:hidden">
                        @if ($post->image)
                        <img loading="lazy" src="{{ asset('storage/' .$post->image) }}"
                            alt="{{ $post->title }}">
                        @endif
                        <div class="card-body" style="display: flex; flex-direction: column;">
                            <div class="sub-title" style="font-size: 10px;">
                                <span><i class="far fa-user"></i> {{ $post->author->name }}</span>
                                <span> <i class="far fa-calendar"></i>
                                    <?php
                                    $dateString = $post->created_at;
                                    $date = \Carbon\Carbon::parse($dateString)->locale('id')->isoFormat('D MMMM YYYY');
                                    ?>
                                    {{ $date }}</span>
                            </div>
                            <b class="card-title" style="font-size: 18px;">
                                <a href="/blog/{{ $post->slug }}">
                                    @if(strlen($post->title)
                                    <=30)
                                        {{ $post->title }} <br />
                                    @else
                                    {{ $post->title }}
                                    @endif
                                </a></b>
                        </div>
                    </div>
                    @endforeach

                </div>
                @else
                <div class="col-12 text-center">
                    <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
                    <h2 class="mb-2 text-capitalize">Tidak Ditemukan</h2>
                    <p class="mb-4 text-center">Mohon maaf artikel belum tersedia</p>
                </div>
                @endif
                <div class="d-flex justify-content-center mt-3">
                    {{ $posts->onEachSide(5)->links() }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar sidebar-right w-100">
                    <div class="widget categories mb-5">
                        <h5 class="widget-title">Kategori</h5>
                        <ul class="arrow nav nav-tabs">
                            @foreach($categories as $category)
                            <li>
                                <a href="/blog?kategori={{ $category->slug }}"
                                    class="d-flex justify-content-between">
                                    {{ $category->name }}
                                    <i class="fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget recent-posts mb-5">
                        <h5 class="widget-title">Artikel Terbaru</h5>
                        <ul class="list-unstyled">
                            @foreach($list_post as $post)
                            <li class="d-flex mb-3 mb-lg-4 mb-sm-4">
                                <div class="col-4 posts-thumbnail">
                                    <a href="/blog/{{ $post->slug }}">
                                        <img loading="lazy" alt="{{ $post->title }}" src="{{ asset('storage/' .$post->image) }}" class="rounded" style="height:86px !important;width: 100%" />
                                    </a>
                                </div>
                                <div class="col-8 post-info ps-2">
                                    <ol class="tags d-flex" style="padding-left: 0; margin-bottom:5px">
                                        <li>{!! $post->kategori->name !!}</li>
                                    </ol>
                                    <h6 class="post-title">
                                        <a href="/blog/{{ $post->slug }}">
                                            {{ $post->title }}
                                        </a>
                                    </h6>
                                </div>

                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Sidebar end -->
            </div>
        </div>
        <!-- Main row end -->
    </div>
    <!-- Container end -->
</section>
<!-- Blog End -->

@endsection