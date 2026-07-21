@extends('dashboard.layouts.main')

@section('container')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- post start -->
    <div
        class="post-section section-padding px-3 py-2 bg-white rounded"
    >
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-light btn-sm" style="margin-bottom: 20px" data-bs-toggle="modal" data-bs-target="#archive-modal">
                        <i class="fa-solid fa-box-archive me-1"></i> Arsip Blog
                      </button>
                    <a
                        href="/dashboard/posts/create"
                        type="button"
                        class="btn btn-success btn-sm"
                        style="margin-bottom: 20px"
                    >
                        <i class="fa-solid fa-plus me-1"></i> Tambah Artikel
                    </a>
                </div>
            </div>
            <div class="col-12 bg-white m-auto">
                <table
                id="post"
                class="table table-striped m-auto"
                width="100%"
                >
                <thead>
                    <tr>
                    <th width="5%">No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th width="16%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->kategori->name }}</td>
                        <td class="option-item d-flex">
                            <a
                            href="/dashboard/posts/{{ $post->slug }}"
                            class="btn btn-warning btn-sm m-auto"
                            >
                            <i class="fa-solid fa-eye"></i>
                            </a>
                            <a
                            href="/dashboard/posts/{{ $post->slug }}/edit"
                            class="btn btn-secondary btn-sm m-auto"
                            >
                            <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a>
                                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-light btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-box-archive"></i></button>
                                </form>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- post end -->

    <!-- archive post start -->
    <div
    class="modal fade"
    id="archive-modal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
    >
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="post-section section-padding px-3 py-2 bg-white rounded">
                    <div class="row">
                        <div class="col-12 bg-white m-auto">
                            <table
                                id="archive"
                                class="table table-striped m-auto nowrap"
                                width="100%"
                            >
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th width="16%">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($archives as $post) 
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->kategori->name }}</td>
                                        <td class="option-item d-flex">
                                            <a href="/dashboard/posts/restore/{{ $post->id }}"
                                                class="btn btn-success btn-sm m-auto"
                                            >
                                                <i class="fa-solid fa-rotate-left"></i>
                                            </a>
                                            <a href="/dashboard/posts/force-delete/{{ $post->id }}">
                                                <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- archive post end -->

@endsection

@section('myjsfile')
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            $("#post, #archive").DataTable({
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
    </script>
@endsection