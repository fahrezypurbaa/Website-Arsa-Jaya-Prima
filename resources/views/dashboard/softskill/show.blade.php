@extends('dashboard.layouts.main')

@section('container')

<!-- softskill Start -->
<div class="softskill-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
            </li>
            <li class="breadcrumb-item">
              <a href="/dashboard/softskill" class="text-primary"><i class="fa-solid fa-s"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> Detail Pendaftar Training Softskill
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="softskill-data border-0 mb-0 pb-0">
          @php use Illuminate\Support\Str; @endphp
          @php
            $slug = Str::slug($softskill->name);
            $slugUrl = $softskill->id . '-' . $slug;
          @endphp

          <div class="mb-3">
            <label for="name" class="form-label mb-0">Nama</label>
            <p><i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $softskill->name }}</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Program Training Yang Dipilih</label>
            <p><i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $softskill->training->name }}</p>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label mb-0">Email</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->email }}</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">No. Telepon</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->phone }}</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Kategori Peserta</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>
              @if($softskill->kategori_peserta == 'pribadi')
                Pribadi
              @elseif($softskill->kategori_peserta == 'utusan_perusahaan')
                Utusan Perusahaan
              @endif
            </p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Sumber Informasi</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->sumber_informasi }}</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Perusahaan</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->company }}</p>
          </div>
          <div class="mb-3">
            <label for="name" class="form-label mb-0">Alamat Perusahaan</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->company_address }}</p>
          </div>
          <div class="mb-3">
            <label for="kategori_paket" class="form-label mb-0">Kategori Paket</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->kategori_paket }}</p>
          </div>
          <div class="mb-3">
            <label for="progress" class="form-label mb-0">Status Follow Up</label>
            <p class="ms-2"><i class="fa-solid fa-caret-right me-2"></i>{{ $softskill->progress }}</p>
          </div>
          <div class="mb-3">
            <label for="staff-name" class="form-label mb-0">Nama CS</label>
            <p class="ms-2">
              <i class="fa-solid fa-caret-right me-2"></i>
              @if ($softskill->staff)
                {{ $softskill->staff->name }}
              @else
                <span>Belum Ditindaklanjuti CS</span>
              @endif
            </p>
          </div>
          <div class="mb-0">
            <a href="/dashboard/softskill" class="btn btn-success me-1">
              <i class="fa-solid fa-arrow-left me-1"></i>Kembali
            </a>
            <a href="{{ route('softskill.edit', $slugUrl) }}" class="btn btn-secondary m-auto">
              <i class="fa-solid fa-pencil me-1"></i> Edit
            </a>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- softskill end -->

@endsection
