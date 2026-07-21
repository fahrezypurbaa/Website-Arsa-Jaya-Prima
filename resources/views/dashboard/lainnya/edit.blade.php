@extends('dashboard.layouts.main')

@section('container')

    <!-- lainnya Start -->
    <div class="lainnya-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/lainnya" class="text-primary">
                    <i class="fa-solid fa-k"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pendaftar Perpanjangan SIO/SKP/Lisensi
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
            <form method="post" action="/dashboard/lainnya/{{ $lainnya->slugLainnya }}" class="mb-5" enctype="multipart/form-data">
                @method("put")
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $lainnya->name) }}" disabled>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" hidden>
                    <label for="slugLainnya" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slugLainnya') is-invalid @enderror" id="slugLainnya" name="slugLainnya" required value="{{ old('slugLainnya', $lainnya->slugLainnya) }}">
                    @error('slugLainnya')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $lainnya->email) }}" disabled>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus value="{{ old('phone', $lainnya->phone) }}" disabled>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="company" class="form-label">Perusahaan</label>
                    <input type="text" class="form-control @error('lainnya') is-invalid @enderror" id="lainnya" name="lainnya" required autofocus value="{{ old('lainnya', $lainnya->company) }}" disabled>
                    @error('lainnya')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 disable">
                    <label for="company_address" class="form-label">Alamat Perusahaan</label>
                    <textarea id="company_address" name="company_address" class="form-control company_address" style="height: 100px;" disabled>{{ old('company_address', $lainnya->company_address) }}</textarea>
                    @error('company_address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="progress" class="form-label">Status Follow Up <span class="text-danger">*</span></label>
                    <select  id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" id="progress" name="progress" required  value="{{ old('progress', $lainnya->progress) }}">
                        @foreach ($progress as $progress)
                            <option value="{{ $progress }}" {{ old('progress', $lainnya->progress) == $progress ? 'selected' : null }}>{{ $progress }}</option>
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
    <!-- lainnya end -->

@endsection
