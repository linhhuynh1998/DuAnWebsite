@extends('frontend.pages.home')
@section('title')
    Quản lý tài khoản
@stop
@section('content')

<!-- Main Container -->
<section class="main-container col1-layout animated">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          <h2>Đăng nhập hoặc tạo một tài khoản</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-2 registered-users"><strong>Đăng ký tài khoản</strong>
            <div class="content">
              <p>Nếu bạn có tài khoản với chúng tôi, vui lòng đăng nhập.</p>
              <form action="{{ route('registration.index.list') }}" method="post">
                  @csrf
                <ul class="form-list">
                    <li>
                      <label for="email">Tên của bạn <span class="required">*</span></label>
                      <br>
                      <input type="text" title="Tên của bạn" class="input-text" id="email" value="{{ old('name1') }}" name="name1" placeholder="Tên của bạn">
                        @if($errors->has('name1'))
                            <div class="text-red">{{ $errors->first('name1') }}</div>
                        @endif
                    </li>
                    <li>
                        <label for="email">Nhập email <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Nhập email" class="input-text" id="email" value="{{ old('email1') }}" name="email1" placeholder="Nhập email">
                        @if($errors->has('email1'))
                            <div class="text-red">{{ $errors->first('email1') }}</div>
                        @endif
                      </li>
                    <li>
                      <label for="pass">Mật khẩu <span class="required">*</span></label>
                      <br>
                      <input type="password" title="Mật khẩu" id="pass" class="input-text" name="password1" value="{{ old('password1') }}" placeholder="Nhập mật khẩu">
                      @if($errors->has('password1'))
                            <div class="text-red">{{ $errors->first('password1') }}</div>
                        @endif
                    </li>
                    <li>
                        <label for="pass">Nhập lại mật khẩu <span class="required">*</span></label>
                        <br>
                        <input type="password" title="Nhập lại mật khẩu" class="input-text" name="confirm1" value="{{ old('confirm1') }}" placeholder="Nhập lại mật khẩu">
                        @if($errors->has('confirm1'))
                            <div class="text-red">{{ $errors->first('confirm1') }}</div>
                        @endif
                      </li>
                  </ul>
                    <div class="buttons-set">
                        <button id="send2" name="dangky" type="submit" class="button login"><span>Đăng ký tài khoản</span></button>
                    </div>
              </form>
            </div>
          </div>
          <div class="col-2 registered-users"><strong>Đăng nhập tài khoản</strong>
            <div class="content">
                <p>Bạn đã có tài khoản chưa ?</p>
                <form action="{{ route('login.index.list') }}" method="POST">
                    @csrf
                    <ul class="form-list">
                        <li>
                        <label for="email">Nhập email <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Email Address" class="input-text" id="email" value="{{ old('email') }}" name="email" placeholder="Nhập email">
                            @if($errors->has('email'))
                                <div class="text-red">{{ $errors->first('email') }}</div>
                            @endif
                        </li>
                        <li>
                        <label for="pass">Mật khẩu <span class="required">*</span></label>
                        <br>
                        <input type="password" title="Password" id="pass" class="input-text" value="{{ old('password') }}" name="password" placeholder="Nhập mật khẩu">
                            @if($errors->has('password'))
                                <div class="text-red">{{ $errors->first('password') }}</div>
                            @endif
                        </li>
                    </ul>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Nhớ tài khoản
                        </label>
                    </div>
                    <div class="buttons-set">
                        <button id="send2" name="send" type="submit" class="button login"><span>Đăng nhập</span></button>
                        <a class="forgot-word" href="#">Quên mật khẩu?</a> 
                    </div>
                </form>
                <div>
                    <a href="{{ URL::to('dang-nhap/facebook') }}"><img src="{{ asset('public/uploads/login/facebook.png') }}" width="230px"></a>
                    <a href="{{ URL::to('dang-nhap/google') }}"><img src="{{ asset('public/uploads/login/login-with-google-icon-3.jpg') }}" width="210px"></a>
                </div>
            </div>
        </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
  <!-- Main Container End -->
  

@stop