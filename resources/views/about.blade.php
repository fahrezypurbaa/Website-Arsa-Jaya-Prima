@extends('layouts.main')
@section('container')

<!-- page title -->

<section class="page-title-section" style="max-height: 80vh; height: 35em" data-background="{{ asset('img/business-building.webp') }}" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="relative-container position-relative text-light text-center">
        <h1 class="display-4 fw-bolder">PT. ARSA JAYA PRIMA</h1>
        <h2 class="mb-0">
            "One Stop Solution Training Provider"
        </h2>
    </div>
</section>
<!-- end page title -->
<!-- abaout start -->
<section class="about section-padding">
    <div class="responsive-container">
        <div class="row">
            <div class="col-12 m-auto">
                <div class="section-title text-center">
                    <h3 class="text-capitalize text-primary fw-bold">Tentang Kami</h3>
                </div>
                <hr class="w-50 m-auto mb-3">
                <p>Arsa Training merupakan perusahaan penyedia pelatihan dan sertifikasi yang memiliki lisensi resmi dibawah Kementrian Tenaga Kerja (KEMNAKER) dan Badan Nasional Sertifikasi Profesi (BNSP)</span>.
                    Arsa Training bergerak di bidang pelatihan dan sertifikasi K3</span> dan berbagai softskill non K3.
                    PT Arsa Jaya Prima berdiri di Yogyakarta berdasarkan Akta Notaris tanggal 8 April 2023
                    dan memulai kegiatan operasional bisnis pada awal tahun 2024. PT. Arsa Jaya Prima
                    yang kemudian mengangkat identitas sebagai ARSA TRAINING & CONSULTAN
                    merupakan perusahaan yang bergerak di bidang manajemen, keselamatan dan
                    Kesehatan kerja dan pelatihan sebagai upaya berkontribusi dan berdedikasi mendukung
                    institusi maupun organisasi lingkup sektoral dan nasional yang meliputi seluruh sektor
                    bisnis, Kawasan industry hulu dan hilir, pemerintahan maupun swasta. Core bisnis kami saat ini sebagai konsultan manajemen penyedia jasa pelatihan dan
                    sertifikasi keselamatan dan Kesehatan kerja bagi perusahaan atau client yang
                    membutuhkan.
                </p>
                <p>
                    Arsa Training & Consulting menyediakan berbagai layanan pelatihan, sertifikasi dan konsultasi di
                    bidang keselamatan dan Kesehatan kerja dimana sertifikasi diterbitkan oleh Lembaga-
                    lembaga seperti Kementrian ketenagakerjaan RI, BNSP, MIGAS, Akreditasi ISO / KAN,
                    dan Internal sertifikasi.
                </p>
                <p>
                    PT. Arsa Jaya Prima dengan sumber daya manusia yang memiliki etos kerja, komitmen
                    dan profesionalitas terus bertekad untuk berkembang menjadi perusahaan provider
                    ataupun vendor konsultan manajemen dan pelatihan sertifikasi unggul, terpercaya dan
                    berintegritas di Indonesia dengan menjunjung tinggi nilai-nilai kejujuran, integritas dan
                    berorientasi pada kepuasan pelanggan.
                    Kantor Pusat Kami beralamat di JL Panggungan Asri No 37 A. Sleman. Yogyakarta. Arsa
                    Training & Consulting berkomitmen menjadi perusahaan jasa k3 yang berintegritas,
                    unggul dan terpercaya serta mampu menyediakan berbagai macam produk jasa dan
                    konsultasi K3 pada berbagai wilayah di seluruh Indonesia.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- about end -->

<!-- vission start -->
<section class="vission section-padding bg-primary">
    <div class="responsive-container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center">
                    <h3 class="text-capitalize text-white fw-bold">Visi</h3>
                </div>
                <hr class="w-50 m-auto mb-3 text-white text-center">
                <p class="text-white text-center">“Komitmen prima menjadi provider training unggul, terpercaya dan berintegritas”</p>
            </div>
            <div class="col-md-6 col-sm-12 text-white m-auto">
                <div class="section-title text-center">
                    <h3 class="text-capitalize text-white fw-bold">Misi</h3>
                </div>
                <hr class="w-50 m-auto mb-3">
                <ol>
                    <li>Mitra jasa pelayanan pelatihan dan pembinaan K3 yang mengedepankan kualitas unggul dan tepat sasaran.</li>
                    <li>Komitmen berkesinambungan sejalan mengikuti perkembangan ilmu pengetahuan dan teknologi masa kini.</li>
                    <li>Profesionalisme membangun sinergi dan Kerjasama membentuk SDM berkualitas, kompeten dan berbudaya K3.</li>
                    <li>Mengedepankan hubungan kelembagaan yang kuat, terpercaya, efektif dan efisien.</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- vission end -->

<!-- team start -->
<section class="team section-padding bg-secondary-two">
    <div class="responsive-container">
        <div class="section-title text-center text-white">
            <h3 class="text-capitalize text-primary fw-bold" style="margin-bottom: 5px">Tim Arsa</h3>
            <h5 class="text-capitalize text-primary fw-bold team-mob-sub">Jajaran Direksi dan Kepala Divisi</h5>
        </div>
        <img src="{{ asset('img/staff/bersama_latest.webp')}}" width="100%" height="100%"
            srcset="{{ asset('img/staff/bersama_latest.webp')}} 900w, {{ asset('img/staff/bersama_latest.webp')}} 2000w"
            loading="lazy" alt="foto" />
        <div class="mt-3 row justify-content-center align-items-center">
            <hr class="m-auto mb-3">
            <div class="mt-5" id="team">
             @foreach ($teams as $team)
                <div className='sub-team'>
                    <img class="m-auto" src="{{ asset('storage/' . $team->image) }}" loading="lazy"
                        height="250" alt="{{ $team->name }}" />
                    <div class="text-center sub-teams"> {{ $team->name }}<br />
                        {{ $team->jabatan }}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
<!-- team end -->

<!-- mission start -->
<section class="section-padding bg-primary">
    <div class="responsive-container">
        <div class="row">
            <div class="col-12 col-md-12 m-auto">
                <div class="section-title text-center">
                    <h3 class="text-capitalize text-white fw-bold">Company Profile</h3>
                </div>
                <hr class="w-50 m-auto mb-3 text-white">
                <!-- Desktop view -->
                <div class="d-none d-md-block text-center">
                    <embed
                        src="https://docs.google.com/gview?embedded=true&url=https://www.arsatraining.com/storage/files/company-profile-arsa.pdf&amp;embedded=true"
                        type="application/pdf" width="100%" height="500">
                    <a href="/company-profile/download" class="btn btn-light rounded text-primary fw-bold mt-3 text-center">
                        <i class="fa-solid fa-download"></i> &nbsp; Unduh Company Profile
                    </a>
                </div>
    
                <!-- Mobile view -->
                <div class="d-block d-md-none text-center mt-3">
                    <a href="/company-profile/download" class="btn btn-light rounded text-primary fw-bold">
                        <i class="fa-solid fa-download"></i> &nbsp; Unduh Company Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mission end -->
<div class="text-center section-padding">
    <h3 class="text-capitalize fw-bold">PT. ARSA JAYA PRIMA</h3>
    <is>One Stop Solution, Training Provider</is>
</div>

@endsection