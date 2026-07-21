@extends('layout.main')
@section('container')
<section class="course-detail py-5 px-4 course-bg">
    <div class="responsive-container">
      <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">
          <div class="img box p-0">
            <img src="img/thumbnail-2.webp" alt="" />
          </div>
          <div
            class="title-group box d-grid bg-white top-0 d-inline d-md-none"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
                {{ $training->name }}
              </h1>
            </div>
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              <ul>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Training
                  Kit
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Handout
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Certificate
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Lunch + 2x
                  Coffee Break
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Souvenir
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Pick Up
                  Participant (Yogyakarta)
                </li>
              </ul>
            </div>
            <hr />
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span class="fs-5 fw-bolder">Rp X.XXX.XXX</span>
            </div>
            <button
              type="button"
              class="btn btn-primary w-100"
              data-bs-toggle="modal"
              data-bs-target="#register-modal"
            >
              Daftar Sekarang
            </button>
          </div>
          <div class="schedule-section box">
            <h4 class="course-title text-capitalize text-center">
              Jadwal Training Terdekat
            </h4>
            <div class="course-schedules mb-3">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Skema</th>
                    <th scope="col">Jadwal</th>
                    <th scope="col">Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="description-section box">
            <h4 class="course-title text-capitalize text-center">
              Description
            </h4>
            <div class="desc-content">
              <p>
                Kemudahan akses perkreditan atau pembiayaan merupakan salah
                satu aspek penting dalam menciptakan sistem keuangan yang
                sehat dalam rangka mendukung pertumbuhan ekonomi suatu
                negara. Kemudahan akses perkreditan atau pembiayaan perlu
                didukung dengan adanya sistem informasi yang berfungsi
                sebagai sarana pertukaran informasi kredit antar lembaga
                jasa keuangan. Sesuai dengan ketentuan peraturan
                perundang-undangan, Otoritas Jasa Keuangan diberikan
                kewenangan untuk mengatur dan mengembangkan penyelenggaraan
                sistem informasi antar bank yang dapat diperluas dengan
                menyertakan lembaga lain di bidang keuangan.
              </p>
              <p>
                Oleh sebab itu, dalam rangka melaksanakan tugas dan
                fungsinya, Otoritas Jasa Keuangan memandang perlu
                mengembangkan sebuah sistem baru untuk mendukung akses
                informasi perkreditan melalui Sistem Layanan Informasi
                Keuangan (SLIK). SLIK dapat dimanfaatkan untuk memperlancar
                proses penyediaan dana, penerapan manajemen risiko,
                penilaian kualitas debitur, dan meningkatkan disiplin
                industri keuangan. Dalam rangka meningkatkan efektivitas dan
                efisiensi penyelenggaraan SLIK diperlukan pengaturan
                mengenai pelaporan dan permintaan informasi debitur melalui
                SLIK.
              </p>
              <p>
                Menindaklanjuti hal tersebut, perlu nya setiap pegawai
                meningkatkan pemahaman aplikasi SLIK OJK di User Pelapor,
                untuk mengetahui cara penggunaan Aplikasi SLIK, meningkatkan
                performa penyiapan data laporan, memahami dan mengetahui
                jenis-jenis Error SLIK, dan mempermudah penyelesaian error
                yang terjadi di dalam proses pengiriman laporan SLIK.
              </p>
              <h4 class="course-title text-capitalize text-center mt-2">
                Objective
              </h4>
              <p></p>
              <ul class="list-styled">
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta memahami aplikasi SLIK OJK di User Pelapor, untuk
                  mengetahui cara penggunaan Aplikasi SLIK
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta bisa meningkatkan performa penyiapan data laporan
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta memahami dan mengetahui jenis-jenis Error SLIK,
                  dan mempermudah penyelesaian error yang terjadi di dalam
                  proses pengiriman laporan SLIK
                </li>
              </ul>
            </div>
          </div>
          <!-- <div class="objective-section box">
            <h4 class="course-title text-capitalize text-center">
              Objective
            </h4>
            <div class="objective-content">
              <ul class="list-styled">
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta memahami aplikasi SLIK OJK di User Pelapor, untuk
                  mengetahui cara penggunaan Aplikasi SLIK
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta bisa meningkatkan performa penyiapan data laporan
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Peserta memahami dan mengetahui jenis-jenis Error SLIK,
                  dan mempermudah penyelesaian error yang terjadi di dalam
                  proses pengiriman laporan SLIK
                </li>
              </ul>
            </div>
          </div> -->
          <div class="outline-section box">
            <h4 class="course-title text-capitalize text-center">
              Outline
            </h4>
            <div class="outline-content">
              <ul class="list-styled">
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Mengulas
                  POJK No 18/POJK.03/2017 & SEOJK.03/2017
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Kesalahan
                  dan Kekeliruan yang Krusial Isi Segmen Data
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Perlakuan
                  dan Implementasi Segmen Data
                  <ul class="list-styled ms-3">
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      D01-Debitur Perorangan
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      D02-Debitur Badan Usaha
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F01-Fasilitas Kredit/Pembiayaan
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F02-Fasilitas Kredit/Pembiayaan
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F03-Surat Berharga
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F04-Irrevocable LC
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F05-Bank Garansi
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      F06-Fasilitas Lainnya
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      A01-Agunan
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      P01-Penjamin
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      M01-Pengurus/Pemilik
                    </li>
                    <li>
                      <i class="fa-regular fa-circle-check me-1"></i>Segmen
                      K01-Laporan Keuangan Debitur
                    </li>
                  </ul>
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Persiapan
                  Sistem & Data Summary
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Penyampaian Laporan Debitur/Koreksi Debitur Online and
                  Offline
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Contoh
                  Pengisian Data
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Group
                  Discussion
                </li>
              </ul>
            </div>
          </div>
          <div class="participant-section box">
            <h4 class="course-title text-capitalize text-center">
              Participant
            </h4>
            <div class="participant-content">
              <p>
                Divisi Akuntansi, Divisi Pelaporan, Divisi MIS, Divisi
                Kredit, Front Office, Divisi Manajemen Resiko, Divisi
                Kepatuhan
              </p>
            </div>
          </div>
          <div class="method-section box">
            <h4 class="course-title text-capitalize text-center">
              Training Method
            </h4>
            <div class="objective-content">
              <ul class="list-styled">
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Pre test
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Presentation
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Discussion
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Case Study
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Post test
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>
                  Evaluation
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 d-none d-md-inline">
          <div
            class="title-group box d-grid bg-white position-sticky top-0"
          >
            <div class="course-title mb-3">
              <h1
                class="display-6"
                style="
                  font-size: 24px;
                  font-weight: 700;
                  color: var(--dark-to-main-color);
                "
              >
              {{ $training->name }}
              </h1>
            </div>
            <div class="course-benefit mb-3">
              <span>Fasilitas Training</span>
              <ul>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Training
                  Kit
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Handout
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Certificate
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Lunch + 2x
                  Coffee Break
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Souvenir
                </li>
                <li>
                  <i class="fa-regular fa-circle-check me-1"></i>Pick Up
                  Participant (Yogyakarta)
                </li>
              </ul>
            </div>
            <hr />
            <div class="price-list mb-2 mt-2">
              <span class="fw-bold">Biaya Training</span>
              <br />
              <span class="fs-5 fw-bolder">Rp X.XXX.XXX</span>
            </div>
            <button
              type="button"
              class="btn btn-primary w-100"
              data-bs-toggle="modal"
              data-bs-target="#register-modal"
            >
              Daftar Sekarang
            </button>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection