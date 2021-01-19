@extends('backend.pages.home')
@section('title')
    Cập nhật sản phẩm quản lý bán hàng
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cập nhật mới sản phẩm</h6>
    </div>
    <div class="card-body">
        <form action="" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-md-8 float-left">
                <fieldset class="form-group">
                    <label for="">Tên loại sản phẩm</label>
                    <input type="text" class="form-control" placeholder="Thêm tên sản phẩm" name="name" value="{{ old('name',$product->name) }}">
                    @if($errors->has('name'))
                        <div class="text-red">{{ $errors->first('name') }}</div>
                    @endif
                </fieldset>
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <textarea name="content" id="content" class="form-control" placeholder="Nội dung nổi bật sản phẩm" rows="5">{{ old('content',$product->content) }}</textarea>
                    @if($errors->has('content'))
                        <div class="text-red">{{ $errors->first('content') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Mô tả</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description',$product->description) }}</textarea>
                    @if($errors->has('description'))
                        <div class="text-red">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-success save" >Cập nhật sản phẩm</button>
                <button type="reset" class="btn btn-primary">Khôi phục</button>
            </div>
            <div class="col-md-4 float-right">
                <div class="form-group">
                    <label for="">Danh mục</label>
                    <select name="idcategory" id="" class="form-control">
                        <option value="">-- Chọn tên danh mục sản phẩm --</option>
                        @foreach($category as $key => $value)
                            @if($product->idcategory == $value->id)
                                <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                            @else
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('idcategory'))
                        <div class="text-red">{{ $errors->first('idcategory') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Loại sản phẩm</label>
                    <select name="idproducttype" id="" class="form-control">
                        <option value="">-- Chọn loại sản phẩm --</option>
                        @foreach($producttype as $key => $value)
                            @if($product->idproducttype == $value->id)
                                    <option value="{{ $value->id }}" selected>{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endif
                        @endforeach
                    </select>
                    @if($errors->has('idproducttype'))
                        <div class="text-red">{{ $errors->first('idproducttype') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="number" min="1" placeholder="Nhập số lượng" class="form-control" name="quantity" value="{{ old('quantity',$product->quantity) }}">
                    @if($errors->has('quantity'))
                        <div class="text-red">{{ $errors->first('quantity') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Giá</label>
                    <input type="number" min="1" placeholder="Nhập giá" class="form-control" name="price" value="{{ old('price',$product->price) }}">
                    @if($errors->has('price'))
                        <div class="text-red">{{ $errors->first('price') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Giá khuyễn mãi</label>
                    <input type="number" min="1" placeholder="Nhập giá khuyễn mãi" class="form-control" name="promotion" value="{{ old('promotion',$product->promotion) }}">
                </div>
                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" id="" class="form-control">
                        @if($product->status == 1)
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        @else
                            <option value="1">Hiển thị</option>
                            <option value="0" selected>Không hiển thị</option>
                        @endif
                    </select>   
                </div>
                <div class="form-group">
                    <label for="">Hình ảnh</label><br>
                    <img src="{{ asset('public/uploads/products/'.$product->avatar) }}" alt="" width="50%">
                    <input type="file" name="avatar" class="form-control">
                    @if($errors->has('avatar'))
                        <div class="text-red">{{ $errors->first('avatar') }}</div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@stop