@extends('dashboard.layouts.main')

@section('container')
    <!-- kemnaker Start -->
    <div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/dashboard/kemnaker" class="text-primary">
                                <i class="fa-solid fa-list"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa-solid fa-eye me-1"></i> Detail Pendaftar Sertifikasi Kemnaker RI
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="kemnaker-data border-0 mb-0 pb-0">
                    @php
                        use Illuminate\Support\Str;
                        $slug = Str::slug($kemnaker->name);
                    @endphp

                    <div class="mb-3">
                        <label class="form-label mb-0">Nama</label>
                        <p><i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $kemnaker->name ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Program Training Yang Dipilih</label>
                        <p><i class="fa-solid fa-caret-right ms-2 me-2"></i>{{ $kemnaker->training?->name ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Email</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->email ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">No. Telepon</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->phone ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Kategori Peserta</label>
                        <p>
                            <i class="fa-solid fa-caret-right me-2"></i>
                            @if ($kemnaker->kategori_peserta == 'pribadi')
                                Pribadi
                            @elseif($kemnaker->kategori_peserta == 'utusan_perusahaan')
                                Utusan Perusahaan
                            @else
                                -
                            @endif
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Sumber Informasi</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->sumber_informasi ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Alamat Perusahaan</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->company_address ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Kategori Paket</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->kategori_paket ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Status Follow Up</label>
                        <p><i class="fa-solid fa-caret-right me-2"></i>{{ $kemnaker->progress ?? '-' }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label mb-0">Nama CS</label>
                        <p>
                            <i class="fa-solid fa-caret-right me-2"></i>
                            {{ $kemnaker->staff?->name ?? 'Belum Ditindaklanjuti CS' }}
                        </p>
                    </div>

                    <div class="mb-0">
                        <a href="/dashboard/kemnaker" class="btn btn-success me-1">
                            <i class="fa-solid fa-arrow-left me-1"></i>Kembali
                        </a>
                        <a href="{{ $kemnaker->id . '-' . $slug ? route('kemnaker.edit', $kemnaker->id . '-' . $slug) : '#' }}" class="btn btn-secondary m-auto">
                            <i class="fa-solid fa-pencil me-1"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- kemnaker end -->
@endsection
