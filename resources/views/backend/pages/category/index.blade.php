@extends('backend.pages.home')
@section('title')
    Quản lý danh mục bán hàng
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý danh mục <a href="{{ route('category.create') }}" class="pull-right">Thêm mới</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th>Ngày khởi tạo</th>
                    <th>Chỉnh sửa</th>   
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($category as $key => $value)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td>
                            @if($value->status == 1)
                                <a href="javascript:void()" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="javascript:void()" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-success editcategory" data-id="{{ $value->id }}" data-toggle="modal" data-target="#UpdateCategory"><i class="far fa-edit"></i> Cập nhật</button>
                            <button type="button" class="btn btn-danger deletecategory" data-id="{{ $value->id }}" data-toggle="modal" data-target="#DeleteCategory"><i class="far fa-trash-alt"></i> Xóa</button>
                        </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="pull-center">
    {{ $category->render() }}
</div>
<!-- The Modal -->
<div class="modal fade" id="UpdateCategory">
    <div class="modal-dialog">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Chỉnh sửa</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            <form role="form">
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" name="name" class="form-control name" placeholder="Nhập tên danh mục">
                </div>
                <div class="form-group">
                <label for="">Trạng thái</label>
                    <select name="statuss" id="" class="form-control statuss">
                    <option value="1" class="hienthi">Hiển thị</option>
                    <option value="0" class="khonghienthi">Không hiển thị</option>
                </select>
                </div>  
            </form>
            <button type="submit" class="btn btn-success updatecategory" onclick="onLoad()">Cập nhật danh mục</button>
            <button type="reset" class="btn btn-primary">Reset danh mục</button> 
            
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="DeleteCategory">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
              <button type="submit" class="btn btn-danger delcategory mx-1" onclick="onLoad()">Xóa</a>
              <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
        </div>

      </div>
    </div>
  </div>
</div>
@stop