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
						<a data-toggle="modal" href="{{url('login')}}" class="block line18 mt-1">Admin Login</a>
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
						<input class="form-control" name="email" placeholder="Enter your email address" type="email" required=""/>
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
<script type="text/javascript" src="{{ URL::asset('backend/user/js/jquery-1.11.3.min.js') }}"></script>
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