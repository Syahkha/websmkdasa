@extends('layouts.index')
@section('title')
    Dashboard
@endsection
@section('konten')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h5>Pengguna</h5></div>
        </div>
        <div class="col-auto">
            <i class="fas fa-cog fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h5>Artikel</h5></div>
        </div>
        <div class="col-auto">
            <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><h5>Pembayaran</h5></div>
            <div class="row no-gutters align-items-center">
            <div class="col-auto">
            </div>
            </div>
        </div>
        <div class="col-auto">
            <i class="fas fa-home fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
        <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h5>Pendaftar</h5></div>
        </div>
        <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
@endsection