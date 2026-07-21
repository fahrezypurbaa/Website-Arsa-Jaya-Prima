@extends('dashboard.layouts.main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- berkas start -->
<div class="program-section section-padding px-3 py-2 ng-white rounded">
    <div class="row">
        <div class="col-12 bg-white m-auto">
            <h4 class="text-center mt-4"> Data Berkas Pelatihan</h4>
            <table id="berkas" class="table m-auto" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berkas as $berkas)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$berkas->user->username}}</td>
                        <td>{{$berkas->user->email}}</td>
                        <td>{{$berkas->user->no_telp}}</td>
                        <td class="option-item">
                            <a href="/dashboard/berkas/{{$berkas->user_id}}" class="btn btn-warning btn-sm m-auto">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a>
                                <form action="/dashboard/berkas/{{ $berkas->id }}" method="post" class="d-inline">
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
<!-- end of berkas -->
@endsection

@section('myjsfile')
<script>
    $(document).ready(function() {
        $("#berkas").DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
                sEmptyTable: "Data berkas Tidak Ditemukan",
            },
            responsive: true,
            screenX: true,
            scrollX: true,
        });
    });
</script>
@endsection