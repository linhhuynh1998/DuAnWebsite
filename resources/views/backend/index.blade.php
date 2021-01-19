@extends('backend.pages.home')
@section('title')
    Trang chủ quản lý bán hàng
@stop

@section('content')
        
<nav aria-label="breadcrumb">
    <ol class="breadcrumb my-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/dashboard') }}">Trang chủ</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</nav>
<div class="welcome-msg pt-3 pb-4">
    <h1>Hi <span class="text-primary">John</span>, Welcome back</h1>
    <p>Very detailed & featured admin.</p>
</div>
        
<!-- statistics data -->
    <div class="statistics">
        <div class="row">
            <div class="col-xl-6 pr-xl-2">
                <div class="row">
                    <div class="col-sm-6 pr-sm-2 statistics-grid">
                        <div class="card card_border border-primary-top p-4">
                            <i class="lnr lnr-users"> </i>
                            <h3 class="text-primary number">{{ $userCount }}</h3>
                            <p class="stat-text">Tổng số người dùng</p>
                        </div>
                    </div>
                    <div class="col-sm-6 pl-sm-2 statistics-grid">
                        <div class="card card_border border-primary-top p-4">
                            <i class="fas fa-blog"></i>
                            <h3 class="text-secondary number">{{ $blogCount }}</h3>
                            <p class="stat-text">Tổng số Blog</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 pl-xl-2">
                <div class="row">
                    <div class="col-sm-6 pr-sm-2 statistics-grid">
                        <div class="card card_border border-primary-top p-4">
                            <i class="fas fa-medal"></i>
                            <h3 class="text-success number">{{ $productCount }}</h3>
                            <p class="stat-text">Tổng số sản phẩm</p>
                        </div>
                    </div>
                <div class="col-sm-6 pl-sm-2 statistics-grid">
                    <div class="card card_border border-primary-top p-4">
                        <i class="lnr lnr-cart"> </i>
                        <h3 class="text-danger number">{{ $orderCount }}</h3>
                        <p class="stat-text">Đã mua</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //statistics data -->
@stop