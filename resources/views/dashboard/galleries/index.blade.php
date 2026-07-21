@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- photos start -->
<div class="photos-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/galleries/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Foto Galeri
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="photos"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th>Program</th>
            <th>Jadwal</th>
            <th>Gambar</th>
            <th width="8%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($photos as $photo) 
            <tr>
                
                <td>{{  $loop->iteration  }}</td>
                <td>{{ $photo->gallery_detail->name }}</td>
                <td>{{ $photo->gallery_detail->training }}</td>
                <td>{{ $photo->gallery_detail->schedule }}</td>
                <td> 
                @if ($photo->photo)
                    <img loading="lazy" src="{{ asset('storage/photo->images/' .$photo->photo) }}" class="img-fluid"
                    alt="{{ $photo->gallery_detail->name}}" style="height: 200px; width: auto;">
                @endif
                </td>
                <td class="option-item d-flex ">
                <a
                        href="/dashboard/galleries/edit/{{ $photo->id }}"
                        class="btn btn-secondary btn-sm m-auto"
                        >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a href="/dashboard/galleries/delete/{{ $photo->id }}" >
                        <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                    </a>
                    {{-- <a>
                        <form action="/dashboard/photos/{{ $photo->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </a> --}}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    </div>
</div>
<!-- photos end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#photos").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Foto Galeri Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection