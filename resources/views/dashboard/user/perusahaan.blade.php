@extends('dashboard.layouts.main')

@section('container')

<!-- kemnaker Start -->
<div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard" class="text-primary"
                ><i class="fa-solid fa-house-user"></i
              ></a>
            </li>
            <li class="breadcrumb-item">
              <a href="/dashboard/users" class="text-primary">
                <i class="fa-solid fa-k"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> {{$title}}
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="kemnaker-data border-0 mb-0 pb-0">
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Nama Perusahaan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $perusahaan->nama_perusahaan }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Alamat Perusahaan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $perusahaan->alamat_perusahaan }}
            </p>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label mb-0">Koordinator</label>
            <ul>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{$perusahaan->user->username}}</li>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{$perusahaan->user->no_telp}}</li>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{$perusahaan->user->alamat}}</li>
            </ul>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Kontak Pembayaran</label>
            <ul>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{ $perusahaan->kontak_pembayaran->nama_kontak }}</li>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{ $perusahaan->kontak_pembayaran->jabatan_kontak }}</li>
                <li> <i class="fa-solid fa-caret-right me-2"></i>{{ $perusahaan->kontak_pembayaran->no_telp}}</li>
            </ul>
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