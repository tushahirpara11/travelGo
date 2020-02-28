@include('user.layout.head')
<!-- end Header -->

<!-- start Main Wrapper -->
<style>
	table {
		border-collapse: collapse;
		border-spacing: 0;
		width: 100%;
		border: 1px solid #ddd;
	}

	th,
	td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2
	}
</style>
<div class="main-wrapper scrollspy-container">
	<div class="multiple-sticky hidden-sm hidden-xs multiple-sticky-99999999">

		<div class="multiple-sticky-inner">

			<div class="multiple-sticky-container container">

			</div>

		</div>

	</div>
	<br />
	<div class="pt-50 pb-50">

		<div id="detail-content-sticky-nav-01">

			<div class="container">

				<div class="row">

					<div class="col-xs-12 col-sm-12 col-md-9">
						<h3 class="font-lg mb-20">My Booking</h3>
						<ul class="featured-list-with-h mb-40">
							<div style="overflow-x:auto;">
								<table style="border: none">
									<tr>
										<th>
											<h5>Serial No.</h5>
										</th>
										<th>
											<h5>Name</h5>
										</th>
										<th>
											<h5>Tour Name</h5>
										</th>
										<th>
											<h5>Tour Code</h5>
										</th>
										<th>
											<h5>Travel Date</h5>
										</th>
										<th>
											<h5>Adult</h5>
										</th>
										<th>
											<h5>Child</h5>
										</th>
										<th>
											<h5>Price</h5>
										</th>
										<th>
											<h5>Currency</h5>
										</th>
										<th>
											<h5>Status</h5>
										</th>
									</tr>
									@for($i=0;$i<count($booking);$i++)<tr>
										<!-- {{$k=$i+1}} -->
										<td><span class="pl-xs">{{$k}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Name}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->TourName}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->TourCode}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Traveldate}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Adult}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Child}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Price}}</span></td>
										<td><span class="pl-xs">{{$booking[$i]->Currency}}</span></td>
										<td style="color: red"><span class="pl-xs">{{$booking[$i]->Status}}</span></td>
										</tr>
										<!-- {{$k+=1}} -->
										@endfor
								</table>
							</div>
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
						</ul>

						<h3 class="font-lg mb-20">Custom Booking</h3>
						<ul class="featured-list-with-h mb-40">
							<div style="overflow-x:auto;">
								<table style="border: none">
									<tr>
										<th>
											<h5>Serial No.</h5>
										</th>
										<th>
											<h5>Tour Places</h5>
										</th>
										<th>
											<h5>Name</h5>
										</th>
										<th>
											<h5>User Name</h5>
										</th>
										<th>
											<h5>Hotel Name</h5>
										</th>								
										<th>
											<h5>Travel Date</h5>
										</th>
										<th>
											<h5>Return Date</h5>
										</th>
										<th>
											<h5>Adult</h5>
										</th>
										<th>
											<h5>Child</h5>
										</th>
										<th>
											<h5>Day</h5>
										</th>
										<th>
											<h5>Night</h5>
										</th>
										<th>
											<h5>Transport Mode</h5>
										</th>
										<th>
											<h5>Price</h5>
										</th>										
										<th>
											<h5>Status</h5>
										</th>
									</tr>
									@for($i=0;$i<count($custombooking);$i++)<tr>
										<!-- {{$k=$i+1}} -->
										<td><span class="pl-xs">{{$k}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->place_visit}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->name}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->user_name}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->hotels}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->departure_date}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->arrival_date}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->adults}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->child}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->days}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->nights}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->mode_transport}}</span></td>
										<td><span class="pl-xs">{{$custombooking[$i]->tour_price}}</span></td>
										<td style="color: red"><span class="pl-xs">Pending</span></td>										
										</tr>
										<!-- {{$k+=1}} -->
										@endfor
								</table>
							</div>
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
							<br />
						</ul>

					</div>

				</div>

			</div>



		</div>

	</div>

	<!-- end Main Wrapper -->

	@include('user.layout.footer')
	</body>

	</html>