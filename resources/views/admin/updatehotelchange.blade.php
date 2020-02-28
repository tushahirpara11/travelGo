@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content">
    <section class="content-header">
      <h1>
        Update Hotel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update Hotel</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Updade Hotel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{URL::route('updhotel.update',$viewdata[0]->hotel_master_id)}}">
              @csrf
              <div class="box-body">
                <div class="form-group col-md-4">
                  <label for="Select Package">Select Package</label>
                  <select name="package_id" class="form-control select2">
                    <option selected="selected" value="{{$selected[0]->package_id}}">{{$selected[0]->tourcode}}</option>
                    @foreach($allcode as $packagecodeinfo)
                    <option value="{{$packagecodeinfo->package_id}}">{{$packagecodeinfo->tourcode}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="Star Category">Star Category</label>
                  <select name="hm_starcategory" class="form-control select2">
                    <option selected="selected">{{$viewdata[0]->hm_starcategory}}</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>7</option>
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="Hotel Name">Hotel Name</label>
                  <input type="text" onkeypress="return OnlyAlpha(event);" class="form-control" name="hm_name" value="{{$viewdata[0]->hm_name}}" d="exampleInputPassword1" placeholder="Enter Hotel Name">
                </div>
                <div class="form-group col-md-4">
                  <label for="City">City</label>
                  <select name="city_id" class="form-control select2">
                    <option selected="selected" value="{{$city[0]->city_id}}">{{$city[0]->city_name}}</option>
                    @foreach($allcity as $cityinfo)
                    <option value="{{$cityinfo->city_id}}">{{$cityinfo->city_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="No of Nights">No of Nights</label>
                  <input type="text" name="hm_noofnights" onkeypress="return NumberOnly(event);" class="form-control" value="{{$viewdata[0]->hm_noofnights}}" id="exampleInputPassword1" placeholder="Enter No of Nights">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Address</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="hm_address" rows="5" placeholder="Enter Address...">{{$viewdata[0]->hm_address}}</textarea>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="clear" class="btn btn-danger">Clear</button>
                </div>
                <div class="clearfix"> </div>
              </div>
            </form>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
    </section>
</div>
</section>
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