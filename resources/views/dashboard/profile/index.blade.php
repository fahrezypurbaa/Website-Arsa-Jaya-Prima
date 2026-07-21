@extends('dashboard.layouts.main')

@section('container')

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- profile start -->
    <div
        class="profile-section section-padding px-3 py-2 bg-white rounded"
    >
        <div class="row">
            <div class="col-md-12">
              {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <div
                    class="nav-link active mb-1"
                    id="profile-one-tab"
                    data-bs-toggle="tab"
                    data-bs-target="#profile-one-tab-pane"
                    type="button"
                    role="tab"
                    aria-controls="profie-one-tab-pane"
                    aria-selected="true"
                >
                    <span>Data Akun</span>
                </div>
                </li>
                <li class="nav-item">
                  <div
                      class="nav-link active mb-1"
                      id="profile-two-tab"
                      data-bs-toggle="tab"
                      data-bs-target="#profile-two-tab-pane"
                      type="button"
                      role="tab"
                      aria-controls="profie-two-tab-pane"
                      aria-selected="true"
                  >
                      <span>Ubah Password</span>
                  </div>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages-account-settings-connections.html"
                    ><i class="bx bx-link-alt me-1"></i> Connections</a
                  >
                </li>
              </ul>
              <div class="tab-content" id="courseTabContent">
                <div
                  class="tab-pane fade show active"
                  id="profile-one-tab-pane"
                  role="tabpanel"
                  aria-labelledby="profile-one-tab"
                  tabindex="0">
                    <div class="card mb-4">
                        <h5 class="card-header">Detail Profil</h5>
                        <!-- Account -->
                        <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <input type="hidden" name="oldImage" value="">
                            <img src="{{ asset('img/user.webp') }}" class="img-preview img-fluid d-block d-block rounded" style="width: 100px; height: 100px">
                            <div class="button-wrapper">
                            <label
                                for="image"
                                class="btn btn-primary me-2 mb-2"
                                tabindex="0"
                            >
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()" hidden>
                            </label>
                            <p class="text-muted mb-0">
                                Maks. 100KB
                            </p>
                            </div>
                        </div>
                        </div>
                        <hr class="my-0" />
                        <div class="card-body">
                        <form
                            id="formAccountSettings"
                            method="POST"
                            onsubmit="return false"
                        >
                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nama</label>
                                <input
                                class="form-control"
                                type="text"
                                id="firstName"
                                name="firstName"
                                value="John"
                                autofocus=""
                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Username</label>
                                <input
                                class="form-control"
                                type="text"
                                name="lastName"
                                id="lastName"
                                value="Doe"
                                />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input
                                class="form-control"
                                type="text"
                                id="email"
                                name="email"
                                value="john.doe@example.com"
                                placeholder="john.doe@example.com"
                                />
                            </div>
                            </div>
                            <div class="mt-2">
                            <button type="submit" class="btn btn-success me-2">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            </div>
                        </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
                <div
                  class="tab-pane fade show active"
                  id="profile-two-tab-pane"
                  role="tabpanel"
                  aria-labelledby="profile-two-tab"
                  tabindex="0">
                    <div class="card mb-4">
                        <h5 class="card-header">Ubah Password</h5>
                        <div class="card-body">
                        <form
                            id="formAccountSettings"
                            method="POST"
                            onsubmit="return false"
                        >
                            <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nama</label>
                                <input
                                class="form-control"
                                type="text"
                                id="firstName"
                                name="firstName"
                                value="John"
                                autofocus=""
                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Username</label>
                                <input
                                class="form-control"
                                type="text"
                                name="lastName"
                                id="lastName"
                                value="Doe"
                                />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="email" class="form-label">Email</label>
                                <input
                                class="form-control"
                                type="text"
                                id="email"
                                name="email"
                                value="john.doe@example.com"
                                placeholder="john.doe@example.com"
                                />
                            </div>
                            </div>
                            <div class="mt-2">
                            <button type="submit" class="btn btn-success me-2">
                                Simpan
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            </div>
                        </form>
                        </div>
                        <!-- /Account -->
                    </div>
                </div>
              </div> --}}
            <ul
            class="nav nav-tabs border-0 d-flex justify-content-between mb-2"
            id="courseTab"
            role="tablist"
            >
                <div class="course-tab-category">
                    <div class="container-course-btn hidden-sm text-center d-flex justofy-content-between">
                    <div
                        class="nav-link active mb-1"
                        id="course-two-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#course-one-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="course-one-tab-pane"
                        aria-selected="true"
                    >
                        <span>Data Akun</span>
                    </div>
                    <div
                        class="nav-link mb-1"
                        id="course-two-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#course-two-tab-pane"
                        type="button"
                        role="tab"
                        aria-controls="course-two-tab-pane"
                        aria-selected="false"
                    >
                        <span>Ubah Password</span>
                    </div>
                    </div>
                </div>
            </ul>
            <div class="tab-content" id="courseTabContent">
            <div
                class="tab-pane fade show active"
                id="course-one-tab-pane"
                role="tabpanel"
                aria-labelledby="course-one-tab"
                tabindex="0"
            >
                <div class="card mb-4">
                    <h5 class="card-header">Detail Profil</h5>
                    <!-- Account -->
                    <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <form action="{{ route('updateInfo') }}" method="POST">
                        <input type="hidden" name="oldPicture" value="{{ auth()->user()->picture }}">
                        <img src="{{ asset('storage/'.auth()->user()->picture) }}" class="img-preview img-fluid d-block d-block rounded" style="width: 100px; height: 100px">
                        @if (auth()->user()->picture)
                        <img src="{{ asset('storage/' .auth()->user()->picture) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <div class="button-wrapper">
                        <label
                            for="image"
                            class="btn btn-primary me-2 mb-2"
                            tabindex="0"
                        >
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input class="form-control @error('picture') is-invalid @enderror" type="file" id="image" name="picture" onchange="previewImage()" hidden>
                        </label>
                        <p class="text-muted mb-0">
                            Maks. 100KB
                        </p>
                        </div>
                    </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    {{-- <form action="{{ route('updateInfo') }}" method="POST"> --}}
                        {{-- @method('put') --}}
                        @csrf
                        <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" required value="{{ old('name', auth()->user()->name)}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" required value="{{ old('username', auth()->user()->username)}}">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="text"  name="email" class="form-control @error('email')is-invalid @enderror" id="email" required value="{{ old('email', auth()->user()->email)}}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        </div>
                        <div class="mt-2">
                        <button type="submit" class="btn btn-success me-2">
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-danger">
                            Reset
                        </button>
                        </div>
                    </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div
                class="tab-pane fade"
                id="course-two-tab-pane"
                role="tabpanel"
                aria-labelledby="course-two-tab"
                tabindex="0"
            >
                <div class="card mb-4">
                    <h5 class="card-header">Ubah Password</h5>
                    <div class="card-body">
                    <form
                        id="formAccountSettings"
                        method="POST"
                        onsubmit="return false"
                    >
                        <div class="row">
                            <div class="mb-3">
                                <label for="password">Old Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" required autofocus>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">New Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" required autofocus>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password">Confirm New Password <span class="text-danger">*</span></label>
                                <input type="password" name="password" class="form-control @error('password')is-invalid @enderror" id="password" required autofocus>
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                        <button type="submit" class="btn btn-success me-2">
                            Update Password
                        </button>
                        </div>
                    </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            </div>
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