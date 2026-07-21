@extends('dashboard.layouts.main')
@section('container')

<!-- Category Start -->
<div class="category-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/photo-categories" class="text-primary">
                    <i class="fa-solid fa-film"></i>
                </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa-solid fa-plus me-1"></i> Tambah Kategori Foto
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form
            method="post"
            action="/dashboard/gallery-categories"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" name="id" required value="{{ old('id') }}">
                @error('id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <h4>Kebutuhan SEO</h4>
                <div class="mb-3">
                    <label for="meta_desc" class="form-label meta_desc" name="meta_desc"
                    >Meta Description</label
                    >
                    <textarea id="meta_desc" name="meta_desc" class="form-control meta_desc" style="height: 100px">{{ old('meta_desc') }}</textarea>
                    @error('meta_desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keywords" class="form-label">Meta Keywords</label>
                    <input type="text" class="form-control keywords" id="keywords" name="keywords" value="{{ old('keywords') }}">
                    @error('keywords')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
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
const id = document.querySelector('#id');

name.addEventListener('change', function() {
    fetch('/dashboard/gallery-categories/checkSlug?name=' + name.value)
        .then(response => response.json())
        .then(data => id.value = data.id)
});
</script> 
@endsection