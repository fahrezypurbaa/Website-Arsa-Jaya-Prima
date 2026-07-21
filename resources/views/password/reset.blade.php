<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Administrator | Arsa Consultant</title>

    <!-- Icon -->
    <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/x-icon" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />

    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}" />

</head>
  <body>
    <div class="main-wrapper">
        {{-- <div class="row d-flex justify-content-center align-items-center">

            <div class="col-sm col-md-6 col-lg-4">
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
            </div>
        </div> --}}
        <div class="bg-light min-vh-100 d-flex justify-content-center align-items-center">
            
            <div class="row w-100 d-flex justify-content-center align-items-center">
                <div class="row d-flex justify-content-center align-items-center">
            
                    <div class="col-sm-8 col-md-6 col-lg-4">
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
                    </div>
                </div>
                <div class="col-sm-8 col-md-6 col-lg-4">
                    <div class="card mb-0 box border-0">
                        <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3">
                                <img src="{{ asset('img/company-logo-color.webp') }}" class="w-50" alt="">
                            </a>
                            <p class="text-center">Login Administrator</p>
                            <form action="{{ route('password.update') }}" method="POST">
                                @method('put') @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="email">Alamat Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" required autofocus value="{{ old('email') }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password"
                                        >New Password <span class="text-danger">*</span></label
                                        >
                                        <input
                                        type="password"
                                        name="password"
                                        class="form-control @error('password')is-invalid @enderror"
                                        id="password"
                                        required
                                        />
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation"
                                        >Confirm New Password <span class="text-danger">*</span></label
                                        >
                                        <input
                                        type="password"
                                        name="password_confirmation"
                                        class="form-control @error('password_confirmation')is-invalid @enderror"
                                        id="password_confirmation"
                                        required
                                        />
                                        @error('password_confirmation')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </div>
                                <div class="mt-2">
                                <button type="submit" class="btn btn-success me-2">
                                    Update Password
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    <!-- JQuery -->
    <script defer="defer" 
      src="https://code.jquery.com/jquery-3.6.1.min.js"
      integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
      crossorigin="anonymous"
    ></script>
    <!-- JavaScript Bundle with Popper -->
    <script defer="defer" 
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script defer="defer" src="{{ asset('js/script.js') }}"></script>
  </body>
</html>
