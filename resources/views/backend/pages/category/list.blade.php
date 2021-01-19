@extends('backend.pages.home')
@section('title')
    Thêm danh mục sản phẩm
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới danh mục</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('category.store') }}" role="form" method="post">
            @csrf
            <fieldset class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" placeholder="Thêm tên danh mục" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="text-red">{{ $errors->first('name') }}</div>
                @endif
            </fieldset>
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success save" >Thêm danh mục</button>
            <button type="reset" class="btn btn-primary">Khôi phục</button>
        </form>
    </div>
</div>
@stop