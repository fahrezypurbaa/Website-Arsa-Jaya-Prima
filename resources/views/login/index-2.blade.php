@extends('layouts.main')
@section('container')

 <!-- login section start -->
 <section class="login section-padding d-flex justify-content-center align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show w-md-50" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger w-md-50">
                {{ session('error') }}
            </div>
            @endif

            @if(session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show w-md-50" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            

            <div class="bg-white col-md-7 col-lg-6 col-xl-5 py-5 px-4 px-sm-5">
            <div class="login-form box">
                {{-- <h2 class="form-title text-center">Login Administrator</h2> --}}
                <h5 class="section-title mt-2 mb-3 text-center">Login Administrator</h5>
                <form action="/login" method="post">
                    <div class="row g-3">
                      @csrf
                      <div class="col-12">
                        <div class="form-floating">
                          <input
                            type="email"
                            class="form-control @error('email') is-invalid @enderror"
                            id="email"
                            name="email"
                            required 
                            value="{{ old('email') }}"
                            placeholder="Email"
                          />
                          @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                          @enderror
                          <label for="email">Email</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required value="{{ old('password') }}" placeholder="Password">
                          @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                          @enderror
                          <label for="password">Password</label>
                        </div>
                      </div>
                      <div class="col-12">
                        <button class="btn btn-primary w-100 py-3 px-5" type="submit" id="login">
                          Login
                        </button>
                      </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>
<!-- login section end -->

@endsection