
<section class="latest-blog container">
    <div class="slider-items-products">
      <div class="new_title center">
        <h2>Blog mới nhất</h2>
      </div>
      <div id="latest-blog-slider" class="product-flexslider hidden-buttons">
        <div class="slider-items slider-width-col4 products-grid">
          @foreach($blog as $key => $value)
          <div class="item">
            <div class="blog_inner">
              <div class="blog-img"> <img src="{{ asset('public/uploads/blog/'.$value->avatar)}}" alt="Blog image">
                <div class="mask"> <a class="info" href="{{ route('blog.index.list',[$value->slug,$value->id]) }}">Đọc thêm</a> </div>
              </div>
              <h3><a href="{{ route('blog.index.list',[$value->slug,$value->id]) }}">{{ $value->name }}</a> </h3>
              <div class="post-date"><i class="icon-calendar"></i> {{ $value->created_at }}</div>
              <p>{{ $value->content }}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>