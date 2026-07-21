@extends('dashboard.layouts.main')

@section('container')

    <!-- about start -->
    <div class="about-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/about" class="text-primary">
                        <i class="fa-regular fa-newspaper"></i
                    ></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Banner
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form
                method="post"
                action="/dashboard/about"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="mb-3">
                    <label for="privilege" class="form-label">Tentang Kami</label>
                    <textarea id="privilege" name="privilege" class="form-control privilege" style="height: 100px">{{ old('privilege') }}</textarea>
                    @error('privilege')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="vission" class="form-label">Visi <span class="text-danger">*</span></label>
                    <textarea id="vission" name="vission" class="form-control vission" style="height: 100px">{{ old('vission') }}</textarea>
                    @error('vission')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="mission" class="form-label">Misi <span class="text-danger">*</span></label>
                    <textarea id="mission" name="mission" class="form-control mission" style="height: 100px">{{ old('mission') }}</textarea>
                    @error('mission')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="link" class="form-label">Link Video</label>
                    <input type="text" class="form-control @error('link') is-invalid @enderror" id="link" name="link" autofocus value="{{ old('link') }}">
                    @error('link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"
                    >Gambar / Thumbnail Video <span class="text-danger">*</span></label
                    >
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
                        @error('image')
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
    <!-- about end -->

@endsection

@section('myjsfile')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
      ClassicEditor
            .create( document.querySelector( '#vission' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#mission' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#privilege' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'],
            } )
            .catch( error => {
                console.error( error );
        } );
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