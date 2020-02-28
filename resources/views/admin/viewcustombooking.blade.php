@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      View Custom Places
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Custom Places</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
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
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
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
                  <td>
                    <form method="POST" action="{{ route('deletecustompkg', [$viewdata[$i]->tour_id]) }}">
                      {{ csrf_field() }}
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                  </td>
                  </tr>
                  @endfor
              </tbody>
            </table>
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