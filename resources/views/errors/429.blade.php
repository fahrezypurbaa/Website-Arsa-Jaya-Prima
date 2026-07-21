@extends('errors::layout')

@section('seo')
<title>429 Too Many Requests | Arsa Consultant</title>
@endsection

@section('title', __('Too Many Requests'))
@section('code', '429')

@section('container')
<!-- Error Start -->
<section id="error" class="error section-padding">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <img src="{{ asset('img/error.png') }}" style="margin:auto;width:50%" alt="error"/> <br/>
                <div class="display-6 mb-4" style="margin-top: 20px;">429 - Too Many Requests</div>
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