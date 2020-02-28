<!doctype html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Title Of Site -->
	<title>Travelgo</title>
	<meta name="description" content="HTML template for multiple tour agency, local agency, traveller, tour hosting based on Twitter Bootstrap 3.x.x" />
	<meta name="keywords" content="tour agency, tour guide, travel, trip, holiday, vocation, relax, adventure, virtual tour, tour planner" />
	<meta name="author" content="crenoveative">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Fav and Touch Icons -->
	<link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('backend/user/images/ico/apple-touch-icon-144-precomposed.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('backend/user/images/ico/apple-touch-icon-114-precomposed.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('backend/user/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon" href="{{ URL::asset('backend/user/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<link rel="shortcut icon" href="{{ URL::asset('backend/user/images/ico/favicon.png')}}">

	<!-- CSS Plugins -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('backend/user/bootstrap/css/bootstrap.min.css')}}" media="screen">
	<link href="{{ URL::asset('backend/user/css/main.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('backend/user/css/plugin.css')}}" rel="stylesheet">

	<!-- CSS Custom -->
	<link href="{{ URL::asset('backend/user/css/style.css')}}" rel="stylesheet">

	<!-- Add your style -->
	<link href="{{ URL::asset('backend/user/css/your-style.css')}}" rel="stylesheet">
	<!-- User Validation Script -->
	<script src="{{ URL::asset('backend/scripts/common.js') }}"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>

<body class="transparent-header with-multiple-sticky">

	<div id="introLoader" class="introLoading"></div>

	<!-- start Container Wrapper -->

	<div class="container-wrapper">

		<!-- start Header -->

		<header id="header">

			<!-- start Navbar (Header) -->
			<nav class="navbar navbar-default navbar-fixed-top navbar-sticky-function navbar-arrow navbar-sticky">

				<div class="container">

					<div class="logo-wrapper">
						<div class="logo">
							<a href="{{url('/')}}"><img src="{{ URL::asset('backend/user/images/logo-white.png')}}" alt="Logo" /></a>
						</div>
					</div>

					<div id="navbar" class="navbar-nav-wrapper">

						<ul class="nav navbar-nav" id="responsive-menu">
							<li>
								<a href="{{url('/')}}">Home</a>
							</li>
							<li>
								<a href="{{url('offered')}}">View Tour</a>
							</li>
							<li>
								<a href="{{url('aboutus')}}">About</a>
							</li>
							@if (Session::get('user') != null)
							<li>
								<a href="{{url('mybooking')}}">My Booking</a>
							</li>
							<li>
								<a href="{{url('editprofile')}}">Edit Profile</a>
							</li>
							<li>
								<a href="{{url('custompackage')}}">Custom Packages</a>
							</li>
							@endif
						</ul>

					</div>
					<!--/.nav-collapse -->

					<div class="nav-mini-wrapper">
						<ul class="nav-mini">
							@if (Session::get('user') != null)
							<li><a href="{{route('user.signout')}}"><i class="icon-power" data-toggle="tooltip" data-placement="bottom" title="sign out"></i> {{Session::get('user')}}</a></li>
							@else
							<li><a data-toggle="modal" href="#registerModal"><i class="icon-user-follow" data-toggle="tooltip" data-placement="bottom" title="sign up"></i></a></li>
							<li><a data-toggle="modal" href="#loginModal"><i class="icon-login" data-toggle="tooltip" data-placement="bottom" title="login"></i> </a></li>
							@endif
						</ul>
					</div>

				</div>

				<div id="slicknav-mobile"></div>

			</nav>
			<!-- end Navbar (Header) -->

		</header>