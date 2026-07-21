<header id="header" class="header bg-white responsive-container">
    <div class="site-navigation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-dark p-2">
                        <div class="logo">
                            <a class="navbar-brand" href="/"><img src="{{ asset('img/arsa_logo.png') }}"
                                    width="200" height="100%" alt="Arsa Training & Consulting" /></a>
                        </div>
                        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse"
                            data-bs-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false"
                            aria-label="Menu">
                            <i class="fa-solid fa-bars text-white"></i>
                        </button>
                        <div id="navbar-collapse" class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown view">
                                    <a class="nav-link dropdown-toggle" href="#" id="beranda" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kenali
                                        Arsa</a>
                                    <div class="dropdown-menu" aria-labelledby="Home">
                                        <a class="dropdown-item" href="/tentang-kami">Profil Perusahaan</a>
                                        <a class="dropdown-item" href="/kontak-kami">Hubungi Kami</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown view">
                                    <a class="nav-link dropdown-toggle" href="#" id="training" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Layanan</a>
                                    <div class="dropdown-menu" aria-labelledby="Training">
                                        <a class="dropdown-item" href="/sertifikasi-kemnaker-ri">Sertifikasi Kemnaker
                                            RI</a>
                                        <a class="dropdown-item" href="/sertifikasi-bnsp">Sertifikasi BNSP</a>
                                        <a class="dropdown-item" href="/training-softskill">Upskill Training by ARSA</a>
                                        <a class="dropdown-item" href="/perpanjangan-sio-lisensi-skp">Perpanjangan
                                            SIO/Lisensi/SKP</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown view">
                                    <a class="nav-link dropdown-toggle" href="#" id="aboutUs" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Pendaftaran</a>
                                    <div class="dropdown-menu" aria-labelledby="About Us">
                                        <a class="dropdown-item" href="/pendaftaran-sertifikasi-inhouse">Inhouse
                                            Training</a>
                                        <a class="dropdown-item" href="/pendaftaran-sertifikasi-kemnaker-ri">Pelatihan
                                            K3 Sertifikasi Kemnaker RI <a>
                                        <a class="dropdown-item" href="/pendaftaran-sertifikasi-bnsp">Pelatihan
                                            Sertifikasi BNSP</a>
                                        <a class="dropdown-item" href="/pendaftaran-training-softskill">Upskill Training by ARSA</a>
                                        <a class="dropdown-item"
                                            href="/perpanjangan-sio-lisensi-skp">Perpanjangan
                                            SIO/SKP/Lisensi</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown view">
                                    <a class="nav-link dropdown-toggle" href="#" id="registration" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">Informasi</a>
                                    <div class="dropdown-menu" aria-labelledby="Registration">
                                        <a class="dropdown-item" href="/blog">Artikel</a>
                                        <a class="dropdown-item" href="/galeri">Galeri Pelatihan</a>
                                        <a class="dropdown-item" href="/loker">Info Loker</a>
                                        <a class="dropdown-item" href="/lokasi-training">Lokasi Pelatihan</a>
                                        {{-- <a class="dropdown-item" href="/instruktur">Tenaga Ahli</a> --}}
                                        <a class="dropdown-item" href="/sertifikat">Cek Sertifikat</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a href="/jadwal" class="nav-link">Jadwal</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
