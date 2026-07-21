@extends('dashboard.layouts.main')
@section('container')
<!-- peserta start -->
<div class="peserta-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/dashboard/peserta" class="text-primary">
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
                action="/dashboard/peserta/{{ $peserta->id }}"
                class="mb-5"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">Calon Peserta <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required autofocus value="{{ old('username', $peserta->username) }}" disabled>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_telp" class="form-label"> No Telepon<span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" required autofocus value="{{ old('no_telp', $peserta->no_telp) }}" disabled>
                    @error('no_telp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="role">Role <span class="text-danger">*</span></label>
                    <select class="form-control" id="role" name="role">
                        <option value="{{ $peserta->role }}" selected>
                            {{$peserta->role}}
                        </option>
                        <option value="Pendaftar">
                            Pendaftar
                        </option>
                        <option value="Peserta">
                            Peserta
                        </option>
                       
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