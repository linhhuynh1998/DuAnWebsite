@if($product)
<div class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
            @foreach($product as $ProductDetail)
                <div class="product-view">
                    <div class="product-essential">
                    <form action="{{ route('add.cart.list',$ProductDetail->id) }}" method="get" id="product_addtocart_form">
                        <div class="product-img-box col-sm-4 col-xs-12 bounceInRight animated">
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
                        <div class="product-shop col-sm-5 col-xs-12 bounceInUp animated">
                            <div class="product-name">
                                <h1>{{ $ProductDetail->name }}</h1>
                            </div>
                            <div class="short-description"> 
                                <!--<h2>Quick Overview</h2>-->
                                <p>{!! $ProductDetail->content !!}</p>
                            </div>
                            <div class="ratings">
                                <div class="rating-box">
                                  <div style="width:80%" class="rating"></div>
                                </div>
                                <p class="rating-links"> &ensp; </p>
                              </div>
                                @if($ProductDetail->quantity <= 2)
                                    <p class="availability in-none pull-right">
                                        Số lượng: {{ $ProductDetail->quantity }} <span>Hết hàng</span>
                                    </p>
                                @else
                                    <p class="availability in-stock pull-right">
                                        Số lượng: {{ $ProductDetail->quantity }} <span>Còn hàng</span>
                                    </p>
                                @endif
                                
                            </p>
                            <div class="price-block">
                                <div class="price-box">
                                    @if($ProductDetail->promotion == '')
                                        <p class="special-price"> <span class="price-label">: </span> <span id="product-price-48" class="price"> {{ number_format($ProductDetail->price,0,',','.') }} <sup>đ</sup> </span> </p>
                                    @else
                                        <p class="old-price"> <span class="price-label">Giá khuyến mãi:</span> <span class="price"> {{ number_format($ProductDetail->promotion,0,',','.') }} <sup>đ</sup></span> </p>
                                        <p class="special-price"> <span class="price-label">Giá bán: </span> <span id="product-price-48" class="price"> {{ number_format($ProductDetail->price,0,',','.') }} <sup>đ</sup> </span> </p>
                                    @endif
                                </div>
                            </div>
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
                    </form>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
</div>
<script type="text/javascript" src="http://localhost:81/BaiTapLon/public/frontend/js/cloud-zoom.js"></script>
@endif