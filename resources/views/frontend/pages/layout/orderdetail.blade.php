@extends('frontend.pages.home')
@section('title')
    Chi tiết đơn hàng
@stop
@section('content')
<!-- Main container1 -->
<section class="main-container col2-right-layout animated">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="my-account">
            <div class="page-title">
              <h2>Chi tiết đơn hàng</h2>
            </div>
            <div class="dashboard">
              <div class="welcome-msg"> Cảm mơn bạn <strong>{{ isset($customer[0]->name) ? $customer[0]->name : '[N/A]'}}</strong> đã mua hàng. Với mã đơn hàng <strong>#{{ isset($customer[0]->id) ? $customer[0]->id : '[N/A]'}}</strong>
              </div>
              <div class="recent-orders">
                <div class="title-buttons"><strong>Đơn hàng gần đây</strong></div>
                <div class="table-responsive">
                  <table class="data-table" id="my-orders-table">
                   
                    <thead>
                      <tr class="first last">
                        <th>Mã #</th>
                        <th>Ngày khởi tạo</th>
                        <th>Phương thức thanh toán</th>
                        <th><span class="nobr">Tổng tiền</span></th>
                        <th>Trạng thái</th>
                        <th>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $or)
                            <tr class="first odd">
                                <td>#{{ $or->id }}</td>
                                <td>{{ $or->created_at }}</td>
                                <td>Giao tiền khi nhận hàng</td>
                                <td><span class="price">{{ number_format($or->qty*$or->price,0,',','.') }} <sup>đ</sup> </span></td>
                                <td>
                                    @if($or->status == 0)
                                        <a href="javascript:void()" class="label label-danger">Đã hủy đơn hàng</a>
                                    @elseif($or->status == 1)
                                        <a href="javascript:void()" class="label label-info"> Chờ xử lý</a>
                                        <a href="{{ route('huy.don.hang',[$or->idproduct,$or->status]) }}" class="label label-danger">Hủy đơn hàng</a>
                                    @elseif($or->status == 2)
                                        <a href="javascript:void()" class="label label-warning"> Đang đóng gói</a>
                                    @elseif($or->status == 3)
                                        <a href="javascript:void()" class="label label-primary"> Đang được vận chuyển</a>
                                    @elseif($or->status == 4)
                                        <a href="javascript:void()" class="label label-success"> Giao hàng thành công</a>
                                    @endif
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>   
              <div class="box-account">
                <div class="page-title">
                  <h2>Thông tin khách hàng</h2>
                </div>
                <div class="col2-set">
                  <div class="col-1">
                    <h5>Thông tin liên hệ</h5>
                    <address>
                        {{ isset($customer[0]->name) ? $customer[0]->name : '[N/A]'}}<br>
                        {{ isset($customer[0]->email) ? $customer[0]->email : '[N/A]'}}<br>
                        {{ isset($customer[0]->address) ? $customer[0]->address : '[N/A]'}}<br>
                        {{ isset($customer[0]->phone) ? $customer[0]->phone : '[N/A]'}}<br>
                    </address>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@stop