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
                    <a href="/dashboard/sliders" class="text-primary">
                        <i class="fa-solid fa-panorama"></i
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
                action="/dashboard/sliders"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" hidden>
                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"
                    >Banner <span class="text-danger">*</span></label
                    >
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"
                    >Banner Mobile<span class="text-danger">*</span></label
                    >
                    <img class="img-preview-mobile img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image_mobile') is-invalid @enderror" type="file" id="image_mobile" name="image_mobile" required onchange="previewImageMobile()">
                        @error('image_mobile')
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
                                    @if($status == '1')
                                    Active
                                    @endif
                                    @if($status == '0')
                                    Disable
                                    @endif
                                </option>
                            @else
                                <option value="{{ $status }}">
                                    @if($status == '1')
                                    Active
                                    @endif
                                    @if($status == '0')
                                    Disable
                                    @endif
                                </option>
                            @endif
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
    <!-- slider end -->

@endsection

@section('myjsfile')
<script>
   const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/sliders/checkSlug?title=' + title.value)
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

    function previewImageMobile() {
        const image = document.querySelector('#image_mobile');
        const imgPreview = document.querySelector('.img-preview-mobile');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection