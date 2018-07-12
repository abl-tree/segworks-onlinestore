<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="robots" content="all,follow">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700')}}">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/apple-touch-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-touch-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/apple-touch-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/apple-touch-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/apple-touch-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/apple-touch-icon-152x152.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>
<body>
    <div class="all">
        <!-- Top bar-->
        <div class="top-bar">
            <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6 d-md-block d-none">
                    <a class="" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>
                <div class="col-md-6">
                <div class="d-flex justify-content-md-end justify-content-between">
                    <ul class="list-inline contact-info d-block d-md-none">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-phone"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    @guest
                    <div class="login"><a href="{{ route('login') }}" class="login-btn"><i class="fa fa-sign-in"></i><span class="d-none d-md-inline-block">Log In</span></a><a href="{{ route('register') }}" class="signup-btn"><i class="fa fa-user"></i><span class="d-none d-md-inline-block">Sign Up</span></a></div>
                    @else
                    <ul class="login nav navbar-nav">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                  <a class="nav-link" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest
                    
                    <ul class="social-custom list-inline" id="cart-icon">
                      <li class="list-inline-item">
                        <a href="{{route('cart')}}">
                          <i class="fa fa-shopping-cart"></i>
                          <span v-if="count" class="badge badge-danger badge-important pull-right" style="position:absolute;">@{{count}}</span>
                        </a>
                      </li>
                    </ul>
                    
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Top bar end-->
        <!-- Navbar Start-->
        <header class="nav-holder make-sticky">
            <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
            <div class="container"><a href="index.html" class="navbar-brand home"><img src="img/logo.png" alt="Universal logo" class="d-none d-md-inline-block"><img src="img/logo-small.png" alt="Universal logo" class="d-inline-block d-md-none"><span class="sr-only">Universal - go to homepage</span></a>
                <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
                <div id="navigation" class="navbar-collapse collapse">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle">Home <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="index.html" class="nav-link">Option 1: Default Page</a></li>
                        <li class="dropdown-item"><a href="index2.html" class="nav-link">Option 2: Application</a></li>
                        <li class="dropdown-item"><a href="index3.html" class="nav-link">Option 3: Startup</a></li>
                        <li class="dropdown-item"><a href="index4.html" class="nav-link">Option 4: Agency</a></li>
                        <li class="dropdown-item"><a href="index5.html" class="nav-link">Option 5: Portfolio</a></li>
                    </ul>
                    </li>
                </ul>
                </div>
                <div id="search" class="collapse clearfix">
                <form role="search" class="navbar-form">
                    <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                        <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </header>
        <!-- Navbar End-->
        
        @yield('content');
      <!-- FOOTER -->
      <footer class="main-footer">
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2018. Your company / name goes here</p>
              </div>
              <div class="col-lg-8 text-right text-center-md">
                <p>Template design by <a href="https://bootstrapious.com/free-templates">Bootstrapious Templates </a></p>
                <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              </div>
            </div>
          </div>
        </div>
      </footer>
    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}" defer> </script>
    <script src="{{ asset('vendor/waypoints/lib/jquery.waypoints.min.js') }}" defer> </script>
    <script src="{{ asset('vendor/jquery.counterup/jquery.counterup.min.js') }}" defer> </script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.parallax-1.1.3.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}" defer></script>
    <script src="{{ asset('vendor/jquery.scrollto/jquery.scrollTo.min.js') }}" defer></script>
    <script src="{{ asset('js/front.js') }}" defer></script>
    @yield('pagejs')
</body>
</html>
