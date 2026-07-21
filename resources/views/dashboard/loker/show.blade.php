@extends('dashboard.layouts.main')

@section('container')

<!-- softskill Start -->
<div class="softskill-section section-padding px-3 py-2 bg-white rounded">
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
              <a href="/dashboard/softskill" class="text-primary">
                <i class="fa-solid fa-s"></i
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
        <div class="softskill-data border-0 mb-0 pb-0">
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Judul Loker</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->title }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Perusahaan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->perusahaan }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Gaji</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->gaji }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Pendidikan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->pendidikan }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Pendidikan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->pendidikan }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Pengalaman Kerja</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->pengalaman_kerja }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Lokasi</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->lokasi }}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Deskripsi Pekerjaan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{!! $loker->deskripsi_pekerjaan !!}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Deskripsi Perusahaan</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{!! $loker->deskripsi_perusahaan !!}
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Sumber</label>
            <p>
              <i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $loker->sumber}}
            </p>
          </div>
         
          <div class="mb-0">
            <a href="/dashboard/lokers" class="btn btn-success me-1">
              <i class="fa-solid fa-arrow-left me-1"></i>Kembali
            </a>
            <a
              href="/dashboard/lokers/{{ $loker->slug }}/edit"
              class="btn btn-secondary m-auto"
            >
              <i class="fa-solid fa-pencil me-1"></i> Edit
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- softskill end -->

@endsection