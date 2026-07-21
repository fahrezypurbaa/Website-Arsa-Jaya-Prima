@extends('dashboard.layouts.main')

@section('container')

<!-- program start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12 bg-white m-auto">
        <table
          id="program"
          class="table table-striped m-auto"
          width="100%"
        >
          <thead>
            <tr>
              <th width="5%">No</th>
              <th>Nama Program</th>
              <th>Kategori</th>
              <th width="20%">Thumbnail</th>
              <th width="25%">Opsi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trainings as $training) 
            <tr>
              <td>{{  $loop->iteration  }}</td>
              <td>{{ $training->name }}</td>
              <td>{{ $training->kategori->name }}</td>
              <td>
                @if ($training->thumbnail)
                    <img loading="lazy" src="{{ asset('storage/' .$training->thumbnail) }}" class="img-fluid w-25"
                    alt="">
                @endif
              </td>
              <td class="option-item d-flex w-100">
                <a
                  href="/dashboard/trainings/{{ $training->slug }}"
                  class="btn btn-warning btn-sm m-auto"
                >
                  <i class="fa-solid fa-eye me-1"></i>Lihat
                </a>
                <a
                  href="/dashboard/trainings/{{ $training->slug }}/restore"
                  class="btn btn-secondary btn-sm m-auto"
                >
                  <i class="fa-solid fa-pencil me-1"></i> Restore
                </a>
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