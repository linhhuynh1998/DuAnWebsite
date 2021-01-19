@extends('backend.pages.home')
@section('title')
    Quản lý sản phẩm bán hàng
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý sản phẩm <a href="{{ route('product.create') }}" class="pull-right">Thêm mới</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Tên danh mục</th>
                    <th>Giá</th>
                    <th>Tồn</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Chỉnh sửa</th>   
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($product as $key => $value)
                    <tr>
                        <td style="line-height: 70px">{{ $i }}</td>
                        <td width="35%">{{ $value->name }}</td>
                        <td style="line-height: 70px">{{ $value->category->name }}</td>
                        <td style="line-height: 70px">{{ number_format($value->price,0,',','.') }}<sup>đ</sup></td>
                        <td style="line-height: 70px">{{ $value->quantity }}</td>
                        <td><img src="{{ asset('public/uploads/products/'.$value->avatar) }}" alt="" width="70px"></td>
                        <td style="line-height: 70px">
                            @if($value->status == 1)
                                <a href="javascript:void()" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="javascript:void()" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif
                        </td>
                        <td style="line-height: 70px">
                            <a href="{{ route('edit.product.list',$value->id) }}" class="btn btn-primary"><i class="far fa-edit"></i> </a>
                            <button type="button" class="btn btn-danger deleteproduct" data-id="{{ $value->id }}" data-toggle="modal" data-target="#DeleteProduct"><i class="far fa-trash-alt"></i> </button>
                        </td>
                    </tr>
                    
                <?php $i++ ?>
                @endforeach 
            </tbody>
        </table>
    </div>
</div>
<div class="pull-center">
    {{ $product->render() }}
</div>

<div class="modal fade" id="DeleteProduct">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
              <button type="submit" class="btn btn-danger delproduct mx-1" onclick="onLoad()">Xóa</a>
              <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
        </div>

      </div>
    </div>
  </div>
</div>
@stop