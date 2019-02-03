<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Page Title -->

  <!-- Favicon -->
  <link rel="icon" href="http://www.themesindustry.com/html/herox/images/favicon.ico">
  <!-- Animate CSS-->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/animate.min.css') }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/themify-icons.css') }}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('themes/herox/css/owl.theme.default.min.css') }}">
  <!-- Fancy Box -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/jquery.fancybox.min.css') }}">
  <!-- Cube Portfolio -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/cubeportfolio.min.css') }}">
  <!-- Revolution Style Sheets -->
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/herox/revolution/css/settings.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/herox/revolution/css/navigation.css') }}">
  <!-- Style Sheet -->
  <link rel="stylesheet" href="{{ asset('themes/herox/css/style.css') }}">
  <!-- Style Customizer's stylesheets -->
  <link rel="stylesheet" type="text/css" href="{{ asset('themes/herox/color-switcher/js/style-customizer/css/style-customizer.css') }}">
  {{--<link rel="stylesheet/less" type="text/css" href="{{ asset('themes/herox/color-switcher/less/skin.less') }}">--}}


  @yield('css')

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="90">

<!--start loader-->
<div class="loader">
  <div class="cssload-loader">
    <div class="cssload-inner cssload-one"></div>
    <div class="cssload-inner cssload-two"></div>
    <div class="cssload-inner cssload-three"></div>
  </div>
</div>
<!--loader end-->

<!--header start-->
<header>
  <nav class="navbar navbar-top-default navbar-expand-lg nav-line dark-navbar">
    <div class="container">

        <a href="/home" title="Logo" class="logo"><img src="{{ asset('imgs/play.png') }}" class="logo-dark default" alt="logo">
        </a>
      <div class="collapse navbar-collapse" id="Herox">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form method="get" action="{{ route('tv.search') }}">
              <div class="mb-4" style="height: 10px">
                @csrf
                <input class="search" placeholder="Search.." type="text" name = "search">
                <button type="submit" class="search-btn"><i class="ti-search" aria-hidden="true"></i></button>
              </div>
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/home">Home</a>
          </li>
        </ul>
      </div>
      <!--side menu open button-->
      <a href="javascript:void(0)" class="d-inline-block sidemenu_btn" id="sidemenu_toggle">
        <span></span> <span></span> <span></span>
      </a>
    </div>
  </nav>
  <!-- side menu -->
  <div class="side-menu">
    <div class="inner-wrapper">
      <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
      <nav class="side-nav w-100">
        <h3 style="text-align: center">Random Shows</h3>
        <ul class="navbar-nav">
          @foreach($random_shows as $show)
          <li class="nav-item">
            <a class="nav-link" href="/tv/show/{{ $show->id  }}">{{ $show->title }}</a>
          </li>
          @endforeach
        </ul>
      </nav>

    </div>
  </div>
  <a id="close_side_menu" href="javascript:void(0);"></a>
  <!-- End side menu -->
</header>
<!--header end-->

@yield('content')

@include('include.footer')

<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti ti-angle-up"></i></a>
<!-- end scroll to top  -->


<!-- Optional JavaScript -->
<script src="{{ asset('themes/herox/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('themes/herox/js/popper.min.js') }}"></script>
<script src="{{ asset('themes/herox/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/herox/js/jquery.appear.js') }}"></script>
<!-- isotop gallery -->
<script src="{{ asset('themes/herox/js/isotope.pkgd.min.js') }}"></script>
<!-- cube portfolio gallery -->
<script src="{{ asset('themes/herox/js/jquery.cubeportfolio.min.js') }}"></script>
<!-- owl carousel slider -->
<script src="{{ asset('themes/herox/js/owl.carousel.min.js') }}"></script>
<!-- parallax Background -->
<script src="{{ asset('themes/herox/js/parallaxie.min.js') }}"></script>
<!-- Color Switcher -->
<script src="{{ asset('themes/herox/color-switcher/js/less/less.min.js') }}" data-env="development"></script>
{{--<script src="{{ asset('themes/herox/color-switcher/js/style-customizer/js/style-customizer.js') }}"></script>--}}
<!-- fancybox popup -->
<script src="{{ asset('themes/herox/js/jquery.fancybox.min.js') }}"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset('themes/herox/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<!-- SLIDER REVOLUTION EXTENSIONS -->
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('themes/herox/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<!-- custom script -->
<script src="{{ asset('themes/herox/js/script.js') }}"></script>
<script>
    // ** JS GLOBAL VARIABLES ** //
    const BASE_URL = '{{ env('APP_URL' , 'http://localhost/') }}';
    const CSRF_TOKEN = '{{ csrf_token() }}';
</script>
@yield('script')


</body>
</html>