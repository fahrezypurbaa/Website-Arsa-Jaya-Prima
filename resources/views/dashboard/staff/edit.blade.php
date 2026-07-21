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
                    <i class="fa-solid fa-pencil me-1"></i> Edit Staff
                </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <form method="post" action="/dashboard/staff/{{ $user->id }}" class="mb-2" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Foto Profil</label>
                    <div class="img">
                        <img src="{{ asset('storage/' .$user->picture) }}" class="img-preview img-fluid d-block d-block rounded" style="width: 100px; height: 100px">        
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" id="name" required autofocus value="{{ old('name', $user->name)}}" disabled>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" required autofocus value="{{ old('username', $user->username) }}" disabled>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" required autofocus value="{{ old('email', $user->email) }}" disabled>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="password">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" required autofocus>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> --}}
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
<!-- registrant End -->

@endsection