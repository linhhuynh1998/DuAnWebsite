@extends('frontend.pages.home')
@section('title')
    Chi tiết sản phẩm 
@stop
@section('content')
@include('frontend/pages/include/banner')
<!-- Breadcrumbs -->
<div class="breadcrumbs animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{ URL::to('/') }}">Trang chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="javascrip:void()">Chi tiết sản phẩm</a><span>» </span></li>
            <li class="category13"><strong>{{ $ProductType->name }}</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
<!-- Main Container -->
<div class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
            @foreach($Product as $ProductDetail)
                <div class="product-view" data-id="{{ $ProductDetail->id }}" id="content_product">
                    <div class="product-essential">
                    <form action="{{ route('add.cart.list',$ProductDetail->id) }}" method="get" id="product_addtocart_form">
                        <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                        <div class="product-img-box col-sm-4 col-xs-12 animated">
                        <div class="new-label new-top-left"> New </div>
                        <div class="product-image">
                            <div class="large-image"> <a href="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img alt="Thumbnail" src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}"> </a> </div>
                            <div class="flexslider flexslider-thumb">
                            <ul class="previews-list slides">
                                <li><a href='{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' "><img src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" alt = "Thumbnail 1"/></a></li>
                                <li><a href='{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' "><img src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" alt = "Thumbnail 2"/></a></li>
                                <li><a href='{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' "><img src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" alt = "Thumbnail 1"/></a></li>
                                <li><a href='{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' "><img src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" alt = "Thumbnail 2"/></a></li>
                                <li><a href='{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}' "><img src="{{ asset('public/uploads/products/'.$ProductDetail->avatar)}}" alt = "Thumbnail 2"/></a></li>
                            </ul>
                            </div>
                        </div>
                        <!-- end: more-images --> 
                        </div>
                        <div class="product-shop col-sm-5 col-xs-12 animated">
                        <div class="product-name">
                            <h1>{{ $ProductDetail->name }}</h1>
                        </div>
                        <div class="short-description"> 
                            <!--<h2>Quick Overview</h2>-->
                            <p>{!! $ProductDetail->content !!}</p>
                        </div>
                        
                        <div class="price-block">
                            <div class="price-box">
                                @if($ProductDetail->promotion == '')
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> {{ number_format($ProductDetail->price,0,',','.') }} <sup>đ</sup> </span> </p>
                                @else
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> {{ number_format($ProductDetail->promotion,0,',','.') }} <sup>đ</sup></span> </p>
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span id="product-price-48" class="price"> {{ number_format($ProductDetail->price,0,',','.') }} <sup>đ</sup> </span> </p>
                                @endif
                            </div>
                        </div>
                        @if($ProductDetail->quantity <= 2)
                            <p class="availability in-none pull-right">
                                SL: {{ $ProductDetail->quantity }} <span>Hết hàng</span>
                            </p>
                        @else
                            <p class="availability in-stock pull-right">
                                SL: {{ $ProductDetail->quantity }} <span>Còn hàng</span>
                            </p>
                        @endif
                        <div class="add-to-box">
                            <div class="add-to-cart">
                            <label for="qty">Số lượng :</label>
                            <div class="pull-left">
                                <div class="custom pull-left">        
                                    <input type="number" min="1" class="form-control qty" class="qty" value="1" name="quantity">  
                                </div>
                            </div>
                                <button type="submit" class="button btn-cart"><span>Mua hàng</span></button>
                            </div>
                        </div>
                        </div>
                        <aside class="col-lg-3 col-sm-3 col-xs-12 animated"> 
                            <div class="product-sibebar-banner">
                            <div class="text-banner"> <a title="Text Banner" href="#"><img src="{{ asset('public/frontend/images/RHS-banner-img.jpg') }}" alt="banner"></a> </div>
                        </div>
                        </aside>
                    </form>
                    </div>
                    <div class="product-collateral col-sm-12 col-xs-12 animated">
                        <div class="add_info">
                            <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                            <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a> </li>
                            <li> <a href="#reviews_tabs" data-toggle="tab">Đánh giá</a> </li>
                            </ul>
                            <div id="productTabContent" class="tab-content">
                            <div class="tab-pane fade in active" id="product_tabs_description">
                                <div class="std">
                                    <p>{!! $ProductDetail->description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews_tabs">
                                <div class="review-form-wrapper mt-2">
                                    <h3>Đánh giá</h3>
                                    <div class="product-page-comments">
                                        <ul>
                                            @foreach($product_review as $review)
                                            <li>
                                                <div class="product-comments">
                                                    <div class="product-comments-content">
                                                        <p><strong></strong>{{ isset($review->user->name) ? $review->user->name : '[N/A]' }}
                                                            <span>{{ $review->created_at }}</span>
                                                            <span class="pro-comments-rating">
                                                                @if($review->rating == 1)
                                                                <i class="fa fa-star"></i>
                                                                @elseif($review->rating == 2)
                                                                <i class="fa fa-star"></i>								
                                                                <i class="fa fa-star"></i>
                                                                @elseif($review->rating == 3)								
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>								
                                                                <i class="fa fa-star"></i>
                                                                @elseif($review->rating == 4)								
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>								
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>								
                                                                @else					
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>								
                                                                <i class="fa fa-star"></i>	
                                                                <i class="fa fa-star"></i>								
                                                                <i class="fa fa-star"></i>	
                                                                @endif						
                                                            </span>
                                                        </p>
                                                        <div class="desc">
                                                            {!! $review->content !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>  
                                           @endforeach                                 
                                        </ul>
                                    </div>
                                <div class="box-collateral box-reviews" id="customer-reviews">
                                <div class="box-reviews1">
                                    <div class="form-add">
                                        <form action="{{ route('danh.gia.product',$ProductDetail->id) }}" method="POST">
                                            @csrf                                       
                                            <textarea id="product-message" cols="30" rows="15" placeholder="Nội dung đánh giá" name="content" class="form-control"></textarea>
                                            @if($errors->has('content'))
                                                <div class="text-red">{{ $errors->first('content') }}</div>
                                            @endif
                                            <div class="your-rating">
                                                <h5>Xếp hàng của bạn</h5>
                                                <div class="container1">
                                                    <div class="feedback">
                                                      <div class="rating">
                                                        <input type="radio" name="rating" id="rating-5" value="5">
                                                        <label for="rating-5"></label>
                                                        <input type="radio" name="rating" id="rating-4" value="4">
                                                        <label for="rating-4"></label>
                                                        <input type="radio" name="rating" id="rating-3" value="3">
                                                        <label for="rating-3"></label>
                                                        <input type="radio" name="rating" id="rating-2" value="2">
                                                        <label for="rating-2"></label>
                                                        <input type="radio" name="rating" id="rating-1" value="1">
                                                        <label for="rating-1"></label>
                                                        <div class="emoji-wrapper">
                                                          <div class="emoji">
                                                            <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
                                                            <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
                                                            <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                            <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                            <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
                                                            <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
                                                            <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
                                                            <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
                                                          </svg>
                                                            <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
                                                            <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
                                                            <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
                                                            <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
                                                            <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
                                                            <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
                                                            <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
                                                            <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
                                                            <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
                                                          </svg>
                                                            <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
                                                            <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
                                                            <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
                                                            <g fill="#fff">
                                                              <ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
                                                              <path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
                                                            </g>
                                                            <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
                                                            <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
                                                          </svg>
                                                            <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                      <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                      <path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
                                                      <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                      <g fill="#fff">
                                                        <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
                                                        <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
                                                      </g>
                                                      <ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                      <g fill="#fff">
                                                        <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
                                                        <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
                                                      </g>
                                                      <ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
                                                      <ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
                                                    </svg>
                                                            <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
                                                            <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
                                                            <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                            <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
                                                            <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                            <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
                                                            <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
                                                            <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
                                                            <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
                                                            <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
                                                          </svg>
                                                            <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                            <g fill="#ffd93b">
                                                              <circle cx="256" cy="256" r="256"/>
                                                              <path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
                                                            </g>
                                                            <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
                                                            <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
                                                            <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
                                                            <g fill="#38c0dc">
                                                              <path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
                                                            </g>
                                                            <g fill="#d23f77">
                                                              <path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
                                                            </g>
                                                            <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
                                                            <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
                                                            <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
                                                          </svg>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            @if($errors->has('rating'))
                                                <div class="text-red">{{ $errors->first('rating') }}</div>
                                            @endif
                                            @if(Auth::check())
                                                <button class="btn btn-danger mt-3" type="submit">Đánh giá</button>
                                            @else
                                                <a href="{{ route('login.index.list') }}" class="btn btn-danger mt-3">Đánh giá</a>
                                            @endif
                                            
                                        </form>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-slider col-lg-12 col-xs-12 animated">
                        <div class="slider-items-products">
                            <div class="slider-items-products">
                            <div class="new_title center">
                                <h2>Sản Phẩm Cùng Thể Loại</h2>
                            </div>
                            <div id="related-products-slider" class="product-flexslider hidden-buttons">
                                <div class="slider-items slider-width-col4 products-grid">
                                @foreach($ProductCategory as $pro)
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
                                                <div class="item-title"> <a title="Sample Product" href="{{ route('product.detail.list',[$pro->slug,$pro->id]) }}"> {{ $pro->name }} </a> </div>
                                                <div class="item-content">
                                                <div class="rating">
                                                    <div class="ratings">
                                                    <div class="rating-box">
                                                        <div style="width:80%" class="rating"></div>
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
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
</div>
</div>
@stop
