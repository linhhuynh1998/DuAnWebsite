@extends('backend.pages.home')
@section('title')
    Quản lý đơn hàng
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý đơn hàng</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thọai</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Chỉnh sửa</th>   
                </tr>
            </thead>
            <tbody>
                @foreach($customer as $custom)
                    <tr>
                        <td>#{{ $custom->id }}</td>
                        <td>{{ $custom->name }}</td>
                        <td>{{ $custom->phone }}</td>
                        <td>{{ $custom->address }}</td>
                        <td>{{ number_format($custom->subtotal,0,',','.') }}<sup>đ</sup></td>
                        <td>
                            <a href="{{ route('get.view.list.id',$custom->id) }}" data-id="{{ $custom->id }}" class="btn btn-success viewdonhang" data-toggle="modal" data-target="#myModal"> Chi tiết</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- The Modal -->
<div class="check">
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết đơn hàng <b>#<span class="iddonhang"></span></b></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body" id="contentview">
                <form role="form">
                    <div class="form-group">
                        <label for="">Tên loại sản phẩm</label>
                        <input type="text" name="name" class="form-control name" placeholder="Nhập tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <select name="idcategory" id="" class="form-control idcategory"></select>
                    </div>
                    <div class="form-group">
                    <label for="">Trạng thái</label>
                        <select name="statuss" id="" class="form-control statuss">
                        <option value="1" class="hienthi">Hiển thị</option>
                        <option value="0" class="khonghienthi">Không hiển thị</option>
                    </select>
                    </div>  
                </form>
                <button type="submit" class="btn btn-success updateproducttype" onclick="onLoad()">Cập nhật danh mục</button>
                <button type="reset" class="btn btn-primary">Reset danh mục</button> 
                
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
@stop