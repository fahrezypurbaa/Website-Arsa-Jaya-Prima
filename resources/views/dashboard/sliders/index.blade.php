@extends('dashboard.layouts.main')

@section('container')

<!-- slider start -->
<div class="slider-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-end">
        <a
            href="/dashboard/sliders/create"
            type="button"
            class="btn btn-success btn-sm"
            style="margin-bottom: 20px"
        >
            <i class="fa-solid fa-plus me-1"></i> Tambah Banner
        </a>
        </div>
    </div>
    <div class="col-12 bg-white m-auto">
        <table
        id="slider"
        class="table  m-auto"
        width="100%"
        >
        <thead>
            <tr>
            <th width="5%">No</th>
            <th>Judul</th>
            <th>Banner</th>
            <th>Banner Mobile</th>
            <th>Status</th>
            <th width="11%">Opsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($slider as $slider) 
            <tr>
                <td>{{  $loop->iteration  }}</td>
                <td>{{ $slider->title }}</td>
                <td>
                    @if ($slider->image)
                        <img loading="lazy" src="{{ asset('storage/' .$slider->image) }}" class="img-fluid"
                        alt="{{ $slider->name }}" style="height: 200px; width: 500px;">
                    @endif
                </td>
                <td>
                    @if ($slider->image_mobile)
                        <img loading="lazy" src="{{ asset('storage/' .$slider->image_mobile) }}" class="img-fluid"
                        alt="{{ $slider->name }}" style="height: 200px; width: 300px;">
                    @endif
                </td>
                <td>
                    @if($slider->status == "1")
                        <span class="badge rounded-pill bg-success">Active</span></td>
                    @endif
                    @if($slider->status == "0")
                        <span class="badge rounded-pill bg-danger">Disable</span></td>
                    @endif
                </td>
                <td class="option-item ">
                    <a
                    href="/dashboard/sliders/{{ $slider->slug }}/edit"
                    class="btn btn-secondary btn-sm m-auto"
                    >
                        <i class="fa-solid fa-pencil"></i>
                    </a>
                    <a>
                        <form action="/dashboard/sliders/{{ $slider->slug }}" method="post" class="d-inline">
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
<!-- slider end -->

@endsection

@section('myjsfile')
    <script>
      $(document).ready(function () {
        $("#slider").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Banner Tidak Ditemukan",
          },
          responsive: true,
          screenX: true,
          scrollX: true,
        });
      });
    </script>
@endsection