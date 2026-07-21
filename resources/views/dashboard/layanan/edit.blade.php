@extends('dashboard.layouts.main')

@section('container')
    <!-- slider start -->
    <div class="slider-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/layanan" class="text-primary">
                        <i class="fa-solid fa-panorama"></i
                    ></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Layanan
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form
                method="post"
                action="/dashboard/layanan/{{$layanan->id}}"
                class="mb-5"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $layanan->title) }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="layanan" class="form-label">Icon Layanan
                        <span class="text-danger">*</span>
                    </label>
                    <br/>
                    <input type="hidden" name="oldImage" value="{{ $layanan->icon }}" disabled>
                    @if ($layanan->icon)
                        <img loading="lazy" src="{{ asset('storage/' .$layanan->icon) }}" class="img-fluid mb-2"
                        alt="{{ $layanan->name }}" style="height: 100px; width: 100px;">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5"
                        style="width: 100px; height: 100px">
                    @endif                            
                    <input
                    class="form-control @error('icon') is-invalid @enderror"
                    type="file"
                    id="icon"
                    name="icon"
                    onchange="previewImage()"
                    />
                    @error('icon')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                     <p class="text-muted mb-0">Maks. 100KB</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description<span class="text-danger">*</span></label>
                    <textarea id="description" maxlength="100" type="hidden" class="editor" id="description" name="description">
                        {{old('description', $layanan->description)}}    
                    </textarea>
                    @error('description')
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
    <!-- slider end -->

@endsection

@section('myjsfile')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    function previewImage() {
        const image = document.querySelector('#icon');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    window.addEventListener('DOMContentLoaded', (event) => {
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
            } )
            .catch( error => {
                console.error( error );
        } );
    });
</script>
@endsection