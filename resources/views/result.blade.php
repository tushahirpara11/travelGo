@for($i=0;$i<count($viewdata);$i++) <div class="GridLex-col-4_mdd-4_sm-6_xs-6_xss-12">
	<!-- <div class="trip-guide-item">
		<div class="trip-guide-image">
			<img style="height: 300px;width: 450px;" src="{{ displayImage($viewdata[$i]->pkgimg1) }}" alt="images" />
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
	</div> -->
@endfor