<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TravelGo</title>
    <link href="{{ URL::asset('backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/css/style.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/bower_components/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('backend/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/datepicker/datepicker3.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/daterangepicker/daterangepicker-bs3.css') }} " rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }} " rel="stylesheet" type="text/css" />
    <script src="{{ URL::asset('backend/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ URL::asset('backend/scripts/jquery.validate.js') }}"></script>
    @yield('head')
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @if(Auth::check())
        @include('layouts.header')
        @include('layouts.sidebar')
        @endif
        @yield('content')
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h4 class="modal-title" id="msgfortitle">Warning Message</h4>
                    </div>
                    <div class="modal-body">
                        <p id="msgfordio">Please select at least one record to continue.</p>
                    </div>
                    <div class="modal-footer" id="btnfordio">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        @if(Auth::check())
        @include('layouts.footer')
        @endif
    </div>

    <!-- Scripts -->
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::asset('backend/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- DataTables -->
    <script src="{{ URL::asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- jvectormap -->
    <script src="{{ URL::asset('backend/plugins/datatables/jquery.dataTables.js') }} " type="text/javascript"></script>
    <script src="{{ URL::asset('backend/plugins/datatables/dataTables.bootstrap.js') }} " type="text/javascript"></script>


    <script src="{{ URL::asset('backend/plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('backend/plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('backend/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('backend/scripts/scripts.js') }}"></script>


    <!-- FastClick -->
    <script src="{{ URL::asset('backend/plugins/fastclick/fastclick.min.js') }}"></script>

    <script src="{{ URL::asset('backend/plugins/datetimepicker-master/jquery.datetimepicker.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::asset('backend/dist/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{URL::asset('backend/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    
    
    <!-- User Validation Script -->
    <script src="{{ URL::asset('backend/scripts/common.js') }}"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('backend/dist/js/demo.js') }}" type="text/javascript"></script>
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
        })
    </script>
    <script>
        function doaction(url, type) {
            var len = $(".innerallchk:checked").length;
            $("#msgfortitle").html("Warning Message");
            if (len == 0) {
                $("#msgfordio").html("Please select at least one record to continue.");
                $("#btnfordio").html('<button type="button" data-dismiss="modal" class="btn btn-primary">Ok</button>');
                $(".modal").modal("show");
            } else {
                var val = $('.innerallchk:checked').map(function() {
                    return this.value;
                }).get();

                if (type == 'Delete') {
                    $("#msgfordio").html("Are you sure you want to delete record(s)?");
                    val = "'" + val + "'"
                    url = "'" + url + "'"
                    type = "'" + type + "'"
                    $("#btnfordio").html('<button type="button" onclick="postdataforaction(' + url + ',' + type + ',' + val + ');" class="btn btn-danger">Ok</button><button type="button" data-dismiss="modal" class="btn btn-default canallchk">Cancel</button>');
                    $(".modal").modal("show");
                } else {
                    postdataforaction(url, type, val);
                }
            }
        }
        function postdataforaction(url, type, val) {
            load();
            var u = url + "/" + val;

            $.ajax({
                url: "{{ url('') }}/" + u,
                type: "Delete",
                data: {
                    type: type,
                    _token: "{{csrf_token()}}"
                },
                success: function(data) {
                    unload();
                    if (data.status == 200) {
                        if (type == 'Delete') {
                            $("#msgfortitle").html("Success Message");
                            $("#msgfordio").html("Data deleted successfully.");
                            $("#btnfordio").html('<button type="button" data-dismiss="modal" onclick="refresh();" class="btn btn-primary">Ok</button>');
                            $(".modal").modal("show");
                        } else {
                            refresh();
                            //location.reload();
                        }
                        $(".innerallchk, .mainchk").prop("checked", "");
                    } else {
                        alert(data.msg);
                    }
                },
                error: function(request, msg, error) {
                    unload();
                    alert("Something went wrong. Please try again.");
                }
            });
        }
    </script>
    @yield('script')
</body>
</html>
