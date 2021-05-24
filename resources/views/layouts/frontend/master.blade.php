<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
  <title>{{ config('app.name') }} | @yield('title')</title>
  <link rel="icon" type="image/png" href="{{asset('assets/img/logo.png')}}">

  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('frontend/fonts/icomoon/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/fonts/flaticon-covid/font/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  @stack('page-styles')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    
<!--navbar-->
@include('layouts.frontend.includes.navbar')


    <!-- MAIN -->
    
    @yield('content')

    <!--footer-->
    @include('layouts.frontend.includes.footer')
    
  </div> <!-- .site-wrap -->

  <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('frontend/js/aos.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
  <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  @stack('after-scripts')

</body>
</html>