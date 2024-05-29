<!-- Dans votre vue dashboard.blade.php -->
@extends('layouts.master2')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container mt-5">
    <h1>Dashboard</h1>
    <div class="row mt-4">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="card-title">Total Products</div>
                    <h3 class="card-text">{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="card-title">Total Orders</div>
                    <h3 class="card-text">78</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="card-title">Total Users</div>
                    <h3 class="card-text">{{ $totalUsers }}</h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="card-title">Pending Orders</div>
                    <h3 class="card-text">98888</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
