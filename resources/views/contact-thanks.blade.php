@extends('layouts.main')

@section('container')

<!-- Schedule Start -->
<section class="feedback-section px-2 bg-light text-center">
    <img src="{{ asset('img/ceklist.png')}}" alt="check" width="100px" height="100px">
    @if($thanks == 'register')
    <div class="feedback-content">
        <h1>Registrasi Berhasil!</h1>
        <p class="text-center mt-3 mb-5">
            Selamat, formulir Anda sudah terkirim.<br/>
            Mohon ditunggu selama beberapa jam kedepan, tim kami akan segera menghubungimu.<br/>
            <a href="/" class="btn btn-primary rounded text-center mt-5 mb-3">Back Home</a>
        </p>
    </div>
    @elseif($thanks == 'consult')
    <div class="feedback-content">
        <h1>Terimakasih sudah menghubungi kami!</h1>
        <p class="text-center mt-3 mb-5">
            Selamat, pesan Anda sudah terkirim.<br/>
            Mohon ditunggu selama beberapa jam kedepan, tim kami akan segera menghubungimu.<br/>
            <a href="/" class="btn btn-primary rounded text-center mt-5 mb-3">Back Home</a>
        </p>
    </div>
    @else
        <h1>Terimakasih sudah menghubungi kami!</h1>
    @endif
    <div class="bottom">
        <h4>Follow Us</h4>
        <div class="d-flex text-center justify-content-center">
            <a href="https://www.instagram.com/arsatraining/" target="_blank" rel="noopener" aria-label="Arsa Training & Consulting Instagram Official Account"><i class="fa-brands fa-instagram fa-2x me-1 ms-1"></i></a>
            <a href="https://www.facebook.com/profile.php?id=61551701295680" target="_blank" rel="noopener" aria-label="Arsa Training & Consulting Facebook Official Account"><i class="fa-brands fa-facebook fa-2x me-1 ms-1"></i></a>
            <a href="https://twitter.com/arsatraining" target="_blank" rel="noopener" aria-label="Arsa Training & Consulting Twitter Official Account"><i class="fa-brands fa-twitter fa-2x me-1 ms-1"></i></a>
            <a href="https://www.tiktok.com/@arsatraining" target="_blank" rel="noopener" aria-label="Arsa Training & Consulting Tiktok Official Account"><i class="fa-brands fa-tiktok fa-2x me-1 ms-1"></i></a>
            <a href="https://www.youtube.com/channel/UCyEAsMyUWJYem2-EUMLPQKg" target="_blank" rel="noopener" aria-label="Arsa Training & Consulting Youtube Official Channel"><i class="fa-brands fa-youtube fa-2x me-1 ms-1"></i></a>
        </div>
    </div>
</section>
@endsection