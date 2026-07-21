<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator | Arsa Training & Consulting</title>

  <!-- Icon -->
  <link rel="icon" href="{{ asset('img/logo.webp') }}" type="image/x-icon" />

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

  <!-- Datatables -->
  <link
    rel="stylesheet"
    type="text/css"
    href="{{ asset('plugins/datatables/datatables.min.css') }}" />

  <!-- Custom Style -->
  <link rel="stylesheet" href="{{ asset('css/style.css?v=)').time() }}" />
</head>

<body>
  @include('dashboard.layouts.sidebar')

  <!-- main wrapper start -->
  <div class="admin-wrapper bg-light">
    <div class="p-2">
      @include('dashboard.layouts.header')
      @yield('container')

    </div>
  </div>
  <!-- main wrapper end -->

  <!-- JQuery -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    data-pagespeed-no-defer></script>
  <script
    type="text/javascript"
    charset="utf8"
    src="{{ asset('plugins/datatables/datatables.min.js') }}"
    data-pagespeed-no-defer></script>
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Custom Script -->
  <script src="{{ asset('js/admin.js') }}" data-pagespeed-no-defer></script>
  @yield('myjsfile')
</body>

</html>