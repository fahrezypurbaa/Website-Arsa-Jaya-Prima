@extends('dashboard.layouts.main')

@section('container')

    <!-- facility start -->
    <div class="facility-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/facilities" class="text-primary">
                        <i class="fa-solid fa-gifts"></i
                    ></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-pencil me-1"></i> Edit Fasilitas
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form
                method="post"
                action="/dashboard/facilities/{{ $facility->id }}"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old('name', $facility->name) }}" disabled>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"
                    >Gambar</label
                    >
                    <input type="hidden" name="oldImage" value="{{ $facility->image }}" disabled>
                    @if ($facility->image)
                        <img src="{{ asset('storage/' .$facility->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('image') is-invalid @enderror" 
                    type="file" id="image" name="image" 
                    onchange="previewImage()" disabled>
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="banner" class="form-label"
                    >Gambar Mobile</label
                    >
                    <input type="hidden" name="oldImage" value="{{ $facility->image_mobile }}" disabled>
                    @if ($facility->image_mobile)
                        <img src="{{ asset('storage/' .$facility->image_mobile) }}" class="img-preview-mobile img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control @error('image_mobile') is-invalid @enderror" 
                    type="file" id="image_mobile" name="image_mobile" 
                    onchange="previewImageMobile()" disabled>
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
    <!-- facility end -->

@endsection

@section('myjsfile')
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

    function previewImageMobile() {
        const image = document.querySelector('#image_mobile');
        const imgPreview = document.querySelector('.img-preview-mobile');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image_mobile.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection