@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- facility start -->
<div class="facility-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/facilities/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Fasilitas
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="facility"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Status</th>
            <th width="11%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facilities as $facility) 
            <tr>
                
                <td>{{ $loop->iteration  }}</td>
                <td>{{ $facility->name }}</td>
                <td>
                @if ($facility->image)
                    <img loading="lazy" src="{{ asset('storage/' .$facility->image) }}" class="img-fluid"
                    alt="{{ $facility->name }}" style="height: 200px; width: auto;">
                @endif
                </td>
                <td>  
                @if($facility->status == "1")
                    <span class="badge rounded-pill bg-success">Active</span></td>
                @endif
                @if($facility->status == "0")
                    <span class="badge rounded-pill bg-danger">Disable</span></td>
                @endif
                </td>
                <td class="option-item d-flex">
                    <a
                        href="/dashboard/facilities/{{ $facility->id }}/edit"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/facilities/{{ $facility->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
<!-- facility end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#facility").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Fasilitas Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection