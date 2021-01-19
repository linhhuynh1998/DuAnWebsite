@extends('frontend.pages.home')
@section('title')
    Thêm wishlist
@stop

@section('content')

<!-- Main Container -->
<section class="main-container col2-right-layout animated">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Sản phẩm yêu thích của @if(Auth::check()) {{ Auth::user()->name }} @endif</h2>
            </div>
            <div class="my-wishlist">
              <div class="table-responsive">
                <form method="post" action="#" id="wishlist-view-form">
                  <fieldset>
                    <input type="hidden" value="ROBdJO5tIbODPZHZ" name="form_key">
                    <table id="wishlist-table" class="clean-table linearize-table data-table">
                      <thead>
                        <tr class="first last">
                          <th class="customer-wishlist-item-image">Xóa</th>
                          <th class="customer-wishlist-item-image">Hình ảnh</th>
                          <th>Tên sản phẩm</th>
                          <th class="customer-wishlist-item-price">Giá bán</th>
                          <th class="customer-wishlist-item-price">Tình trạng</th>
                          <th class="customer-wishlist-item-cart">Thêm vào giỏ hàng</th>
                          <th class="customer-wishlist-item-remove"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($wishlist as $key => $value)
                            <tr>
                                <td style="line-height: 70px">
                                    <button type="button" class="btn btn-danger deletewishlist" data-id="{{ $value->id }}" data-toggle="modal" data-target="#DeleteWishlist"><i class="fa fa-times-circle"></i></button>
                                </td>
                                <td><img src="{{ asset('public/uploads/products/'.$value->avatar) }}" style="width:70px!important"></td>
                                <td style="line-height: 70px"><a href="{{ route('product.detail.list',[str_slug($value->name),$value->id]) }}">{{ $value->name }}</a></td>
                                <td style="line-height: 70px">{{ number_format($value->price,0,',','.') }} <sup>đ</sup></td>
                                <td style="line-height: 70px">@if($value->quantity <= 2) Hết hàng @else Còn hàng @endif</td>
                                <td style="line-height: 70px">
                                    <div class="add_cart">
                                        <a href="{{ route('add.cart.list',$value->idproduct) }}" class="button add-cart"><span>Thêm vào giỏ hàng</span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Modal -->
     <div id="DeleteWishlist" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
            </div>
            <div class="modal-body text-center">
                <button type="submit" class="btn btn-danger delwishlist mx-1" onclick="onLoad()">Xóa</a>
                <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
</section>

@stop