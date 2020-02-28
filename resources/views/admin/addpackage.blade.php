@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content">
    <section class="content-header">
      <h1>
        Add Package
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Package</li>
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
              <h3 class="box-title">Add Package</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            @if(Session::has('validto'))
            <script>
              alert("Valid To Date Grater Than Current Date.");
            </script>  
            @elseif(Session::has('check_date'))
            <script>
              alert("Please check Valid to and Valid To and From Date.");
            </script>  
            @elseif(Session::has('count_one'))
            <script>
              alert("Tour Code Already Exists.");
            </script>   
            @elseif(Session::has('msg'))
            <script>
              alert("Record inserted Successfully");
            </script>            
            @elseif(Session::has('msgflase'))
            <script>
              alert("Something went Worng..!");
            </script>            
            @endif
            <form role="form" method="POST" enctype="multipart/form-data" action="addpackage">
              @csrf
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="Package Name">Package Name</label>
                  <input type="text" name="packagetitle" required="" onkeypress="return OnlyAlpha(event);" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="Package Activity">Package Activity</label>
                  <select name="activitytype" required="" class="form-control select2">
                    <option selected="selected" value="Adventure">Adventure</option>
                    <option value="ports">Sports</option>
                    <option value="Climbing">Climbing</option>
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="City">City</label>
                  <select name="city_id" required="" class="form-control select2">
                    @foreach($states as $state)
                    <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="Currency">Currency</label>
                  <select name="curency" required="" class="form-control select2">
                    <option selected="selected" value="Ruppes">₹Ruppes</option>
                    <option value="Doller">$Doller</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="Display Amount">Display Amount</label>
                  <input type="text" name="displayamount" required="" onkeypress="return NumberOnly(event);" class="form-control" id="exampleInputPassword1" placeholder="Enter Display Amount">
                </div>
                <div class="form-group col-md-3">
                  <label for="Package Code">Package Code</label>
                  <input type="text" name="tourcode" class="form-control" required="" onkeypress="return AlphaNumericOnly(event);" id="exampleInputPassword1" placeholder="Package Code">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Package Code">Valid Form</label>
                  <input type="date" name="validfrom" class="form-control" required="" id="exampleInputPassword1" placeholder="Valid Form">
                </div>
                <div class="form-group col-md-3">
                  <label for="Valid To">Valid To</label>
                  <input type="date" name="validto" class="form-control" required="" id="exampleInputPassword1" placeholder="Valid To">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 1">Image 1</label>
                  <input type="file" name="pkgimg1" required="" id="exampleInputFile">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 2">Image 2</label>
                  <input type="file" name="pkgimg2" required="" id="exampleInputFile">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 3">Image 3</label>
                  <input type="file" name="pkgimg3" required="" id="exampleInputFile">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 4">Image 4</label>
                  <input type="file" name="pkgimg4" required="" id="exampleInputFile">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 5">Image 5</label>
                  <input type="file" name="pkgimg5" required="" id="exampleInputFile">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Highlights</label>
                  <textarea class="form-control" name="highlight" required="" rows="5" onkeypress="return AlphaNumericOnly(event);" placeholder="Enter Highlights..."></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Itinerary</label>
                  <textarea class="form-control" name="itinerary" required="" rows="5" onkeypress="return AlphaNumericOnly(event);" placeholder="Enter Itinerary..."></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Inclusion</label>
                  <textarea class="form-control" name="inclusion" required="" rows="5" onkeypress="return AlphaNumericOnly(event);" placeholder="Enter Inclusion..."></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Exclusion</label>
                  <textarea class="form-control" name="exclusion" required="" rows="5" onkeypress="return AlphaNumericOnly(event);" placeholder="Enter Exclusion..."></textarea>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Policy</label>
                  <textarea class="form-control" name="cancellationplicy" required="" rows="5" onkeypress="return AlphaNumericOnly(event);" placeholder="Enter Policy..."></textarea>
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