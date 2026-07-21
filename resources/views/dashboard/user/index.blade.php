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
      <h4 class="text-center mt-4">Data User</h4>
      <table
        id="program"
        class="table m-auto"
        width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Foto</th>
            <th>Role</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th style="width: 20%;">Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->username }}</td>
            <td>
              @if($user->picture )
              <img loading="lazy" src="{{ asset('storage/' .$user->picture) }}" class="img-fluid"
                alt="{{ $user->username }}" style="height: 70px; width: 70px">
              @endif
            </td>
            <td>{{ $user->role }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->jabatan }}</td>
            <td>{{ $user->tempat_lahir }}</td>
            <td>{{ $user->tanggal_lahir }}</td>
            <td class="option-item">
              <a
                href="/dashboard/users/{{$user->id}}"
                class="btn btn-warning btn-sm m-auto">
                <i class="fa-solid fa-eye"></i>
              </a>
              <form action="/dashboard/users/{{$user->id}}" method="post" class="d-inline">
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

    <div class="col-12 bg-white mt-5">
    <h4 class="text-center mt-4">Data Perusahaan</h4>
      <table
        id="program"
        class="table m-auto"
        width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($perusahaan as $perusahaan)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $perusahaan->nama_perusahaan }}</td>
            <td>{{ $perusahaan->alamat_perusahaan }}</td>
            <td class="option-item">
              <a
                href="/dashboard/users/perusahaan/show/{{$perusahaan->id}}"
                class="btn btn-warning btn-sm m-auto">
                <i class="fa-solid fa-eye"></i>
              </a>
              <form action="/dashboard/users/perusahaan/{{$perusahaan->id}}" method="post" class="d-inline">
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