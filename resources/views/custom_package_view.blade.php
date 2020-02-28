@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

	<!-- start breadcrumb -->
	<div class="breadcrumb-image-bg detail-breadcrumb" style="background-image:url('{{displayImage($places[0]->place_Image1)}}');">
		<div class="container">

			<div class="page-title detail-header-02">

				<div class="row">

					<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

						<h2>@for($i=0;$i<count($places);$i++){{$places[$i]->place_name}},@endfor</h2> <ul class="list-with-icon list-inline-block">
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
							<a href="#detail-content-sticky-nav-03">Places To Visit</a>
						</li>
						<li>
							<a href="#detail-content-sticky-nav-04">Place Rate</a>
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

							@for($i=0;$i<count($places);$i++)<p class="lead"> {{$places[$i]->place_timing_details}}.</p>@endfor
								<div class="bt mt-30 mb-30"></div>

								<div class="featured-icon-simple-wrapper">

									<div class="GridLex-gap-30">

										<div class="GridLex-grid-noGutter-equalHeight">

											<div class="GridLex-col-4_sm-4_xs-12_xss-12">

												<div class="featured-icon-simple-item">
													<div class="icon text-primary">
														<i class="flaticon-travel-icons-hotel"></i>
													</div>
													{{$hotel[0]->hotel_name}}:<br />{{$hotel[0]->hotel_address}}
												</div>

											</div>

											<div class="GridLex-col-4_sm-4_xs-12_xss-12">

												<div class="featured-icon-simple-item">
													<div class="icon text-primary">
														<i class="flaticon-travel-icons-ring"></i>
													</div>
													Rate:</br>{{$hotel[0]->hotel_price}}/per night
												</div>

											</div>

											<div class="GridLex-col-4_sm-4_xs-12_xss-12">

												<div class="featured-icon-simple-item">
													<div class="icon text-primary">
														@if(session('transport')=="Bus")
														<i class="flaticon-travel-icons-bus"></i>
														@elseif(session('transport')=="Car")
														<i class="flaticon-travel-icons-car"></i>
														@elseif(session('transport')=="Train")
														<i class="flaticon-travel-icons-tain"></i>
														@endif
													</div>
													Travel with exclusive {{session('transport')}} <br />all the trip
												</div>

											</div>

										</div>

									</div>

								</div>

								<div class="mb-25"></div>
								<div class="bb"></div>
								<div class="mb-25"></div>

								<div class="row">

									<div class="col-xs-12 col-sm-4 col-md-3 mt-20-xs">

										<div class="pull-right pull-left-xs">
											<h4 class="text-uppercase spacing-1">What's included?</h4>

											<ul class="list-yes-no">
												<li>Tickets</li>
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
							@for($j=0;$j<count($places);$j++) @for($i=1;$i<=2;$i++) <!-- {{$imgs='place_Image'.$i}}-->
								<div class="sumi-gallery-wrapper sumi-gallery-size-sm clearfix mt-25">
									<img data-sgallery="group1tt" data-full="{{displayImage($places[$j]->$imgs)}}" data-thumb="{{displayImage($places[$j]->$imgs)}}" style="height: 150px;width: 250px" src="{{displayImage($places[$j]->$imgs)}}" alt="images">
								</div>
								@endfor
								@endfor
								@for($k=0;$k<3;$k++) <!-- {{$hotel_imgs='hotel_Image'.($k+1)}} -->
									<div class="sumi-gallery-wrapper sumi-gallery-size-sm clearfix mt-25">
										<img data-sgallery="group1tt" data-full="{{displayImage($hotel[0]->$hotel_imgs)}}" data-thumb="{{displayImage($hotel[0]->$hotel_imgs)}}" style="height: 150px;width: 250px" src="{{displayImage($hotel[0]->$hotel_imgs)}}" alt="images">
									</div>
									@endfor
									<div class="mb-25"></div>
									<div class="bb"></div>
									<div class="mb-25"></div>
						</div>

						<div id="detail-content-sticky-nav-03">

							<h2 class="font-lg">Places To Visit</h2>

							<div class="itinerary-toggle-wrapper mb-40">

								<div class="panel-group bootstrap-toggle">
									<div id="detail-content-sticky-nav-01">

										@for($i=0;$i<count($places);$i++)<p class="lead">{{$places[$i]->place_name}}</p>@endfor
											<div class="mb-25"></div>
											<div class="bb"></div>
											<div class="mb-25"></div>
									</div>
									<!-- end of panel -->

								</div>

							</div>

						</div>
						<div id="detail-content-sticky-nav-04">

							<h2 class="font-lg">Place Rate</h2>

							<div class="itinerary-toggle-wrapper mb-40">

								<div class="panel-group bootstrap-toggle">
									<div id="detail-content-sticky-nav-01">

										@for($i=0;$i<count($places);$i++)<p class="lead">{{$places[$i]->place_price}}</p>@endfor

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

										<p class="lead">Your Travel Fair is Excluded from this package.</p>

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
											<p class="font-lg">Please note that after the finalization of the Tour/ service Cost, if there are any Hike in entrance fees of monuments / museums, Taxes, fuel cost or guide charges – by Govt of India, the same would be charged as extra.
											</p>
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
										<!-- {{$sum=0}} -->
										<!-- @for($i=0;$i<count($places);$i++) <p>{{$sum=$sum+$places[$i]->place_price}}</p>@endfor -->
										Rs {{session('days')*((($sum*session('adult'))+(session('child')*($sum/2)))+
										(($hotel[0]->hotel_price*session('adult'))+(session('child')*($hotel[0]->hotel_price/2))))}}
									</div>
								</div>
								<form method="post" action="{{route('custom_book')}}">
									@csrf
									<div class="sidebar-booking-inner">

										<div class="row gap-10" id="rangeDatePicker">

											<div class="col-xss-12 col-xs-6 col-sm-12">
												<div class="form-group">
													<label>Name</label>
													<input type="text" class="form-control" onkeypress="return AlphaOnly(event);" name="name" placeholder="Enter a Name" required="" />
													<input type="hidden" class="form-control" name="places" placeholder="Places" value="@for($i=0;$i<count($places);$i++){{$places[$i]->place_name}},@endfor" required="" />
													<input type="hidden" class="form-control" name="user_name" id="user_name" value="{{Session::get('user')}}" required="" />
													<input type="hidden" class="form-control" name="hotel_name" id="hotel_name" value="{{$hotel[0]->hotel_name}}" required="" />
												</div>
											</div>

											<div class="col-xss-12 col-xs-6 col-sm-12">
												<div class="form-group">
													<label>From Date</label>
													<input type="date" disabled id="rangeDatePickerFrom" name="travel_date" value="{{session('date')}}" class="form-control" placeholder="yyyy/mm/dd" />
													<input type="hidden" id="rangeDatePickerFrom" name="travel_date" value="{{session('date')}}" class="form-control" placeholder="yyyy/mm/dd" />
													<input type="hidden" id="rangeDatePickerFrom" name="return_date" value="{{date('Y-m-d',strtotime(session('date').+session('days').' days'))}}" class="form-control" placeholder="yyyy/mm/dd" />
												</div>
											</div>
										</div>
										<div class="row gap-20">

											<div class="col-xss-12 col-xs-12 col-sm-12">
												<div class="form-group">
													<label>Adult</label>
													<div class="form-group form-spin-group">
														<input type="text" disabled value="{{session('adult')}}" onkeypress="return NumberOnly(event);" class="form-control form-spin" name="adult" />
														<input type="hidden" value="{{session('adult')}}" name="adult" />
													</div>
												</div>
											</div>
											<div class="col-xss-12 col-xs-12 col-sm-12">
												<div class="form-group">
													<label>Childern</label>
													<div class="form-group form-spin-group">
														<input type="text" disabled onkeypress="return NumberOnly(event);" value="{{session('child')}}" class="form-control form-spin" name="child" />
														<input type="hidden" value="{{session('child')}}" name="child" />
														<input type="hidden" value="{{session('days')}}" class="form-control" name="days" />
														<input type="hidden" value="{{session('days')+1}}" class="form-control" name="nights" />
														<input type="hidden" value="{{session('transport')}}" class="form-control" name="mode_transport" />
														<input type="hidden" value="{{session('days')*((($sum*session('adult'))+(session('child')*($sum/2)))+(($hotel[0]->hotel_price*session('adult'))+(session('child')*($hotel[0]->hotel_price/2))))}}" class="form-control" name="price" />
													</div>
												</div>
											</div>
											<div class="col-xss-12 col-xs-12 col-sm-12">
												<div class="mt-5">
													<input type="submit" class="btn btn-primary btn-block" onclick="return user();" value="Book Trip" name="submit" />
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
</script>
@include('user.layout.footer')
</body>

</html>