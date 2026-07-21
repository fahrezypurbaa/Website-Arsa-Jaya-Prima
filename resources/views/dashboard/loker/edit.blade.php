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
            <a href="/dashboard/lokers" class="text-primary">
              <i class="fa-regular fa-file-lines"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            <i class="fa-solid fa-plus me-1"></i> Tambah Loker
          </li>
        </ol>
      </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form
        method="post"
        action="/dashboard/lokers/{{ $loker->id}}"
        class="mb-5"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $loker->title) }}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label">Slug <span class="text-danger" F>*otomatis</span></label>
          <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $loker->slug) }}">
          @error('slug')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="logo_perusahaan" class="form-label">Logo<span class="text-danger">*</span></label>
          <!-- <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('logo_perusahaan') is-invalid @enderror" type="file" id="logo_perusahaan" name="logo_perusahaan" onchange="previewThumbnail()">
          @error('logo_perusahaan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror -->
          <input type="hidden" name="oldThumbnail" value="{{ $loker->logo_perusahaan }}">
            @if ($loker->logo_perusahaan)
            <img src="{{$loker->logo_perusahaan}}" class="thumbnail-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
            @endif
            <input class="form-control @error('logo_perusahaan') is-invalid @enderror" type="file" id="thumbnail" name="logo_perusahaan" onchange="previewThumbnail()">
            @error('logo_perusahaan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
          <label for="perusahaan" class="form-label">Perusahaan <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('perusahaan') is-invalid @enderror" id="perusahaan" name="perusahaan" required autofocus value="{{ old('perusahaan', $loker->perusahaan) }}">
          @error('perusahaan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="gaji" class="form-label">Gaji <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji" required autofocus value="{{ old('gaji', $loker->gaji) }}">
          @error('gaji')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="pendidikan" class="form-label">Pendidikan <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('pendidikan') is-invalid @enderror" id="pendidikan" name="pendidikan" required autofocus value="{{ old('pendidikan', $loker->pendidikan) }}">
          @error('pendidikan')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>  
        <div class="mb-3">
          <label for="pengalaman_kerja" class="form-label">Pengalaman Kerja <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('pengalaman_kerja') is-invalid @enderror" id="pengalaman_kerja" name="pengalaman_kerja" required autofocus value="{{ old('pengalaman_kerja', $loker->pengalaman_kerja) }}">
          @error('pengalaman_kerja')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi', $loker->lokasi) }}">
          @error('lokasi')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="link" class="form-label">Link <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" required autofocus value="{{ old('link', $loker->link) }}">
          @error('link')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan <span class="text-danger">*</span></label>
          <textarea id="deskripsi_pekerjaan" type="hidden" name="deskripsi_pekerjaan" class="form-control editor">{{ old('deskripsi_pekerjaan', $loker->deskripsi_pekerjaan) }}</textarea>
            @error('deskripsi_pekerjaan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
          <label for="deskripsi_perusahaan" class="form-label">Deskripsi Perusahaan <span class="text-danger">*</span></label>
          <textarea id="deskripsi_perusahaan" type="hidden" name="deskripsi_perusahaan" class="form-control editor">{{ old('deskripsi_perusahaan', $loker->deskripsi_perusahaan) }}</textarea>
            @error('deskripsi_perusahaan')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
          <label for="sumber" class="form-label">Sumber <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('sumber') is-invalid @enderror" id="sumber" name="sumber" required autofocus value="{{ old('sumber', $loker->sumber) }}">
          @error('sumber')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="waktu" class="form-label">Waktu <span class="text-danger">*</span></label>
          <input type="text" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" required autofocus value="{{ old('waktu', $loker->waktu) }}">
          @error('waktu')
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
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        ClassicEditor
            .create( document.querySelector( '#deskripsi_pekerjaan' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#deskripsi_perusahaan' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
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
    fetch('/dashboard/lokers/checkSlug?name=' + name.value)
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
</script>
@endsection