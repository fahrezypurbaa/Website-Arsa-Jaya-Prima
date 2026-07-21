@extends('dashboard.layouts.main')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show w-md-50 mt-3">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <!-- Instructor Start -->
    <div class="instructor-section section-padding px-3 py-2 bg-white rounded">
         <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                <a
                    href="/dashboard/instructors/create"
                    type="button"
                    class="btn btn-success btn-sm"
                    style="margin-bottom: 20px"
                >
                    <i class="fa-solid fa-plus me-1"></i> Tambah Instruktur 
                </a>
                </div>
            </div>
            <div class="col-12 bg-white">
                <div class="row">
                @foreach ($instructors as $instructor)
                <div class="modal fade" id="value-{{$instructor->id}}" tabindex="-1" role="dialog" aria-labelledby="value-{{$instructor->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-window-close"></i>
                                </button>
                            </div>
                            <div class="modal-body  confirmation-delete">
                                <i class="fa-solid fa-trash-can"></i>
                                <div class="trash-view">
                                    <h6>Apakah Anda yakin?</h6>
                                    Harap konfirmasi jika Anda yakin ingin melanjutkan tindakan ini
                                </div>
                                <form action="/dashboard/instructors/{{ $instructor->slug }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="form-control mb-3 btn-delete">Hapus  </button>
                                </form> 
                                <a href="/dashboard/instructors" class="form-control cancel-btn">
                                    Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3 mb-3">
                    <div class="card text-center trainee pb-4">
                        <div class="card-title">
                            @if ($instructor->image)
                                <img loading="lazy" src="{{ asset('storage/' .$instructor->image) }}" class="img-fluid"
                                alt="{{ $instructor->name}}" style="height: 100px; width: auto;">
                            @endif
                            <br/>
                            <span>{{ $instructor->name}}</span>
                        </div>
                        <div class="card-body">
                            {{ strip_tags($instructor->skill)}}
                        </div>
                        <div class="opsi">
                            <button>
                                <a href="/dashboard/instructors/{{ $instructor->slug }}/edit">
                                Edit
                                </a>
                            </button>
                            <button type="button" class="bg-danger" data-bs-toggle="modal" data-bs-target="#value-{{$instructor->id}}">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
                </div>
               
            </div>
            </div>
    </div>
  
    <!-- Instructor End -->

@endsection

@section('myjsfile')
<script>
  $(document).ready(function () {
        $("#instructors").DataTable({
          language: {
            url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/id.json",
            sEmptyTable: "Data Tidak Ditemukan",
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