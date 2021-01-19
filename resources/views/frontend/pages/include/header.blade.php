<script>
  <!--
  document.write(unescape("%3Cstyle%3E%0A%20%20.rounded-0%7B%0A%20%20%20%20border-radius%3A%200%21important%3B%0A%20%20%7D%0A%20%20.mt-2%7B%0A%20%20%20%20padding-top%3A%201%25%0A%20%20%7D%0A%20%20.list-group%7B%0A%20%20%20%20position%3A%20absolute%3B%0A%20%20%20%20z-index%3A%2099999%3B%0A%20%20%20%20width%3A100%25%3B%0A%20%20%7D%0A%20%20button.btn.btn-default%20%7B%0A%20%20%20%20margin-top%3A%206px%3B%0A%20%20%20%20width%3A%2043px%3B%0A%20%20%20%20height%3A%2034px%3B%0A%20%20%7D%0A%20%20.feedback%20.rating%7B%0A%20%20%20%20height%3A%20150px%21important%3B%0A%20%20%7D%0A%20%20.pagination%3E.active%3Ea%2C%20.pagination%3E.active%3Espan%2C%20.pagination%3E.active%3Ea%3Ahover%2C%20.pagination%3E.active%3Espan%3Ahover%2C%20.pagination%3E.active%3Ea%3Afocus%2C%20.pagination%3E.active%3Espan%3Afocus%20%7B%0A%20%20%20%20z-index%3A%202%3B%0A%20%20%20%20color%3A%20%23fff%3B%0A%20%20%20%20cursor%3A%20default%3B%0A%20%20%20%20background-color%3A%20%232ecc71%3B%0A%20%20%20%20border-color%3A%20%232ecc71%3B%0A%20%20%20%20width%3A%2035px%3B%0A%20%20%20%20height%3A%2035px%3B%0A%20%20%20%20line-height%3A%2035px%3B%0A%20%20%20%20text-align%3A%20center%3B%0A%20%20%7D%0A%20%20.pagination%20li%20a%2C.pagination%3Eli%3Afirst-child%3Ea%2C%20.pagination%3Eli%3Afirst-child%3Espan%20%7Bwidth%3A%2035px%3Bheight%3A%2035px%3Bline-height%3A%2035px%3Btext-align%3A%20center%3B%7D%0A%3C/style%3E"));
  //-->
  </script>
<header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm- col-xs-6 col-lg-3 hidden-xs"> 
              
              <!-- Default Welcome Message -->
              <div class="welcome-msg">Email: linhhuynh.iuh@gmail.com</div>
              <!-- End Default Welcome Message --> 
            </div>
            <div class="col-sm-7 col-xs-6 col-lg-6">
              <div class="toplinks">
                <div class="links">
                  <div class="myaccount"><a title="Tài khoản của bạn" href="{{ route('login.index.list') }}"><span class="hidden-xs">Tài khoản của bạn</span></a></div>
                  <div class="wishlist"><a title="Sản phẩm yêu thích" href="{{ route('list.wishlist') }}"><span class="hidden-xs">Wishlist</span></a></div>
                  <div class="check"><a title="Thanh toán" href="{{ route('list.cart') }}"><span class="hidden-xs">Thanh toán</span></a></div>
                    @if(Auth::check())
                      <div class="login">
                        <a href="{{ route('logout.index.list',Auth::user()->id) }}">
                          <span class="hidden-xs"><i class="fas fa-sign-out-alt"></i> Thoát</span>
                        </a>
                      </div>
                    @else
                      <div class="login"><a href="{{ route('login.index.list') }}"><span class="hidden-xs">Đăng nhập</span></a></div>
                    @endif
                </div>
                <!-- links --> 
              </div>
            </div>
            
            <!-- Search-col -->
            <div class="col-sm-3 col-xs-6 col-lg-2">
              <div class="search-box pull-right">
                <form action="{{ route('search.list') }}" method="POST">
                  @csrf
                  <input type="text" placeholder="Tìm kiếm sản phẩm.." maxlength="70" name="search" id="search" value="{{ old('search') }}">
                  <button type="submit" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
                </form>
                <div id="list-group-show"></div>
              </div>
              <!-- End Search-col --> 
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function(){
          $("#search").keyup(function(){
            let keyword = $(this).val();
            if(keyword != ''){
              $.ajax({
                type : 'get',
                url : '{{ route("auto.complete") }}',
                data : { keyword : keyword },
                success:function(data){
                  $("#list-group-show").fadeIn();
                  $("#list-group-show").html(data);
                }
              });
            }else{
              $("#list-group-show").html('');
            }
          });
        });
      </script>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-lg-2 col-sm-3 col-xs-12 col-md-2"> 
              <!-- Header Logo -->
              <div class="logo"><a title="Magento Commerce" href="{{ URL::to('/') }}"><img alt="Magento Commerce" src="{{ asset('public/frontend/images/logo.png') }}"></a></div>
              <!-- End Header Logo --> 
            </div>
            <!-- Navbar -->
            
            <div class="nav-inner">
              <ul id="nav" class="hidden-xs">
                <li class="level0 parent drop-menu active"><a href="{{ URL::to('/') }}"><span>Trang chủ</span></a>
                </li>
                @foreach($category as $cate)
                <li class="level0 parent drop-menu"><a href="{{ route('category.list',$cate->id) }}"><span>{{ $cate->name }}</span></a>
                    <ul class="level1">
                        @if(count($cate->producttype) > 0)
                        @foreach($cate->producttype as $protype)
                            @if($protype->status ==1)
                            <li class="level1 first"><a href="{{ route('category.slug',[$protype->slug,$protype->id]) }}"><span>{{ $protype->name }}</span></a></li>
                            @endif
                        @endforeach
                        @endif
                    </ul>
                </li>
                @endforeach
              </ul>
              <div class="menu_top">
                <div class="top-cart-contain pull-right"> 
                  <!-- Top Cart -->
                  <div class="mini-cart">
                    <div data-hover="dropdown" class="basket dropdown-toggle">
                      @if(Auth::check())
                        <a href="javascript:void()">({{ Cart::count() }})</a>
                      @else
                      <a href="{{ route('login.index.list') }}">({{ Cart::count() }})</a>
                      @endif
                      
                    </div>
                    <div>
                      <div class="top-cart-content" style="display: none;">
                        <div class="block-subtitle">
                          <div class="top-subtotal">{{ Cart::count() }} <sup>sp</sup> <span class="price">{{ Cart::subtotal() }} <sup>đ</sup></span> </div>
                          <!--top-subtotal-->
                          <div class="pull-right">
                            <a href="{{ route('list.cart') }}" title="View Cart" class="view-cart"><span>Giỏ Hàng</span></a>
                          </div>
                          <!--pull-right--> 
                        </div>
                        <!--block-subtitle-->
                        <ul class="mini-products-list" id="cart-sidebar">
                          @foreach(Cart::content() as $view)
                          <li class="item first">
                            <div class="item-inner"><a href="{{ route('product.detail.list',[str_slug($view->name),$view->id]) }}" class="product-image" title="Sample Product"><img alt="Sample Product" src="{{ asset('public/uploads/products/'.$view->options->img) }}"></a>
                              <div class="product-details">
                                <!--access--> <strong>{{ $view->qty }}</strong> x <span class="price">{{ number_format($view->price,0,',','.') }} <sup>đ</sup></span>
                                <p class="product-name"><a href="{{ route('product.detail.list',[str_slug($view->name),$view->id]) }}">{{ $view->name }}</a></p>
                              </div>
                            </div>
                          </li>
                          @endforeach()
                        </ul>
                        <div class="actions">
                          @if(Auth::check())
                            <a href="{{ route('check.out') }}" class="btn-checkout" title="Thanh toán"><span>Thanh toán</span></a>
                          @else
                          <a href="{{ route('login.index.list') }}" class="btn-checkout" title="Thanh toán"><span>Thanh toán</span></a>
                          @endif
                        </div>
                        <!--actions--> 
                      </div>                     
                    </div>                   
                  </div>                 
                  <!-- Top Cart -->
                </div>
                <div id="DeleteProduct" class="modal fade" role="dialog">
                  <div class="modal-dialog">
        
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">Bạn chắc chắn muốn xóa chứ</h5>
                      </div>
                      <div class="modal-body text-center">
                          <button type="submit" class="btn btn-danger delcart mx-1" onclick="onLoad()">Xóa</a>
                          <button type="reset" class="btn btn-primary" data-dismiss="modal">Không</button>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Header Language -->
                <div class="lang-curr">
                  <div class="form-login">
                    @if(Auth::check())
                    <div class="dropdown block-company-wrapper hidden-xs"><a role="button" data-toggle="dropdown" class="block-company dropdown-toggle" href="#">Xin chào : {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                          <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="{{ route('manager.order.detail') }}"><i class="fas fa-atom"></i> Theo dõi đơn hàng</a>
                          </li>
                          <li role="presentation">
                            <a role="menuitem" tabindex="-1" href="{{ route('logout.index.list',Auth::user()->id) }}"><i class="fas fa-sign-out-alt"></i> Thoát</a>
                          </li>
                        </ul>
                    </div>
                    @else
                    <div class="dropdown block-company-wrapper hidden-xs">
                      <a role="button" data-toggle="dropdown" class="block-company dropdown-toggle" href="#">Tài khoản của tôi<span class="caret"></span></a>
                      
                      <ul class="dropdown-menu" role="menu">
                        <li role="presentation"><a href="{{ route('login.index.list') }}"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a></li>
                        <li role="presentation"><a href="{{ route('login.index.list') }}"><i class="far fa-check-circle"></i> Đăng ký</a></li>
                      </ul>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            
            <!-- end nav --> 
            
          </div>
        </div>
      </div>
    </div>
  </header>