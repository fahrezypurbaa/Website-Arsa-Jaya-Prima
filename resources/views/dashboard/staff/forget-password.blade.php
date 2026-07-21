@extends('dashboard.layouts.main')
@section('container')

<!-- registrant start -->
<div class="staff-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/staff" class="text-primary">
                    <i class="fa-solid fa-users-rectangle"></i
                    ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-pencil me-1"></i> Edit Customer
                    Service
                </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form method="post" action="{{ route('forget.password.post') }}" class="mb-2" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="email">Alamat Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" required autofocus value="{{ old('email') }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-1">
                        <i class="fa-solid fa-key me-1"></i>Kirim Link Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- registrant End -->

@endsection