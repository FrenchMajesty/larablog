<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="{{asset('public/img/favicon.ico')}}">
	<title>@yield('pageTitle') - {{env('APP_NAME')}}</title>
	<!-- Bootstrap core CSS -->
	<link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link href="{{asset('public/css/font-awesome.min.css')}}" rel="stylesheet">
	<!-- Jasny CSS -->
	<link href="{{asset('public/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
	<!-- Animate CSS -->
	<link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
	<!-- Code CSS -->
	<link href="{{asset('public/css/tomorrow-night.css')}}" rel="stylesheet">
	<!-- Gallery CSS -->
	<link href="{{asset('public/css/bootstrap-gallery.css')}}" rel="stylesheet">
	<!-- ColorBox CSS -->
	<link href="{{asset('public/css/colorbox.css')}}" rel="stylesheet">
	<!-- Custom font -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- Custom styles for this template -->
	<link href="{{asset('public/css/style.css')}}" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="page-loader">
		<div class="loader-in">Loading...</div>
		<div class="loader-out">Loading...</div>
	</div>

	<div class="canvas">
		<div class="canvas-overlay"></div>
		<header>
			<nav class="navbar navbar-fixed-top nav-down navbar-laread">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="{{route('index')}}"><img height="64" src="{{asset('public/img/logo-light.png')}}" alt=""></a>
					</div>
					@if(\Auth::user())
						<a href="#" class="modal-form" style="margin-left: 10px">
						<i class="fa fa-bars"></i>
					</a>
					@endif
					<a href="#" data-toggle="modal" data-target="#login-form" class="modal-form">
						<i class="fa fa-user"></i>
					</a>
					

					
					<button type="button" class="navbar-toggle collapsed menu-collapse" data-toggle="collapse" data-target="#main-nav">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-plus"></i>
					</button>
					<div class="collapse navbar-collapse" id="main-nav">
						<ul class="nav navbar-nav">
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">HOME</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{route('index')}}">Blog Feed</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PORTFOLIO</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{route('gallery')}}">Gallery</a></li>
								</ul>
							</li>
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">ABOUT</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="{{route('about')}}">About Me and How to Reach Me</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->

				</div>
			</nav>
		</header>

		@yield('content')

		@include('partials.login')

	<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="{{asset('public/js/jquery.min.js')}}"></script>
		<script src="{{asset('public/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('public/js/jasny-bootstrap.min.js')}}"></script>
		<script src="{{asset('public/js/prettify.js')}}"></script>
		<script src="{{asset('public/js/lang-css.js')}}"></script>
		<script src="{{asset('public/js/jquery.blueimp-gallery.min.js')}}"></script>
		<script src="{{asset('public/js/imagesloaded.js')}}"></script>
		<script src="{{asset('public/js/masonry.js')}}"></script>
		<script src="{{asset('public/js/viewportchecker.js')}}"></script>
		<script src="{{asset('public/js/isotope.pkgd.min.js')}}"></script>
		<script src="{{asset('public/js/calendar.js')}}"></script>
		<script src="{{asset('public/js/jquery.ellipsis.min.js')}}"></script>
		<script src="{{asset('public/js/classie.js')}}"></script>
		<script src="{{asset('public/js/modernizr.custom.js')}}"></script>
		<script src="{{asset('public/js/uiProgressButton.js')}}"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
		<script src="{{asset('public/js/jquery.dotdotdot.min.js')}}"></script>
		<script src="{{asset('public/js/jquery.colorbox-min.js')}}"></script>
		<script src="{{asset('public/js/jquery.nicescroll.min.js')}}"></script>
		<script src="{{asset('public/js/gmaps.js')}}"></script>
		<script src="{{asset('public/js/screenfull.js')}}"></script>
		<script src="{{asset('public/js/jquery.touchSwipe.min.js')}}"></script>
		<script src="{{asset('public/js/script.js')}}"></script>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</body>
	</html>
