@extends('dashboard.layouts.main')

@section('container')

<!-- layanan start -->
<div class="layanan-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/layanan/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Layanan
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="layanan"
        class="table  m-auto"
        width="100%"
        >
            <thead>
                <tr>
                <th width="5%">No</th>
                <th>Judul</th>
                <th>Icon</th>
                <th>description</th>
                <th width="11%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($layanans as $layanan) 
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $layanan->title }}</td>
                    <td>
                    @if ($layanan->icon)
                        <img loading="lazy" src="{{ asset('storage/' .$layanan->icon) }}" class="img-fluid"
                        alt="{{ $layanan->name }}" style="height: 30px; width: 31px;">
                    @endif
                    </td>
                    <td>
                        {!!$layanan->description!!}
                    </td>
                    <td class="option-item ">
                        <a
                        href="/dashboard/layanan/{{ $layanan->id }}/edit"
                        class="btn btn-secondary btn-sm m-auto">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a>
                            <form action="/dashboard/layanan/{{ $layanan->id }}" method="post" class="d-inline">
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
<!-- layanan end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#layanan").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Banner Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection