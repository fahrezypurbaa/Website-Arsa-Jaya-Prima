@extends('layouts.main')
@section('container')
    <section class="section-padding">
        <div class="responsive-container">
            <div class="row">
                <div class="col-12">
                    <div class="row text-center align-items-center justify-content-center loker-detail">
                        {{-- Logo Perusahaan / Flyer --}}
                        <img loading="lazy" src="{{ asset('img/banner/telemarketing.jpeg') }}" 
                             class="img-fluid mb-3 rounded shadow-sm" 
                             alt="Staff Telemarketing Sales" 
                             height="200">

                        <h4 class="fw-semibold text-secondary">PT. ARSA JAYA PRIMA (Arsa Training & Consulting)</h4>
                        <h1 class="display-6 text-center"
                            style="
                                font-size: 24px;
                                font-weight: 700;
                                color: var(--dark-to-main-color);
                            ">
                            Staff Telemarketing Sales
                        </h1>
                        <p class="text-muted mb-2">
                            📍 Arsa Learning Center, Jl. Panggungan Asri No. 37 A, Sleman, Yogyakarta
                        </p>
                    </div>
                    <hr>

                    {{-- Tentang Perusahaan --}}
                    <div class="loker-description mt-4">
                        <h4 class="fw-bold text-dark mb-2">Tentang Perusahaan</h4>
                        <p class="text-muted">
                            PT. Arsa Jaya Prima (Arsa Training & Consulting) adalah perusahaan penyedia jasa 
                            pelatihan, pembinaan, dan sertifikasi K3 yang berlisensi resmi dari 
                            <b>KEMNAKER RI</b> dan <b>BNSP</b>.
                        </p>
                    </div>

                    {{-- Deskripsi Pekerjaan --}}
                    <div class="loker-description mt-4">
                        <h4 class="fw-bold text-dark mb-2">Deskripsi Pekerjaan</h4>
                        <ul class="text-muted">
                            <li>Menghubungi dan menawarkan produk kepada client melalui telemarketing</li>
                            <li>Menjaga dan membangun relasi jangka panjang dengan client</li>
                            <li>Mengelola serta mencari database client potensial</li>
                            <li>Menyusun laporan harian (daily journal) terkait aktivitas client</li>
                        </ul>
                    </div>

                    {{-- Kualifikasi --}}
                    <div class="persyaratan mt-4">
                        <h4 class="fw-bold text-dark mb-2">Kualifikasi</h4>
                        <ul class="text-muted">
                            <li>Wanita, usia maksimal 26 tahun</li>
                            <li>Pendidikan minimal S1 dari semua jurusan</li>
                            <li>Pengalaman minimal 1 tahun (Fresh Graduate dipersilakan melamar)</li>
                            <li>Berdomisili di Yogyakarta</li>
                        </ul>
                        <ul class="text-muted mt-2">
                            <li>Pengalaman di bidang Telemarketing atau K3 menjadi nilai tambah</li>
                            <li>Menguasai MS Office & Google Workspace</li>
                            <li>Berorientasi pada target, disiplin, teliti, dan memiliki komunikasi yang baik</li>
                        </ul>
                    </div>

                    {{-- Fasilitas & Benefit --}}
                    <div class="mt-4">
                        <h4 class="fw-bold text-dark mb-2">Fasilitas & Benefit</h4>
                        <ul class="text-muted">
                            <li>Gaji pokok kompetitif</li>
                            <li>BPJS Ketenagakerjaan</li>
                            <li>Lingkungan kerja nyaman</li>
                            <li>Full internet access</li>
                            <li>Fasilitas penunjang jabatan</li>
                            <li>Bonus kinerja</li>
                        </ul>
                    </div>

                    {{-- Cara Melamar --}}
                    <div class="mt-4">
                        <h4 class="fw-bold text-dark mb-2">Cara Melamar</h4>
                        <p class="text-muted mb-1">
                            Kirimkan CV dan berkas pendukung dalam <b>1 file PDF</b> ke:
                        </p>
                        <p class="mb-1">
                            📧 <b>Email:</b> <a href="mailto:karir@arsatraining.com" class="text-decoration-none text-dark">karir@arsatraining.com</a>
                        </p>
                        <p class="mb-2">
                            📱 <b>No. Telp/WA:</b> 
                            <a href="tel:+622742250057" class="text-decoration-none text-dark">(0274) 2250057</a> / 
                            <a href="https://wa.me/6282325613477" class="text-decoration-none text-success">0823 2561 3477</a>
                        </p>
                        <p class="text-danger fw-semibold">
                            ⏳ Batas pengiriman berkas: 15 April 2026
                        </p>
                    </div>
                    {{-- Tombol Daftar --}}
                    <div class="mt-5 text-center">
                        <a href="https://forms.gle/w5MJ2iUYuiMfBtWYA" target="_blank" class="btn btn-lg px-5 py-3 shadow" 
                           style="background-color: var(--dark-to-main-color); color: white; border-radius: 50px; font-weight: 600; transition: 0.3s;">
                            <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang Melalui Google Form
                        </a>
                        <p class="text-muted mt-3 small">
                            *Pastikan Anda telah menyiapkan CV dalam format PDF sebelum mengisi formulir.
                        </p>
                    </div>
                </div> {{-- Penutup col-12 --}}
            </div> {{-- Penutup row --}}
        </div>
    </section>
@endsection
