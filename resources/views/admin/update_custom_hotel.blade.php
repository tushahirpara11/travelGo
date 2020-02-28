@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content">
    <section class="content-header">
      <h1>
        Update Hotel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/Home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
              <h3 class="box-title">Update Hotel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" enctype="multipart/form-data" action="{{URL::route('updcustomhotel.update',$viewdata[0]->hotel_id)}}">
              @csrf
              <div class="box-body">
                <div class="form-group col-md-4">
                  <label for="Hotel Name">Hotel Name</label>
                  <input type="text" onkeypress="return OnlyAlpha(event);" class="form-control" value="{{$viewdata[0]->hotel_name}}" name="hotel_name" id="exampleInputPassword1" placeholder="Enter Hotel Name">
                </div>
                <!-- <div class="clearfix"> </div> -->
                <div class="form-group col-md-4">
                  <label for="City">City</label>
                  <select name="city_id" class="form-control select2">
                    <option selected="selected" value="{{$selectcity[0]->city_id}}">{{$selectcity[0]->city_name}}</option>
                    @foreach($cities as $cityinfo)
                    <option value="{{$cityinfo->city_id}}">{{$cityinfo->city_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="Star Category">Star Category</label>
                  <select name="hotel_starCategory" class="form-control select2">
                    <option selected="selected">{{$viewdata[0]->hotel_starCategory}}</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>7</option>
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 1">Image 1</label>
                  <input type="hidden" value="{{$viewdata[0]->hotel_Image1}}" name="hidden_hotel_Image1" id="exampleInputFile">
                  <input type="file" name="hotel_Image1" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[0]->hotel_Image1)}}" height="100px" width="100px" class="img-circle" alt="Hotel Image1" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Image 2">Image 2</label>
                  <input type="hidden" value="{{$viewdata[0]->hotel_Image2}}" name="hidden_hotel_Image2" id="exampleInputFile">
                  <input type="file" name="hotel_Image2" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[0]->hotel_Image2)}}" height="100px" width="100px" class="img-circle" alt="Hotel Image1" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Image 3">Image 3</label>
                  <input type="hidden" value="{{$viewdata[0]->hotel_Image3}}" name="hidden_hotel_Image3" id="exampleInputFile">
                  <input type="file" name="hotel_Image3" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[0]->hotel_Image3)}}" height="100px" width="100px" class="img-circle" alt="Hotel Image1" />
                </div>
                <div class="form-group col-md-4">
                  <label for="Hotel Price">Hotel Price</label>
                  <input type="text" onkeypress="return NumberOnly(event);" class="form-control" value="{{$viewdata[0]->hotel_price}}" name="hotel_price" id="exampleInputPassword1" placeholder="Enter Hotel Name">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Address</label>
                  <textarea class="form-control" name="hotel_address" rows="5" placeholder="Enter Address...">{{$viewdata[0]->hotel_address}}</textarea>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary">Submit</button>
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