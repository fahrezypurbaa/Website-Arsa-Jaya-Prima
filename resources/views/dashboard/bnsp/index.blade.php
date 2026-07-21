@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- bnsp start -->
<div class="bnsp-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12 bg-white m-auto">
        <a href="/bnsp-excel" class="btn btn-success mb-2"> <i class="fa-solid fa-file-excel"></i></a>
        <table
          id="bnsp"
          class="table table-striped m-auto"
          width="100%"
        >
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Perusahaan</th>
              <th>No. Telp</th>
              <th>Program</th>
              <th>Kategori Peserta</th>
              <th>Status Follow Up</th>
              <th width="11%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bnsp as $bnsp) 
                <tr>
                    <td>{{ $bnsp->created_at }}</td>
                    <td>{{ $bnsp->name }}</td>
                    <td>{{ $bnsp->company }}</td>
                    <td>
                        {{ $bnsp->phone }}
                    </td>
                    <td>
                        {{ $bnsp->training->name }}
                    </td>
                    <td>{{ $bnsp->kategori_peserta }}</td>
                    <td>
                        @if($bnsp->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $bnsp->progress }}</span></td>
                        @endif
                        @if($bnsp->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $bnsp->progress }}</span></td>
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/bnsp/{{ $bnsp->slugBnsp }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>
                        </a>
                        <a
                        href="/dashboard/bnsp/{{ $bnsp->slugBnsp }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil me-1"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
<!-- bnsp end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#bnsp").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
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