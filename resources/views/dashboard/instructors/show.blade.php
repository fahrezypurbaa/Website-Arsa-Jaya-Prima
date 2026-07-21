@extends('dashboard.layouts.main')
@section('container')

<!-- Instructor Start -->
<div class="instructor-section section-padding px-3 py-2 bg-white rounded">
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="/dashboard" class="text-primary"
                    ><i class="fa-solid fa-house-user"></i
                ></a>
                </li>
                <li class="breadcrumb-item">
                <a href="/dashboard/instructors" class="text-primary">
                    <i class="fa-solid fa-user-tie"></i>
                </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-eye me-1"></i> Detail Instruktur
                </li>
            </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card box border-0 p-2">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ asset('storage/'.$instructor->image) }}" alt="{{ $instructor->name }}">
                </div>
                <div class="col-md-8 m-auto">
                  <div class="card-body">
                    <div class="d-sm-flex justify-content-sm-between mb-2 mb-sm-3">
                      <div>
                        <h5 class="card-title mb-0 text-capitalize fw-bold text-primary">{{ $instructor->name }}</h5>
                      </div>
                    </div>
                    {!! $instructor->skill !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- Instructor End -->
@endsection