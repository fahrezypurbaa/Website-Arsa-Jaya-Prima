
@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- dashboard start -->
<div class="dashboard-section section-padding">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <a href="/dashboard/kemnaker">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h6 class="card-title">Pendaftar Kemnaker RI</h6>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-k"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $kemnaker }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a href="/dashboard/bnsp">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h6 class="card-title">Pendaftar BNSP</h6>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-b"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $bnsp }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-6">
          <a href="/dashboard/softskill">
            <div class="card info-card programs-card">
              <div class="card-body">
                <h6 class="card-title">Pendaftar Softskill</h6>
                <div class="d-flex align-items-center">
                  <div
                    class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                  >
                    <i class="fa-solid fa-s"></i>
                  </div>
                  <div
                    class="ps-3 d-flex justify-content-center align-items-center"
                  >
                    <h6 class="mb-0 me-2">{{ $softskill }}</h6>
                    <span class="text-muted small">Pendaftar</span>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
        <div class="col-12 mt-2">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h6 class="card-title">
                Request Inhouse <span>| Baru</span>
              </h6>
              <table id="inhouse" class="table table-striped w-100">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Program</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($inhouse as $inhouse)
                  <tr>
                    <td>{{ $inhouse->name }}</td>
                    <td>{{ $inhouse->email }}</td>
                    <td>{{ $inhouse->training->name }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-12 mt-2">
          <div class="card recent-sales overflow-auto">
            <div class="card-body">
              <h6 class="card-title">
                Pesan <span>| Baru</span>
              </h6>
              <table id="message" class="table table-striped w-100">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                  <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->excerpt }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="row me-0">
        <div class="card">
          <div class="card-body pb-0">
            <h6 class="card-title">Artikel <span>| Terbaru</span></h6>
            <div class="news">
              @foreach($posts as $post)
              <div class="post-item clearfix  d-flex align-items-center">
                <img src="{{ asset('storage/' .$post->image) }}" alt="{{ $post->name }}" />
                <h4 class="text-capitalize ms-2">
                  <a href="/blog/{{ $post->slug }}" target="_blank">{{ $post->title }}</a>
                </h4>
              </div>
              <hr>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- dashboard end -->
@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#message").DataTable({
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
  $(document).ready(function () {
        $("#inhouse").DataTable({
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