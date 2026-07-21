@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- program start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between">
          <a
            href="/dashboard/lokers/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
          >
            <i class="fa-solid fa-plus me-1"></i> Tambah Loker
          </a>
        </div>
      </div>
      <div class="col-12 bg-white m-auto">
        <table
          id="program"
          class="table m-auto"
          width="100%"
        >
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Judul</th>
              <th>Logo</th>
              <th>Perusahaan</th>
              <th>Gaji</th>
              <th>Sumber</th>
              <th>Waktu</th>
              <th width="20%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($lokers as $loker) 
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $loker->title }}</td>
              <td>
                @if ($loker->logo_perusahaan)
                    <img loading="lazy" src="{{$loker->logo_perusahaan}}" class="img-fluid w-100"
                    alt="{{$loker->title}}">
                    <!--<img loading="lazy" src="{{ asset('storage/' . $loker->logo_perusahaan)}}" class="img-fluid w-100"-->
                    <!--alt="{{$loker->title}}">-->
                @endif
              </td>
              <td>{{ $loker->perusahaan }}</td>
              <td>{{ $loker->gaji }}</td>
              <td>{{ $loker->sumber }}</td>
              <td>{{ $loker->waktu }}</td>
              <td class="option-item">
                <a
                  href="/dashboard/lokers/{{ $loker->slug }}"
                  class="btn btn-warning btn-sm m-auto"
                >
                  <i class="fa-solid fa-eye"></i>
                </a>
                <a
                  href="/dashboard/lokers/{{ $loker->id }}/edit"
                  class="btn btn-secondary btn-sm m-auto"
                >
                  <i class="fa-solid fa-pencil"></i>
                </a>
                <a>
                  <form action="/dashboard/lokers/{{ $loker->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-light btn-sm m-auto" onclick="return confirm('Apa kamu yakin akan menghapus {{ $loker->name }}?')"><i class="fa-solid fa-trash-can"></i></button>
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
<!-- program end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#program, #archive").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Program Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection