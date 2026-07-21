@extends('errors::layout')

@section('seo')
<title>402 Payment Required | Arsa Consultant</title>
@endsection

@section('title', __('Payment Required'))
@section('code', '402')

@section('container')
<!-- Error Start -->
<section id="error" class="error section-padding">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <i class="fa-solid fa-triangle-exclamation display-1 text-primary"></i>
                <h1 class="display-1">402</h1>
                <span class="display-6 mb-4">Payment Required</span>
                <div class="d-flex justify-content-center align-items-center mt-3">
                    <a href="/" class="btn btn-primary btn-sm"
                    >Beranda</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Error End -->
@endsection
