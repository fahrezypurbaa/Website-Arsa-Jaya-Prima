@extends('dashboard.layouts.main')
@section('container')
<!-- pembayaran start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard/pembayaran" class="text-primary">
                            <i class="fa-regular fa-calendar"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fa-solid fa-eye me-1"></i> Lihat Pembayaran
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card text-center schedule-box box schedule-item border-0">
                <div class="card-body p-0">
                    @if ($pembayaran->bukti_pembayaran)
                        <img loading="lazy" src="{{ asset('storage/'.$pembayaran->bukti_pembayaran) }}" class="img-fluid"
                        alt="gambar">
                    @endif
                </div>
                <div class="card-footer border-0">
                    <span class="p-2 m-0 ">{{ $pembayaran->create_at }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection