@extends('dashboard.layouts.main')
@section('container')

<!-- staff start -->
<div class="staff-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/dashboard" class="text-primary"
                ><i class="fa-solid fa-house-user"></i
              ></a>
            </li>
            <li class="breadcrumb-item">
              <a href="/dashboard/staff" class="text-primary">
                <i class="fa-solid fa-users-rectangle"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa fa-plus me-1"></i> Tambah Staff
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form
            method="post"
            action="/dashboard/staff"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <input type="hidden" name="oldPicture" value="{{ auth()->user()->picture }}">
                <img src="{{ asset('img/profile-picture.webp') }}" class="img-preview img-fluid d-block d-block rounded" style="width: 110px; height: 100px">
                <div class="button-wrapper">
                    <label
                        for="image"
                        class="btn btn-primary me-2 mb-2"
                        tabindex="0"
                    >
                        <span class="d-none d-sm-block">Unggah Foto Baru</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input class="form-control @error('picture') is-invalid @enderror" type="file" id="image" name="picture" onchange="previewImage()" hidden>
                    </label>
                    <p class="text-muted mb-0">
                        Maks. 100KB
                    </p>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" required autofocus value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username">Username <span class="text-danger">*</span></label>
                <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" required autofocus value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" required autofocus value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" required autofocus>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status">Status <span class="text-danger">*</span></label>
                {{-- <input type="status" name="status" class="form-control rounded-bottom @error('status')is-invalid @enderror" id="status" required autofocus>
                @error('status')
                <div class="invalid-feedback">
                    {{ $message }}
                </div> --}}
                {{-- @enderror --}}
                <select class="form-control" id="status" name="status">
                    @foreach ($status as $status)
                        @if (old('status') == $status)
                            <option value="{{ $status }}" selected>
                                @if($status == '1')
                                Active
                                @endif
                                @if($status == '0')
                                Disable
                                @endif
                            </option>
                        @else
                            <option value="{{ $status }}">
                                @if($status == '1')
                                Active
                                @endif
                                @if($status == '0')
                                Disable
                                @endif
                            </option>
                        @endif
                        {{-- <option value="{{ $certificate }}" selected>{{ $certificate }}</option> --}}
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
<!-- staff end -->

@endsection

@section('myjsfile')
<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection