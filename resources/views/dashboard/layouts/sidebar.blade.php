<!-- Sidebar Start -->
<div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
  <div class="d-flex align-items-center p-3">
    <a href="/dashboard" class="sidebar-logo">
      <img src="{{ asset('img/arsa_logo.png') }}" alt="Arsa Consultant" />
    </a>
    <i
      class="sidebar-toggle fa-solid fa-bars fa-circle-left ms-auto fs-5 d-none d-md-block"></i>
  </div>
  <ul class="sidebar-menu p-3 m-0 mb-0">
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Form</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/messages">
        <i class="fa-solid fa-envelope sidebar-menu-item-icon"></i>
        <span>Pesan</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/inhouse">
        <i class="fa-solid fa-people-roof sidebar-menu-item-icon"></i> <span>Inhouse</span>
      </a>
    </li>
    {{-- <li class="sidebar-menu-item">
        <a href="all-public.html">
          <i class="fa-solid fa-people-group sidebar-menu-item-icon"></i>
          <span>Public</span> 
        </a>
      </li> --}}
    <li class="sidebar-menu-item">
      <a href="/dashboard/kemnaker">
        <i class="fa-solid fa-k sidebar-menu-item-icon"></i> <span>Kemnaker</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/bnsp">
        <i class="fa-solid fa-b sidebar-menu-item-icon"></i> <span>BNSP</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/softskill">
        <i class="fa-solid fa-s sidebar-menu-item-icon"></i> <span>Softskill</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/lainnya">
        <i class="fa-solid fa-l sidebar-menu-item-icon"></i> <span>Lainnya</span>
      </a>
    </li>
    @can('admin')
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Pelatihan</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/kategoriSertifikasi">
        <i class="fa-solid fa-layer-group sidebar-menu-item-icon"></i>
        <span>Kategori</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/instructors">
        <i class="fa-solid fa-user-tie sidebar-menu-item-icon"></i>
        <span>Instruktur</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/trainings">
        <i class="fa-regular fa-file-lines sidebar-menu-item-icon"></i>
        <span>Program</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/schedules">
        <i class="fa-solid fa-calendar-days sidebar-menu-item-icon"></i>
        <span>Jadwal</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/places">
        <i class="fa-solid fa-hotel sidebar-menu-item-icon"></i>
        <span>Lokasi Training</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/peserta">
        <i class="fa-solid fa-person-chalkboard sidebar-menu-item-icon"></i>
        <span>Peserta Training</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/pembayaran">
        <i class="fa-solid fa-wallet sidebar-menu-item-icon"></i>
        <span>Pembayaran</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/berkas">
        <i class="fa-solid fa-folder sidebar-menu-item-icon"></i>
        <span>Berkas</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/absensi">
        <i class="fa-solid fa-check-to-slot sidebar-menu-item-icon"></i>
        <span>Presensi Training</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/ongoing">
        <i class="fa-solid fa-person-circle-check sidebar-menu-item-icon"></i>
        <span>Ongoing Training</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/certificates">
        <i class="fa-solid fa-file-contract sidebar-menu-item-icon"></i>
        <span>Sertifikat</span>
      </a>
    </li>
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Blog</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/categories">
        <i class="fa-solid fa-rectangle-list sidebar-menu-item-icon"></i>
        <span>Kategori</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/posts">
        <i class="fa-regular fa-newspaper sidebar-menu-item-icon"></i>
        <span>Artikel</span>
      </a>
    </li>

    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Galeri</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/gallery-categories">
        <i class="fa-solid fa-film sidebar-menu-item-icon"></i>
        <span>Kategori</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/galleries">
        <i class="fa-regular fa-image sidebar-menu-item-icon"></i>
        <span>Foto</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/video">
        <i class="fa-solid fa-video sidebar-menu-item-icon"></i>
        <span>Video & Deskripsi</span>
      </a>
    </li>

    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Staff</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/staff">
        <i class="fa-solid fa-users-rectangle sidebar-menu-item-icon"></i>
        <span>Staff Admin</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/customer-service">
        <i class="fa-brands fa-whatsapp sidebar-menu-item-icon"></i>
        <span>Staff Arsa</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/users">
        <i class="fa-solid fa-users sidebar-menu-item-icon"></i>
        <span>Pengguna</span>
      </a>
    </li>
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Pengaturan Beranda</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/sliders">
        <i class="fa-solid fa-panorama sidebar-menu-item-icon"></i>
        <span>Slider Beranda</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/layanan">
        <i class="fa-solid fa-server sidebar-menu-item-icon"></i>
        <span>Layanan</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/about">
        <i class="fa-solid fa-building-user sidebar-menu-item-icon"></i>
        <span>Profil Singkat</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/about/document">
        <i class="fa-solid fa-file sidebar-menu-item-icon"></i>
        <span>File</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/facilities">
        <i class="fa-solid fa-gifts sidebar-menu-item-icon"></i>
        <span>Fasilitas</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/reviews">
        <i class="fa-solid fa-user-graduate sidebar-menu-item-icon"></i>
        <span>Testimoni</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/client">
        <i class="fas fa-handshake  sidebar-menu-item-icon"></i>
        <span>Clients</span>
      </a>
    </li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/ads">
        <i class="fa-solid fa-rectangle-ad sidebar-menu-item-icon"></i>
        <span>Popup Iklan</span>
      </a>
    </li>
    <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">INFORMASI</li>
    <li class="sidebar-menu-item">
      <a href="/dashboard/lokers">
        <i class="fa-solid fa-briefcase sidebar-menu-item-icon"></i>
        <span>Loker</span>
      </a>
    </li>
    @endcan
  </ul>
</div>
<div class="sidebar-overlay"></div>
<!-- Sidebar End -->