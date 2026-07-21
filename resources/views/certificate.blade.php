@extends('layouts.main')
@section('container')

<!-- Certificate Start -->
<section class="certificate-section section-padding">
<div class="responsive-container">
  <div class="row g-5">
    <div
      class="col-lg-6 wow fadeInUp"
      data-wow-delay="0.1s"
      style="
        visibility: visible;
        animation-delay: 0.1s;
        animation-name: fadeInUp;
      "
    >
      <div class="section-title mb-4 text-center text-md-start">
        <h1 class="text-capitalize mt-2">Cek Sertifikat</h1>
      </div>
      <ol>
        <li>Ketikan Nomor Sertifikat atau Nama Lengkap pada kolom pencarian</li>
        <li>Setelah selesai melakukan pengisian kolom pencarian, klik tombol “cari“</li>
        <li>Tunggu beberapa saat dan Anda akan mendapatkan hasil pencarian anda pada Tabel Informasi Sertifikat</li>    
        <li>Jika setelah beberapa kali pencarian, informasi sertifikat tidak di temukan. Anda bisa menghubungi kami di cs@arsatraining.com</li>
      </ol>
    </div>
    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="certificate-search">
            <form method="get" class="custom-form pt-2 mb-lg-0 mb-5" role="search">
                <div class="input-group bg-light border d-flex align-items-center" style="border-radius: 50px">
                    <i class="fa-solid fa-magnifying-glass input-group-text r border-0 bg-transparent"></i>
                    <input name="search" value="{{ request('search') }}" type="search" class="form-control border-0  " id="search" placeholder="Nomor Sertifikat / Nama Lengkap" required aria-label="Search">
                    <button type="submit" class="btn btn-primary cek-certificate btn-sm m-1 bordered-5" style="border-radius: 50px">Cari</button>
                </div>
            </form>

            <div class="card box border-0">
                <div class="card-body">
                    @if(count($certificate))
                      <table class="table">
                          <thead>
                            <tr>
                              <th colspan="4" class="fw-bold text-center">Data Sertifikat ARSA Training</th>
                            </tr>
                          </thead>
                          @foreach($certificate as $certificate)
                          <tbody>
                            @if ($certificate->image)
                            <tr>
                              <td colspan="4" class="m-auto text-center">
                                 <img loading="lazy" src="{{ asset('storage/' .$certificate->image) }}" class="img-fluid" alt="{{ $certificate->name }}" width="100" height="100" style="width: 100px; height: 100px;">
                              </td>
                            </tr>
                            @endif
                            <tr>
                              <th>Nomor Sertifikat</th>
                              <td>:</td>
                              <td>{{ $certificate->certificate }} <i class="fa-solid fa-circle-check text-primary"></i> </td>
                            </tr>
                            <tr>
                              <th>Nama Lengkap</th>
                              <td>:</td>
                              @if($certificate->gelar)
                              <td>{{ $certificate->name }}, {{$certificate->gelar}}</td>
                              @else <td>{{ $certificate->name }}</td>
                              @endif
                            </tr>
                            <tr>
                              <th>Asal Perusahaan</th>
                              <td>:</td>
                              <td>{{ $certificate->company }}</td>
                            </tr>
                            <tr>
                              <th>Program Pelatihan</th>
                              <td>:</td>
                              <td>{{ $certificate->training }}</td>
                            </tr>
                            <tr>
                              <th>Tanggal Pelatihan</th>
                              <td>:</td>
                              <td>{{ $certificate->periode }}</td>
                            </tr>
                            <tr>
                              <th>Status Sertifikat</th>
                              <td>:</td>
                              <td>{{ $certificate->status }}</td>
                            </tr>
                            <tr>
                              <th>Masa Berlaku</th>
                              <td>:</td>
                              <td>{{ $certificate->active_periode }}</td>
                            </tr>
                          </tbody>
                          @endforeach
                      </table>
                    @else 
                    <div class="text-center">
                      <span>Masukkan nomor sertifikat atau nama Anda untuk melakukan cek sertifikat</span>
                    </div>
                    @endif
                  </div>
            </div>
        </div>
    </div>
  </div>
</div>
</section>
<!-- Certificate End -->
@endsection