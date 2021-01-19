@extends('frontend.pages.home')
@section('title')
    Danh mục sản phẩm
@stop

@section('content')
@include('frontend/pages/include/slider')
<!-- Breadcrumbs -->
<div class="breadcrumbs animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{ URL::to('/') }}">Trang chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="javascript:void()">Danh mục</a><span>» </span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <div class="main-container col2-left-layout animated">
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
              @include('frontend/pages/include/toolbar')
            </div>
            
            <div class="category-products">
              <ul class="products-grid">
                @foreach($Product as $productdetail)             
                <li class="item col-lg-4 col-md-3 col-sm-4 col-xs-6">
                  <div class="item-inner">
                    <div class="item-img">
                      <div class="item-img-info"> <a href="{{ route('product.detail.list',[$productdetail->slug,$productdetail->id]) }}" title="Sample Product" class="product-image"> <img src="{{ asset('public/uploads/products/'.$productdetail->avatar) }}" height="230px" alt="{{ $productdetail->name }}"> </a>
                        @if($productdetail->promotion == '')
                          <div class="new-label new-top-left">New</div>
                        @else
                          <div class="sale-label sale-top-left">Sale</div>
                        @endif
                       
                        <div class="item-box-hover">
                          <div class="box-inner"> <div class="actions">
                            <div class="add_cart">
                              <a href="{{ route('add.cart.list',$productdetail->id) }}" class="button btn-cart"><span>Thêm sản phẩm vào giỏ hàng</span></a>
                            </div>
                           <span class="add-to-links"> <a href="{{ route('add.wishlist',$productdetail->id) }}" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a href="{{ route('product.detail.list',[$productdetail->slug,$productdetail->id]) }}" title="Sample Product">{{ $productdetail->name }}</a> </div>
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
                              @if($productdetail->promotion == '')
                                <span class="regular-price"> <span class="price">{{ number_format($productdetail->price) }} <sup>đ</sup></span> </span> 
                              @else
                                <span class="regular-price"> <span class="price">{{ number_format($productdetail->price) }} <sup>đ</sup></span> </span> 
                                  <div style="float: right" class="regular-price"><span class="price" style="color:red"><del>{{ number_format($productdetail->promotion) }}<sup>đ</sup></del></span></div>                       
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
          <span>{{ $Product->render() }}</span>
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
            <div class="block block-layered-nav">
              <div class="block-title">Mua sắm</div>
              <div class="block-content">
                <p class="block-subtitle">Tùy chọn mua sắm</p>
                <dl id="narrow-by-list">
                  <dt class="odd">Lọc theo giá</dt>
                  <dd class="odd">
                    <ol>
                      <li> <a href="?price=1"><span class="price">Dưới 5 trăm</span></li>
                        <li> <a href="?price=2"><span class="price">Từ 5 triệu</span> - <span class="price">1 triệu rưỡi</span></a></li>
                        <li> <a href="?price=3"><span class="price">Từ 1 triệu rưỡi</span> - <span class="price">3 triệu</span></a></li>
                        <li> <a href="?price=4"><span class="price">Từ 3 triệu</span> - <span class="price">5 triệu</span></a></li>
                        <li> <a href="?price=5"><span class="price">Trên 5 triệu</span></a></li>
                    </ol>
                  </dd>
              </div>
            </div>
            <div class="block block-layered-nav">
              <div class="block-title"> Duyệt theo </div>
              <div class="block-content">
                <dl id="narrow-by-list2">
                  <dt class="last odd">Thể loại sản phẩm</dt>
                  <dd class="last odd">
                    <ol>
                      @foreach($producttype as $protype)
                      <li> <a href="{{ route('category.slug',[$protype->slug,$protype->id]) }}">{{ $protype->name }}</a> ({{ $protype->product->count() }}) </li>
                      @endforeach
                    </ol>
                  </dd>
                </dl>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
  </div>
             <!-- Special Slider -->
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

@stop
