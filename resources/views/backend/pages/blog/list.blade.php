@extends('backend.pages.home')
@section('title')
    Thêm blog
@stop

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thêm mới blog</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('blog.store') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset class="form-group">
                <label for="">Tên blog</label>
                <input type="text" class="form-control" placeholder="Thêm tên blog" name="name" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="text-red">{{ $errors->first('name') }}</div>
                @endif
            </fieldset>
            <div class="form-group">
                <label for="">Nội dung</label>
                <textarea name="content_blog" rows="6" class="form-control" placeholder="Nội dung blog">{{ old('content') }}</textarea>
                @if($errors->has('content_blog'))
                    <div class="text-red">{{ $errors->first('content_blog') }}</div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="text-red">{{ $errors->first('description') }}</div>
                @endif
            </div>
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
            
            <button type="submit" class="btn btn-success save" >Thêm blog</button>
            <button type="reset" class="btn btn-primary">Khôi phục</button>
        </form>
    </div>
</div>
@stop