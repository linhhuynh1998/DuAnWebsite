@if($blogedit)
@foreach($blogedit as $blog)
<div class="card-body">
    <form action="{{ route('update.blog',$blog->id) }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        <fieldset class="form-group">
            <label for="">Tên blog</label>
            <input type="text" class="form-control" placeholder="Thêm tên blog" name="name" value="{{ old('name',$blog->name) }}">
            @if($errors->has('name'))
                <div class="text-red">{{ $errors->first('name') }}</div>
            @endif
        </fieldset>
        <div class="form-group">
            <label for="">Nội dung</label>
            <textarea name="content_blog" rows="6" class="form-control" placeholder="Nội dung blog">{{ old('content',$blog->content) }}</textarea>
            @if($errors->has('content_blog'))
                <div class="text-red">{{ $errors->first('content_blog') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="">Mô tả</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description',$blog->description) }}</textarea>
            @if($errors->has('description'))
                <div class="text-red">{{ $errors->first('description') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="">Hình ảnh :</label><br>
                <img src="{{ asset('public/uploads/blog/'.$blog->avatar) }}" alt="" width="40%">
            <input type="file" name="avatar" class="form-control">
            @if($errors->has('avatar'))
                <div class="text-red">{{ $errors->first('avatar') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="">Trạng thái</label>
            <select name="status" id="" class="form-control">
                @if($blog->status == 1)
                    <option value="1" selected>Hiển thị</option>
                    <option value="0">Không hiển thị</option>
                @else
                    <option value="1">Hiển thị</option>
                    <option value="0" selected>Không hiển thị</option>
                @endif
               
            </select>
        </div>
        
        <button type="submit" class="btn btn-success save" >Cập nhật blog</button>
        <button type="reset" class="btn btn-primary">Khôi phục</button>
    </form>
</div>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('content');
  </script>
@endforeach
@endif