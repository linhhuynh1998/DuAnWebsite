@extends('frontend.pages.home')
@section('title')
    Danh mục sản phẩm
@stop

@section('content')
@include('frontend/pages/include/slider')
<!-- Breadcrumbs -->
<div class="breadcrumbs bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{ URL::to('/') }}">Trang chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="javascript:void()">Tìm kiếm</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="javascript:void()">{{ $keyword }}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col2-left-layout bounceInUp animated">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-sm-push-3">
          <article class="col-main">
            <div class="page-header">
              <h2></h2>
            </div>
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                    
                    <!-- Item -->
                    <div class="item"> <a href="#x"><img alt="" src="{{ asset('public/frontend/images/women_banner.png')}}"></a>
                      <div class="cat-img-title cat-bg cat-box">
                        <h2 class="cat-heading"><strong>New Fashion 2015</strong><br></h2>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus diam arcu.</p>
                      </div>
                    </div>
                    <!-- End Item --> 
                    
                    <!-- Item -->
                    <div class="item"> <a href="#x"><img alt="" src="{{ asset('public/frontend/images/women_banner1.png')}}"></a>
                      
                    </div>
                    
                    <!-- End Item --> 
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="breadcrumbs bounceInUp animated">
                <div class="container">
                  <div class="row">
                    <div class="col-xs-12">
                        <h5>Từ khóa tìm kiếm : {{ $keyword }}</h5>
                    </div>
                  </div>
                </div>
            </div>
            <div class="category-products mt-3">
              <ul class="products-grid">
                @foreach($Product as $productsearch)             
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="{{ route('product.detail.list',[$productsearch->slug,$productsearch->id]) }}" title="Sample Product" class="product-image"> <img src="{{ asset('public/uploads/products/'.$productsearch->avatar) }}" height="230px" alt="{{ $productsearch->name }}"> </a>
                        @if($productsearch->promotion == '')
                          <div class="new-label new-top-left">New</div>
                        @else
                          <div class="sale-label sale-top-left">Sale</div>
                        @endif
                       
                        <div class="item-box-hover">
                          <div class="box-inner"> <div class="actions">
                            <div class="add_cart">
                              <a href="{{ route('add.cart.list',$productsearch->id) }}" class="button btn-cart"><span>Thêm sản phẩm vào giỏ hàng</span></a>
                            </div>
                            <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                           <span class="add-to-links"> <a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a href="{{ route('product.detail.list',[$productsearch->slug,$productsearch->id]) }}" title="Sample Product">{{ $productsearch->name }}</a> </div>
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
                              @if($productsearch->promotion == '')
                                <span class="regular-price"> <span class="price">{{ number_format($productsearch->price) }} <sup>đ</sup></span> </span> 
                              @else
                                <span class="regular-price"> <span class="price">{{ number_format($productsearch->price) }} <sup>đ</sup></span> </span> 
                                  <div style="float: right" class="regular-price"><span class="price" style="color:red"><del>{{ number_format($productsearch->promotion) }}<sup>đ</sup></del></span></div>                       
                              </div>
                              @endif
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </article>
          <!--	///*///======    End article  ========= //*/// --> 
        </div>
        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="col-left sidebar">
          <div class="side-nav-categories">
              <div class="block-title"> Danh mục sản phẩm </div>
              <!--block-title--> 
              <!-- BEGIN BOX-CATEGORY -->
              <div class="box-content box-category">
                <ul>
                  @foreach($category as $cate)
                    <li> <a class="active" href="javascrip:void()">{{ $cate->name }}</a> <span class="subDropdown plus"></span>
                      <ul class="level0_415" style="display:none">
                        @if(count($cate->producttype) > 0)
                          @foreach($cate->producttype as $ProType)
                            <li> <a href="{{ route('category.slug',[$ProType->slug,$ProType->id]) }}"> {{ $ProType->name }} </a></li>
                          @endforeach
                        @endif
                      </ul>
                    </li>
                    @endforeach
                </ul>
              </div>
              <!--box-content box-category--> 
            </div>
           <!-- Special Slider -->
            <section class="special-pro">
                <div class="slider-items-products">
                    <div class="block-title">
                        <h2>Sản phẩm đặt biệt</h2>
                    </div>
                    <div id="special-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4 products-grid">
                            <!-- Item -->
                            @foreach($ProductRandom as $Pro)
                                <div class="item">
                                    <div class="item-inner">
                                        <div class="item-img">
                                            <div class="item-img-info"> 
                                                <a class="product-image" title="Sample Product" href="{{ route('product.detail.list',[$Pro->slug,$Pro->id]) }}"> 
                                                    <img alt="Sample Product" src="{{ asset('public/uploads/products/'.$Pro->avatar) }}">
                                                </a>
                                                <div class="item-box-hover">
                                                    <div class="box-inner">
                                                        <div class="actions">
                                                            <div class="add_cart">
                                                                <a href="{{ route('add.cart.list.create',$Pro->id) }}" class="button btn-cart"><span>Thêm sản phẩm vào giỏ hàng</span></a>
                                                            </div>
                                                            <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div> <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a>
                                                            <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a title="Sample Product" href="{{ route('product.detail.list',[$Pro->slug,$Pro->id]) }}"> {{ $Pro->name }} </a> </div>
                                                <div class="item-content">
                                                    <div class="rating">
                                                        <div class="ratings">
                                                            <div class="rating-box">
                                                                <div style="width:95%" class="rating"></div>
                                                            </div>
                                                            <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                                        </div>
                                                    </div>
                                                    <div class="item-price">
                                                        <div class="price-box">
                                                            @if($Pro->promotion == '')
                                                                <p class="special-price"><span class="price">  {{ number_format($Pro->price) }} <sup>đ</sup> </span> </p>
                                                            @else
                                                                <p class="old-price"> <span class="price"> {{ number_format($Pro->promotion) }} <sup>đ</sup></span> </p>
                                                                <p class="special-price"><span class="price">  {{ number_format($Pro->price) }} <sup>đ</sup> </span> </p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Item -->
                            </aside>
                        </div>
                    </div>
                </div>
            </section>
@stop