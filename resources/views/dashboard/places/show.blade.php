@extends('dashboard.layouts.main')

@section('container')

    <!-- place start -->
    <div class="location-section section-padding px-3 py-2 bg-white rounded">
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
                    <i class="fa-solid fa-plus me-1"></i> Deatail Lokasi Training
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            
            <div class="col-lg-5">
                <form
                method="post"
                action="/dashboard/places/add-images/{{ $place->id }}"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label"
                        >Upload Gambar <span class="text-danger">*</span></label
                        >
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('images') is-invalid @enderror" type="file" id="images" name="images[]" accept="image/*" multiple required onchange="previewImage()">
                            @error('images')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
                    <div class="d-flex">
                        <button type="submit" class="btn btn-success me-1">
                        <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                        </button>
                    </div>
                </form>
                <h6>Gambar Lokasi Training : <span class="text-primary">{{$place->name}}</span> </h6>

                <div class="row mt-4">
                    @foreach ($images as $image)
                        <div class="col-md-6">
                        <div class="card bg-light border-0 mb-3" style="max-width: 20rem;">
                            <div class="card-body text-center">
                                <img src="{{ asset('storage/place->images/'.$image->image) }}" class="card-img-top">
                                <a href="/dashboard/places/remove-image/{{ $image->id }}" class="btn btn-danger mt-2">Hapus</a>
                            </div>
                        </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-7">
                <div class="location-desc mb-2 rounded d-md-flex">
                    <div class="align-self-center">
                        <h5 class="text-primary">{{ $place->city }}</h5>
                        <h3 class="text-capitalize">{{ $place->name }}</h3>
                        <p class="mb-0">{!! $place->desc !!}</p>
                    </div>
                </div>
                <div class="location-desc mb-2 rounded d-md-flex">
                  <div class="justify-content-center">
                    {{-- <i class="fa-solid fa-calendar-days display-4 text-primary mb-3"></i> --}}
                    <h5 class="text-primary">Daftar Program Training</h5>
                    <p class="mb-0">{!! $place->training_list !!}</p>
                  </div>
              </div>
              <div class="location-desc rounded d-md-flex">
                <div class="justify-content-center">
                  {{-- <i class="fa-solid fa-map-location-dot display-4 text-primary mb-3"></i> --}}
                  <h5 class="text-primary">Alamat Lokasi</h5>
                  <p class="mb-0">{!! $place->address !!}</p>
                  <a href="{{ $place->link }}" target="_blank" class="btn btn-tertiary fw-bold">Lihat Google Maps</a>
                </div>
              </div>
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