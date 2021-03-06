@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Custom Booking Report
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Custom Booking Report</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <form role="form" action="{{route('custombookingreport')}}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group col-md-4">
                  <label for="Starting Date">Starting Date</label>
                  @if(isset($startingdate))
                  <input type="date" class="form-control" value="{{$startingdate}}" required="" name="startingdate" id="startingdate" />
                  @else
                  <input type="date" class="form-control" required="" name="startingdate" id="startingdate" />
                  @endif
                </div>
                <!-- <div class="clearfix"> </div> -->
                <div class="form-group col-md-4">
                  <label for="endingdate">Ending Date</label>
                  @if(isset($endingdate))
                  <input type="date" class="form-control" value="{{$endingdate}}" required="" name="endingdate" id="endingdate" />
                  @else
                  <input type="date" class="form-control" required="" name="endingdate" id="endingdate" />
                  @endif
                </div>
                <!-- <div class="clearfix"> </div> -->
                <div class="form-group col-md-4">
                  <br />
                  <!-- <label for="endingdate"></label> -->
                  <input type="submit" class="btn btn-success" required="" name="submit" value="Generate" />
                </div>
                <div class="clearfix"> </div>
              </div>
            </form>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tour Id</th>
                  <th>User Name</th>
                  <!-- <th>Name</th> -->
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
              </thead>
              <tbody>
                @if(isset($viewdata))
                @for($i=0;$i<count($viewdata);$i++) <tr>
                  <td>{{$viewdata[$i]->tour_id}}</td>
                  <td>{{$viewdata[$i]->user_name}}</td>
                  <!-- <td>{{$viewdata[$i]->name}}</td> -->
                  <td>{{$viewdata[$i]->place_visit}}</td>
                  <td>{{$viewdata[$i]->hotels}}</td>
                  <td>{{$viewdata[$i]->departure_date}}</td>
                  <td>{{$viewdata[$i]->arrival_date}}</td>
                  <td>{{$viewdata[$i]->adults}}</td>
                  <td>{{$viewdata[$i]->child}}</td>
                  <td>{{$viewdata[$i]->days}}</td>
                  <td>{{$viewdata[$i]->nights}}</td>
                  <td>{{$viewdata[$i]->mode_transport}}</td>
                  <td>{{$viewdata[$i]->tour_price}}</td>
                  </tr>
                  @endfor
                  @endif
              </tbody>
            </table>
            @if(isset($viewdata))

            @if(count($viewdata)>0)
            <form role="form" action="{{url('admin/CustomBookingPDFview')}}" method="get">
              @csrf
              <center>
                @if(isset($startingdate))
                <input type="hidden" class="form-control" value="{{$startingdate}}" required="" name="startingdate" id="startingdate" />
                @endif
                @if(isset($endingdate))
                <input type="hidden" class="form-control" value="{{$endingdate}}" required="" name="endingdate" id="endingdate" />
                @endif
                <input type="submit" class="btn btn-info" required="" name="submit" value="View Report in PDF Format" />
              </center>
            </form>
            @endif
            @endif
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<script type="text/javascript">
  function checkdate() {
    var date1 = new Date(document.getElementById("startingdate").value);
    var date2 = new Date(document.getElementById("endingdate").value);
    if (date2.toLocaleDateString() >= date1.toLocaleDateString()) {
      return true;
    } else {
      alert('Ending Date Must Be Grater Than Starting Date');
      return false;
    }
  }
</script>
<script>
  $(document).ready(function() {
    $('body').on("click", "#btn", function(e) {
      e.preventDefault();
      var val = $("#frm").validate({
        rules: {
          name: {
            required: true
          },
          email: {
            required: true
          },
          /*  password : {
                required: true
            }*/
          /* confirmpassword : {
               equalTo: "#password"
           }*/
        },
      });
      if (val.form() != false) {
        var action = "@isset($data){{'PUT'}}@endisset @empty($data){{'POST'}}@endempty".trim();
        var url = "@isset($data){{url('user/'.$data->id)}}@endisset @empty($data){{url('user')}}@endempty".trim();
        var fdata = new FormData($("#frm")[0]);

        load();
        $.ajax({
          url: url,
          type: 'POST',
          data: fdata,
          headers: {
            'X_CSRF_TOKEN': '{{ csrf_token() }}',
          },
          processData: false,
          contentType: false,
          success: function(data, textStatus, jqXHR) {
            var res = data;
            $("#msg").fadeIn("slow");
            $("#msg").removeClass();
            if (data.status == 200) {
              $("#msg").addClass("alert alert-success");
              if (action == 'POST') {
                $("#frm")[0].reset();
              }
            } else {
              $("#msg").addClass("alert alert-danger");
            }
            $("#msg").html(res.msg);
            unload();
            hidemsg(5000, 2000);
            scrolltop();
          },
          error: function(jqXHR, textStatus, errorThrown) {
            alert("Something went wrong. Please try again.")
            unload();
          }
        });
      } else {
        return false;
      }
    });
  });
</script>
@endsection