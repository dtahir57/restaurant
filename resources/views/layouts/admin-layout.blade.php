<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <link rel="stylesheet" href="{{ asset('public/admin-css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="{{ asset('public/admin-css/style.default.css') }}" id="theme-stylesheet">
    <link rel="stylesheet" href="{{ asset('public/admin-css/grasp_mobile_progress_circle-1.0.0.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/admin-css/custom.css') }}">
    <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
  </head>
  <body>
    {{-- Side Navbar --}}
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
            <h2 class="h5 text-uppercase">Admin Dashboard</h2>
          </div>
          <div class="sidenav-header-logo"><a href="{{URL::to('admin')}}" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li><a href="{{URL::to('admin')}}"> <i class="fa fa-area-chart"></i><span>Home</span></a></li>
            <li> <a href="{{route('create.menu')}}"><i class="fa fa-glass"></i><span>Add Items</span></a></li>
            <li> <a href="{{route('subitem')}}"><i class="fa fa-shopping-basket"></i><span>Add Sub Item</span></a></li>
            <li> <a href="{{route('getMenuId')}}"><i class="icon-form"></i><span>View All Sub Item</span></a></li>
            <li> <a href="{{route('restaurant')}}"><i class="fa fa-institution"></i><span>Add Restaurants</span></a></li>
            <li> <a href="{{route('get-Menu')}}"><i class="fa fa-cutlery"></i><span>Manage Menus</span></a></li>
            <li> <a href="{{route('addCategory')}}"><i class="fa fa-tags"></i><span>Add A Category</span></a></li>
            <li> <a href="{{route('manageRestaurants')}}"><i class="fa fa-tasks"></i><span>Manage Restaurants</span></a></li>
            <li><a href="{{route('guestDetails')}}"><i class="fa fa-bed"></i><span>Guest Orders</span></a></li>
            <li><a href="{{route('allUsers')}}"><i class="fa fa-user"></i><span>User Orders</span></a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="page home-page">
      {{-- navbar--}}
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text hidden-sm-down"><strong class="text-primary">Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item"><a class="nav-link logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                <i class="fa fa-sign-out"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      {{-- Counts Section --}}
      @section('admin-body')
      @show
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 pull-left">
              <p>Your company &copy; 2018</p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    {{-- Javascript files --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="{{ asset('public/admin-js/tether.min.js') }}"></script>
    <script src="{{ asset('public/admin-js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/admin-js/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('public/admin-js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>
    <script src="{{ asset('public/admin-js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/admin-js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="{{ asset('public/admin-js/charts-home.js') }}"></script>
    <script src="{{ asset('public/admin-js/front.js') }}"></script>
    {{-- Google Analytics: change UA-XXXXX-X to be your site's ID. --}}
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>
