<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min')}}"> --}}


  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    {{-- @include('layouts.backoffice.partials.alert') --}}

@if (count($errors)>0)
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Errors!</h5>
    <ul
        class=""
    >
        @foreach ($errors->all() as $error)
        <li class="nav-item">
            <p>{{ $error }}</p>
        </li>
        @endforeach
    </ul>

</div>
@endif
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        @yield('content')
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->


    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>



    <!-- jQuery -->
    {{-- <script src="{{asset('plugins/jquery/jquery.min')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/adminlte.min')}}"></script> --}}
    </body>
    </html>
