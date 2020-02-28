<style type="text/css">
  table td,
  table th {
    border: 1px solid black;
  }
</style>
<div class="container">
  <br />
  <a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>
  <table>
    <tr>
      <th>Package_Id</th>
      <th>City_Id</th>
      <th>Display Amount(s)</th>
      <th>Tour Code</th>
      <th>Valid From</th>
      <th>Valid To</th>
      <th>Package Title</th>
      <th>Activity Type</th>
    </tr>
    @for($i=0;$i<count($items);$i++) <tr>
      <td>{{$items[$i]->package_id}}</td>
      <td>{{$items[$i]->city_id}}</td>
      <td>{{$items[$i]->displayamount}}</td>
      <td>{{$items[$i]->tourcode}}</td>
      <td>{{$items[$i]->validfrom}}</td>
      <td>{{$items[$i]->validto}}</td>
      <td>{{$items[$i]->packagetitle}}</td>
      <td>{{$items[$i]->activitytype}}</td>
      </tr>
      @endfor
  </table>
</div>