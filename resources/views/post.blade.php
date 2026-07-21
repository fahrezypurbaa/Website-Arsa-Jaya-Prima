@extends('layouts.main')
@section('container')
    <section id="blog" class="blog-content-section section-padding" style="max-width:1360px;margin:auto">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="post border-0 mb-0 pb-0">
                        <h2 class="post-title text-capitalize mt-3 mb-3">
                            {{ $post->title }}
                        </h2>
                        <div class="post-image">
                            <figure class="post-image position">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" fetchpriority="high"
                                        alt="{{ $post->title }}" width="100%" height="100%">
                                @endif
                            </figure>
                        </div>
                        <div class="post-body">
                            <div class="post-header">
                                <div class="post-meta">
                                    <span class="post-author">
                                        <i class="far fa-user"></i> {{ $post->author?->name }}
                                    </span>
                                    &nbsp;&nbsp;&nbsp;
                                    <span class="post-category">
                                        <i class="far fa-folder-open"></i> {{ $post->kategori?->name }}
                                    </span>
                                </div>
                            </div>
                            <div class="post-content mt-4">
                                @if (!empty(trim($toc)))
                                    <div class="table-content p-2 mt-4">
                                        <h5 class="text-muted">Daftar Isi</h5>
                                        {!! $toc !!}
                                    </div>
                                @endif
                                <div>
                                    {!! $content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar sidebar-right w-100">
                        <div class="widget categories mb-5">
                            <h5 class="widget-title">Kategori</h5>
                            <ul class="arrow nav nav-tabs">
                                @foreach ($categories as $category)
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
                                @foreach ($list_post as $post)
                                    <li class="d-flex mb-3 mb-lg-4 mb-sm-4">
                                        <div class="col-4 posts-thumbnail">
                                            <a href="/blog/{{ $post->slug }}">
                                                <img loading="lazy" alt="{{ $post->title }}"
                                                    src="{{ asset('storage/' . $post->image) }}" class="rounded"
                                                    width="100%" height="86px" />
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
                </div>
            </div>
        </div>
    </section>
@endsection
