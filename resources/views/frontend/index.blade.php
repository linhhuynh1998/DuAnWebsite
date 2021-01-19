@extends('frontend.pages.home')
@section('title')
Trang chủ
@stop
@section('content')
@include('frontend/pages/include/slider')
@include('frontend/pages/include/banner')
<!-- main container -->
<div class="main-col">
    <div class="container">
      <div class="row"> 
        <!-- Featured Slider -->
            @foreach($category as $key => $cate)
                <div class="best-pro container animated">
                <div class="slider-items-products">
                    <div class="new_title center">
                    <h2>{{ $cate->name }}</h2>
                    </div>
                    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            @if($cate->id)
                                @foreach($cate->product as $pro)
                                    <div class="item">
                                        <div class="item-inner">
                                            <div class="item-img">
                                            <div class="item-img-info"> <a class="product-image" title="Sample Product" href="{{ route('product.detail.list',[$pro->slug,$pro->id]) }}"> <img alt="Sample Product" src="{{ asset('public/uploads/products/'.$pro->avatar) }}" height="230px"> </a>
                                                @if($pro->promotion == '')
                                                @else
                                                    <div class="sale-label sale-top-left">sale</div>
                                                @endif
                                                <div class="item-box-hover">
                                                <div class="box-inner">
                                                    <div class="actions">
                                                    <div class="add_cart">
                                                        <a href="{{ route('add.cart.list',$pro->id) }}" class="button btn-cart"><span>Thêm sản phẩm vào giỏ hàng</span></a>
                                                    </div>
                                                    <div class="product-detail-bnt">
                                                        <a href="javascript:void()" class="button detail-bnt detail_render" data-id="{{ $pro->id }}" data-toggle="modal" data-target="#myModal">
                                                            <span>Xem qua</span>
                                                        </a>
                                                    </div>
                                                    <span class="add-to-links"><a href="{{ route('add.wishlist',$pro->id) }}" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a></span> </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title=" {{ $pro->name }} " href="{{ route('product.detail.list',[$pro->slug,$pro->id]) }}"> {{ $pro->name }} </a> </div>
                                                <div class="item-content">
                                                    <div class="rating">
                                                        <div class="ratings">
                                                          <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                          </div>
                                                          <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                        </div>
                                                      </div>
                                                <div class="item-price">
                                                    <div class="price-box"> 
                                                        @if($pro->promotion == '')
                                                        <span class="regular-price"> <span class="price">{{ number_format($pro->price,0,',','.') }} <sup>đ</sup></span> </span> 
                                                        @else
                                                            <span class="regular-price"> <span class="price">{{ number_format($pro->price,0,',','.') }} <sup>đ</sup></span> </span> 
                                                            <div style="float: right" class="regular-price"><span class="price" style="color:red"><del>{{ number_format($pro->promotion,0,',','.') }} <sup>đ</sup></del></span></div>
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                </div>
            @endforeach
        <!-- End Featured Slider --> 
      </div>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="check"> 
      <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết sản phẩm</h4>
                </div>
                <div class="modal-body" id="content_detail"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
             <!-- End -Modal content-->
        </div>
    </div>
</div>

  @include('frontend/pages/include/blog')
@stop
