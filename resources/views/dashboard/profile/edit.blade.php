@extends('dashboard.layouts.main')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- profile start -->
    <div class="profile-section section-padding px-3 py-2 bg-white rounded">
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
                            <span class="text-primary"> <i class="fa-solid fa-user"></i></span>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa-solid fa-pencil me-1"></i> Edit Profil
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form
                action="{{ route('profile.update') }}"
                method="POST"
                enctype="multipart/form-data"
                >
                @method('put') @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="picture" class="form-label">Foto Profil</label>
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input
                            type="hidden"
                            name="oldPicture"
                            value="{{ auth()->user()->picture }}"
                            />
                            @if (auth()->user()->picture)
                            <img
                            src="{{ asset('storage/' .auth()->user()->picture) }}"
                            class="img-preview img-fluid mb-3 col-sm-5 d-block"
                            style="width: 100px; height: 100px"
                            />
                            @else
                            <img
                            class="img-preview img-fluid mb-3 col-sm-5"
                            style="width: 100px; height: 100px"
                            />
                            @endif
                            <div class="button-wrapper">
                                <label
                                    for="image"
                                    class="btn btn-primary me-2 mb-2"
                                    tabindex="0"
                                >
                                    <span class="d-none d-sm-block">Unggah Foto Baru</span>
                                    <i class="fa-solid fa-upload d-block d-sm-none"></i>
                                    <input
                                    class="form-control @error('picture') is-invalid @enderror"
                                    type="file"
                                    id="image"
                                    name="picture"
                                    onchange="previewImage()"
                                    hidden
                                    />
                                    @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </label>
                                <p class="text-muted mb-0">Maks. 100KB</p>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Nama</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name')is-invalid @enderror"
                            id="name"
                            required
                            value="{{ old('name', auth()->user()->name)}}"
                        />
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control @error('username')is-invalid @enderror"
                            id="username"
                            required
                            value="{{ old('username', auth()->user()->username)}}"
                        />
                        @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="text"
                            readonly
                            name="email"
                            class="form-control @error('email')is-invalid @enderror"
                            id="email"
                            value="{{ old('email', auth()->user()->email)}}"
                            disabled
                        />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-success me-2">Simpan</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- profile end -->
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
</script>
@endsection