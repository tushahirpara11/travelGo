@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="min-height: 946px;">
<section class="content">
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">{{$title}}</h3>
          <div id="msg"></div>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form id="frm" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          @isset($data)
          <input type="hidden" name="_method" value="PUT">
          @endisset
          <div class="box-body">
            <div class="row">
                <div class="col-md-5">

                    <div class="form-group">
                        <label>Name <span class="error">*</span></label>
                        <input type="text" class="form-control" value="@isset($data){{$data->name}}@endisset" name="name" placeholder="Enter first name">
                    </div>

                    <div class="form-group">
                        <label>Email <span class="error">*</span></label>
                        <input type="text" class="form-control" value="@isset($data){{$data->email}}@endisset" name="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Password @if(!isset($data))<span class="error">*</span>@endif</label>
                        <input type="password" class="form-control @if(!isset($data)) required @endif" name="password" id="password" placeholder="Enter password">
                    </div>
                </div>
                <div class="col-md-1">
                </div>
                <div class="col-md-6">                    
                    <div class="form-group">
                        <label>Profile @if(!isset($data))<span class="error">*</span>@endif</label>
                        <input type="file"  name="image" id="image" >
                        <img src="{{displayImage(Auth::user()->image)}}" height="50px" width="50px" class="img-square" alt="User Image" />
                    </div>
                  <!--  <div class="form-group">
                        <label>Confirm Password @if(!isset($data))<span class="error">*</span>@endif</label>
                        <input type="password" class="form-control @if(!isset($data)) required @endif" name="confirmpassword" placeholder="Enter password again">
                    </div>-->
                </div>
            </div>
          </div><!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" id="btn" class="btn btn-primary" value="Submit">
                <a class="btn btn-warning" href="{{url('home')}}">Cancel</a>
            </div>
        </form>
     </div><!-- /.box -->
</div><!--/.col (left) -->
</div>
</section>
</div>
<script>
    $(document).ready(function(){        
        $('body').on("click","#btn",function (e) {
            e.preventDefault();
            var val = $("#frm").validate({
                rules: {
                    name : {
                        required: true
                    },                    
                    email : {
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
            if(val.form() != false) {
                var action = "@isset($data){{'PUT'}}@endisset @empty($data){{'POST'}}@endempty".trim();
                var url = "@isset($data){{url('user/'.$data->id)}}@endisset @empty($data){{url('user')}}@endempty".trim();
                var fdata = new FormData($("#frm")[0]);

                load();
                $.ajax({
                    url : url,
                    type: 'POST',
                    data : fdata,
                    headers: {
                        'X_CSRF_TOKEN':'{{ csrf_token() }}',
                    },
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR){
                        var res = data;
                        $("#msg").fadeIn("slow");
                        $("#msg").removeClass();
                        if(data.status == 200) {
                            $("#msg").addClass("alert alert-success");
                            if(action == 'POST') {
                                $("#frm")[0].reset();
                            }                            
                        } else {
                            $("#msg").addClass("alert alert-danger");
                        }
                        $("#msg").html(res.msg);
                        unload();
                        hidemsg(5000,2000);
                        scrolltop();
                    },
                    error: function(jqXHR, textStatus, errorThrown){
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