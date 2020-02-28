@extends('layouts.app')
@section('content')
@php

@endphp
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            {{ $title }}
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">{{ $title }}</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="row col-md-12">
                                <div class="col-md-6">
                                    <table cellpadding="5" class="table">
                                        @if(@isset($data))
                                        <tr>
                                            <td><b>User Name : </b></td>
                                            <td> {{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Display Name : </b></td>
                                            <td> {{$data->display_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone: </b></td>
                                            <td> {{$data->phone}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Age : </b></td>
                                            <td> {{$data->age}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Facebook Id : </b></td>
                                            <td> @if($data->fbid!=''){{$data->fbid}} @else -- @endif</td>
                                        </tr>
                                        <tr>
                                            <td><b>Google Id : </b></td>
                                            <td> @if($data->gid!=''){{$data->gid}} @else -- @endif</td>
                                        </tr>

                                        @endif
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table cellpadding="5" class="table">

                                        <tr>
                                            <td><b>Email : </b></td>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Status : </b></td>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Phone Code: </b></td>
                                            <td>{{$data->code}}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Created date : </b></td>
                                            <td>
                                                {{$data->created_at}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="vertical-align: top;"><b>Profile Image : </b></td>
                                            <td>
                                                @if(!empty($data->image))

                                                <img src="{{url('public/storage/'.$data->image)}}" height="60px" width="60px" style="border: 1px solid #ccc;margin-top: 3px;">

                                                @else
                                                --
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('user.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

</div>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
    <!-- BEGIN: Subheader -->

    <!-- END: Subheader -->

    <div class="m-content">
        <div class="row">
            <div class="col-md-12">
                <div class="m-portlet m-portlet--tab">
                    <div data-toggle="collapse" data-target="#testimonialFormData" class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <span class="m-portlet__head-icon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <h3 class="m-portlet__head-text">User Details</h3>

                            </div>
                        </div>
                    </div>

                    <div id="testimonialFormData" class="view-testimonial-data">
                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <table cellpadding="5">
                                    @if(@isset($data))
                                    <tr>
                                        <td><b>User Name : </b></td>
                                        <td> {{$data->name}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Phone : </b></td>
                                        <td> {{$data->phone}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Phone Code : </b></td>
                                        <td> {{$data->code}}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Latitude : </b></td>
                                        <td> {{$data->lat}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Longitude : </b></td>
                                        <td> {{$data->long}}</td>
                                    </tr>

                                    @endif
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table cellpadding="5">

                                    <tr style="vertical-align: top;">
                                        <td><b>Email : </b></td>
                                        <td>{{$data->email}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Age : </b></td>
                                        <td>{{$data->age}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Status : </b></td>
                                        <td>{{$data->status}}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Created date : </b></td>
                                        <td>
                                            {{$data->created_at}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: top;"><b>Profile Image : </b></td>
                                        <td>
                                            @if(!empty($data->post_images))
                                            @foreach($data->post_images as $img)
                                            <img src="{{url('public/upload/post/'.$img->image)}}" height="60px" width="60px" style="border: 1px solid #ccc;margin-top: 3px;">
                                            @endforeach
                                            @else
                                            --
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>

                        <footer class="card-footer text-left">

                            <a href="{{route('user.index')}}" class="btn btn-primary">Back</a>

                        </footer>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection