@extends('layouts.main')
@section('container')

<!-- Contact Start -->
<section class="page-title-section section-padding" data-background="img/banner/banner-contact.webp" style="background-repeat: no-repeat; background-size: cover;" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="responsive-container position-relative">
    <div class="row">
      <div class="col-md-8 section-padding">
        <h1 class="display-4 fw-bolder text-light text-uppercase">Hubungi Kami</h1>
      </div>
    </div>
  </div>
</section>
<section class="contact section-padding">
  <div class="responsive-container">
    <div class="row g-5">
      <div
        class="col-lg-6 wow fadeInUp"
        data-wow-delay="0.1s"
        style="
        visibility: visible;
        animation-delay: 0.1s;
        animation-name: fadeInUp;
      ">
        <div class="section-title mb-4 text-center text-md-start">
          <h1 class="text-capitalize mt-2">Hubungi Kami</h1>
        </div>
        <p class="mb-4">
          Jika Anda memiliki pertanyaan, saran, atau ingin berbicara
          dengan kami tentang layanan kami, jangan ragu untuk menghubungi
          kami melalui informasi kontak di bawah. <br />
          Kami berkomitmen untuk memberikan pelayanan terbaik kepada
          pelanggan kami dan akan merespon pertanyaan atau permintaan Anda
          secepat mungkin. Terima kasih telah mengunjungi situs kami, dan
          kami berharap dapat berbicara dengan Anda segera.
        </p>
        <div class="row pt-2 g-2">
          <div class="col-sm-6">
            <div class="d-flex align-items-center">
              <div
                class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                <i class="fa fa-envelope-open text-white"></i>
              </div>
              <div class="ms-3">
                <p class="mb-md-2 mb-0">Email us</p>
                <span class="mb-0">admin@arsatraining.com</span>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="d-flex align-items-center">
              <div
                class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                <i class="fa fa-phone-alt text-white"></i>
              </div>
              <div class="ms-3">
                <p class="mb-md-2 mb-0">Telepon</p>
                <span class="mb-0">0851 7327 0218</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form method="post" action="/kontak-kami" enctype="multipart/form-data" >
          <div class="row g-3 contact-form">
            @csrf
            <div class="col-12">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control @error('name') is-invalid @enderror"
                  id="name"
                  name="name"
                  required
                  value="{{ old('name') }}"
                  placeholder="Nama" />
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                <label for="no_telp">Nama</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input
                  type="number"
                  class="form-control @error('no_hp') is-invalid @enderror"
                  id="no_hp"
                  name="no_hp"
                  required
                  value="{{ old('no_hp') }}"
                  placeholder="no_hp" />
                @error('no_hp')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                <label for="no_hp">Contact Whatsapp</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <input
                  type="email"
                  class="form-control @error('email') is-invalid @enderror"
                  id="email"
                  name="email"
                  required
                  value="{{ old('email') }}"
                  placeholder="Email" />
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
                <label for="email">Email</label>
              </div>
            </div>
            <div class="col-12">
                <textarea type="text" class="form-control h-auto @error('message') is-invalid @enderror" id="message" name="message" required value="{{ old('message') }}"
                 rows="5">Pesan   
              </textarea>
                @error('message')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-12">
              <button
                class="btn btn-primary py-3 px-5"
                type="submit"
                id="sendmessage">
                Kirim Pesan
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Contact End -->

@endsection

@section('myjsfile')
<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
    fetch('/kontak-kami/checkSlug?name=' + name.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
</script>
@endsection