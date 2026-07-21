@extends('dashboard.layouts.main')

@section('container')

<!-- event start -->
<div class="event-section section-padding px-3 py-2 bg-white rounded">
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
              <a href="/dashboard/events" class="text-primary">
                <i class="fa-regular fa-file-lines"></i
              ></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <i class="fa-solid fa-plus me-1"></i> Tambah Jadwal
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form
            method="POST"
            action="/dashboard/events"
            class="mb-5"
            enctype="multipart/form-data"
            >
            @csrf
            <div class="d-md-flex pt-2 pb-2 mb-3">
                <div class="w-100">
                    <label for="training" class="form-label"
                    >Pilih event Training</label
                    >
                    <select class="form-select" name="training_id">
                        @foreach ($training_id as $training)
                            @if (old('training_id') == $training->id)
                                <option value="{{ $training->id }}" selected>{{ $training->name }}</option>
                            @else
                                <option value="{{ $training->id }}">{{ $training->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="scheme">Skema <span class="text-danger">*</span></label>
                <input type="scheme" name="scheme" class="form-control @error('scheme')is-invalid @enderror" id="scheme" required autofocus value="{{ old('scheme') }}">
                @error('scheme')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date">Jadwal <span class="text-danger">*</span></label>
                <input type="date" name="date" class="form-control @error('date')is-invalid @enderror" id="date" required autofocus value="{{ old('date') }}">
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="location">Lokasi <span class="text-danger">*</span></label>
                <input type="location" name="location" class="form-control @error('location')is-invalid @enderror" required autofocus value="{{ old('location') }}">
                @error('location')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
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
<!-- event end -->

@endsection