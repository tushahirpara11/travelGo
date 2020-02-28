<style type="text/css">
  table td,
  table th {
    border: 1px solid black;
  }
</style>
<div class="container">
  <br />
  <a href="{{ route('CustomBookingPDFview',['download'=>'pdf']) }}">Download PDF</a>
  <table>
    <tr>
      <th>Tour Id</th>
      <th>User Name</th>
      <th>Place To Visit</th>
      <th>Hotel</th>
      <th>Departure Date</th>
      <th>Arrival Date</th>
      <th>Adults</th>
      <th>Childen</th>
      <th>Days</th>
      <th>Nights</th>
      <th>Mode of Travel</th>
      <th>Tour Price</th>      
    </tr>
    @for($i=0;$i<count($items);$i++) <tr>
      <td>{{$items[$i]->tour_id}}</td>
      <td>{{$items[$i]->user_name}}</td>      
      <td>{{$items[$i]->place_visit}}</td>
      <td>{{$items[$i]->hotels}}</td>
      <td>{{$items[$i]->departure_date}}</td>
      <td>{{$items[$i]->arrival_date}}</td>
      <td>{{$items[$i]->adults}}</td>
      <td>{{$items[$i]->child}}</td>
      <td>{{$items[$i]->days}}</td>
      <td>{{$items[$i]->nights}}</td>
      <td>{{$items[$i]->mode_transport}}</td>
      <td>{{$items[$i]->tour_price}}</td>
      </tr>
      @endfor
  </table>
</div>