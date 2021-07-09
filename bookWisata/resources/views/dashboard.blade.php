@extends('backend.template')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="row">

<!-- Earnings (Monthly) Card Example -->

<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Wisata</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $wisata }} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-map fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Travel & Homestay</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$travel_homestay}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-bus fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Admin</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$admin}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-user fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data User</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$user}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-users fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-secondary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Data Transaksi</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$booking}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-shopping-cart fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pengunjung</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$visitor}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-eye fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Metode Pembayaran</div>
          
          <div class="h5 mb-0 font-weight-bold text-gray-800"> {{$metode}} </div>
        </div>
        <div class="col-auto">
          <i class="fa fa-credit-card fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-xl-4 col-md-6 mb-4">
    </section>
    <!-- /.content -->
</div>
@endsection
