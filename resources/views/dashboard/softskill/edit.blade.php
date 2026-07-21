@extends('dashboard.layouts.main')

@section('container')

    <!-- softskill Start -->
    <div class="softskill-section section-padding px-3 py-2 bg-white rounded">
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
                  <a href="/dashboard/softskill" class="text-primary">
                    <i class="fa-solid fa-s"></i
                  ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pendaftar Sertifikasi softskill RI
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <div class="row">
          <div class="col-md-10">
          <form method="post" action="/dashboard/softskill/{{ $softskill->id }}" class="mb-5" enctype="multipart/form-data">
              @method("put")
              @csrf 
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name', $softskill->name) }}" disabled>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3" hidden>
                    <label for="slugSoftskill" class="form-label">Slug</label>
                    <input type="text" class="form-control @error('slugSoftskill') is-invalid @enderror" id="slugSoftskill" name="slugSoftskill" required value="{{ old('slugSoftskill', $softskill->slugSoftskill) }}">
                    @error('slugSoftskill')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autofocus value="{{ old('email', $softskill->email) }}" disabled>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required autofocus value="{{ old('phone', $softskill->phone) }}" disabled>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="company" class="form-label">Perusahaan</label>
                    <input type="text" class="form-control @error('softskill') is-invalid @enderror" id="softskill" name="softskill" required autofocus value="{{ old('softskill', $softskill->company) }}" disabled>
                    @error('softskill')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="company_address" class="form-label">Alamat Perusahaan</label>
                    {{-- <input readonly type="text" class="form-control @error('company_address') is-invalid @enderror" id="company_address" name="company_address" required autofocus value="{{ old('company_address', $softskill->company_address) }}">
                    @error('company_address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror --}}
                    <textarea id="company_address" name="company_address" class="form-control company_address" style="height: 100px;" disabled>{{ old('company_address', $softskill->company_address) }}</textarea>
                    @error('company_address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="progress" class="form-label">Status Follow Up <span class="text-danger">*</span></label>
                    <select id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" required>
                        <option value="">-- Pilih Progress --</option>
                        @foreach ($progress as $p)
                            <option value="{{ $p }}" {{ old('progress', $softskill->progress) == $p ? 'selected' : '' }}>
                                {{ $p }}
                            </option>
                        @endforeach
                    </select>
                    @error('progress')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
    <!-- softskill end -->

@endsection
