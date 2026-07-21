@extends('dashboard.layouts.main')

@section('container')

<!-- client start -->
<div class="client-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/client/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Client
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="client"
        class="table  m-auto"
        width="100%"
        >
            <thead>
                <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th width="11%">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client) 
                <tr>
                    <td>{{  $loop->iteration  }}</td>
                    <td>{{ $client->name }}</td>
                    <td>
                    @if ($client->image)
                        <img loading="lazy" src="{{ asset('storage/' .$client->image) }}" class="img-fluid"
                        alt="{{ $client->name }}" style="height: 30px; width: 31px;">
                    @endif
                    </td>
                    <td class="option-item ">
                        <a
                        href="/dashboard/client/{{ $client->id }}/edit"
                        class="btn btn-secondary btn-sm m-auto">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a>
                            <form action="/dashboard/client/{{ $client->id }}" method="post" class="d-inline">
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
<!-- client end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#client").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Client Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection