@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->

<div class="main-wrapper scrollspy-container">

	<!-- start hero-header -->
	<div class="hero img-bg-01">
		<div class="container">

			<h1>Where do you want to go?</h1>			

			<!-- <form>
				<div class="form-group">
					<input type="text" placeholder="eg: London, Paris, Rome" class="form-control flexdatalist" data-data="data/countries.json" data-search-in='["name","capital"]' data-visible-properties='["capital","name","continent"]' data-group-by="continent" data-selection-required="true" data-focus-first-result="true" data-min-length="1" data-value-property="iso2" data-text-property="{capital}, {name}" data-search-contain="false" name="countries">
					<button class="btn"><i class="icon-magnifier"></i></button>
				</div>
			</form> -->

			<!-- <div class="top-search">
				<span class="font700">Top Searches : </span>
				<a href="#">Thailand</a>
				<a href="#">Malaysia</a>
				<a href="#">Japan</a>
				<a href="#">Hong Kong</a>
				<a href="#">Singapore</a>
			</div> -->

		</div>

	</div>
	<!-- end hero-header -->

	<div class="post-hero clearfix">

		<div class="container">

			<div class="row">

				<div class="col-xs-12 col-sm-4 mb-20-xs">
					<div class="horizontal-featured-icon-sm clearfix">
						<div class="icon"><i class="ri ri-location"></i></div>
						<div class="content">
							<h6>Looking for a tour program?</h6>
							<span>Inhabiting discretion the her dispatched decisively boisterous joy.</span>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 mb-20-xs">
					<div class="horizontal-featured-icon-sm clearfix">
						<div class="icon"> <i class="ri ri-user"></i></div>
						<div class="content">
							<h6>Need someone to guide tour?</h6>
							<span>Great asked oh under together prospect kindness securing six.</span>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-sm-4 mb-20-xs">
					<div class="horizontal-featured-icon-sm clearfix">
						<div class="icon"> <i class="ri ri-equal-circle"></i></div>
						<div class="content">
							<h6>Want to earn money as guide?</h6>
							<span>Sometimes studied evident. Conduct replied removal her cordially. </span>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<div class="bg-white pt-70 pb-60 clearfix">

		<div class="container">

			<div class="row">

				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

					<div class="section-title">

						<h2>Recommended Trips</h2>
						<p class="lead">The trips that offered by local guides or experts for travellers</p>
					</div>

				</div>

			</div>

			<div class="trip-guide-wrapper mb-30">

				<div class="GridLex-gap-20 GridLex-gap-15-mdd GridLex-gap-10-xs">

					<div class="GridLex-grid-noGutter-equalHeight">
					@for($i=0;$i<count($viewdata);$i++)
						<div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
							<div class="trip-guide-item">
								<div class="trip-guide-image">
									<img style="height: 300px;width: 450px;"src="{{ displayImage($viewdata[$i]->pkgimg1) }}" alt="images" />
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
	</div>
	<div class="clearfix">
		<div class="container pt-70 pb-80">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
					<div class="section-title">
						<h2>How It Works</h2>
						<p class="lead">The trips that travellers are looking for local guides or experts for
							them</p>
					</div>
				</div>
			</div>
			<div class="GridLex-gap-30 GridLex-gap-20-mdd GridLex-gap-10-xs alt-number-color ">
				<div class="GridLex-grid-noGutter-equalHeight">
					<div class="GridLex-col-4_sm-4_xs-12">
						<div class="how-it-work-item clearfix">
							<div class="icon">
								<i class="icon-note"></i>
							</div>
							<div class="content">
								<span class="number">01.</span>
								<h3>Create a Trip Program</h3>
								<p class="line-1-45">Denote simple fat denied add worthy little use. Instantly
									gentleman contained belonging exquisite.</p>
							</div>
						</div>
					</div>
					<div class="GridLex-col-4_sm-4_xs-12">
						<div class="how-it-work-item clearfix">
							<div class="icon">
								<i class="icon-cloud-upload"></i>
							</div>
							<div class="content">
								<span class="number">02.</span>
								<h3>Publish Your Trip Program</h3>
								<p class="line-1-45">With my them if up many. Extremity so attending objection
									as engrossed gentleman something.</p>
							</div>
						</div>
					</div>
					<div class="GridLex-col-4_sm-4_xs-12">
						<div class="how-it-work-item clearfix">
							<div class="icon">
								<i class="icon-speech"></i>
							</div>
							<div class="content">
								<span class="number">03.</span>
								<h3>Traveller Contact With You</h3>
								<p class="line-1-45">Old education him departure any arranging one prevailed.
									Behaved the comfort another fifteen eat.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="featured-bg pt-80 pb-60 img-bg-02">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row gap-0">
						<div class="col-xss-6 col-xs-6 col-sm-3">
							<div class="counting-item">
								<div class="icon">
									<i class="icon-directions"></i>
								</div>
								<p class="number">354</p>
								<p>Packages</p>
							</div>
						</div>

						<div class="col-xss-6 col-xs-6 col-sm-3">
							<div class="counting-item">
								<div class="icon">
									<i class="icon-user"></i>
								</div>
								<p class="number">241</p>
								<p>Guides</p>
							</div>
						</div>

						<div class="col-xss-6 col-xs-6 col-sm-3">
							<div class="counting-item">
								<div class="icon">
									<i class="icon-location-pin"></i>
								</div>
								<p class="number">142</p>
								<p>Destinations</p>
							</div>
						</div>

						<div class="col-xss-6 col-xs-6 col-sm-3">
							<div class="counting-item">
								<div class="icon">
									<i class="icon-envelope-letter"></i>
								</div>
								<p class="number">354</p>
								<p>Requests</p>
							</div>
						</div>

					</div>

				</div>

			</div>

			<div class="row mt-70">

				<div class="col-xs-12 col-sm-8 col-sm-offset-2">

					<div class="fearured-join-item mb-0">
						<h2 class="alt-font-size">Create Your Trip?</h2>
						<p class="mb-25 font20">Rooms oh fully taken by worse do. Points afraid but may end law
							lasted. Was out laughter raptures returned outweigh outward the him existence
							assurance.</p>						
					</div>

				</div>

			</div>

		</div>

	</div>

	<div class="bg-white">

	</div>

</div>

<!-- end Main Wrapper -->

<!-- start Footer Wrapper -->

@include('user.layout.footer')
</body>

</html>