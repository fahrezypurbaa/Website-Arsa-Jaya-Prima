@extends('dashboard.layouts.main')

@section('container')
<!-- schedule start -->
<div class="schedule-section section-padding px-3 py-2 bg-white rounded">
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
                <a href="/dashboard/schedules" class="text-primary">
                    <i class="fa-solid fa-calendar-days"></i
                ></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                <i class="fa fa-plus me-1"></i> Edit Jadwal
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form
                method="POST"
                action="/dashboard/schedules"
                class="mb-5"
                enctype="multipart/form-data"
            >
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3" hidden>
                    <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label"
                    >Gambar</label
                    >
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="start_date" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" required autofocus value="{{ old('start_date') }}">
                        @error('start_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" required autofocus value="{{ old('end_date') }}">
                        @error('end_date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="training_id" class="form-label"
                    >Kategori Training <span class="text-danger">*</span></label
                    >
                    <select class="form-select select2" name="training_id">
                        @foreach ($trainings as $training)
                            <option value="{{ $training->id }}" {{ old('training_id') == $training->id ? 'selected' : null }}>{{ $training->name }}</option>
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
<!-- schedule end -->
@endsection


@section('myjsfile')
<script>
    // start sidebar
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    
    name.addEventListener('change', function() {
        fetch('/dashboard/schedules/checkSlug?name=' + name.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
    
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