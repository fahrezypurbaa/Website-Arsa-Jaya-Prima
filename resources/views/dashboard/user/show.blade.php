@extends('dashboard.layouts.main')

@section('container')

<!-- kemnaker Start -->
<div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-primary">
                            <i class="fa-solid fa-house-user"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard/users" class="text-primary">
                            <i class="fa-solid fa-k"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa-solid fa-eye me-1"></i> Detail User
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
            <div class="kemnaker-data border-0 mb-0 pb-0">
                <div class="mb-3">
                    <label for="name" class="form-label mb-0">Nama</label>
                    <p>
                        <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $user->username }} ({{ $user->role }})
                    </p>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label mb-0">Email</label>
                    <p>
                        <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $user->email }}
                    </p>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label mb-0">Jabatan</label>
                    <p class="ms-2">
                        <i class="fa-solid fa-caret-right me-2"></i>{{ $user->jabatan }}
                    </p>
                </div>
                <div class="mb-3">
                      <label for="perusahaan" class="form-label mb-0">Perusahaan</label>
                      <p class="ms-2">
                          @if($user->perusahaans)
                              <i class="fa-solid fa-caret-right me-2"></i>{{ $user->perusahaans->nama_perusahaan }}
                          @else
                              -
                          @endif
                      </p>
                  </div>

                    </p>
                </div>
                <div class="mb-3">
                    <label for="tempat_lahir" class="form-label mb-0">Tempat Lahir</label>
                    <p class="ms-2">
                        <i class="fa-solid fa-caret-right me-2"></i>{{ $user->tempat_lahir }}
                    </p>
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label mb-0">Tanggal Lahir</label>
                    <p class="ms-2">
                        <i class="fa-solid fa-caret-right me-2"></i>{{ $user->tanggal_lahir }}
                    </p>
                </div>
                <div class="mb-0">
                    <a href="/dashboard/users" class="btn btn-success me-1">
                        <i class="fa-solid fa-arrow-left me-1"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- kemnaker end -->

@endsection
