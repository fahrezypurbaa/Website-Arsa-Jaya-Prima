@extends('dashboard.layouts.main')
@section('container')

<!-- Certificate Start -->
<div class="certificate-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/certificates" class="text-primary">
                    <i class="fa-solid fa-file-contract"></i>
                </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-plus me-1"></i> Tambah Sertifikat
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form
            method="post"
            action="/dashboard/certificates/{{ $certificate->slug }}"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="picture" class="form-label">Foto</label>
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <input
                    type="hidden"
                    name="oldPicture"
                    value="{{ $certificate->image }}"
                    />
                    @if ($certificate->image)
                    <img
                    src="{{ asset('storage/' .$certificate->image) }}"
                    class="img-preview img-fluid mb-3 col-sm-5 d-block"
                    style="width: 100px; height: 100px"
                    />
                    @else
                    <img
                    class="img-preview img-fluid mb-3 col-sm-5"
                    style="width: 100px; height: 100px"
                    />
                    @endif
                    <div class="button-wrapper">
                        <label
                            for="image"
                            class="btn btn-primary me-2 mb-2"
                            tabindex="0"
                        >
                            <span class="d-none d-sm-block">Unggah Foto Baru</span>
                            <i class="fa-solid fa-upload d-block d-sm-none"></i>
                            <input
                            class="form-control @error('image') is-invalid @enderror"
                            type="file"
                            id="image"
                            name="image"
                            onchange="previewImage()"
                            hidden
                            />
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </label>
                        <p class="text-muted mb-0">Maks. 100KB</p>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="certificate" class="form-label">Nomor Sertifikat <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('certificate') is-invalid @enderror" id="certificate" name="certificate" required autofocus value="{{ old('certificate', $certificate->certificate) }}">
                @error('certificate')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $certificate->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gelar" class="form-label">Gelar <span class="text-danger"></span></label>
                <input type="text" class="form-control @error('gelar') is-invalid @enderror" id="gelar" name="gelar" autofocus value="{{ old('gelar', $certificate->gelar) }}">
                @error('gelar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3" hidden>
                <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $certificate->slug) }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="company" class="form-label">Asal Perusahaan <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" required autofocus value="{{ old('company', $certificate->company) }}">
                @error('company')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="training" class="form-label">Program Training<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('training') is-invalid @enderror" id="training" name="training" required autofocus value="{{ old('training', $certificate->training) }}">
                @error('training')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="periode" class="form-label">Tanggal Training<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('periode') is-invalid @enderror" id="periode" name="periode" required autofocus value="{{ old('periode', $certificate->periode) }}">
                @error('periode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status Sertifikat<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" required autofocus value="{{ old('status', $certificate->status) }}">
                @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="active_periode" class="form-label">Masa Berlaku</label>
                <input type="text" class="form-control @error('active_periode') is-invalid @enderror" id="active_periode" name="active_periode" value="{{ old('active_periode', $certificate->active_periode) }}">
                @error('active_periode')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
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
<!-- Category End -->
@endsection

@section('myjsfile')
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/certificates/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script> 
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