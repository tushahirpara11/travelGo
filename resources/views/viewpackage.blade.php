@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

	<!-- start breadcrumb -->
	<div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url('{{displayImage($data[0]->pkgimg1)}}');">
		<div class="container">

			<div class="page-title detail-header-02">

				<div class="row">

					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

						<h2>{{$data[0]->packagetitle}}</h2>
						<!-- <span class="labeling text-white mt-25"><span>Bangkok, Pattaya, Choburi, &amp; Sattaheeb</span> <span>5 days 4 nights</span></span>
						<div class="rating-item rating-item-lg mb-25">
							<input type="hidden" class="rating" data-filled="fa fa-star rating-rated" data-empty="fa fa-star-o" data-fractions="2" data-readonly value="4.5" />
							<div class="rating-text"> <a href="#">(32 reviews)</a></div>
						</div> -->
						<ul class="list-with-icon list-inline-block">
							<li><i class="ion-android-done text-primary"></i>100% private</li>
							<li><i class="ion-android-done text-primary"></i>Instantly confirmed</li>
							<li><i class="ion-android-done text-primary"></i>Free cancellation</li>
							<li><i class="ion-android-done text-primary"></i>Satisfaction guarantee</li>
						</ul>

					</div>

				</div>

			</div>

			<div class="breadcrumb-wrapper text-left">

				<ol class="breadcrumb">
				</ol>

			</div>

		</div>

	</div>

	<!-- end breadcrumb -->

	<div class="multiple-sticky hidden-sm hidden-xs">

		<div class="multiple-sticky-inner">

			<div class="multiple-sticky-container container">

				<div class="multiple-sticky-item">
					<ul id="multiple-sticky-menu" class="multiple-sticky-menu clearfix">
						<li>
							<a href="#detail-content-sticky-nav-01">Overview</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-02">Gallery</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-03">Itinerary</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-04">Inclusion</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-05">Exclusion</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-06">Condition &amp; Faq</a>
						</li>
					</ul>

				</div>

			</div>

		</div>

	</div>
	<div class="pt-30 pb-50">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-12 col-md-8">

					<div class="content-wrapper">

						<div id="detail-content-sticky-nav-01">

							<p class="lead">{{$data[0]->highlight}}</p>

							<div class="bt mt-30 mb-30"></div>

							<div class="featured-icon-simple-wrapper">

								<div class="GridLex-gap-30">

									<div class="GridLex-grid-noGutter-equalHeight">

										<div class="GridLex-col-4_sm-4_xs-12_xss-12">

											<div class="featured-icon-simple-item">
												<div class="icon text-primary">
													<i class="flaticon-travel-icons-suitcase-1"></i>
												</div>
												{{$hotel[0]->hm_noofnights-1}}days &amp; {{$hotel[0]->hm_noofnights}} nights<br />tour
											</div>

										</div>

										<div class="GridLex-col-4_sm-4_xs-12_xss-12">

											<div class="featured-icon-simple-item">
												<div class="icon text-primary">
													<i class="flaticon-travel-icons-map"></i>
												</div>
												Stay Hotel:<br />
												@for($i=0;$i<count($hotel);$i++) {{$hotel[$i]->hm_name}}, @endfor </div> </div> <div class="GridLex-col-4_sm-4_xs-12_xss-12">

													<div class="featured-icon-simple-item">
														<div class="icon text-primary">
															<i class="flaticon-travel-icons-bus"></i>
														</div>
														Travel with exclusive bus <br />all the trip
													</div>

											</div>

										</div>

									</div>

								</div>

								<div class="mb-25"></div>
								<div class="bb"></div>
								<div class="mb-25"></div>

								<div class="row">

									<div class="col-xs-12 col-sm-4 col-md-5 mt-20-xs">

										<div class="pull-left pull-left-xs">
											<h4 class="text-uppercase spacing-1">What's included?</h4>

											<ul class="list-yes-no">
												<li>Tickets</li>
												<li>Transportations</li>
												<li>Free cancellation</li>
												<li>Free Gift</li>
											</ul>
										</div>

									</div>

								</div>

								<div class="mb-25"></div>
								<div class="bb"></div>
								<div class="mb-25"></div>

							</div>

							<div id="detail-content-sticky-nav-02">

								<h2 class="font-lg">Gallery</h2>

								@for($i=1;$i<=5;$i++) <!-- {{$imgs='pkgimg'.$i}} -->
									<div class="sumi-gallery-wrapper sumi-gallery-size-sm clearfix mt-25">
										<img data-sgallery="group1tt" title="lightbox image caption 1" data-full="{{displayImage($data[0]->$imgs)}}" data-thumb="{{displayImage($data[0]->$imgs)}}" style="height: 150px;width: 250px" src="{{displayImage($data[0]->$imgs)}}" alt="images">
									</div>
									@endfor
							</div>

							<div id="detail-content-sticky-nav-03">

								<h2 class="font-lg">Itinerary</h2>

								<div class="itinerary-toggle-wrapper mb-40">

									<div class="panel-group bootstrap-toggle">
										<div id="detail-content-sticky-nav-01">

											<p class="lead">{{$data[0]->itinerary}}</p>

											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
										</div>
										<!-- end of panel -->

									</div>

								</div>

							</div>
							<div id="detail-content-sticky-nav-04">

								<h2 class="font-lg">Inclusion</h2>

								<div class="itinerary-toggle-wrapper mb-40">

									<div class="panel-group bootstrap-toggle">
										<div id="detail-content-sticky-nav-01">

											<p class="lead">{{$data[0]->inclusion}}</p>

											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
										</div>
										<!-- end of panel -->

									</div>

								</div>

							</div>
							<div id="detail-content-sticky-nav-05">

								<h2 class="font-lg">Exclusion</h2>

								<div class="itinerary-toggle-wrapper mb-40">

									<div class="panel-group bootstrap-toggle">
										<div id="detail-content-sticky-nav-01">

											<p class="lead">{{$data[0]->exclusion}}</p>

											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
										</div>
										<!-- end of panel -->

									</div>

								</div>

							</div>
							<div id="detail-content-sticky-nav-06">

								<h2 class="font-lg">Condition &amp; Faq</h2>

								<div class="text-box-h-bb-wrapper">
									<div class="text-box-h-bb">
										<div class="row">
											<div class="col-xs-12 col-sm-4 col-md-3">
												<h4>Group size</h4>
											</div>
											<div class="col-xs-12 col-sm-8 col-md-9">
												<p class="font-lg">Conveying or northward offending admitting perfectly my. </p>
											</div>
										</div>
									</div>
									<div class="text-box-h-bb">
										<div class="row">
											<div class="col-xs-12 col-sm-4 col-md-3">
												<h4>Guest requirement</h4>
											</div>
											<div class="col-xs-12 col-sm-8 col-md-9">
												<p class="font-lg">Age</p>
												<p class="font-sm">Interested especially do impression he unpleasant.</p>
												<p class="font-lg">Identification</p>
												<p class="font-sm">Sudden up my excuse to suffer ladies though or. Bachelor possible marianne directly confined relation. Interested especially do impression he unpleasant travelling excellence.</p>
											</div>
										</div>
									</div>
									<div class="text-box-h-bb">
										<div class="row">
											<div class="col-xs-12 col-sm-4 col-md-3">
												<h4>Cancellation policy</h4>
											</div>
											<div class="col-xs-12 col-sm-8 col-md-9">
												<p class="font-lg">{{$data[0]->cancellationplicy}}</a>.</p>
											</div>
										</div>
									</div>
								</div>

								<div class="mb-25"></div>
								<div class="bb"></div>
								<div class="mb-25"></div>

							</div>
						</div>

					</div>

					<div id="sidebar-sticky" class="col-xs-12 col-sm-12 col-md-4">

						<aside class="sidebar-wrapper">
							<div class="sidebar-with-box-shadow ml-0-sm">

								<div class="sidebar-booking-box mmt mt-30-sm">

									<div class="sidebar-booking-header bg-primary clearfix">

										<div class="price">
											@if($data[0]->curency=="Ruppes")
											Rs{{$data[0]->displayamount}}
											@else
											USD{{$data[0]->displayamount}}
											@endif
										</div>
										<div>
											/ traveller
										</div>

									</div>
									@if(Session::has('book_date'))
									<script>
										alert('Select Date Betweeen Travel Period...');
									</script>
									@endif
									@if(Session::has('wrong_book_date'))
									<script>
										alert('Select Date Betweeen Travel Period...');
									</script>
									@endif
									<form action="{{url('/Booking')}}" onsubmit="return checkmember();" method="post">
										@csrf
										<div class="sidebar-booking-inner">

											<div class="row gap-10" id="rangeDatePicker">

												<div class="col-xss-12 col-xs-6 col-sm-12">
													<div class="form-group">
														<label>Name</label>
														<input type="text" class="form-control" onkeypress="return OnlyAlpha(event);" name="name" placeholder="Enter a Name" required="" />
														<input type="hidden" class="form-control" name="user_name" id="user_name" value="{{Session::get('user')}}" required="" />
														<input type="hidden" class="form-control" name="package_id" value="{{$data[0]->package_id}}" required="" />
														<input type="hidden" class="form-control" name="tour_name" value="{{$data[0]->packagetitle}}" required="" />
														<input type="hidden" class="form-control" name="tour_code" value="{{$data[0]->tourcode}}" required="" />
													</div>
												</div>

												<div class="col-xss-12 col-xs-6 col-sm-12">
													<div class="form-group">
														<label>From Date</label>
														<input type="date" id="rangeDatePickerFrom" name="travel_date" class="form-control" placeholder="yyyy/mm/dd" />
													</div>
												</div>
											</div>
											<div class="row gap-20">

												<div class="col-xss-12 col-xs-12 col-sm-12">
													<div class="form-group">
														<label>Adult</label>
														<div class="form-group form-spin-group">
															<input type="text" onkeypress="return NumberOnly(event);" id="adult" class="form-control form-spin" name="adult" value="1" />
														</div>
													</div>
												</div>
												<div class="col-xss-12 col-xs-12 col-sm-12">
													<div class="form-group">
														<label>Childern</label>
														<div class="form-group form-spin-group">
															<input type="text" onkeypress="return NumberOnly(event);" id="child" class="form-control form-spin" name="child" value="1" />
															<input type="hidden" name="price" value="{{$data[0]->displayamount}}" />
															<input type="hidden" name="currency" value="{{$data[0]->curency}}" />
														</div>
													</div>
												</div>
												<div class="col-xss-12 col-xs-12 col-sm-12">
													<div class="mt-5">
														<input type="submit" class="btn btn-primary btn-block" onclick="return user();" value="Book Trip" name="submit" />
														<!-- Travelgo/Booking -->
														<!-- <a href="Travelgo/Booking" class="btn btn-primary btn-block">Book Trip</a> -->
													</div>
												</div>

											</div>

											<div class="mt-10 text-center">
												<p class="font-md text-muted font500 spacing-2">You won't yet be charged</p>
											</div>

										</div>

								</div>

							</div>
							</form>
						</aside>

					</div>

				</div>

			</div>

		</div>

		<div class="multiple-sticky no-border hidden-sm hidden-xs">&#032;</div> <!-- is used to stop the above stick menu -->



	</div>

	<!-- end Main Wrapper -->

	<!-- start Footer Wrapper -->
	<script type="text/javascript">
		function user() {
			if (document.getElementById("user_name").value == "") {
				alert('You need to login before booking package..!');
				return false;
			}
		}

		function checkmember() {
			if (document.getElementById("adult").value <= 0 || document.getElementById("child").value <= 0) {
				alert('Adult or Child Must be Grater than 0');
				return false;
			} else {
				return true;
			}
		}
	</script>
	@include('user.layout.footer')
	</body>

	</html>