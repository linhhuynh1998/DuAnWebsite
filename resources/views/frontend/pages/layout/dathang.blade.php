@extends('frontend.pages.home')
@section('title')
    Quản lý đặt hàng
@stop
@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{ URL::to('/') }}">Trang chủ</a><span>» </span></li>
                <li class=""> <a title="Go to Home Page" href="javascript:void()">Quản lý</a><span>» </span></li>
            <li class="category13"><strong>Đặt hàng</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <div class="container" id="checkorder">
    <div class="row">
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3 mt-3">Địa chỉ khách hàng</h4>
        <form class="needs-validation" action="{{ route('check.order.insert',Auth::user()->id) }}" method="post">
            @csrf
              @if(Auth::check())
                @if(count($customer) > 0)
                  @foreach($customer as $custom)
                    <div class="row">
                      <div class="col-md-12 mb-3">
                        <label for="firstName">Họ tên của bạn</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Nhập tên của bạn (*)" value="{{ old('name',$custom->name) }}" name="name">
                        @if($errors->has('name'))
                            <div class="text-red">{{ $errors->first('name') }}</div> 
                        @endif
                      </div>
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="company">Tên công ty</label>
                      <input type="text" class="form-control" id="company" placeholder="Tên công ty (tùy chọn)" name="company" value="{{ old('company',$custom->company) }}">
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{ old('email',$custom->email) }}">
                        @if($errors->has('email'))
                            <div class="text-red">{{ $errors->first('email') }}</div> 
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="address">Địa chỉ</label>
                      <input type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn" name="address" value="{{ old('address',$custom->address) }}">
                        @if($errors->has('address'))
                            <div class="text-red">{{ $errors->first('address') }}</div> 
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="address">Số điện thoại</label>
                      <input type="text" class="form-control" id="address" placeholder="0123456789" name="phone" value="{{ old('phone',$custom->phone) }}">
                        @if($errors->has('phone'))
                            <div class="text-red">{{ $errors->first('phone') }}</div> 
                        @endif
                    </div>
                    <div class="mb-3 mt-3">
                          <label for="note">Ghi chú đơn hàng</label>
                          <textarea name="note" class="form-control" cols="30" rows="10" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn">{{ old('note') }}</textarea>
                    </div>
                  @endforeach 
                @else
                <div class="row">
                  <div class="col-md-12 mb-3">
                    <label for="firstName">Họ tên của bạn</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Nhập tên của bạn (*)" value="{{ old('name') }}" name="name">
                    @if($errors->has('name'))
                        <div class="text-red">{{ $errors->first('name') }}</div> 
                    @endif
                  </div>
                </div>
                <div class="mb-3 mt-3">
                  <label for="company">Tên công ty</label>
                  <input type="text" class="form-control" id="company" placeholder="Tên công ty (tùy chọn)" name="company" value="{{ old('company') }}">
                </div>
                <div class="mb-3 mt-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <div class="text-red">{{ $errors->first('email') }}</div> 
                    @endif
                </div>
                <div class="mb-3 mt-3">
                  <label for="address">Địa chỉ</label>
                  <input type="text" class="form-control" id="address" placeholder="Địa chỉ của bạn" name="address" value="{{ old('address') }}">
                    @if($errors->has('address'))
                        <div class="text-red">{{ $errors->first('address') }}</div> 
                    @endif
                </div>
                <div class="mb-3 mt-3">
                  <label for="address">Số điện thoại</label>
                  <input type="text" class="form-control" id="address" placeholder="0123456789" name="phone" value="{{ old('phone') }}">
                    @if($errors->has('phone'))
                        <div class="text-red">{{ $errors->first('phone') }}</div> 
                    @endif
                </div>
                <div class="mb-3 mt-3">
                      <label for="note">Ghi chú đơn hàng</label>
                      <textarea name="note" class="form-control" cols="30" rows="10" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn">{{ old('note') }}</textarea>
                </div>
              @endif
              @endif
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Tiến hành đặt hàng</button><div id="paypal-button"></div>
        </form>        
      </div>
      <div class="col-md-4 order-md-2 mb-4 mt-3">
        <h4 class="d-flex justify-content-between align-items-center mb-3 mt-3">
          <span class="text-muted">Giỏ hàng của bạn</span>
          <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
        </h4>
        <ul class="list-group mb-3 ">
            @foreach(Cart::content() as $cart)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
                <div>
                    <h5 class="text-muted">{{ $cart->name }}</h5>
                </div>
                <span class="text-muted">{{ $cart->qty }} x {{ number_format($cart->price,0,',','.') }} <sup>đ</sup> </span>
                <br>
                <img src="{{ asset('public/uploads/products/'.$cart->options->img) }}" alt="" width="30%">
            </li>
            @endforeach
            <li class="list-group-item d-flex justify-content-between">
                <span>Tổng tiền (VNĐ): </span>
                <strong>{{ Cart::subtotal() }} <sup>đ</sup></strong>
            </li>
        </ul>
      </div>
    </div>
  </div>



  @stop