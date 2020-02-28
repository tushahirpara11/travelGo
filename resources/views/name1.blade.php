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

		<!-- start Main Wrapper -->

		<div class="main-wrapper scrollspy-container">

			<!-- start breadcrumb -->

			<div class="breadcrumb-image-bg pb-100 no-bg" style="background-image:url({{URL::asset('backend/user/images/breadcrumb-bg.jpg')}});">
				<div class="container">

					<div class="page-title">

						<div class="row">

							<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

								<h2>Create Your Tour</h2>
								<p>Celebrated no he decisively thoroughly.</p>

							</div>

						</div>

					</div>

					<div class="breadcrumb-wrapper">


					</div>

				</div>

			</div>

			<!-- end breadcrumb -->

			<div class="bg-light">
				<div class="create-tour-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
								<div class="form">
									<form method="POST" action="{{route('final_reset')}}">
										{{csrf_field()}}
										<div class="create-tour-inner">
											<h4 class="section-title">Reset Password</h4>
											<div class="row">
												<div class="col-xs-12">
													<div class="form-group">
														<div class="form-group form-spin-group">
															<label>New Password</label>
															<input name="newpassword" id="newpass" type="password" class="form-control" required="" />
														</div>
													</div>
												</div>
												<div class="col-xs-12">
													<div class="form-group">
														<div class="form-group form-spin-group">
															<label>Confirm Password</label>
															<input name="confirm" id="confpass" type="password" class="form-control" required="" />
														</div>
													</div>
												</div>
												<div class="mb-40"></div>
											</div>
											<br />
											<div class="col-md-3">
												<button type="submit" onclick="return chekpass();" class="btn btn-primary btn-wide">Submit</button>
											</div>
											<div class="col-md-3">
												<button type="reset" class="btn btn-primary btn-wide btn-border">Clear</button>
											</div>
											<br />
										</div>
									</form>

								</div>

							</div>

						</div>

					</div>
				</div>

			</div>

		</div>
		<!-- start Footer Wrapper -->

		<div class="footer-wrapper scrollspy-footer">
			<footer class="bottom-footer">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<p class="copy-right">&#169; All Rights Reserved By Travelgo 2019</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<!-- end Footer Wrapper -->
	</div>

	<!-- end Container Wrapper -->
	<!-- start Back To Top -->
	<div id="back-to-top">
		<a href="#"><i class="ion-ios-arrow-up"></i></a>
	</div>
	<!-- end Back To Top -->
	</div>
	<!-- Core JS -->
	<script type="text/javascript">
		function chekpass() {
			var a = document.getElementById("newpass").value;
			var b = document.getElementById("confpass").value;
			if (a == b) {
				return true;
			} else {
				alert('password and confirm password should be same');
				return false;
			}
		}
	</script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/core-plugins.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs.js') }}"></script>

	<!-- Create Page JS -->
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.bootstrap-touchspin.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/dropzone.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.ui.timepicker.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/bootstrap-tokenfield.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/typeahead.bundle.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs-create.js') }}"></script>
</body>

</html>