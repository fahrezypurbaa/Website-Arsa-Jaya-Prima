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
    <div class="col-12 bg-white m-auto">
      <h4 class="text-center mt-4">Data Peserta</h4>
      <table
        id="program"
        class="table m-auto"
        width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>No Telepon</th>
            <th>Program</th>
            <th>Role</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($peserta as $peserta)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peserta->username }}</td>
            <td>{{ $peserta->no_telp }}</td>
            <td>{{ $peserta->training_name }}</td>
            <td>{{ $peserta->role }}</td>
            <td>
              <a href="/dashboard/peserta/{{$peserta->id}}/edit"
                class="btn btn-secondary btn-sm m-auto">
                <i class="fa-solid fa-pencil"></i>
              </a>
              <form action="/dashboard/peserta/{{$peserta->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger btn-sm m-auto" onclick="return confirm('Apa kamu yakin?')"><i class="fa-solid fa-trash-can"></i></button>
              </form>
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
  $(document).ready(function() {
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