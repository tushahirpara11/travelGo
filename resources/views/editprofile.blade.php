@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

	<!-- start Breadcrumb -->

	<div class="breadcrumb-wrapper">
		<!-- <div class="container">
			<ol class="breadcrumb">
				<li><a href="{{url('/')}}">Home</a></li>
						
					</ol>
				</div>
			</div>
			 -->
		<!-- end Breadcrumb -->

		<div class="user-profile-wrapper">

			<div class="user-header">

				<div class="content">

					<div class="content-top">

						<div class="container">

							<div class="inner-top">

								<!-- <div class="image">
										<img src="images/man/01.jpg" alt="image" />
									</div>
									 -->
								<div class="GridLex-gap-20">

									<div class="GridLex-grid-noGutter-equalHeight GirdLex-grid-bottom">

										<div class="GridLex-col-7_sm-12_xs-12_xss-12">

											<div class="GridLex-inner">
												<div class="heading clearfix">
													<h3></h3>

												</div>
											</div>

										</div>

									</div>

								</div>


							</div>

						</div>

					</div>

					<div class=" content-bottom">

						<div class="container">

							<div class="inner-bottom">


							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

		<div class="pt-30 pb-50">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 col-sm-4 col-md-3 mt-20">

						<aside class="sidebar-wrapper pr-5 pr-0-xs">

							<div class="common-menu-wrapper">

								<!-- <ul class="common-menu-list">

							<li><a href="">Home</a></li>
							<li class="active"><a href="#">Edit profile</a></li>
							<li><a href="#">Offered Tours</a></li>
							<li><a href="#">Requested Tour</a></li>
							<li><a href="#">My tour</a></li>
							<li><a href="#">Logout</a></li>

						</ul> -->

							</div>

						</aside>

					</div>

					<div class="col-xs-12 col-sm-8 col-md-9 mt-20">

						<div class="dashboard-wrapper">

							<h4 class="section-title">Edit profile</h4>

							<form class="post-form-wrapper" action="{{URL::route('updateuser.user',[$userdata[0]->username])}}" method="POST">
								{{csrf_field()}}
								<div class="row gap-20">
									<div class="col-sm-6 col-md-4">

										<div class="form-group">									
											<input type="hidden" class="form-control" value="{{$userdata[0]->username}}" name="fname">
										</div>

									</div>

									<div class="clear"></div>

									<div class="col-sm-6 col-md-4">

										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control" value="{{$userdata[0]->fname}}" name="fname">
										</div>

									</div>

									<div class="col-sm-6 col-md-4">

										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control" value="{{$userdata[0]->lname}}" name="lname">
										</div>

									</div>

									<div class="clear"></div>


									<div class="col-sm-6 col-md-4">

										<div class="form-group">
											<label>Email</label>
											<input type="hidden" class="form-control" value="{{$userdata[0]->email}}" name="email">
											<input type="text" disabled class="form-control" value="{{$userdata[0]->email}}">											
										</div>

									</div>
									<div class="col-sm-6 col-md-4">

										<div class="form-group">
											<label>Mobile No.</label>
											<input type="text" class="form-control" value="{{$userdata[0]->mobileno}}" name="mobileno">
										</div>

									</div>
									<div class="clear"></div>
									<div class="col-sm-6 col-md-4">
										<div class="form-group">
											<label>Username</label>
											<input type="hidden" class="form-control" value="{{$userdata[0]->username}}" name="username">
											<input type="text" disabled class="form-control" value="{{$userdata[0]->username}}">											

										</div>
									</div>
									<div class="clear"></div>

									<div class="col-sm-6 col-md-4">

										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" value="{{$userdata[0]->password}}" name="password">
										</div>

									</div>
									<div class="clear mb-10"></div>

									<div class="col-sm-12">
										<button type="submit" class="btn btn-primary">Submit</button>
										<!-- <input type="submit" value="Submit" name="submit" class="btn btn-primary"/> -->
										<a href="#" class="btn btn-primary btn-border">Cancel</a>
									</div>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- end Main Wrapper -->

	<!-- start Footer Wrapper -->

	@include('user.layout.footer')
	</body>

	</html>