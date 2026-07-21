@extends('dashboard.layouts.main')
@section('container')
@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- pembayaran start -->
<div class="program-section section-padding px-3 py-2 ng-white rounded">
    <div class="row">
        <div class="col-12 bg-white m-auto">
            <h4 class="text-center mt-4"> Data Pembayaran Pelatihan</h4>
            <table id="pembayaran" class="table m-auto" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengguna</th>
                        <th>Pelatihan</th>
                        <th>Bukti</th>
                        <th>Status</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pembayarans as $pembayaran)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pembayaran->username}}</td>
                        <td>{{$pembayaran->program_pelatihan}}</td>
                        <td><img src="{{asset('storage/'.$pembayaran->bukti_pembayaran)}}" alt="bukti" width="50" height="50" /></td>
                        <td>@if($pembayaran->status == null)
                            -
                            @else
                            {{$pembayaran->status}}
                            @endif
                        </td>
                        <td class="option-item">
                            <a href="/dashboard/pembayaran/{{$pembayaran->pembayaran_id}}" class="btn btn-warning btn-sm m-auto">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a
                                href="/dashboard/pembayaran/{{ $pembayaran->pembayaran_id }}/edit"
                                class="btn btn-secondary btn-sm m-auto">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <a>
                                <form action="/dashboard/pembayaran/{{ $pembayaran->pembayaran_id }}" method="post" class="d-inline">
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
<!-- end of pembayaran -->
@endsection

@section('myjsfile')
<script>
    $(document).ready(function() {
        $("#pembayaran").DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
                sEmptyTable: "Data Pembayaran Tidak Ditemukan",
            },
            responsive: true,
            screenX: true,
            scrollX: true,
        });
    });
</script>
@endsection