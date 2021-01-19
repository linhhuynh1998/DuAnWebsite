@extends('frontend.pages.home')
@section('title')
Error 404
@stop
@section('content')
<!-- Main Container -->
<section class="content-wrapper animated">
    <div class="container">
      <div class="std">
        <div class="page-not-found">
          <h2>404</h2>
          <h3><img src="{{ asset('public/frontend/images/signal.png') }}" alt="error image">Xin lỗi! Trang trang bạn yêu cầu không tìm thấy !</h3>
          <div><a href="{{ URL::to('/') }}" class="btn-home"><span>Quay lại trang chủ</span></a></div>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 
@stop