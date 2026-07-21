@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- program start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
  <div class="row">
    <div class="col-12 bg-white m-auto">
      <h4 class="text-center mt-4">{{$title}}</h4>
      <table
        id="program"
        class="table m-auto"
        width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>No Telepon</th>
            <th>Pelatihan</th>
            <th>Bukti</th>
            <th>Waktu</th>
            <th>Status</th>
            <th style="width: 20%;">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($absensi as $absensi)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $absensi->username }}</td>
            <td>{{ $absensi->no_telp }}</td>
            <td>{{ $absensi->name }}</td>
            <td>
              <img loading="lazy" src="{{ asset('storage/' .$absensi->foto_absensi) }}" class="img-fluid"
                alt="{{ $absensi->username }}" style="height: 50px; width: auto;">
            </td>
            <?php
            $start_date = \Carbon\Carbon::parse($absensi->start_date)->locale('id')->isoFormat('D MMMM YYYY');
            $end_date = \Carbon\Carbon::parse($absensi->end_date)->locale('id')->isoFormat('D MMMM YYYY');
            ?>
            <td>{{ $start_date }} - {{ $end_date}}</td>
            <td>{{$absensi->is_open}}</td>
            <td>
              <a href="#" class="btn btn-secondary btn-sm m-auto">
                <i class="fa-solid fa-pencil"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- program end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function() {
    $("#program, #archive").DataTable({
      language: {
        url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
        sEmptyTable: "Program Tidak Ditemukan",
      },
      responsive: true,
      screenX: true,
      scrollX: true,
    });
  });
</script>
@endsection