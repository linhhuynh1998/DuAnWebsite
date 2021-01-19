@extends('backend.pages.home')
@section('title')
    Quản lý blog
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý blog <a href="{{ route('blog.create') }}" class="pull-right">Thêm mới</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Trạng thái</th>
                    <th>Ngày khởi tạo</th>
                    <th>Chỉnh sửa</th>   
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($blog as $key => $value)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>
                            @if($value->status == 1)
                                <a href="javascript:void()" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="javascript:void()" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif
                        </td>
                        <td>{{ $value->created_at }}</td>
                        <td width="25%">
                            <button type="button" class="btn btn-success editblog" data-id="{{ $value->id }}" data-toggle="modal" data-target="#UpdateBlog"><i class="far fa-edit"></i> Cập nhật</button>
                            <button type="button" class="btn btn-danger deleteblog" data-id="{{ $value->id }}" data-toggle="modal" data-target="#DeleteBlog"><i class="far fa-trash-alt"></i> Xóa</button>
                        </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- The Modal -->
<div class="check">
    <div class="modal fade" id="UpdateBlog">
        <div class="modal-dialog">
            <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body" id="updateblogcheck">
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
<div class="modal fade" id="DeleteBlog">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body text-center">
              <button type="submit" class="btn btn-danger delblog mx-1" onclick="onLoad()">Xóa</a>
              <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
        </div>

      </div>
    </div>
  </div>
</div>
@stop