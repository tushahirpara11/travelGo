@include('user.layout.head')
<!-- end Header -->

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
							<form method="POST" action="{{route('customselection')}}">
								{{csrf_field()}}
								<div class="create-tour-inner">

									<h4 class="section-title">Create Your Package</h4>
									<p>Dear Customer,To create your tour please choose corret options as given below...</p>

									<div class="row">

										<div class="col-xs-12 col-sm-5 col-md-5">
											<label>Departure Date:</label>
											<div class="input-group mb-15">
												<input class="form-control" id="date" name="date" type="date" required="">
												<!-- <span class="input-group-addon">$USD</span> -->
											</div>
										</div>
										<div class="col-xs-12 col-sm-7 col-md-7">
											<div class="row gap-20">
												<div class="col-xsw-12 col-xs-6 col-sm-6 col-md-6">
													<div class="form-group form-spin-group">
														<label>How Many Days?</label>
														<input onkeypress="return NumberOnly(event);" type="text" name="days" class="form-control form-spin" value="1" required="" />
													</div>
												</div>

											</div>

										</div>
										<div class="row gap-20">
											<div class="col-xs-12 col-sm-5 col-md-5">

												<div class="form-group">
													<label>Select your Desination City :</label>
													<input onkeypress="return OnlyAlpha(event);" type="text" list="city" class="form-control" name="tocity" required="">
													<datalist id="city">
														@for($i=0;$i<count($cities);$i++) <option value="{{$cities[$i]->city_name}}">
															</option>
															@endfor
													</datalist>
												</div>

											</div>

											<div class="col-xs-12 col-sm-6">
												<div class="form-group">
													<label>Hotel Star Category:</label>
													<select class="selectpicker show-tick form-control" name="star" title="Select Star Category" data-done-button="true" data-done-button-text="OK" required="">
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
													</select>
												</div>
											</div>

											<div class="col-xs-12 col-sm-6">

												<div class="form-group">
													<label>Mode Of Transport</label>
													<select class="selectpicker show-tick form-control" name="transport" title="Select placeholder" data-selected-text-format="count > 6" data-done-button="true" data-done-button-text="OK" required="">
														<option value="Bus">Bus</option>
														<option value="Car">Car</option>
														<option value="Train">Train</option>
													</select>
												</div>

											</div>
										</div>


										<div class="mb-40"></div>

										<div class="col-md-3">
											<button type="submit" onclick="return checkdate();" class="btn btn-primary btn-wide">Submit</button>
										</div>
										<div class="col-md-3">
											<button type="reset" class="btn btn-primary btn-wide btn-border">Clear</button>
										</div>
									</div>

								</div>
							</form>
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
<!-- start Sign-in Modal -->
<div id="loginModal" class="modal fade login-box-wrapper" tabindex="-1" data-width="550" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Sign-in into your account</h4>
	</div>
	<form method="POST" action="{{url('log')}}">
		{{csrf_field()}}
		<div class="modal-body">
			<div class="row gap-20">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" placeholder="Enter User Name" type="text">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name="password" placeholder="Enter Password" type="password">
					</div>
				</div>

				<div class="col-sm-6 col-md-12">
					<div class="login-box-link-action">
						<a data-toggle="modal" href="#forgotPasswordModal" class="block line18 mt-1">Forgot
							password?</a>
						<a data-toggle="modal" href="{{url('/login')}}" class="block line18 mt-1">Admin Login</a>
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="login-box-box-action">
						No account? <a data-toggle="modal" href="#registerModal">Register</a>
					</div>
				</div>

			</div>
		</div>

		<div class="modal-footer text-center">
			<button type="submit" class="btn btn-primary">Log-in</button>
			<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
		</div>
	</form>

</div>
<!-- end Sign-in Modal -->

<!-- start Register Modal -->
<div id="registerModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Create your account for free</h4>
	</div>

	<div class="modal-body">
		<form method="POST" action="{{url('reg')}}">
			{{csrf_field()}}
			<div class="row gap-20">
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>First Name</label>
						<input class="form-control" name="fname" placeholder="Enter Your First Name" type="text">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Last Name</label>
						<input class="form-control" name="lname" placeholder="Enter Your Last Name" type="text">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Mobile Number</label>
						<input class="form-control" name="mobileno" placeholder="Enter Your Mobile Number" type="contact">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Email Address</label>
						<input class="form-control" name="email" placeholder="Enter Your Email Address" type="email">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>User Name</label>
						<input class="form-control" name="username" placeholder="Enter User Name" type="text">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name="password" placeholder="Password" type="password">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password Confirmation</label>
						<input class="form-control" name="conformpassword" placeholder="Conform Password" type="password">
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<input class="form-control" name="isactive" value="1" placeholder="isactive" type="hidden">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="login-box-box-action">
						Already have account? <a data-toggle="modal" href="#loginModal">Log-in</a>
					</div>
				</div>
			</div>
	</div>
	<div class="modal-footer text-center">
		<button type="submit" class="btn btn-primary">Register</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	</form>

</div>
<!-- end Register Modal -->

<!-- start Forget Password Modal -->
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">

	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-center">Restore your forgotten password</h4>
	</div>

	<div class="modal-body">
		<div class="row gap-20">

			<div class="col-sm-12 col-md-12">
				<p class="mb-20">Maids table how learn drift but purse stand yet set. Music me house could among oh
					as their. Piqued our sister shy nature almost his wicket. Hand dear so we hour to.</p>
			</div>

			<div class="col-sm-12 col-md-12">

				<div class="form-group">
					<label>Email Address</label>
					<input class="form-control" placeholder="Enter your email address" type="text">
				</div>

			</div>

			<div class="col-sm-12 col-md-12">
				<div class="checkbox-block">
					<input id="forgot_password_checkbox" name="forgot_password_checkbox" class="checkbox" value="First Choice" type="checkbox">
					<label class="" for="forgot_password_checkbox">Generate new password</label>
				</div>
			</div>

			<div class="col-sm-12 col-md-12">
				<div class="login-box-box-action">
					Return to <a data-toggle="modal" href="#loginModal">Log-in</a>
				</div>
			</div>

		</div>
	</div>

	<div class="modal-footer text-center">
		<button type="button" class="btn btn-primary">Restore</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>

</div>
</div>
<script type="text/javascript">
	function checkdate() {
		d=new Date();
		date = d.getMonth()+1 + "/" + d.getDate() + "/" + d.getFullYear();
		var getdate = new Date(document.getElementById("date").value);
		if (getdate.toLocaleDateString() > date) {
			return true;
		} else {
			// console.log(getdate.toLocaleDateString());
			// console.log(date);
			alert('Date Must Be Grater Than Current Date');			
			return false;
		}
	}
</script>
<!-- Core JS -->
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