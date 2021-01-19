@extends('backend.pages.home')
@section('title')
    Thêm banner quảng cáo
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới banner quảng cáo</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('banner.store') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group">
                <label for="">Tên banner</label>
                <input type="text" class="form-control" placeholder="Thêm tên banner" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="text-red">{{ $errors->first('name') }}</div>
                @endif
            </fieldset>
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="avatar" class="form-control">
                @if($errors->has('avatar'))
                    <div class="text-red">{{ $errors->first('avatar') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success save" >Thêm banner</button>
            <button type="reset" class="btn btn-primary">Khôi phục</button>
        </form>
    </div>
</div>
@stop