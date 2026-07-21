@extends('dashboard.layouts.main')

@section('container')

<!-- review start -->
<div class="review-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/reviews/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Testimoni
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="review"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th>Pelatihan</th>
            <th>Perusahaan</th>
            <th width="11%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($review as $review) 
            <tr>
                
                <td>{{ $loop->iteration  }}</td>
                <td>{{ $review->name }}</td>
                <td>{{ $review->training }}</td>
                <td>{{ $review->company }}</td>
                <td class="option-item ">
                    <a
                    href="/dashboard/reviews/{{ $review->slug }}/edit"
                    class="btn btn-secondary btn-sm m-auto"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/reviews/{{ $review->slug }}" method="post" class="d-inline">
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
<!-- review end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#review").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Testimoni Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection