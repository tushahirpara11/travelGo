@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content">
    <section class="content-header">
      <h1>
        Add Package
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
              alert("Record Updated Successfully");
            </script>            
            @elseif(Session::has('msgflase'))
            <script>
              alert("Something went Worng..!");
            </script>            
            @endif
            <!-- form start -->            
            <form role="form" method="POST" enctype="multipart/form-data" action="{{URL::route('upd.update',$viewdata[0]->package_id)}}">
              @csrf
              @for($i=0;$i<count($viewdata);$i++) <div class="box-body">               
                  <input type="hidden" name="id" value="{{$viewdata[$i]->package_id}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Name">                
                <div class="form-group col-md-6">
                  <label for="Package Name">Package Name</label>
                  <input type="text" name="packagetitle" onkeypress="return OnlyAlpha(event);" value="{{$viewdata[$i]->packagetitle}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Package Name">
                </div>
                <div class="form-group col-md-6">
                  <label for="Package Activity">Package Activity</label>
                  <select name="activitytype" class="form-control select2">
                    <option selected="selected" value="{{$viewdata[$i]->activitytype}}">{{$viewdata[$i]->activitytype}}</option>
                    <option value="Sports">Sports</option>
                    <option value="Adventure">Adventure</option>
                    <option value="Climbing">Climbing</option>
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="City">City</label>
                  <select name="city_id" class="form-control select2">
                    <option selected="selected" value="{{$statename[0]->state_id}}">{{$statename[0]->state_name}}</option>
                    @foreach($states as $state)
                    <option value="{{$state->state_id}}">{{$state->state_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-4">
                  <label for="Currency">Currency</label>
                  <select name="curency" class="form-control select2">
                    <option selected="selected" value="{{$viewdata[$i]->curency}}">{{$viewdata[$i]->curency}}</option>
                    <option value="Ruppes">Ruppes</option>
                    <option value="Doller">Doller</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="Display Amount">Display Amount</label>
                  <input type="text" name="displayamount" onkeypress="return NumberOnly(event);" value="{{$viewdata[$i]->displayamount}}" class="form-control" id="exampleInputPassword1" placeholder="Enter Display Amount">
                </div>
                <div class="form-group col-md-3">
                  <label for="Package Code">Package Code</label>
                  <input type="text" name="tourcode" class="form-control" onkeypress="return AlphaNumericOnly(event);" value="{{$viewdata[$i]->tourcode}}" id="exampleInputPassword1" placeholder="Package Code">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Package Code">Valid Form</label>
                  <input type="date" name="validfrom" class="form-control" value="{{$viewdata[$i]->validfrom}}" id="exampleInputPassword1" placeholder="Valid Form">
                </div>
                <div class="form-group col-md-3">
                  <label for="Valid To">Valid To</label>
                  <input type="date" name="validto" class="form-control" value="{{$viewdata[$i]->validto}}" id="exampleInputPassword1" placeholder="Valid To">
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 1">Image 1</label>
                  <input type="file" name="pkgimg1" id="exampleInputFile">
                  <input type="hidden" value="{{$viewdata[$i]->pkgimg1}}" name="hiddenimg1" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[$i]->pkgimg1)}}" height="100px" width="100px" class="img-circle" alt="User Image" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Image 2">Image 2</label>
                  <input type="file" name="pkgimg2" id="exampleInputFile">
                  <input type="hidden" value="{{$viewdata[$i]->pkgimg2}}" name="hiddenimg2" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[$i]->pkgimg2)}}" height="100px" width="100px" class="img-circle" alt="User Image" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Image 3">Image 3</label>
                  <input type="file" name="pkgimg3" id="exampleInputFile">
                  <input type="hidden" value="{{$viewdata[$i]->pkgimg3}}" name="hiddenimg3" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[$i]->pkgimg3)}}" height="100px" width="100px" class="img-circle" alt="User Image" />
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-3">
                  <label for="Image 4">Image 4</label>
                  <input type="file" name="pkgimg4" id="exampleInputFile">
                  <input type="hidden" value="{{$viewdata[$i]->pkgimg4}}" name="hiddenimg4" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[$i]->pkgimg4)}}" height="100px" width="100px" class="img-circle" alt="User Image" />
                </div>
                <div class="form-group col-md-3">
                  <label for="Image 5">Image 5</label>
                  <input type="file" name="pkgimg5" id="exampleInputFile">
                  <input type="hidden" value="{{$viewdata[$i]->pkgimg5}}" name="hiddenimg5" id="exampleInputFile">
                  <img src="{{displayImage($viewdata[$i]->pkgimg5)}}" height="100px" width="100px" class="img-circle" alt="User Image" />
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Highlights</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="highlight" rows="5" placeholder="Enter Highlights...">{{$viewdata[$i]->highlight}}</textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Itinerary</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="itinerary" rows="5" placeholder="Enter Itinerary...">{{$viewdata[$i]->itinerary}}</textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Inclusion</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="inclusion" rows="5" placeholder="Enter Inclusion...">{{$viewdata[$i]->inclusion}}</textarea>
                </div>
                <div class="form-group col-md-6">
                  <label>Exclusion</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="exclusion" rows="5" placeholder="Enter Exclusion...">{{$viewdata[$i]->exclusion}}</textarea>
                </div>
                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <label>Policy</label>
                  <textarea onkeypress="return AlphaNumericOnly(event);" class="form-control" name="cancellationpolicy" rows="5" placeholder="Enter Policy...">{{$viewdata[$i]->cancellationplicy}}</textarea>
                </div>

                <div class="clearfix"> </div>
                <div class="form-group col-md-6">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="clear" class="btn btn-danger">Clear</button>
                </div>
                <div class="clearfix"> </div>
          </div>
          @endfor
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