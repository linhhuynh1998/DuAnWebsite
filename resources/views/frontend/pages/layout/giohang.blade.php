@extends('frontend.pages.home')
@section('title')
    Quản lý giỏ hàng
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
                <li class=""> <a title="Go to Home Page" href="javascript:void()">Quản lý</a><span>» </span></li>
            <li class="category13"><strong>Giỏ hàng</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <section class="main-container col1-layout animated">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h2>Giỏ hàng của bạn chứa ({{ Cart::count() }}) sản phẩm</h2>
          </div>
          <div class="table-responsive">
            <form method="post" action="#">
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                      <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                      <th class="a-center " rowspan="1">Số lượng</th>
                      <th colspan="1" class="a-center">Tổng tiền</th>
                      <th class="a-center" rowspan="1">Chức năng</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="8"><a href="{{ URL::to('/') }}" class="button btn-continue"><span>Tiếp tục mua hàng</span></a>
                        @if(Auth::check())
                          <input type="hidden" value="{{ Auth::user()->id }}" class="idUser" name="idUser">
                        @endif
                        
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach(Cart::content() as $cart)
                        <tr class="first odd">
                        <td class="image"><a class="product-image" title="Sample Product" href=""><img width="75" src="{{ asset('public/uploads/products/'.$cart->options->img) }}"></a></td>
                        <td><h2 class="product-name"> <a href="">{{ $cart->name }}</a> </h2></td>
                        <td class="a-center hidden-table"><span class="cart-price"> <span class="price">{{ number_format($cart->price,0,',','.') }} <sup>đ</sup></span> </span></td>
                        <td class="a-center movewishlist">
                          <input maxlength="12" class="input-text qty form-control" title="Qty" size="4" value="{{ $cart->qty }}" name="qty" data-id="{{ $cart->rowId }}">
                        </td>
                        <td class="a-center movewishlist"><span class="cart-price"> <span class="price">{{ number_format($total = $cart->price * $cart->qty,0,',','.') }} <sup>đ</sup></span> </span></td>
                        <td class="a-center last">
                          <button type="button" class="remove-item deletecart" data-id="{{ $cart->rowId }}" data-toggle="modal" data-target="#DeleteProduct"><i class="far fa-trash-alt"></i></button>
                        </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </fieldset>
            </form>
          </div>
        <!-- Modal -->
        <div id="DeleteProduct" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
              </div>
              <div class="modal-body text-center">
                  <button type="submit" class="btn btn-danger delcart mx-1" onclick="onLoad()">Xóa</a>
                  <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

          <!-- BEGIN CART COLLATERALS -->
          <div class="cart-collaterals row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4"></div>
            <div class="totals col-sm-4">
              <h3>Tổng giỏ hàng</h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left"><strong>Tổng cộng</strong></td>
                      <td class="a-right"><strong><span class="price">{{ Cart::subtotal() }} <sup>đ</sup></span></strong></td>
                    </tr>
                  </tfoot>
                </table>
                <ul class="checkout">
                  <li>
                    @if(Auth::check())
                      <a href="{{ route('check.out') }}" class="button btn-proceed-checkout" title="Tiến hành thanh toán" style="text-decoration: none;"><span>Tiến hành thanh toán</span></a>
                    @else
                      <a href="{{ route('login.index.list') }}" class="button btn-proceed-checkout" title="Tiến hành thanh toán" style="text-decoration: none;"><span>Tiến hành thanh toán</span></a>
                    @endif
                    
                  </li>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
          <div class="crosssel animated">
            <div class="">
              <h2>Dựa trên lựa chọn của bạn, bạn có thể quan tâm đến các mục sau:</h2>
            </div>
            <div class="category-products">
              <ul class="products-grid crosssel-pro">
                  @foreach($Product as $pro)
                  <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
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
                                  <a href="{{ route('add.cart.list',$pro->id) }}" class="button btn-cart"><span>Add to Cart</span></a>
                              </div>
                              <div class="product-detail-bnt"><a href="quick_view.html" class="button detail-bnt"><span>Quick View</span></a></div>
                              <span class="add-to-links"><a href="wishlist.html" class="link-wishlist" title="Add to Wishlist"><span>Add to Wishlist</span></a> <a href="compare.html" class="link-compare add_to_compare" title="Add to Compare"><span>Add to Compare</span></a></span> </div>
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
                  </li>
                  @endforeach
                </ul>
                <span>{{ $Product->render() }}</span>
            </div>
        </div>     
    </div>
</div>
@stop