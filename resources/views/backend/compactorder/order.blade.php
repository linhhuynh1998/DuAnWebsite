@if($order)
<div class="check">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th>Hủy đơn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $or)
                        <tr>
                            <td>#{{ $or->id }}</td>
                            <td><a href="{{ route('product.detail.list',[$or->product->slug,$or->product->id]) }}">{{ $or->product->name }}</a></td>
                            <td><img src="{{ asset('public/uploads/products/'.$or->product->avatar) }}" alt="" width="70px"></td>
                            <td>{{ $or->qty }}</td>
                            <td>{{ number_format($or->price,0,',','.') }}<sup>đ</sup></td>
                            <td width="15%">
                                @if($or->status == 0)
                                    <a href="javascript:void()" class="btn btn-warning">Đã hủy đơn hàng</a>
                                @elseif($or->status == 1)
                                    <a href="{{ route('get.view.action.order',[$or->idproduct,$or->status]) }}" class="btn btn-danger"> Chờ xử lý</a>
                                @elseif($or->status == 2)
                                    <a href="{{ route('get.view.action.order',[$or->idproduct,$or->status]) }}" class="btn btn-info"> Đang đóng gói</a>
                                @elseif($or->status == 3)
                                    <a href="{{ route('get.view.action.order',[$or->idproduct,$or->status]) }}" class="btn btn-primary"> Đang được vận chuyển</a>
                                @elseif($or->status == 4)
                                    <a href="{{ route('get.view.action.order',[$or->idproduct,$or->status]) }}" class="btn btn-success"> Giao hàng thành công</a>
                                @endif
                            </td>
                            <td>
                                @if($or->status == 0 || $or->status == 4)
                                @else
                                 <a href="{{ route('huy.don.hang.backend',[$or->idproduct,$or->status]) }}" class="btn btn-danger">Hủy đơn hàng</a>  
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif