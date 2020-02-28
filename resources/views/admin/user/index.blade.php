@extends('layouts.app')
@section('content')
@section('head')
<style>
    #example2 td a{
       padding: 3px 8px 3px 8px;
    }
</style>
<link rel="stylesheet" href="{{asset('backend/plugins/sweetalert/sweetalert.css') }}"/>
@endsection
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/home')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">{{ $title }}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">                    
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>											
                                    <th>Email</th>									
                                    <th>Image</th>									
                                    <th>Status</th>									
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div>
<script type="text/javascript" src="{{asset('backend/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{asset('backend/plugins/sweetalert/jquery.sweet-alert.custom.js') }}"></script>
<script>
    $(function () {
        $('#example2').DataTable({
            bSort: false,
            processing: true,
            serverSide: true,
            ajax: {
                'url': "{{url('user/getall')}}",
                'type': 'POST',
                'headers': {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
            columns: [
                {data: 'DT_RowIndex', width: "10%"},
                {data: 'name'},
                {data: 'email'},
                {data: 'image'},
                {data: 'status'},
                {data: 'action'}
            ]
        });
    });
     /*status change notification*/
    $(document).on('click', '.status', function () {
        var t = $(this);
        var id = t.attr("id");
        var type = t.attr("data-type");
        swal({
            title: "Are you sure?",
            text: "You want to  "+type+" this user!",
            type: "warning",
            timer: 3000,
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel !",
            closeOnConfirm: true,
            closeOnCancel: true,
            showLoaderOnConfirm: true,
        }, function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: "post",
                    url: '{{url("user/statuschange")}}',
                    data: {
                        id: id,
                        type: type,
                    },
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function (data) {
                        if (data.status == 400) {
                            swal("Error", data.message, "error");
                        } else {
                            $("label").css({'color': '#3f4047'});
                            swal("", data.message, "success");
                        }
                        unload();
                        $("#example2").DataTable().ajax.reload(null, false);



                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Server Timeout!", "Please try again", "warning");
                    },
                    // timeout: 3000,
                });
            } else
            {

                swal();
            }
        });

    });
</script> 

@endsection
