@extends('dashboard.layouts.main')
@section('container')

<!-- Category Start -->
<div class="category-section section-padding px-3 py-2 bg-white rounded">
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
          </li>
          <li class="breadcrumb-item">
            <a href="/dashboard/kategoriSertifikat" class="text-primary">
              <i class="fa-solid fa-rectangle-list"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fa-solid fa-plus me-1"></i> Edit Kategori Sertifikasi
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <form
        method="post"
        action="/dashboard/kategoriSertifikasi/{{$kategori->id}}"
        class="mb-5"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="name" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" required autofocus value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
          @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="banner" class="form-label">Gambar<span class="text-danger">*</span></label>
          <input type="hidden" name="oldimg_kategori" value="{{ $kategori->img_kategori }}">
          @if ($kategori->img_kategori)
          <img src="{{ asset('storage/' .$kategori->img_kategori) }}" class="thumbnail-preview img-fluid mb-3 col-sm-5 d-block">
          @else
          <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
          @endif
          <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail" name="img_kategori" onchange="previewThumbnail()">
          @error('img_kategori')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="training_categories_id" class="form-label">Kategori Training <span class="text-danger">*</span></label>
          <select class="form-select" name="training_categories_id">
            @foreach ($trainingcategories as $category)
            <option value="{{ $category->id }}" {{ old('training_categories_id') == $category->id ? 'selected' : null }}>{{ $category->name }}</option>
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
<!-- Category End -->
@endsection

@section('myjsfile')
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/dashboard/kategoriSertifikat/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });

  function previewThumbnail() {
    const image = document.querySelector('#thumbnail');
    const imgPreview = document.querySelector('.thumbnail-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }

  function previewThumbnailMobile() {
    const image = document.querySelector('#thumbnail-mobile');
    const imgPreview = document.querySelector('.thumbnail-preview-mobile');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection