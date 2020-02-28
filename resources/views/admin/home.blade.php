@extends('layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$user}} </h3>
            <p>Users</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="{{url('admin/user')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$pkg}} </h3>
            <p>Package</p>
          </div>
          <div class="icon">
            <i class="fa fa-map-marker"></i>
          </div>
          <a href="{{url('admin/viewpackage')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$places}} </h3>
            <p>Places</p>
          </div>
          <div class="icon">
            <i class="fa fa-building"></i>
          </div>
          <a href="{{url('admin/viewcustomplaces')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$hotel}} </h3>
            <p>Hotels</p>
          </div>
          <div class="icon">
            <i class="fa fa-hotel"></i>
          </div>
          <a href="{{url('admin/viewcustomhotel')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-navy">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$booking}} </h3>
            <p>Booking</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="{{url('admin/viewbooking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-fuchsia">
          <div class="inner">
            <!-- ion ion-person-add -->
            <h3>{{$custombook}} </h3>
            <p>Custom Booking</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{url('admin/viewcustombooking')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection