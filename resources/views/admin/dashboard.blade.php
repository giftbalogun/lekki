@extends('layouts.admin')
@section('title', 'Dashboard')
@section('active-dashboard','active')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Dashboard
    <small>LVA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="ion ion-ios-book-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tutors</span>
            <span class="info-box-number">{{\App\User::whereHas('roles', function($q){ $q->where('name', 'tutor'); })->count()}}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Clients</span>
            <span class="info-box-number">{{\App\User::whereHas('roles', function($q){ $q->where('name', 'client'); })->count()}}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-money"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Subscriptions</span>
            <span class="info-box-number">{{ \App\Subscription::all()->count() }}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Registered Users</span>
            <span class="info-box-number">{{ Auth::user()->totalUsers() }}</span>
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <!-- div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">760</span> -->
          </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
      </div><!-- /.col -->

    </div><!-- /.row -->
</section><!-- /.content -->
@endsection
