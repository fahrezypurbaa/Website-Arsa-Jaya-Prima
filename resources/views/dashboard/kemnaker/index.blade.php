@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- kemnaker start -->
<div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12 bg-white m-auto">
      <a href="/kemnaker-excel" class="btn btn-success mb-2"> <i class="fa-solid fa-file-excel"></i></a>
        <table
          id="kemnaker"
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
              <th>Kategori Peserta</th>
              <th>Status Follow Up</th>
              <th width="11%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kemnaker as $item) 
                <tr>
                    {{-- data-order pakai timestamp supaya DataTables urut benar --}}
                    <td data-order="{{ $item->created_at->timestamp }}">
                        {{ $item->created_at->format('d-m-Y') }}
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->training?->name ?? '-' }}</td>
                    <td>
                        @if($item->progress == "Sudah")
                            <span class="badge rounded-pill bg-success">{{ $item->progress }}</span>
                        @elseif($item->progress == "Belum")
                            <span class="badge rounded-pill bg-danger">{{ $item->progress }}</span>
                        @endif
                    </td>
                    <td>{{ $item->kategori_peserta }}</td>
                    <td class="option-item d-flex">
                        <a href="{{ route('kemnaker.show',  $item->id) }}" class="btn btn-warning btn-sm m-auto"
                          class="btn btn-warning btn-sm m-auto"
                          >
                            <i class="fa-solid fa-eye me-1"></i>
                        </a>
                        <a href="{{ route('kemnaker.edit',  $item->id) }}" class="btn btn-secondary btn-sm m-auto">
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
<!-- kemnaker end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#kemnaker").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Pendaftar Tidak Ditemukan",
          },
          searching: true,
          paging: true,
          ordering: true,
          info: true,
          scrollX: true,
          order: [[0, 'asc']] // urut default berdasarkan kolom tanggal
        });
  });
</script>
@endsection
