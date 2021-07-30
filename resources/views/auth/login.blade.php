<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Data Gowes Virtual Kota Jambi">
  <meta name="author" content="NMS Project">
  <title>Log in | Lapor Diri</title>
  <link rel="shortcut icon" href="{{asset('images/logo_etle.png')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('ad/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('ad/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('ad/dist/css/adminlte.min.css')}}">
  <link rel="icon" href="{{asset('images/favicon.png')}}">
</head>
<body class="hold-transition login-page" style="background-color: #dfdfdf; ">
<div class="login-box">
  <div class="login-logo" style="font-size: 20pt !important;">
    <!-- <a href="/login"><img src="{{asset('images/logo_gowes.png')}}" width="300px"></a> -->
  </div>
  <h5 align="center">Dashboard <br>LAPOR DIRI</h5>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Login</p>
@if(session('gagal'))
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <i class="fas fa-exclamation-triangle"></i> {{session('gagal')}}
</div>
@endif  
@if(session('sukses'))
<div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <i class="fas fa-check" aria-hidden="true"></i>  {{session('sukses')}}
</div>  
@endif
      <form action="/postlogin" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
        <br>
        &copy; 2021 Lapor Diri.
      </form>
    </div>
    <!-- /.login-card-body -->

  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('ad/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('ad/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('ad/dist/js/adminlte.min.js')}}"></script>
</body>
</html>
