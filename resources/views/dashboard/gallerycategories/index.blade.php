@extends('dashboard.layouts.main')

@section('container')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-md-50 mt-3">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- category start -->
    <div
        class="category-section section-padding px-3 py-2 bg-white rounded"
    >
            <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                <a
                    href="/dashboard/gallery-categories/create"
                    type="button"
                    class="btn btn-success btn-sm"
                    style="margin-bottom: 20px"
                >
                    <i class="fa-solid fa-plus me-1"></i> Tambah Kategori
                </a>
                </div>
            </div>
            <div class="col-12 bg-white m-auto">
                <table
                id="category"
                class="table table-striped m-auto"
                width="100%"
                >
                <thead>
                    <tr>
                    <th width="5%">No</th>
                    <th>Nama Kategori</th>
                    <th width="8%">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galleryCategory as $galleryCategory) 
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $galleryCategory->name }}</td>
                        <td class="option-item d-flex">
                            <a>
                                <form action="/dashboard/gallery-categories/{{ $galleryCategory->id }}" method="post" class="d-inline">
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
    <!-- category end -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#category").DataTable({
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