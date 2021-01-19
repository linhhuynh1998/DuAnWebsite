@extends('backend.pages.home')
@section('title')
    Thêm loại sản phẩm
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới loại sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('producttype.store') }}" role="form" method="post">
            @csrf
            <fieldset class="form-group">
                <label for="">Tên loại sản phẩm</label>
                <input type="text" class="form-control" placeholder="Thêm tên loại sản phẩm" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="text-red">{{ $errors->first('name') }}</div>
                @endif
            </fieldset>
            <div class="form-group">
                <label for="">Tên danh mục</label>  
                <select name="idcategory" id="" class="form-control">
                    <option value="">-- Chọn danh mục sản phẩm --</option>   
                    @foreach($category as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>  
                @if($errors->has('idcategory'))
                    <div class="text-red">{{ $errors->first('idcategory') }}</div>
                @endif
            </div> 
            <div class="form-group">
                <label for="">Trạng thái</label>
                <select name="status" id="" class="form-control">
                    <option value="1">Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success save">Thêm loại sản phẩm</button>
            <button type="reset" class="btn btn-primary">Khôi phục</button>
        </form>
    </div>
</div>
@stop