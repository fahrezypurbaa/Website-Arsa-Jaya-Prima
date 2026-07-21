@extends('dashboard.layouts.main')
@section('container')
    <!-- staff start -->
    <div class="staff-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/dashboard/customer-service" class="text-primary">
                                <i class="fa-brands fa-whatsapp"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa fa-plus me-1"></i> Tambah Customer Service
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="/dashboard/customer-service" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                            id="name" required autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3" hidden>
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" required value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone">No. Telepon <span class="text-danger"> (Gunakan +62)</span></label>
                        <input type="text" name="phone" class="form-control @error('phone')is-invalid @enderror"
                            id="phone" autofocus value="{{ old('phone') }}">
                        @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Foto <span class="text-danger">*</span></label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                            name="image" required onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
                        <input type="text" name="jabatan" class="form-control @error('jabatan')is-invalid @enderror"
                            id="jabatan" required autofocus value="{{ old('jabatan') }}">
                        @error('jabatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">Status <span class="text-danger">*</span></label>
                        <select class="form-control" id="status" name="status">
                            @foreach ($status as $status)
                                @if (old('status') == $status)
                                    <option value="{{ $status }}" selected>
                                        @if ($status == '1')
                                            Active
                                        @endif
                                        @if ($status == '0')
                                            Disable
                                        @endif
                                    </option>
                                @else
                                    <option value="{{ $status }}">
                                        @if ($status == '1')
                                            Active
                                        @endif
                                        @if ($status == '0')
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
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/customer-service/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

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
