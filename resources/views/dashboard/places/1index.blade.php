@extends('dashboard.layouts.main')

@section('container')

<!-- places start -->
<div class="places-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/places/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Lokasi Training
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="places"
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
            @foreach ($places as $places) 
            <tr>
                
                <td>{{  $loop->iteration  }}</td>
                <td>{{ $places->name }}</td>
                <td>
                {{-- @foreach ($places->image as $image)
                    <img loading="lazy" src="{{ asset('storage/' .$image) }}" class="img-fluid"
                    alt="{{ $places->name }}" style="height: 200px; width: auto;">
                @endforeach --}}
                {{-- @foreach($places->image as $image)
                    <img src="{{ asset('/storage/' . $image) }}"
                    class="w-20 h-20 border border-blue-600 multiple">
                @endforeach --}}
                </td>
                <td class="option-item ">
                    <a
                    href="/dashboard/places/{{ $places->slug }}/edit"
                    class="btn btn-secondary btn-sm m-auto"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/places/{{ $places->slug }}" method="post" class="d-inline">
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
<!-- places end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#places").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Lokasi Training Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection