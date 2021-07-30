<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>@yield('title') | Lapor Diri</title>
    
    <!-- Loading Bootstrap -->
    <link href="{{asset('tm/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Loading Template CSS -->
    <link href="{{asset('tm/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('tm/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('tm/css/style-magnific-popup.css')}}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="{{asset('tm/css/fonts.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome-all.min.css')}}">
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <!--headerIncludes-->
    @yield('header2')
</head>
<body>
    
    <!--begin loader -->
    <div id="loader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    
    <header class="header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">                     
                    <a href="/" class="navbar-brand brand scrool"><span class="red">Lapor</span>Diri</a>
                </div>              
            </div>
        </nav>
    </header>

    @yield('content2')
    
    
    <!--begin footer -->
    <div class="footer">
            
        <!--begin container -->
        <div class="container">
        
            <!--begin row -->
            <div class="row">
            
                <!--begin col-md-12 -->
                <div class="col-md-12 text-center">
                    
                    <!--begin copyright -->
                    <div class="copyright">
                        <p class="footer-logo"><span class="blue">Lapor</span>Diri</p>
                        <p>Copyright © 2021. Designed &amp; Developed by <a href="https://diskominfo.jambikota.go.id" target="_blank">Diskominfo Kota Jambi</a></p>
                        
                    </div>
                    <!--end copyright -->
                                                    
                    <!--begin footer_social -->
                    
                    
                </div>
                <!--end col-md-6 -->
                
            </div>
            <!--end row -->
            
        </div>
        <!--end container -->
                
    </div>
    <!--end footer -->
    

    <!-- Load JS here for greater good =============================-->
    <script src="{{asset('tm/js/jquery-1.11.3.min.js')}}"></script>
    <script src="{{asset('tm/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('tm/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('tm/js/jquery.nav.js')}}"></script>
    <script src="{{asset('tm/js/jquery.scrollTo-min.js')}}"></script>
    <script src="{{asset('tm/js/SmoothScroll.js')}}"></script>
    <script src="{{asset('tm/js/wow.js')}}"></script>
    <script src="{{asset('tm/js/custom.js')}}"></script>
    <script src="{{asset('tm/js/plugins.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
        //flash message
        @if(session()->has('sukses'))
        swal("Berhasil", "{{session('sukses')}}", "success");
        @elseif(session()->has('gagal'))
        swal("GAGAL!", "{{session('gagal')}}", "error");
        @endif
        </script>
    @yield('footer2')
</body>
</html>