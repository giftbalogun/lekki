<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Lekki Ville Academy') }} - @yield('title')</title>
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="A web application to easily order home tutors online." />
	<meta name="keywords" content="Mathematics Lesson, Nigeria, tutorials, science, learning, primary, secondary, pre-school, Lagos, Lekki, Rivers" />
	<meta name="author" content="Fanan Dala" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="Lekki Ville Academy" />
	<meta property="og:image" content="{{ asset('master/images/stock/student1.jpg') }}" />
	<meta property="og:url" content="{{ url('/') }}" />
	<meta property="og:site_name" content="Lekki Ville Academy" />
	<meta property="og:description" content="Home Tutor ordering service" />
	<meta name="twitter:title" content="Lekki Ville Academy" />
	<meta name="twitter:image" content="{{ asset('master/images/stock/student1.jpg') }}" />
	<meta name="twitter:url" content="{{ url('/') }}" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('master/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('master/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('master/css/bootstrap.css') }}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('master/css/magnific-popup.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('master/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('master/css/owl.theme.default.min.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('master/css/style.css') }}">



</head>

<body>
	<div class="fh5co-loader"></div>
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 text-right">
							<p class="num" style="font-size:18px" >+2348063127827, +2348055488397</p>
							<ul class="fh5co-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-1">
							<div id="fh5co-logo"><a href="{{ route('welcome') }}">LVA<span>.</span></a></div>
						</div>
						<div class="col-xs-11 text-right menu-1">
							<ul>
								<li class="active"><a href="{{ route('welcome') }}">Home</a></li>
								<li><a href="{{ route('select-tutor') }}">Tutors</a></li>
								<li><a class="page-scroll" href="#fh5co-project">Pricing</a></li>
								<!--li class="has-dropdown">
									<a href="blog.html">Blog</a>
									<ul class="dropdown">
										<li><a href="#">Web Design</a></li>
										<li><a href="#">eCommerce</a></li>
										<li><a href="#">Branding</a></li>
										<li><a href="#">API</a></li>
									</ul>
								</li-->
								<li><a href="#fh5co-contact" class="page-scroll">Contact</a></li>
								@if(!Auth::check())
								<li class="btn-cta"><a href="{{ route('login') }}"><span>Login</span></a></li>
								<li class="btn-cta"><a href="{{ route('register') }}"><span>Register</span></a></li>


								@else
									@if(Auth::user()->hasRole('admin'))
									<li class="btn-cta"><a href="{{ route('admin.dashboard') }}"><span>Admin</span></a></li>
									@endif

									<li class="btn-cta"><a href="#"><span>{{ Auth::user()->name }}</span></a></li>

								<li class="btn-cta"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span>Logout</span></a></li>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
								</form>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>

		@yield('content')

		<footer id="fh5co-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-lg-5 col-md-4 col-sm-6 col-xs-12 fh5co-widget">
						<h4>About LVA</h4>
						<p>LekkiVille Academy(LA) is the leader in qualitative teaching that provides private tuition classes at  our office and on a private level(home & Office Tuition) for students from Nursery through Primary,Secondary,Post-Secondary & University. We also provide classes for exams like JAMB,NECO,GCE and Post-JAMB. We prepare clients for foreign exams: SAT I & II, GRE, GMAT, IELTS, TOEFL and help clients secure admission in foreign Universities.</p>
					</div>

					<div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1">
						<h4>Jobs</h4>
						<ul class="fh5co-footer-links">
							<li><a href="{{ route('become-tutor') }}">Become a Tutor</a></li>
						</ul>
					</div>

				<div class="row copyright">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">&copy; {{ \Carbon\Carbon::now()->format('Y') }} Lekki Ville Academy. All Rights Reserved.</small>
						</p>
						<p>
							<ul class="fh5co-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-instagram"></i></a></li>
							</ul>
						</p>
					</div>
				</div>

			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery, BootStrap, Vue, Axios, Lodash-->
	<script src="{{ asset('js/app.js') }}"></script>
	<!-- Modernizr JS -->
	<script src="{{ asset('master/js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ asset('master/') }}js/respond.min.js"></script>
	<![endif]-->
	<!-- jQuery Easing -->
	<script src="{{ asset('master/js/jquery.easing.1.3.js') }}"></script>

	<!-- Waypoints -->
	<script src="{{ asset('master/js/jquery.waypoints.min.js') }}"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('master/js/jquery.stellar.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('master/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('master/js/jquery.countTo.js') }}"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('master/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ asset('master/js/magnific-popup-options.js') }}"></script>
	<!-- Smooth Scroll -->
	<script src="{{ asset('master/js/SmoothScroll.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('master/js/main.js') }}"></script>
		@stack('page-scripts')
</body>

</html>
