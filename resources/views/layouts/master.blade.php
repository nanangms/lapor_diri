<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Gowes Virtual">
  <meta name="keywords" content="Gowes, Virtual, Kota Jambi">
  <meta name="author" content="NMS Project">
  <title>@yield('title') | Lapor Diri</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('ad/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('ad/dist/css/adminlte.min.css')}}">
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
  @yield('header')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts.topbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('images/favicon.png')}}" alt="Logo" class="brand-image elevation-3" style="opacity: .8"> 
      <span class="brand-text font-weight-light">Lapor Diri</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      @include('layouts.sidebar')

      @include('layouts.menu')
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    Copyright &copy; 2021 Support by: <a href="https://diskominfo.jambikota.go.id">Diskominfo Kota Jambi.</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('ad/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('ad/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('ad/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('ad/dist/js/demo.js')}}"></script>

@yield('footer')
<!-- Sweet alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
//flash message
        @if(session()->has('sukses'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('sukses') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('gagal'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('gagal') }}",
            timer: 3000,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });

        @endif
</script>

</body>
</html>
