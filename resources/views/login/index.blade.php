
    <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login Administrator | Arsa Training & Consulting</title>
    
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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
        <!-- Custom Style -->
        <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}" />

    </head>
      <body>
        <div class="main-wrapper">
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
        
                            @if(session()->has('loginError'))
                            <div class="alert alert-danger alert-dismissible fade show w-md-50" role="alert">
                                {{ session('loginError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-6 col-lg-4">
                        <div class="card mb-0 box border-0">
                            <div class="card-body">
                            <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3">
                                <img src="{{ asset('img/arsa_logo.png') }}" class="w-50" alt="PT Arsa Jaya Prima">
                            </a>
                            <p class="text-center">Login Administrator</p>
                            <form action="/loginUser" method="post">
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
            </div>   
        </div>

        <!-- JQuery -->
        <script defer="defer" 
          src="https://code.jquery.com/jquery-3.6.1.min.js"
          integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
          crossorigin="anonymous"
        ></script>
        <!-- JavaScript Bundle with Popper -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script defer="defer" src="{{ asset('js/script.js') }}"></script>
      </body>
    </html>
    