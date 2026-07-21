@extends('dashboard.layouts.main')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show w-md-50 mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <!-- password edit start -->
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
                            <span class="text-primary"> <i class="fa-solid fa-key"></i></span>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa-solid fa-pencil me-1"></i> Update Password
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('password.edit', ['id' => $user->id]) }}" method="POST">
                    @method('put') @csrf
                    <div class="row">
                      <div class="mb-3">
                        <label for="current_password"
                          >Current Password <span class="text-danger">*</span></label
                        >
                        <input
                          type="password"
                          name="current_password"
                          class="form-control @error('current_password')is-invalid @enderror"
                          id="current_password"
                          required
                        />
                        @error('current_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password"
                          >New Password <span class="text-danger">*</span></label
                        >
                        <input
                          type="password"
                          name="password"
                          class="form-control @error('password')is-invalid @enderror"
                          id="password"
                          required
                        />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label for="password_confirmation"
                          >Confirm New Password <span class="text-danger">*</span></label
                        >
                        <input
                          type="password"
                          name="password_confirmation"
                          class="form-control @error('password_confirmation')is-invalid @enderror"
                          id="password_confirmation"
                          required
                        />
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
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
        </div>
    </div>
    <!-- password edit end -->
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