@extends('dashboard.layouts.main')

@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- schedule start -->
<div class="schedule-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/schedules/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Jadwal
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="schedule"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
            <th width="5%">No</th>
            <th>Judul</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Kategori</th>
            <th>Status</th>
            <th width="18%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule) 
            <tr>
                <td>{{  $loop->iteration  }}</td>
                <td>{{ $schedule->name }}</td>
                @if(!empty($schedule->start_date))
                    <td>{{$schedule->start_date}}</td>
                @else
                    <td></td>
                @endif
                @if(!empty($schedule->end_date))
                  <td>{{$schedule->end_date}}</td>
                @else
                    <td></td>
                @endif
                @if($schedule->training)
                <td>{{ $schedule->training->name}}</td>
                 @else
                    <td></td>
                @endif
                @if($schedule->is_open != 0)
                <td> Buka </td>
                @else
                <td> Tutup </td>
                @endif
                
                <td class="option-item ">
                    <a
                    href="/dashboard/schedules/{{ $schedule->slug }}"
                    class="btn btn-warning btn-sm m-auto"
                    >
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a
                    href="/dashboard/schedules/{{ $schedule->slug }}/edit"
                    class="btn btn-secondary btn-sm m-auto"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/schedules/{{ $schedule->slug }}" method="post" class="d-inline">
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
<!-- schedule end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#schedule").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Jadwal Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection