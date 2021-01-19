<!DOCTYPE html>
<html lang="en">

<!-- Tieu Long Lanh Kute -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

<!-- Favicons Icon -->
<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<title>@yield('title')</title>

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS Style -->
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/font-awesome.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/animate.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/revslider.css')}}" >
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/owl.theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/flexslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/jquery.mobile-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/jquery.bxslider.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/scss.scss')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/backend/css/toastr.min.css')}}" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/blogmate.css')}}">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
      sandbox: 'AWrMAgHyYOx7rLvEWpnEvpZXoJrJMrNQA5ljKioVo79McVRitnuHA-N3Y4oUGmm7OksjO9g5Pvt9Y4Jn',
      production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'gold',
      shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '100',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Cảm ơn bạn đã mua hàng của chúng tôi!');
      });
    }
  }, '#paypal-button');

</script>

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700,900' rel='stylesheet' type='text/css'>
</head>

<body class="cms-index-index cms-home-page">


<div id="page"> 
  <!-- Header -->
  @include('frontend/pages/include/header')
  <!-- end header -->
  <div class="mm-toggle-wrap">
    <div class="mm-toggle"><i class="icon-align-justify"></i><span class="mm-label">Menu</span> </div>
  </div>
  <!-- banner section -->
<!-- End banner section --> 

@yield('content')
@yield('script')
<!--Offer Start-->

<!--Offer silder End--> 

<!-- Latest Blog -->

<!-- End Latest Blog --> 

<!-- offer banner section -->

<div class="offer-banner-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div class="col"><img src="https://media.ohay.tv/v1/content/2015/07/7-ohay-tv-55762.jpg" alt="offer banner1" width="100%" height="145px"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div class="col"><img src="https://media.ohay.tv/v1/content/2015/07/10-ohay-tv-53897.jpg" alt="offer banner2" width="100%" height="145px"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div class="col"><img src="https://www.elle.vn/wp-content/uploads/2019/08/02/nuoc-hoa-miss-dior-cau-chuyen-tinh-yeu-2.jpg" alt="offer banner3" width="100%" height="145px"></div>
      </div>
      <div class="col-lg-3 col-sm-3 col-xs-6">
        <div class="col last"><img src="https://perfumeprofessor.files.wordpress.com/2019/03/d_201308_wn_modern_muse_081913.png?w=640" alt="offer banner4" width="100%" height="145px"></div>
      </div>
    </div>
  </div>
</div>
<!-- end banner section -->
<!-- Footer -->
@include('frontend/pages/include/footer')
</div>
<div id="mobile-menu">
  <div class="mm-search">
    <form action="{{ route('search.list') }}" method="POST">
      @csrf
      <div class="input-group">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
        </div>
        <input type="text" class="form-control simple" placeholder="Tìm kiếm sản phẩm.." maxlength="70" name="search" id="search_simple" value="{{ old('search') }}">
      </div>
    </form>
    <div id="list-group-simple"></div>
  </div>
  
  <script>
    $(document).ready(function(){
      $("#search_simple").keyup(function(){
        let keyword = $(this).val();
        if(keyword != ''){
          $.ajax({
            type : 'get',
            url : '{{ route("auto.autosimple") }}',
            data : { keyword : keyword },
            success:function(data){
              $("#list-group-simple").fadeIn();
              $("#list-group-simple").html(data);
            }
          });
        }else{
          $("#list-group-simple").html('');
        }
      });
    });
  </script>
  <ul>
    <li>
      <div class="home"><a href="{{ URL::to('/') }}"><i class="icon-home"></i>Trang Chủ</a> </div>
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
      <li>
        <a href="https://www.facebook.com/LinhHuynh.IUH">
          <img src="{{ asset('public/uploads/login/unnamed.png') }}" width="100%">
        </a>
      </li>
  </ul>
</div>

<!-- End Footer --> 
<!-- JavaScript --> 
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.min.js')}}"></script> 
<script>
  function onLoad(){
    window.setTimeout('location.reload',100);
  }
</script>
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/parallax.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/revslider.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/common.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/cloud-zoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.flexslider.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.mobile-menu.min.js')}}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.bxslider.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/backend/js/toastr.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/frontend/js/js.js') }}"></script> 
<script type="text/javascript" src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script> 
<script>
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif
  @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
  @endif
</script>
<script type='text/javascript'>
jQuery(document).ready(function(){
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 1920,
startheight: 650,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});

</script>

</body>

<!-- Tieu Long Lanh Kute -->
</html>
