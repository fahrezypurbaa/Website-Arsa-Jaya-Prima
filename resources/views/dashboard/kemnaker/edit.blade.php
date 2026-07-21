@extends('dashboard.layouts.main')

@section('container')

    <!-- Kemnaker Start -->
    <div class="kemnaker-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="/dashboard" class="text-primary">
                    <i class="fa-solid fa-house-user"></i>
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="/dashboard/kemnaker" class="text-primary">
                    <i class="fa-solid fa-list"></i>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  <i class="fa-solid fa-pencil me-1"></i> Edit Pendaftar Sertifikasi Kemnaker RI
                </li>
              </ol>
            </nav>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10">
            <form method="POST" action="{{ route('kemnaker.update', $kemnaker->id) }}" class="mb-5">
                @method("put")
                @csrf

                {{-- Nama (readonly) --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $kemnaker->name) }}" 
                           disabled>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- No HP (readonly) --}}
                <div class="mb-3">
                    <label for="phone" class="form-label">No. Telepon</label>
                    <input type="text" 
                           class="form-control @error('phone') is-invalid @enderror" 
                           id="phone" 
                           name="phone" 
                           value="{{ old('phone', $kemnaker->phone) }}" 
                           disabled>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Progress (editable) --}}
                <div class="mb-3">
                    <label for="progress" class="form-label">Status Follow Up <span class="text-danger">*</span></label>
                    <select id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" required>
                        <option value="">-- Pilih Progress --</option>
                        @foreach ($progress as $p)
                            <option value="{{ $p }}" {{ old('progress', $kemnaker->progress) == $p ? 'selected' : '' }}>
                                {{ $p }}
                            </option>
                        @endforeach
                    </select>
                    @error('progress')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Hidden slug (jika masih ada di DB) --}}
                <input type="hidden" name="slugKemnaker" value="{{ old('slugKemnaker', $kemnaker->slugKemnaker) }}">

                {{-- Tombol --}}
                <div class="d-flex">
                    <button type="submit" class="btn btn-success me-1">
                      <i class="fa-regular fa-floppy-disk me-1"></i>Simpan
                    </button>
                    <a href="{{ route('kemnaker.index') }}" class="btn btn-secondary">
                      <i class="fa-solid fa-arrow-left me-1"></i>Batal
                    </a>
                </div>
            </form>
          </div>
        </div>
    </div>
    <!-- Kemnaker End -->

@endsection
