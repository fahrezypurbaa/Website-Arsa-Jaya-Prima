@extends('dashboard.layouts.main')
@section('container')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- staff start -->
<div class="staff-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-between">
          <a href="/dashboard/staff/forget-password" type="button" class="btn btn-light btn-sm" style="margin-bottom: 20px" >
            <i class="fa-solid fa-key me-1"></i> Reset Password
          </a>
          <a
            href="/dashboard/staff/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
          >
            <i class="fa-solid fa-plus me-1"></i> Tambah Staff
          </a>
        </div>
      </div>
      <div class="col-12 bg-white m-auto">
        <table id="staff" class="table table-striped m-auto" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>Status</th>
              <th width="10%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($user as $user) 
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>
                @if($user->status == "1")
                    <span class="badge rounded-pill bg-success">Active</span></td>
                @endif
                @if($user->status == "0")
                    <span class="badge rounded-pill bg-danger">Disable</span></td>
                @endif
              </td>
              <td class="option-item d-flex w-100">
                <a
                  href="/dashboard/staff/{{ $user->id }}/edit"
                  class="btn btn-secondary btn-sm m-auto"
                >
                  <i class="fa-solid fa-pencil"></i>
                </a>
                {{-- <a href="/dashboard/staff/{{ $user->id }}/reset-password" class="btn btn-warning btn-sm m-auto"><i class="fa-solid fa-key"></i></a> --}}
                {{-- <a href="{{ route('forgot.password.form') }}" class="btn btn-warning btn-sm m-auto"><i class="fa-solid fa-key"></i></a> --}}
                <a href="/dashboard/staff/{{ $user->id }}/resend-email" class="btn btn-light btn-sm m-auto"><i class="fa-regular fa-paper-plane"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>
<!-- staff end -->
@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#staff").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Staff Tidak Ditemukan",
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