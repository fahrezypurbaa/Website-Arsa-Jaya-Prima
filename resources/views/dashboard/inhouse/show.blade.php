@extends('dashboard.layouts.main')

@section('container')

<!-- inhouse Start -->
<div class="inhouse-section section-padding px-3 py-2 bg-white rounded">
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
              <a href="/dashboard/inhouse" class="text-primary">
                <i class="fa-solid fa-people-roof"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> Detail Pendaftar In-House Training
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="inhouse-data border-0 mb-0 pb-0">
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Nama</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $inhouse->name }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Program Training Yang Dipilih</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $inhouse->training->name }}
            </p>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label mb-0">Email</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i
              >{{ $inhouse->email }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">No. Telepon</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $inhouse->phone }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Perusahaan</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $inhouse->company }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Alamat Perushaan</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $inhouse->company_address }}
            </p>
          </div>
          <div class="mb-3">
            <label for="participant" class="form-label mb-0">Estimasi Jumlah Peserta</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $inhouse->participant }}
            </p>
          </div>
          <div class="mb-3">
            <label for="progress" class="form-label mb-0"
              >Status Follow Up</label
            >
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>{{ $inhouse->progress }}
            </p>
          </div>
          <div class="mb-3">
            <label for="staff-name" class="form-label mb-0"
              >Nama CS</label
            >
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>
                @if ($inhouse->staff)
                    {{ $inhouse->staff->name }}
                @else
                    <span>Belum Ditindaklanjuti CS</span>
                @endif
            </p>
          </div>
          <div class="mb-0">
            <a href="/dashboard/inhouse" class="btn btn-success me-1">
              <i class="fa-solid fa-arrow-left me-1"></i>Kembali
            </a>
            <a
              href="/dashboard/inhouse/{{ $inhouse->slugInhouse }}/edit"
              class="btn btn-secondary m-auto"
            >
              <i class="fa-solid fa-pencil me-1"></i> Edit
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- inhouse end -->


@endsection