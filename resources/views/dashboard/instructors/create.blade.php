@extends('dashboard.layouts.main')
@section('container')

<!-- Instructor Start -->
<div class="instructor-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/instructors" class="text-primary">
                    <i class="fa-solid fa-user-tie"></i>
                </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-plus me-1"></i> Tambah Instruktur
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form
            method="post"
            action="/dashboard/instructors"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{ asset('img/profile-picture.webp') }}" class="img-preview img-fluid d-block d-block rounded" style="width: 110px; height: 100px">
                <div class="button-wrapper">
                    <label
                        for="image"
                        class="btn btn-primary me-2 mb-2"
                        tabindex="0"
                    >
                        <span class="d-none d-sm-block">Unggah Foto</span>
                        <i class="bx bx-upload d-block d-sm-none"></i>
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" hidden>
                    </label>
                    <p class="text-muted mb-0">
                        Maks. 100KB
                    </p>
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3" hidden>
                <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="skill" class="form-label">Keahlian<span class="text-danger">*</span></label>
                <textarea id="skill" type="hidden" name="skill" class="skill">{{ old('skill') }}</textarea>
                    @error('skill')
                        <p class="text-danger">{{ $message }}</p>
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
<!-- Instructor End -->
@endsection

@section('myjsfile')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
      ClassicEditor
            .create( document.querySelector( '#skill' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
    });
</script>
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

    name.addEventListener('change', function() {
        fetch('/dashboard/instructors/checkSlug?name=' + name.value)
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