<style type="text/css">
  table td,
  table th {
    border: 1px solid black;
  }
</style>
<div class="container">
  <br />
  <a href="{{ route('BookingPDFview',['download'=>'pdf']) }}">Download PDF</a>
  <table>
    <tr>
      <th>Sr No.</th>
      <th>Booking Id</th>
      <th>Name</th>
      <th>User Name</th>
      <th>Package_Id</th>
      <th>Tour Name</th>
      <th>Tour Code</th>
      <th>Travel Date</th>
      <th>Adult</th>
      <th>Child</th>
      <th>Price</th>
      <th>Currency</th>    
    </tr>
    @for($i=0;$i<count($items);$i++) <tr>
      <td>{{$i+1}}</td>
      <td>{{$items[$i]->BkgId}}</td>
      <td>{{$items[$i]->Name}}</td>
      <td>{{$items[$i]->User_name}}</td>
      <td>{{$items[$i]->package_id}}</td>
      <td>{{$items[$i]->TourName}}</td>
      <td>{{$items[$i]->TourCode}}</td>
      <td>{{$items[$i]->Traveldate}}</td>
      <td>{{$items[$i]->Adult}}</td>
      <td>{{$items[$i]->Child}}</td>
      <td>{{$items[$i]->Price}}</td>
      <td>{{$items[$i]->Currency}}</td>      
      @endfor
  </table>
</div>