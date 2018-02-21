@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--member cinema--background">
<div class="container">
    <div class="product--title">
        <h3 class="current" data-id=".bhd-page-register" ><a href="#">THÀNH VIÊN</a></h3>
        <span>|</span>
        <h3 data-id=".bhd-page-faq" ><a href="#">FAQ</a></h3>
        <span>|</span>
        <h3 data-id=".bhd-page-quydinh"><a href="#">QUY ĐỊNH</a></h3>
    </div>
    
    <div class="row bhd-page-register bhd-page-user">
        <div class="col-md-6">
            <div class="widget--right">
                <h4 class="title--member">ĐĂNG NHẬP</h4>
                <div class="member--login">
                    <form class="form--inside"  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <label class="controls"><span class="txt--label">Email (*)</span><input name="email" type="email" class="inp--text"></label>
                        <label class="controls"><span class="txt--label">Mật khẩu (*)</span><input name="password" type="password" class="inp--text"></label>
                        <div class="clearfix form--last">
                            <input type="submit" value="ĐĂNG NHẬP" class="btn--yolo">
                            <a href="../quen-mat-khau/index.html" class="forgot--link">Quên mật khẩu</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="title--member">ĐĂNG KÝ MỚI</h4>
            <div class="member--register-new">
                <form class="form--inside" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <label class="controls">
                        <span class="txt--label">Email (*)</span>
                        <input name="email" value="" type="email" class="inp--text" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">Mật khẩu (*)</span>
                        <input name="password" type="password" class="inp--text" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">Nhập lại mật khẩu (*)</span>
                        <input name="password_confirmation" type="password" class="inp--text" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">Họ tên (*)</span>
                        <input type="text" value="" name="name" class="inp--text" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">Địa chỉ (*)</span>
                        <input type="text" value="" name="address" class="inp--text" required>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">Giới tính (*)</span>
                        <select name="gender" class="js__heapbox" data-placeholder="Chọn" required>
                            <option value="{{ config('custom.male') }}">Nam</option>
                            <option  value="{{ config('custom.female') }}">Nữ</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </label>
                    <div class="form--last">
                        <input type="submit" value="ĐĂNG KÝ" class="btn--yolo">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- .container -->
</div><!-- .section- -product-view -->
</div>
</div>
@endsection