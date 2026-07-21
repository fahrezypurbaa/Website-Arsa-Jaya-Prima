@extends('dashboard.layouts.main')

@section('container')

<!-- bnsp Start -->
<div class="certicicate-section section-padding px-3 py-2 bg-white rounded">
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
              <a href="/dashboard/certificates" class="text-primary">
                <i class="fa-solid fa-file-contract"></i>
              </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-eye me-1"></i> Detail Sertifikat
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row mt-3  m-0">
      <div class="col-lg-5 m-auto">
        <div class="procedure">
            <h1 class="text-capitalize mb-3">Langkah pengecekan sertifikat</h1>
            <ol>
                <li>Ketikan Nomor Sertifikat atau Nama Lengkap pada kolom pencarian</li>
                <li>Setelah selesai melakukan pengisian kolom pencarian, klik tombol “cari“</li>
                <li>Tunggu beberapa saat dan Anda akan mendapatkan hasil pencarian anda pada Tabel Informasi Sertifikat</li>    
                <li>Jika setelah beberapa kali pencarian, informasi sertifika tidak di temukan. Anda bisa menghubungi kami di cs@arsatraining.com</li>
            </ol>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="certificate-search">
            {{-- <form method="get" class="custom-form pt-2 mb-lg-0 mb-5" role="search">
                <div class="input-group input-group-lg bg-light border" style="border-radius: 50px">
                    <i class="fa-solid fa-magnifying-glass input-group-text d-flex align-items-center border-0 bg-transparent"></i>
                    <input name="keyword" type="search" class="form-control border-0 m-auto ps-0" id="keyword" placeholder="Nomor Sertifikat atau Nama Lengkap" aria-label="Search">
                    <button type="submit" class="btn btn-primary m-1 bordered-5" style="border-radius: 50px">Cari Sertifikat</button>
                </div>
            </form> --}}
            <div class="card box border-0">
                <div class="card-header fw-bold text-center">
                    Data Sertifikat
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                          @if ($certificate->image)
                          <tr>
                            <td colspan="4" class="m-auto text-center">
                                <img loading="lazy" src="{{ asset('storage/' .$certificate->image) }}" class="img-fluid" alt="{{ $certificate->name }}" style="width: 125px;">
                            </td>
                          </tr>
                          @endif
                          <tr>
                            <th scope="row">Nomor Sertifikat</th>
                            <td>:</td>
                            <td>{{ $certificate->certificate }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Nama Lengkap</th>
                            <td>:</td>
                            @if($certificate->gelar)
                            <td>{{ $certificate->name }}, {{$certificate->gelar}}</td>
                            @else <td>{{ $certificate->name }}</td>
                            @endif
                          </tr>
                          <tr>
                            <th scope="row">Asal Perusahaan</th>
                            <td>:</td>
                            <td>{{ $certificate->company }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Program Pelatihan</th>
                            <td>:</td>
                            <td>{{ $certificate->training }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Tanggal Pelatihan</th>
                            <td>:</td>
                            <td>{{ $certificate->periode }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Status Sertifikat</th>
                            <td>:</td>
                            <td>{{ $certificate->status }}</td>
                          </tr>
                          <tr>
                            <th scope="row">Masa Berlaku</th>
                            <td>:</td>
                            <td>{{ $certificate->active_periode }}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<!-- bnsp end -->


@endsection