@extends('dashboard.layouts.main')

@section('container')

    <!-- place start -->
    <div class="place-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/places" class="text-primary">
                        <i class="fa-solid fa-hotel"></i
                    ></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-plus me-1"></i> Edit Lokasi Training
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form
                    method="post"
                    action="/dashboard/places/{{ $place->slug }}"
                    class="mb-5"
                    enctype="multipart/form-data"
                >
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $place->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $place->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Gambar</label>
                        <div class="row">
                            @foreach ($images as $image)
                                <div class="col-md-3">
                                <div class="card text-white bg-white mb-3" style="max-width: 20rem;">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('storage/place->images/'.$image->image) }}" class="card-img-top">
                                    </div>
                                </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">Kota</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" autofocus value="{{ old('city', $place->city) }}">
                        @error('city')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <textarea id="desc" type="hidden" name="desc" class="desc">{{ old('desc', $place->desc) }}</textarea>
                        @error('desc')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="training_list" class="form-label">List Program Training</label>
                        <textarea id="training_list" type="hidden" name="training_list" class="training_list">{{ old('training_list', $place->training_list) }}</textarea>
                        @error('training_list')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat <span class="text-danger">*</span></label>
                        <textarea id="address" type="hidden" name="address" class="address">{{ old('address', $place->address) }}</textarea>
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link Google Maps <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link"  autofocus value="{{ old('link', $place->link) }}">
                        @error('link')
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
    <!-- place end -->

@endsection

@section('myjsfile')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
      ClassicEditor
            .create( document.querySelector( '#desc' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#training_list' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#address' ), {
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
        fetch('/dashboard/places/checkSlug?name=' + name.value)
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