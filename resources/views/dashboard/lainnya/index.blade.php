@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- lainnya start -->
<div class="lainnya-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12 bg-white m-auto">
        <table
          id="lainnya"
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
            @foreach ($lainnya as $lainnya) 
                <tr>
                    <td>{{ $lainnya->created_at }}</td>
                    <td>{{ $lainnya->name }}</td>
                    <td>{{ $lainnya->email }}</td>
                    <td>
                        {{ $lainnya->phone }}
                    </td>
                    <td>
                        {{ $lainnya->training->name }}
                    </td>
                    <td>
                        @if($lainnya->progress == "Sudah")
                        <span class="badge rounded-pill bg-success">{{ $lainnya->progress }}</span></td>
                        @endif
                        @if($lainnya->progress == "Belum")
                        <span class="badge rounded-pill bg-danger">{{ $lainnya->progress }}</span></td>
                        @endif
                    </td>
                    <td class="option-item d-flex">
                        <a
                        href="/dashboard/lainnya/{{ $lainnya->slugLainnya }}"
                        class="btn btn-warning btn-sm m-auto"
                        >
                        <i class="fa-solid fa-eye me-1"></i>
                        </a>
                        <a
                        href="/dashboard/lainnya/{{ $lainnya->slugLainnya }}/edit"
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
<!-- lainnya end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#lainnya").DataTable({
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