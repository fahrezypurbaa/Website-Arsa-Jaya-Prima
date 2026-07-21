@extends('dashboard.layouts.main')

@section('container')

    <!-- article start -->
    <div class="article-section section-padding px-3 py-2 bg-white rounded">
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
                    <a href="/dashboard/posts" class="text-primary">
                        <i class="fa-regular fa-newspaper"></i
                    ></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Artikel
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form
                method="post"
                action="/dashboard/posts"
                class="mb-5"
                enctype="multipart/form-data"
                >
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label"
                    >Kategori <span class="text-danger">*</span></label
                    >
                    <select class="form-select" name="category_id">
                        @foreach ($categories as $category)
                            @if (old('category_id') == $category->id)
                                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="thumbnail" class="form-label"
                    >Thumbnail <span class="text-danger">*</span></label
                    >
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="source" class="form-label">Link Sumber Gambar</label>
                    <input type="text" class="form-control @error('source') is-invalid @enderror" id="source" name="source" autofocus value="{{ old('source') }}">
                    @error('source')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="copyright" class="form-label">Copyright</label>
                    <input type="text" class="form-control @error('copyright') is-invalid @enderror" id="copyright" name="copyright" autofocus value="{{ old('copyright') }}">
                    @error('copyright')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label"
                    >Body <span class="text-danger">*</span></label
                    >
                    <textarea id="body" type="hidden" name="body" class="body">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tags" class="form-label">
                        Tags <span class="text-danger">*pisahkan dengan koma (,) atau spasi ( )</span>
                    </label>
                    {{-- <input type="text" id="separatorTags" name="tags" multiple data-allow-new="true" data-allow-clear="true" data-separator=" |,|  " class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" autofocus value="{{ old('tags') }}">
                    @error('tags')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div> --}}
                    {{-- @enderror --}}
                    {{-- <select class="form-select" id="separatorTags" name="tags[]" multiple data-allow-new="true" data-allow-clear="true" data-separator=" |,|  ">>
                        <option value="">Masukkan Tag</option>
                    </select> --}}
                <input type="text" class="form-control @error('tags') is-invalid @enderror" id="form-tags" name="tags" autofocus value="{{ old('tags') }}">
                </div>
                <h4>Kebutuhan SEO</h4>
                <div class="mb-3">
                    <label for="meta_desc" class="form-label meta_desc" name="meta_desc"
                    >Meta Description <span class="text-danger">*</span></label
                    >
                    <textarea id="meta_desc" name="meta_desc" class="form-control meta_desc" style="height: 100px">{{ old('meta_desc') }}</textarea>
                    @error('meta_desc')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keywords" class="form-label">Meta Keywords <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords" name="keywords" required autofocus value="{{ old('keywords') }}">
                    @error('keywords')
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
    <!-- article end -->

@endsection

@section('myjsfile')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
            ClassicEditor
            .create( document.querySelector( '#body' ), {
                ckfinder: {
                    uploadUrl: '{{ route('posts.upload').'?_token='.csrf_token() }}'
                },
            })
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
            } );
    });
</script>
<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
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
<script src="{{ asset('plugins/tags/tagsinput.js') }}"></script>
<script>
    $(function() {
        $('#form-tags').tagsInput({
            'onAddTag': function(input, value) {
                console.log('tag added', input, value);
            },
            'onRemoveTag': function(input, value) {
                console.log('tag removed', input, value);
            },
            'onChange': function(input, value) {
                console.log('change triggered', input, value);
            }
        });
    });
</script>
@endsection