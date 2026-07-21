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
                        <th>Nama Berkas</th>
                        <th>Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($berkass as $berkas)
                    <div class="modal fade" id="value-{{$berkas->berkas_file}}" tabindex="-1" role="dialog" aria-labelledby="value-{{$berkas->berkas_file}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <object data="{{ asset('storage/'.$berkas->berkas_file) }}" type="application/pdf" width="100%" height="500px">
                                    <p>Unable to display PDF file. <a href="{{ asset('storage/'.$berkas->berkas_file) }}">Download</a> instead.</p>
                                </object>
                            </div>
                        </div>
                    </div>
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$berkas->filename}}</td>
                        <td>
                            <a href="/dashboard/berkas/{{$berkas->user_id}}" class="btn btn-warning btn-sm m-auto" data-bs-toggle="modal" data-bs-target="#value-{{$berkas->berkas_file}}">
                                <i class="fa-solid fa-eye"></i>
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
@endsectionq