@extends('backend.pages.home')
@section('title')
    Quản lý banner quảng cáo
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý banner quảng cáo <a href="{{ route('banner.create') }}" class="pull-right">Thêm mới</a></h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên title</th>
                    <th>Slug</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Chỉnh sửa</th>   
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($banner as $key => $value)
                    <tr>    
                        <td>{{ $i }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->slug }}</td>
                        <td><img src="{{ asset('public/uploads/banner/'.$value->avatar) }}" alt="" width="70%"></td>
                        <td style="line-height: 90px">
                            @if($value->status == 1)
                                <a href="javascript:void()" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="javascript:void()" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif    
                        </td>
                        <td width="15%" style="line-height: 90px">
                            <a href="{{ route('edit.banner',$value->id) }}" class="btn btn-success editbanner" data-id="{{ $value->id }}" data-toggle="modal" data-target="#UpdateBanner"><i class="far fa-edit"></i> Cập nhật</button>
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
    <div class="modal fade" id="UpdateBanner">
        <div class="modal-dialog">
            <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Chỉnh sửa</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body" id="updatebannercheck">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</div>
@stop
