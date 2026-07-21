@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- inhouse start -->
<div class="inhouse-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12 bg-white m-auto">
        <a href="/inhouse-excel" class="btn btn-success mb-2"> <i class="fa-solid fa-file-excel"></i></a>
        <table
          id="inhouse"
          class="table table-striped m-auto"
          width="100%"
        >
          <thead>
            <tr>
              <th>Tanggal</th>
              <th>Nama</th>
              <th>Email</th>
              <th>No. Telp</th>
              <th>Program</th>
              <th>Status Follow Up</th>
              <th width="11%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inhouse as $inhouse) 
                <tr>
                    <td>{{ $inhouse->created_at }}</td>
                    <td>{{ $inhouse->name }}</td>
                    <td>{{ $inhouse->email }}</td>
                    <td>
                        {{ $inhouse->phone }}
                    </td>
                    <td>
                        {{ $inhouse->training->name }}
                    </td>
                    <td>
                        @if($inhouse->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $inhouse->progress }}</span></td>
                        @endif
                        @if($inhouse->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $inhouse->progress }}</span></td>
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/inhouse/{{ $inhouse->slugInhouse }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>
                        </a>
                        <a
                        href="/dashboard/inhouse/{{ $inhouse->slugInhouse }}/edit"
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
<!-- inhouse end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#inhouse").DataTable({
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