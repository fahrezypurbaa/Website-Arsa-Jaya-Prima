@extends('dashboard.layouts.main')
@section('container')
<!-- pembayaran start -->
<div class="pembayaran-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard/pembayaran" class="text-primary">
                            <i class="fa-solid fa-panorama"></i></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form
                method="post"
                action="/dashboard/pembayaran/{{ $pembayaran->pembayaran_id }}"
                class="mb-5"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Calon Peserta <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $pembayaran->username) }}" disabled>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="program_pelatihan" class="form-label"> Program Pelatihan<span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('program_pelatihan') is-invalid @enderror" id="program_pelatihan" name="program_pelatihan" required autofocus value="{{ old('program_pelatihan', $pembayaran->program_pelatihan) }}" disabled>
                    @error('program_pelatihan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran<span class="text-danger">*</span></label>
                    @if ($pembayaran->bukti_pembayaran)
                    <img src="{{asset('storage/'.$pembayaran->bukti_pembayaran)}}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @endif

                </div>
                <div class="mb-3">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select class="form-control" id="status" name="status">
                        @foreach ($status as $status)
                        @if (old('status') == $status)
                        <option value="{{ $status }}" selected>
                            {{$status}}
                        </option>
                        @else
                        <option value="{{ $status }}">
                            {{$status}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-1">
                        <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                    </button>
                    <button type="reset" class="btn btn-danger">
                        <i class="fa-solid fa-rotate-right me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- bukti pembayaran end -->

@endsection