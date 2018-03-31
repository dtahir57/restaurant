<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- bootstrap-css -->
    <link href="{{asset('public/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--// bootstrap-css -->
    <!-- css -->
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}" type="text/css" media="all" />
    <!--// css -->
    <link rel="stylesheet" href="{{asset('public/css/owl.carousel.css')}}" type="text/css" media="all">
    <link href="{{asset('public/css/owl.theme.css')}}" rel="stylesheet">
    <!-- font-awesome icons -->
    <link href="{{asset('public/css/font-awesome.css')}}" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- font -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
    <!-- //font -->
</head>
<body>
    <!--<div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
-->
  <!--header-->
  <div class="header">
    <div class="logo">
      <h1><a href="{{URL::to('/')}}">Food Corner</a></h1>
    </div>
    <div class="top-nav">
      <span class="menu"><img src="{{ asset('public/images/menu.png') }}" alt=""/></span>
      <ul>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('menu') }}">Menu</a></li>
        <li><a href="{{ route('showRestaurant') }}">Restaurants</a></li>
        @if (Auth::guest())
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Sign Up</a></li>
        @else
        <li>
            <a href="{{route('home')}}">
                {{ Auth::user()->name }}
            </a>
            {{--
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>--}}
        </li>
        @endif
        <li><a href="{{ route('cart') }}" class="fa fa-shopping-cart"> <span class="badge badge-danger">{{Cart::count()}}</span></a></li>
      <ul>
    </div>
      <div class="clearfix"> </div>
  </div>
  <!--//header-->
  @section('body')
  @show
      </div>
    </div>
    <div class="footer">
  		<div class="container">
  			<div class="agile-footer-grids">
  				<div class="col-md-3 agile-footer-grid">
  					<h4>About Food Corner</h4>
  					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque elit sit amet lorem fermentum.<span>Nullam turpis ipsum, dapibus eu congue sit amet.</span></p>
  					<h5>Get In Touch<h5>
  					<div class="agileinfo-social-grids">
  						<ul>
  							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
  							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
  							<li><a href="#"><i class="fa fa-youtube"></i></a></li>
  							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
  						</ul>
  					</div>
  				</div>
  				<div class="col-md-3 agile-footer-grid">
  					<h4>Twitter Posts</h4>
  					<ul class="w3agile_footer_grid_list">
  						<li>Ut aut reiciendis voluptatibus maiores <a href="#">http://lkj.ewr.com</a> alias, ut aut reiciendis.
  							<span><i class="fa fa-twitter" aria-hidden="true"></i> 02 days ago</span></li>
  						<li>Itaque earum rerum hic tenetur a sapiente delectus <a href="#">http://uiubajaj.com</a> ut aut
  							voluptatibus.<span><i class="fa fa-twitter" aria-hidden="true"></i> 03 days ago</span></li>
  					</ul>
  				</div>
  				<div class="col-md-3 agile-footer-grid">
  					<h4>Newsletter</h4>
  					<p>Subscribe to our newsletter</p>
  					<form action="#" method="post">
  						<input type="email" name="Email" placeholder="Email" required="">
  						<input type="submit" value="Subscribe">
  					</form>
  				</div>
  				<div class="clearfix"> </div>
  			</div>
  		</div>
  	</div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{asset('public/js/owl.carousel.js')}}"></script>
    <script src="{{asset('public/js/jquery-1.11.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/nav.js')}}"></script>
    <script src="public/js/SmoothScroll.min.js"></script>
    <script src="public/js/responsiveslides.min.js"></script>
    <script>
      // You can also use "$(window).load(function() {"
      $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
        auto: true,
        pager:true,
        nav:false,
        speed: 500,
        namespace: "callbacks",
        before: function () {
          $('.events').append("<li>before event fired.</li>");
        },
        after: function () {
          $('.events').append("<li>after event fired.</li>");
        }
        });

      });
     </script>
</body>
</html>
