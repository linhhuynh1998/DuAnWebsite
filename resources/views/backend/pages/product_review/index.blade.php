@extends('backend.pages.home')
@section('title')
    Quản lý đánh giá khách hàng
@stop

@section('content')
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Quản lý đánh giá</h6>
</div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Tên khách hàng</th>
                    <th>Nội dung</th>
                    <th>Xếp hạng</th>
                    <th>Trạng thái</th> 
                </tr>
            </thead>
            <tbody>
                <?php $i = 1 ?>
                @foreach($product_review as $review)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ isset($review->product->name) ? $review->product->name : '[N/A]'}}</td>
                        <td>{{ isset($review->user->name) ? $review->user->name : '[N/A]'}}</td>
                        <td>{!! $review->content !!}</td>
                        <td>
                            @if($review->rating == 1)
                            <i class="fa fa-star"></i>
                            @elseif($review->rating == 2)
                            <i class="fa fa-star"></i>								
                            <i class="fa fa-star"></i>
                            @elseif($review->rating == 3)								
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>								
                            <i class="fa fa-star"></i>
                            @elseif($review->rating == 4)								
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>								
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>								
                            @else					
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>								
                            <i class="fa fa-star"></i>	
                            <i class="fa fa-star"></i>								
                            <i class="fa fa-star"></i>	
                            @endif		
                        </td>
                        <td>
                            @if($review->status == 1)
                                <a href="{{ route('show.product.reviews.active',$review->id) }}" class="badge badge-primary"><i class="far fa-eye"></i> Hiển thị</a>
                            @else
                                <a href="{{ route('hidden.product.reviews.active',$review->id) }}" class="badge badge-secondary"><i class="far fa-eye-slash"></i> Ẩn</a>
                            @endif
                        </td>
                    </tr>
                <?php $i++ ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop