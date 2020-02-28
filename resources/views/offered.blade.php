@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

	<!-- start breadcrumb -->

	<div class="breadcrumb-image-bg" style="background-image:url({{ URL::asset('backend/user/images/breadcrumb-bg.jpg')}});">
		<div class="container">

			<div class="page-title">

				<div class="row">

					<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">

						<h2>Tour offer results</h2>
						<p>Yet remarkably appearance get him his projection. Diverted endeavor bed peculiar men the not desirous.</p>

					</div>

				</div>

			</div>

			<div class="breadcrumb-wrapper">

				<ol class="breadcrumb">
					<!-- <li><a href="#">Home</a></li>
						<li><a href="#">Page</a></li>
						<li class="active">Result page grid</li> -->
				</ol>

			</div>

		</div>

	</div>

	<!-- end breadcrumb -->

	<div class="filter-full-width-wrapper">

		<form method="post" action="{{route('offered')}}">
			@csrf
			<div class="filter-full-primary">

				<div class="container">

					<div class="filter-full-primary-inner">

						<div class="form-holder">

							<div class="row">

								<div class="col-xs-12 col-sm-12 col-md-6">

									<div class="filter-item bb-sm no-bb-xss">

										<div class="input-group input-group-addon-icon no-border no-br-sm">
											<span class="input-group-addon input-group-addon-icon bg-white"><label><i class="fa fa-search"></i> Search:</label></span>
											<div class="form-group">
												<input type="text" class="form-control" name="search_text" id="search_text" onkeyup="search_data(this.value, 'result');" placeholder="Search" />
											</div>
										</div>
									</div>

								</div>

								<!-- <div class="col-xs-12 col-sm-12 col-md-7">

									<div class="filter-item-wrapper">

										<div class="row">
											<div class="col-xss-12 col-xs-6 col-sm-5">

												<div class="filter-item mmr">

													<div style="margin-right: 10px;" class="input-group input-group-addon-icon no-border no-br-xs">
														<span class="input-group-addon input-group-addon-icon bg-white">
															<label class="block-xs"><i class="fa fa-sort-amount-asc"></i> Sort by:</label></span>
														<select name="sort" class="selectpicker form-control block-xs">
															<option value="Name(A-Z)"> Name(A-Z)</option>
															<option value="Name(Z-A)"> Name(Z-A)</option>
															<option value="Price(High-Low)"> Price(High-Low)</option>
															<option value="Price(Low-High)"> Price(Low-High)</option>
														</select>
													</div>
												</div>

											</div>

											<div class="col-xss-12 col-xs-6 col-sm-7">
												<div class="filter-item mmr">
													<div class="input-group input-group-addon-icon no-border no-br-xs">
														<span class="input-group-addon input-group-addon-icon bg-white">
															<label><i class="fa fa-sort-amount-asc"></i> Trip Style:</label></span>
														<select name="type" class="selectpicker form-control">
															<option value="Adventures"> Adventure</option>
															<option value="Sports"> Sports</option>
															<option value="Climbing"> Climbing</option>
														</select>
													</div>
												</div>
											</div>

										</div>

									</div>

								</div> -->
								<!-- <div class="col-xs-12 col-sm-12 col-md-2">
									<button type="submit" class="btn btn-info">Search</button>
								</div> -->
							</div>

						</div>

					</div>

				</div>
		</form>
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
		<script>
			function search_data(search_value) {
				$('#test').html(' ');
				$.ajax({
					'url': "<?php echo e(url('search')); ?>",
					'type': 'POST',
					'data': {
						search_value: search_value
					},
					'dataType': 'JSON',
					'headers': {
						'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
					},
					'success': function(result) {
						console.log(result.length);
						var currency;
						if (result.length != 0) {
							for (i = 0; i < result.length; i++) {
								if (result[i].curency == "Ruppes")
									currency = "RS"
								else
									currency = "$"
								$('#test').append(`
								<div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
									<div class="trip-guide-item">
										<div class="trip-guide-image">
											<img style="height: 200px;width: 400px;" src="{{ displayImage('${result[i].pkgimg1}') }}" alt="images" />									
										</div>
										<div class="trip-guide-content">
											<h3>${result[i].packagetitle}</h3>
										</div>
										<div class="trip-guide-bottom">
											<div class="trip-guide-meta row gap-10">
											</div>
											<div class="row gap-10">
												<div class="col-xs-12 col-sm-6">
													<div class="trip-guide-price">
														Starting at
														<span class="block inline-block-xs">${currency} ${result[i].displayamount}</span>												
													</div>
												</div>
												<div class="col-xs-12 col-sm-6 text-right text-left-xs">
													<a href="<?php echo 'viewpackage/'; ?>${result[i].package_id}" class="btn btn-primary">Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>`);
							}
						} else {
							$('#test').append(`
							<div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">											
								<center><h2>No Such Record Found</h2></center>																	
							</div>`);
						}
					}
				});
			}
		</script>
	</div>

	<div class="pt-30 pb-50">

		<div class="container">

			<div id="result" class="trip-guide-wrapper">
				<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">
					<div class="GridLex-grid-noGutter-equalHeight" id="test">
						<!-- Ajax Output -->
						@for($i=0;$i<count($viewdata);$i++) <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
							<div class="trip-guide-item">
								<div class="trip-guide-image">
									<img style="height: 200px;width: 400px;" src="{{ displayImage($viewdata[$i]->pkgimg1) }}" alt="images" />
								</div>
								<div class="trip-guide-content">
									<h3>{{ $viewdata[$i]->packagetitle }}</h3>
								</div>
								<div class="trip-guide-bottom">
									<div class="trip-guide-meta row gap-10">
									</div>
									<div class="row gap-10">
										<div class="col-xs-12 col-sm-6">
											<div class="trip-guide-price">
												Starting at
												<span class="block inline-block-xs">@if($viewdata[$i]->curency=="Ruppes") Rs @else USD @endif {{ $viewdata[$i]->displayamount }}</span>
											</div>
										</div>
										<div class="col-xs-12 col-sm-6 text-right text-left-xs">
											<a href="{{route('viewpackage.id',[$viewdata[$i]->package_id])}}" class="btn btn-primary">Details</a>
										</div>
									</div>
								</div>
							</div>
					</div>
					@endfor
				</div>
			</div>
		</div>

	</div>

	<!-- <div class="pager-wrappper clearfix">

				<div class="pager-innner">

					<div class="clearfix">
						Showing reslut 1 to 15 from 248
					</div>

					<div class="clearfix">
						<nav class="pager-center">
							<ul class="pagination">
								<li>
									<a href="#" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								</li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><span>...</span></li>
								<li><a href="#">11</a></li>
								<li><a href="#">12</a></li>
								<li><a href="#">13</a></li>
								<li>
									<a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>

				</div>

			</div> -->

</div>

</div>

</div>

<!-- end Main Wrapper -->

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
						<input class="form-control" name="username" placeholder="Enter User Name" type="text" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name="password" placeholder="Enter Password" type="password" required="">
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
						<input class="form-control" onkeypress="return OnlyAlpha(event);" name="fname" placeholder="Enter Your First Name" type="text" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Last Name</label>
						<input class="form-control" onkeypress="return OnlyAlpha(event);" name="lname" placeholder="Enter Your Last Name" type="text" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Mobile Number</label>
						<input class="form-control" onkeypress="return NumberOnly(event);" name="mobileno" placeholder="Enter Your Mobile Number" type="contact" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Email Address</label>
						<input class="form-control" name="email" placeholder="Enter Your Email Address" type="email" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>User Name</label>
						<input class="form-control" name="username" placeholder="Enter User Name" type="text" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" id="pass" name="password" placeholder="Password" type="password" required="">
					</div>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
						<label>Password Confirmation</label>
						<input class="form-control" id="confpass" name="conformpassword" placeholder="Conform Password" type="password" required="">
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
		<button type="submit" onclick="return chekpass();" class="btn btn-primary">Register</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
	</div>
	</form>

</div>
<!-- end Register Modal -->

<!-- start Forget Password Modal -->
<div id="forgotPasswordModal" class="modal fade login-box-wrapper" tabindex="-1" data-backdrop="static" data-keyboard="false" data-replace="true">
	<form action="{{route('reset')}}" method="POST">
		@csrf
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title text-center">Restore your Forgotten Password</h4>
		</div>

		<div class="modal-body">
			<div class="row gap-20">

				<div class="col-sm-12 col-md-12">

					<div class="form-group">
						<label>Email Address</label>
						<input class="form-control" name="email" placeholder="Enter your email address" type="email" required="" />
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
			<button type="submit" class="btn btn-primary">Restore</button>
			<button type="button" data-dismiss="modal" class="btn btn-primary btn-border">Close</button>
		</div>
	</form>
</div>
</div>
<script type="text/javascript">
	function chekpass() {
		var a = document.getElementById("pass").value;
		var b = document.getElementById("confpass").value;
		if (a == b) {
			return true;
		} else {
			alert('password and confirm password should be same');
			return false;
		}
	}
</script>
<!-- end Forget Password Modal -->
<!-- <script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery-1.11.3.min.js') }}"></script> -->
<script type="text/javascript" src="{{ URL::asset('backend/user/js/core-plugins.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs.js') }}"></script>

<!-- Detail Page JS -->
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.stickit.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/bootstrap-tokenfield.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/typeahead.bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.sumogallery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/images-grid.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.bootstrap-touchspin.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs-detail.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/moment.min.js') }}"></script>

<!-- Create Page JS -->
<script type="text/javascript" src="{{ URL::asset('backend/user/js/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.ui.timepicker.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs-create.js') }}"></script>

<!-- Core JS -->
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/core-plugins.js')}}"></script>
<script type="text/javascript" src="{{ URL::asset('backend/user/js/customs.js')}}"></script>

<!-- Only in Home Page -->
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery.flexdatalist.js')}}"></script>

<script>
	var stickyHeaders = (function() {
		var $window = $(window),
			$stickies;

		var load = function(stickies) {

			if (typeof stickies === "object" && stickies instanceof jQuery && stickies.length > 0) {

				$stickies = stickies.each(function() {

					var $thisSticky = $(this).wrap('<div class="followWrap" />');

					$thisSticky
						.data('originalPosition', $thisSticky.offset().top)
						.data('originalHeight', $thisSticky.outerHeight())
						.parent()
						.height($thisSticky.outerHeight());
				});

				$window.off("scroll.stickies").on("scroll.stickies", function() {
					_whenScrolling();
				});
			}
		};

		var _whenScrolling = function() {

			$stickies.each(function(i) {

				var $thisSticky = $(this),
					$stickyPosition = $thisSticky.data('originalPosition');

				if ($stickyPosition <= $window.scrollTop()) {

					var $nextSticky = $stickies.eq(i + 1),
						$nextStickyPosition = $nextSticky.data('originalPosition') - $thisSticky.data('originalHeight');

					$thisSticky.addClass("fixed");

					if ($nextSticky.length > 0 && $thisSticky.offset().top >= $nextStickyPosition) {

						$thisSticky.addClass("absolute").css("top", $nextStickyPosition);
					}

				} else {

					var $prevSticky = $stickies.eq(i - 1);

					$thisSticky.removeClass("fixed");

					if ($prevSticky.length > 0 && $window.scrollTop() <= $thisSticky.data('originalPosition') - $thisSticky.data('originalHeight')) {

						$prevSticky.removeClass("absolute").removeAttr("style");
					}
				}
			});
		};

		return {
			load: load
		};
	})();

	$(function() {
		stickyHeaders.load($(".multiple-sticky"));
	});

	// Cache selectors
	var lastId,
		topMenu = $("#multiple-sticky-menu"),
		topMenuHeight = topMenu.outerHeight() + 80,
		// All list items
		menuItems = topMenu.find("a"),
		// Anchors corresponding to menu items
		scrollItems = menuItems.map(function() {
			var item = $($(this).attr("href"));
			if (item.length) {
				return item;
			}
		});

	// Bind click handler to menu items
	// so we can get a fancy scroll animation
	menuItems.click(function(e) {
		var href = $(this).attr("href"),
			offsetTop = href === "#" ? 0 : $(href).offset().top - 110;
		// offsetTop = href === "#" ? 0 : $(href).offset().top-topMenuHeight+1;
		$('html, body').stop().animate({
			scrollTop: offsetTop
		}, 300);
		e.preventDefault();
	});

	// Bind to scroll
	$(window).scroll(function() {
		// Get container scroll position
		var fromTop = $(this).scrollTop() + topMenuHeight;
		//  debugger;
		// Get id of current scroll item
		var cur = scrollItems.map(function() {
			if ($(this).offset().top < fromTop)
				return this;
		});
		// Get the id of the current element
		cur = cur[cur.length - 1];
		var id = cur && cur.length ? cur[0].id : "";

		if (lastId !== id) {
			lastId = id;
			// Set/remove active class
			menuItems
				.parent().removeClass("active")
				.end().filter("[href='#" + id + "']").parent().addClass("active");
		}
	});
</script>
</body>

</html>