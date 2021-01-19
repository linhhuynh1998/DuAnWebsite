@extends('frontend.pages.home')
@section('title')
    Chi tiết blog
@stop
@section('content')

<div class="breadcrumbs animated">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="{{ URL::to('/') }}">Trang chủ</a><span>» </span></li>
            <li class=""> <a title="Go to Home Page" href="javascript:void()">Blog</a><span> </span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

<!-- Main Container -->
<section class="main-container col2-right-layout animated">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="page-title">
            <h2>Blog</h2>
          </div>
          @foreach($blogdetail as $value)
            <div class="blog-wrapper" id="main">
                <div class="site-content" id="primary">
                    <div role="main" id="content">
                        <article class="blog_entry clearfix" >
                        <header class="blog_entry-header clearfix">
                            <div class="">
                                {!! $value->description !!}
                            </div>
                        </header>
                        <!--blog_entry-header clearfix-->
                        <!--comments-wrapper-->
                        
                        <div class="comments-form-wrapper clearfix">
                            <h3>Để lại câu hỏi</h3>
                            <form class="comment-form" method="post" id="postComment">
                                <div class="field">
                                    <label>Tên<em class="required">*</em></label>
                                    <input type="text" class="input-text" title="Name" id="user" name="user_name">
                                </div>
                                <div class="field">
                                    <label>Email<em class="required">*</em></label>
                                    <input type="text" class="input-text" title="Email" id="email" name="user_email">
                                </div>
                                <div class="clear"></div>
                                <div class="field aw-blog-comment-area">
                                    <label for="comment">Nội dung<em class="required">*</em></label>
                                    <textarea rows="5" cols="50" class="input-text" title="Comment" id="comment" name="comment"></textarea>
                                </div>
                                <div style="width:96%" class="button-set">
                                    <input type="hidden" value="1" name="blog_id">
                                    <button type="submit" class="bnt-comment"><span><span>Gửi đi</span></span></button>
                                </div>
                            </form>
                        </div>
                        <!--comments-form-wrapper clearfix--> 
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End -->

@stop