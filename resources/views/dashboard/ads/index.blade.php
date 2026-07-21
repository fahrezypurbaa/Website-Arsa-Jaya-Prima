@extends('dashboard.layouts.main')

@section('container')

<!-- ads start -->
<div class="ads-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/ads/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Iklan
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="ads"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th>Brosur</th>
                <th>Link</th>
                <th>Status</th>
                <th width="11%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ad as $ad) 
            <tr>
                <td>{{ $loop->iteration  }}</td>
                <td>{{ $ad->name }}</td>
                <td>
                @if ($ad->image)
                    <img loading="lazy" src="{{ asset('storage/' .$ad->image) }}" class="img-fluid"
                    alt="{{ $ad->name }}" style="height: 200px; width: auto;">
                @endif
                </td>
                <td>{{ $ad->link }}</td>
                <td>
                    @if($ad->status == "1")
                        <span class="badge rounded-pill bg-success">Active</span></td>
                    @endif
                    @if($ad->status == "0")
                        <span class="badge rounded-pill bg-danger">Disable</span></td>
                    @endif
                </td>
                <td class="option-item  m-auto">
                    <a
                    href="/dashboard/ads/{{ $ad->slug }}/edit"
                    class="btn btn-secondary btn-sm m-auto"
                    >
                    <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/ads/{{ $ad->slug }}" method="post" class="d-inline">
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
<!-- ads end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#ads").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Iklan Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection