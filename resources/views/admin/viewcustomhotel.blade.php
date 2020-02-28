@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      View Hotels
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">View Hotels</li>
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
                  <th>Hotel Id</th>
                  <th>City Id</th>
                  <th>Hotel Name</th>
                  <th>Address</th>
                  <th>Star Category</th>
                  <th>Image1</th>
                  <th>Image2</th>
                  <th>Image3</th>
                  <th>Price</th>                  
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                @for($i=0;$i<count($viewdata);$i++) <tr>
                  <td>{{$viewdata[$i]->hotel_id}}</td>
                  <td>{{$viewdata[$i]->city_id}}</td>
                  <td>{{$viewdata[$i]->hotel_name}}</td>
                  <td>{{$viewdata[$i]->hotel_address}}</td>
                  <td>{{$viewdata[$i]->hotel_starCategory}}</td>
                  <td><img src="{{displayImage($viewdata[$i]->hotel_Image1)}}" height="50px" width="50px" class="img-circle" alt="Hotel Image1" /></td>
                  <td><img src="{{displayImage($viewdata[$i]->hotel_Image2)}}" height="50px" width="50px" class="img-circle" alt="Hotel Image2" /></td>
                  <td><img src="{{displayImage($viewdata[$i]->hotel_Image3)}}" height="50px" width="50px" class="img-circle" alt="Hotel Image3" /></td>
                  <td>{{$viewdata[$i]->hotel_price}}</td>
                  <td>
                    <form method="POST" action="{{ route('updatecustomhotel.updatehotel', [$viewdata[$i]->hotel_id]) }}">
                      {{ csrf_field() }}
                      <button class="btn btn-info" type="submit">Update</button>
                    </form>
                  </td>
                  <td>
                    <form method="POST" action="{{ route('deletecustomhotel.destroy', [$viewdata[$i]->hotel_id]) }}">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
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