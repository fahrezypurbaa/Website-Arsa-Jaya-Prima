@extends('dashboard.layouts.main')
@section('container')
<!-- staff start -->
<div class="staff-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <div class="d-flex justify-content-end">
          <a
            href="/dashboard/customer-service/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
          >
            <i class="fa-solid fa-plus me-1"></i> Tambah Staff
          </a>
        </div>
      </div>
      <div class="col-12"> 
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
        @endif
      </div>
      <div class="col-12 bg-white m-auto">
        <table id="staff" class="table m-auto" width="100%">
          <thead>
            <tr>
              <th>Nama</th>
              <th>No. Telepon</th>
              <th>Foto</th>
              <th>Status</th>
              <th>Jabatan</th>
              <th width="11%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($staff as $staff) 
            <tr>
              <td>{{ $staff->name }}</td>
              <td>{{ $staff->phone }}</td>
              <td>
                <img loading="lazy" src="{{ asset('storage/'.$staff->image) }}" class="img-fluid"
                    alt="{{ $staff->name }}" style="height: 200px; width: auto;">
              </td>
              <td>
                @if($staff->status == "1")
                    <span class="badge rounded-pill bg-success">Active</span></td>
                @endif
                @if($staff->status == "0")
                    <span class="badge rounded-pill bg-danger">Disable</span></td>
                @endif
              </td>
              <td>
                {{$staff->jabatan}}
              </td>
              <td class="option-item ">
                <a
                href="/dashboard/customer-service/{{ $staff->slug }}/edit"
                class="btn btn-secondary btn-sm m-auto"
                >
                    <i class="fa-solid fa-pencil"></i>
                </a>
                <a>
                    <form action="/dashboard/customer-service/{{ $staff->id }}" method="post" class="d-inline">
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