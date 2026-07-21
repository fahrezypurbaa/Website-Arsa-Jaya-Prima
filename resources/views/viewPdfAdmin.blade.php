@extends('layouts.main')
@section('container')
<div class="loader-container" id="containerLoader">
    <div class="dot-pulse"></div>
    <div class="dot-ket">Loading...</div>
</div>
<iframe src="{{ asset($file) }}" width="100%" height="700" id="pdfIframe">
    <p>Browser ini tidak mendukung PDF!</p>
</iframe>
@section("myjsfile")
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.getElementById("pdfIframe");
            const loader = document.getElementById("containerLoader");
            iframe.onload = function() {
                loader.style.display = 'none';
                iframe.style.display = 'block';
            };
        });
    </script>
@endsection
@endsection