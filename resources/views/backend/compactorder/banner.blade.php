@if($banner)
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
                                <a href="{{ route('update.banner',[$value->id,$value->status]) }}" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="{{ route('update.banner',[$value->id,$value->status]) }}" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif    
                        </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif