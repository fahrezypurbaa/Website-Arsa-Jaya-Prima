@extends('dashboard.layouts.main')

@section('container')

    <!-- bnsp Start -->
    <div class="bnsp-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/bnsp" class="text-primary">
                    <i class="fa-solid fa-b"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pendaftar Sertifikasi BNSP
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <form method="post" action="/dashboard/bnsp/{{ $bnsp->slugBnsp }}" class="mb-5" enctype="multipart/form-data">
                @method("put")
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $bnsp->name) }}" disabled>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" hidden>
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slugBnsp') is-invalid @enderror" id="slugBnsp" name="slugBnsp" required value="{{ old('slugBnsp', $bnsp->slugBnsp) }}">
                    @error('slugBnsp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $bnsp->email) }}" disabled>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus value="{{ old('phone', $bnsp->phone) }}" disabled>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Perusahaan</label>
                    <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" required autofocus value="{{ old('company', $bnsp->company) }}" disabled>
                    @error('company')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="company_address" class="form-label">Alamat Perusahaan</label>
                    <input id="company_address" name="company_address" class="form-control company_address" style="height: 100px;" disabled value="{{ old('company_address', $bnsp->company_address) }}"/>
                    @error('company_address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="progress" class="form-label">Status Follow Up <span class="text-danger">*</span></label>
                    <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $bnsp->progress) }}">
                        @foreach ($progress as $progress)
                            <option value="{{ $progress }}" {{ old('progress', $bnsp->progress) == $progress ? 'selected' : null }}>{{ $progress }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-1">
                      <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                    </button>
                  </div>
            </form>
          </div>
        </div>
    </div>
    <!-- bnsp end -->

@endsection
