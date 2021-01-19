
<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('public/backend/css/style-starter.css')}}">

  <link rel="stylesheet" href="{{ asset('public/backend/css/toastr.min.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">

  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

<body class="noscroll">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="{{ URL::to('/dashboard') }}">LinhHuynh</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
      <a href="{{ URL::to('/dashboard') }}" title="logo"><img src="{{ asset('public/backend/images/logo.png')}}" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li class="active"><a href="{{ URL::to('/dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i><span> Trang chủ</span></a></li>
        <li class="menu-list 
        {{ \Request::route()->getName() == 'category.index' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'category.create' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'producttype.index' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'product.index' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'producttype.create' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'product.create' ? 'nav-hover nav-active' : '' }}
        
        ">
          <a href="javascript:void()"><i class="fa fa-cogs"></i>
            <span>Quản lý sản phẩm <i class="lnr lnr-chevron-right"></i></span></a>
            <ul class="sub-menu-list">
              <li class="
              {{ \Request::route()->getName() == 'category.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'category.create' ? 'active1' : '' }}
              " style=""><a href="{{ route('category.index') }}">Quản lý danh mục sản phẩm</a> </li>
              <li class="
              {{ \Request::route()->getName() == 'producttype.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'producttype.create' ? 'active1' : '' }}
              "><a href="{{ route('producttype.index') }}">Quản lý loại sản phẩm</a> </li>
              <li i class="
              {{ \Request::route()->getName() == 'product.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'product.create' ? 'active1' : '' }}
              "><a href="{{ route('product.index') }}">Quản lý sản phẩm sản phẩm</a> </li>
            </ul>
        </li>
        <li class="menu-list 
        {{ \Request::route()->getName() == 'banner.index' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'banner.create' ? 'nav-hover nav-active' : '' }}
        ">
          <a href="#"><i class="fas fa-spa"></i>
            <span>Quản lý slider <i class="lnr lnr-chevron-right"></i></span></a>
            <ul class="sub-menu-list">
              <li class="
              {{ \Request::route()->getName() == 'banner.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'banner.create' ? 'active1' : '' }}
              "><a href="{{ route('banner.index') }}">Banner quảng cáo</a> </li>
            </ul>
        </li>
        <li class="menu-list 
        {{ \Request::route()->getName() == 'blog.index' ? 'nav-hover nav-active' : '' }}
        {{ \Request::route()->getName() == 'blog.create' ? 'nav-hover nav-active' : '' }}
        ">
          <a href="#"><i class="far fa-sun"></i>
            <span>Quản lý blog <i class="lnr lnr-chevron-right"></i></span></a>
            <ul class="sub-menu-list">
              <li class="
              {{ \Request::route()->getName() == 'blog.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'blog.create' ? 'active1' : '' }}
              "><a href="{{ route('blog.index') }}">Blog</a> </li>
            </ul>
        </li>
        <li class="menu-list {{ \Request::route()->getName() == 'order.index' ? 'nav-hover nav-active' : '' }}">
          <a href="#"><i class="fas fa-broadcast-tower"></i></i>
            <span>Quản lý đơn hàng <i class="lnr lnr-chevron-right"></i></span></a>
            <ul class="sub-menu-list">
              <li class="
              {{ \Request::route()->getName() == 'order.index' ? 'active1' : '' }}
              {{ \Request::route()->getName() == 'order.create' ? 'active1' : '' }}
              "><a href="{{ route('order.index') }}">Đơn hàng khách hàng</a> </li>
            </ul>
        </li>
        <li class="menu-list {{ \Request::route()->getName() == 'list.product.reviews' ? 'nav-hover nav-active' : '' }}">
          <a href="#"><i class="fab fa-rocketchat"></i>
            <span>Quản lý đánh giá <i class="lnr lnr-chevron-right"></i></span></a>
            <ul class="sub-menu-list">
              <li class="
              {{ \Request::route()->getName() == 'list.product.reviews' ? 'active1' : '' }}
              "><a href="{{ route('list.product.reviews') }}">Đánh giá khách hàng</a> </li>
            </ul>
        </li>
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </div>
        <div class="user-dropdown-details d-flex">
          <div class="profile_details_left">
            <ul class="nofitications-dropdown">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-bell fa-fw"></i><span class="badge blue">3</span></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 3 new notifications</h3>
                    </div>
                  </li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar1.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li class="odd"><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar2.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>New customer registered </p>
                        <span>1 hour ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar3.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor sit amet </p>
                        <span>2 hours ago</span>
                      </div>
                    </a></li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#all" class="bg-primary">See all notifications</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fas fa-envelope fa-fw"></i><span class="badge blue">4</span></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 4 new messages</h3>
                    </div>
                  </li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar1.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li class="odd"><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar2.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>New customer registered </p>
                        <span>1 hour ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar3.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor sit amet </p>
                        <span>2 hours ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('public/backend/images/avatar1.jpg')}}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#all" class="bg-primary">See all messages</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="{{ asset('public/backend/images/profileimg.jpg')}}" class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">John Deo</h5>
                    <span class="status ml-2">Available</span>
                  </li>
                  <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
                  <li> <a href="#"><i class="lnr lnr-users"></i>1k Followers</a> </li>
                  <li> <a href="#"><i class="lnr lnr-cog"></i>Setting</a> </li>
                  <li> <a href="#"><i class="lnr lnr-heart"></i>100 Likes</a> </li>
                  <li class="logout"> <a href="#sign-up.html"><i class="fa fa-power-off"></i> Logout</a> </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">
  <div class="container-fluid content-top-gap">
  <!-- content -->
      @yield('content')
  <!-- //content -->
  </div>
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 LinhHuynh. All Rights Reserved | Design by <span class="text-primary">LinhHuynh</span></a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->

<script src="{{ asset('public/backend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('public/backend/js/jquery-1.10.2.min.js')}}"></script>

<!-- chart js -->
<script src="{{ asset('public/backend/js/Chart.min.js')}}"></script>
<script src="{{ asset('public/backend/js/utils.js')}}"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Linechart -->
<script src="{{ asset('public/backend/js/bar.js')}}"></script>
<script src="{{ asset('public/backend/js/linechart.js')}}"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Linechart -->

<script src="{{ asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{ asset('public/backend/js/scripts.js')}}"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="{{ asset('public/backend/js/modernizr.js')}}"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('public/backend/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/backend/js/toastr.min.js')}}"></script>
<script src="{{ asset('public/backend/js/js.js')}}"></script>
<script src="{{ asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script>
  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif
</script>
<script>
  function onLoad(){
    window.setTimeout('location.reload()',100);
  }
</script>
<script>
  CKEDITOR.replace('description');
  CKEDITOR.replace('content');
</script>
</body>

</html>
  

