@extends('dashboard.layouts.main')

@section('container')

    <!-- places start -->
    <div class="places-section section-padding px-3 py-2 bg-white rounded">
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
                    <i class="fa-solid fa-plus me-1"></i> Tambah Lokasi Training
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-10">
                <form
                method="post"
                action="/dashboard/galleries/{{$gallery->id}}"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $gallery->gallery_detail->name) }}" disabled>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="image" class="form-label"
                    >Gambar <span class="text-danger">*</span></label
                    >  
                    <input type="hidden" name="oldImage" value="{{ $gallery->photo }}" disabled>
                    @if ($gallery->photo)
                        <img src="{{ asset('storage/photo->images/' .$gallery->photo) }}" id="photoOld" class="img-preview img-fluid mb-3 col-sm-5 d-block" alt="{{$gallery->gallery_detail->name}}">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" accept="image/*" multiple onchange="previewImage()" value="{{ $gallery->photo }}">
                        @error('photo')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="training" class="form-label">Program Training <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('training') is-invalid @enderror" id="training" name="training" required autofocus value="{{ old('training', $gallery->gallery_detail->training)}}" disabled>
                    @error('training')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="schedule" class="form-label">Periode Training <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" required autofocus value="{{ old('schedule', $gallery->gallery_detail->schedule)}}" disabled>
                    @error('schedule')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-1">
                    <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                    </button>
                    <button type="reset" class="btn btn-tertiary">
                    <i class="fa-solid fa-rotate-right me-1"></i>Reset
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- places end -->

@endsection

@section('myjsfile')
<script>
    function previewImage(){
        const image = document.querySelector("#photo");
        const imageOld = document.querySelector("#photoOld");
        const imgPreview = document.querySelector(".img-preview");
        imgPreview.style.display = 'block';
        imageOld.style.display = "none";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection