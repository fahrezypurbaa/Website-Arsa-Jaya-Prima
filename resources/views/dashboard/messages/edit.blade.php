@extends('dashboard.layouts.main')

@section('container')

<form method="POST" action="{{ route('messages.update', $message->id) }}" class="mb-5">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control" id="name" value="{{ $message->name }}" disabled>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" value="{{ $message->email }}" disabled>
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Pesan</label>
        <textarea class="form-control" id="message" disabled>{{ $message->message }}</textarea>
    </div>

    <div class="mb-3">
        <label for="progress" class="form-label">Status Follow Up <span class="text-danger">*</span></label>
        <select id="progress" name="progress" class="form-control @error('progress') is-invalid @enderror" required>
            @foreach ($progress as $option)
                <option value="{{ $option }}" {{ old('progress', $message->progress) == $option ? 'selected' : '' }}>
                    {{ $option }}
                </option>
            @endforeach
        </select>
        @error('progress')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex">
        <button type="submit" class="btn btn-success me-1">
            <i class="fa-regular fa-floppy-disk me-1"></i> Simpan
        </button>
    </div>
</form>


@endsection
