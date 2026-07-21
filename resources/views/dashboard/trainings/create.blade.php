@extends('dashboard.layouts.main')

@section('container')
    <!-- program start -->
    <div class="program-section section-padding px-3 py-2 bg-white rounded">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/dashboard" class="text-primary"><i class="fa-solid fa-house-user"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/dashboard/trainings" class="text-primary">
                                <i class="fa-regular fa-file-lines"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            <i class="fa-solid fa-pencil me-1"></i> Tambah Program
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/dashboard/trainings" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Program Training <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" required autofocus value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug <span class="text-danger">*otomatis</span></label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" required value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="training_categories_id" class="form-label">Kategori Training <span
                                class="text-danger">*</span></label>
                        <select class="form-select" name="training_categories_id">
                            @foreach ($trainingcategories as $category)
                                <option value="{{ $category->id }}" {{ old('training_categories_id') }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="home_view" class="form-label">Web View<span class="text-danger">*</span></label>
                        <select class="form-select" name="home_view">
                            <option value="1">Tampil</option>
                            <option value="0">Tidak tampil</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kategori_sertifikasi" class="form-label">Kategori Sertifikasi <span
                                class="text-danger">*</span></label>
                        <select class="form-select" name="kategori_sertifikasi">
                            @foreach ($kategori_sertifikasi as $kategori)
                                <option value="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="total_waktu" class="form-label">Total Waktu (Jam) <span
                                class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('total_waktu') is-invalid @enderror"
                            id="total_waktu" name="total_waktu" required autofocus value="{{ old('total_waktu') }}">
                        @error('total_waktu')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi_persyaratan" class="form-label">Deskripsi Persyaratan</label>
                        <textarea id="deskripsi_persyaratan" type="hidden" name="deskripsi_persyaratan" class="form-control editor">{{ old('deskripsi_persyaratan') }}</textarea>
                        @error('deskripsi_persyaratan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="platform" class="form-label">Platform</label>
                        <textarea id="platform" type="hidden" name="platform" class="form-control editor">{{ old('platform') }}</textarea>
                        @error('platform')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail <span class="text-danger">*</span></label>
                        <input class="form-control @error('thumbnail') is-invalid @enderror" type="file" id="thumbnail"
                            name="thumbnail" onchange="previewThumbnail()">
                        <img class="thumbnail-preview img-fluid mb-3 col-sm-5">
                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail-mobile" class="form-label">Thumbnail Mobile <span
                                class="text-danger">*</span></label>
                        <img class="thumbnail-preview-mobile img-fluid mb-3 col-sm-5">
                        <input class="form-control @error('thumbnail_mobile') is-invalid @enderror" type="file"
                            id="thumbnail-mobile" name="thumbnail_mobile" onchange="previewThumbnailMobile()">
                        @error('thumbnail_mobile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail-jadwal" class="form-label">Thumbnail jadwal <span
                                class="text-danger">*</span></label>
                        <input class="form-control @error('thumbnail_jadwal') is-invalid @enderror" type="file"
                            id="thumbnail-jadwal" name="thumbnail_jadwal" onchange="previewThumbnailJadwal()">
                        <img class="thumbnail-preview-jadwal img-fluid mb-3 col-sm-5">
                        @error('thumbnail_jadwal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pricelist" class="form-label">Biaya Training</label>
                        <input type="number" class="form-control @error('pricelist') is-invalid @enderror"
                            name="pricelist" autofocus value="{{ old('pricelist') }}">
                        @error('pricelist')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (Description) <span
                                class="text-danger">*</span></label>
                        <textarea id="description" type="hidden" name="description" class="editor">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="outline" class="form-label">Materi (Outline) <span
                                class="text-danger">*</span></label>
                        <textarea id="outline" type="hidden" name="outline" class="editor">{{ old('outline') }}</textarea>
                        @error('outline')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="requirement" class="form-label">Persyaratan Peserta
                            <span class="text-danger">*Kemnaker/BNSP</span></label>
                        <textarea id="requirement" type="hidden" name="requirement" class="editor">{{ old('requirement') }}</textarea>
                        @error('requirement')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="method" class="form-label">Metode (Training Method)</label>
                        <textarea id="method" type="hidden" name="method" class="editor">{{ old('method') }}</textarea>
                        @error('method')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="durasi" class="form-label">Durasi </label>
                        <input type="text" class="form-control @error('durasi') is-invalid @enderror" id="durasi"
                            name="durasi" required autofocus value="{{ old('durasi') }}">
                        @error('durasi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="metode" class="form-label">Metode </label>
                        <input type="text" class="form-control @error('metode') is-invalid @enderror" id="metode"
                            name="metode" required autofocus value="{{ old('metode') }}">
                        @error('metode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="facility" class="form-label">Fasilitas (Facility) <span
                                class="text-danger">*</span></label>
                        <textarea id="facility" type="hidden" name="facility" class="editor">{{ old('facility') }}</textarea>
                        @error('facility')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="jadwal" class="form-label">Jadwal <span class="text-danger">*</span></label>
                        <textarea id="jadwal" type="hidden" name="jadwal" class="editor">{{ old('jadwal') }}</textarea>
                        @error('jadwal')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rundown" class="form-label">Rundown <span class="text-danger">*</span></label>
                        <textarea id="rundown" type="hidden" name="rundown" class="editor">{{ old('rundown') }}</textarea>
                        @error('rundown')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pemateri" class="form-label">Pemateri <span class="text-danger">*</span></label>
                        <textarea id="pemateri" type="hidden" name="pemateri" class="editor">{{ old('pemateri') }}</textarea>
                        @error('pemateri')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan <span class="text-danger">*</span></label>
                        <textarea id="tujuan" type="hidden" name="tujuan" class="editor">{{ old('tujuan') }}</textarea>
                        @error('tujuan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="paket_harga" class="form-label">Paket Harga <span
                                class="text-danger">*</span></label>
                        <textarea id="paket_harga" type="hidden" name="paket_harga" class="editor">{{ old('paket_harga') }}</textarea>
                        @error('paket_harga')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="paket_harga_2" class="form-label">Paket Harga Program Ke-2<span
                                class="text-danger">*</span></label>
                        <textarea id="paket_harga_2" type="hidden" name="paket_harga_2" class="editor">{{ old('paket_harga_2') }}</textarea>
                        @error('paket_harga_2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <h4>Kebutuhan SEO</h4>
                    <div class="mb-3">
                        <label for="meta_desc" class="form-label meta_desc" name="meta_desc">Meta Description</label>
                        <textarea id="meta_desc" name="meta_desc" class="form-control meta_desc" style="height: 100px">{{ old('meta_desc') }}</textarea>
                        @error('meta_desc')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="keywords" class="form-label">Meta Keywords</label>
                        <input type="text" class="form-control keywords" id="keywords" name="keywords"
                            value="{{ old('keywords') }}">
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
    <!-- program end -->
@endsection

@section('myjsfile')
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            ClassicEditor
                .create(document.querySelector('#description'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ]
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#outline'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#method'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ]

                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#facility'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#pricelist'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],

                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#requirement'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ]

                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#jadwal'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#rundown'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#pemateri'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#tujuan'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
            ClassicEditor
                .create(document.querySelector('#paket_harga'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#paket_harga_2'), {
                    removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption',
                        'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed'
                    ],
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/trainings/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        function previewThumbnail() {
            const image = document.querySelector('#thumbnail');
            const imgPreview = document.querySelector('.thumbnail-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewThumbnailMobile() {
            const image = document.querySelector('#thumbnail-mobile');
            const imgPreview = document.querySelector('.thumbnail-preview-mobile');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewThumbnailJadwal() {
            const image = document.querySelector('#thumbnail-jadwal');
            const imgPreview = document.querySelector('.thumbnail-preview-jadwal');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection
