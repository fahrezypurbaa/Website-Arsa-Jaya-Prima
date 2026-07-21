@extends('dashboard.layouts.main')
@section('container')
<!-- program start -->
<div class="program-section section-padding px-3 py-2 bg-white rounded">
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="/dashboard/ongoing" class="text-primary">
              <i class="fa-regular fa-file-lines"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fa-solid fa-plus me-1"></i> Tambah Program
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form
        method="post"
        action="/dashboard/ongoing"
        class="mb-5"
        enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="training_id" class="form-label">Kategori Training <span class="text-danger">*</span></label>
          <select class="form-select select2" name="training_id">
            @foreach ($trainings as $training)
            <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">Kegiatan <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="platform" class="form-label">Platform <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('platform') is-invalid @enderror" id="platform" name="platform" value="{{ old('platform') }}">
          @error('platform')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="jumlah_peserta" class="form-label">Jumlah Peserta <span class="text-danger">*</span></label>
          <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" id="jumlah_peserta" name="jumlah_peserta" value="{{ old('jumlah_peserta') }}">
          @error('jumlah_peserta')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Gallery <span class="text-danger">*</span></label>
          <img class="image-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image_gallery" class="form-label">Gambar Gallery<span class="text-danger">*</span></label>
          <img class="image-gallery-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image_gallery') is-invalid @enderror" type="file" id="image_gallery" name="image_gallery" onchange="previewImageGallery()">
          @error('image_gallery')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="start_date" class="form-label">Start Date <span class="text-danger">*</span></label>
          <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}">
          @error('start_date')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="end_date" class="form-label">End Date <span class="text-danger">*</span></label>
          <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}">
          @error('end_date')
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
<!-- program end -->

@endsection

@section('myjsfile')
<script>
  function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.image-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  function previewImageGallery() {
    const imageGallery = document.querySelector("#image_gallery");
    const imgPreview = document.querySelector(".image-gallery-preview");

    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(imageGallery.files[0]);
    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection