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
          <button type="button" class="btn btn-light btn-sm" style="margin-bottom: 20px" data-bs-toggle="modal" data-bs-target="#archive-modal">
            <i class="fa-solid fa-box-archive me-1"></i> Arsip Ongoing Program
          </button>
          <a
            href="/dashboard/ongoing/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
          >
            <i class="fa-solid fa-plus me-1"></i> Tambah Ongoing Program
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
              <th>Nama Program</th>
              <th>Platform</th>
              <th>Jumlah Peserta</th>
              <th width="17%">Gambar</th>
              <th width="15%">Tanggal Pelaksanaan</th>
              <th width="15%">Tanggal Selesai</th>
              <th width="18%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trainings as $training) 
            <tr>
              <td>{{  $loop->iteration  }}</td>
              <td>{{ $training->training->name }}</td>
              <td>{{ $training->platform }}</td>
              <td>{{ $training->jumlah_peserta }}</td>
              <td>
                @if ($training->image)
                    <img loading="lazy" src="{{ asset('storage/' .$training->image) }}" class="img-fluid w-100"
                    alt="{{$training->training->name}}">
                @endif
              </td>
              <td>{{ $training->start_date }}</td>
              <td>{{ $training->end_date }}</td>
              <td class="option-item">
                <a
                  href="/dashboard/ongoing/{{ $training->id}}/edit"
                  class="btn btn-secondary btn-sm m-auto"
                >
                  <i class="fa-solid fa-pencil"></i>
                </a>
                <a>
                  <form action="/dashboard/ongoing/{{ $training->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-light btn-sm m-auto" onclick="return confirm('Apa kamu yakin akan mengarsip ongoing program {{ $training->training->name }}?')"><i class="fa-solid fa-box-archive"></i></button>
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

<!-- archive program start -->
<div class="modal fade" id="archive-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
  <div class="modal-content">
    <div class="program-section section-padding px-3 py-2 bg-white rounded">
      <div class="row">
        <div class="col-12 bg-white m-auto">
          <table
            id="archive"
            class="table table-striped m-auto nowrap"
            width="100%"
          >
            <thead>
              <tr>
                <th width="5%">No</th>
                <th>Nama Program</th>
                <th>Platform</th>
                <th>Jumlah Peserta</th>
                <th width="17%">Gambar</th>
                <th width="15%">Tanggal Pelaksanaan</th>
                <th width="15%">Tanggal Selesai</th>
                <th width="18%">Opsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($archives as $training) 
              <tr>
                <td>{{  $loop->iteration  }}</td>
                <td>{{ $training->training->name }}</td>
                <td>{{ $training->platform }}</td>
                <td>{{ $training->jumlah_peserta }}</td>
                <td>
                  @if ($training->image)
                      <img loading="lazy" src="{{ asset('storage/' .$training->image) }}" class="img-fluid w-100"
                      alt="{{$training->training->name}}">
                  @endif
                </td>
                <td>{{ $training->start_date }}</td>
                <td>{{ $training->end_date }}</td>
                <td class="option-item"> 
                  <a href="/dashboard/ongoing/restore/{{ $training->id }}"
                    class="btn btn-success btn-sm m-auto"
                  >
                    <i class="fa-solid fa-rotate-left"></i>
                  </a>
                  <a href="/dashboard/ongoing/force-delete/{{ $training->id }}">
                        <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- archive program end -->

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