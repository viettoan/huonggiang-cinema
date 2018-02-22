@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--member cinema--background">
<div class="container">
    <div class="product--title">
        <h3 class="current" data-id=".bhd-page-register" ><a href="#">{{ trans('message.member') }}</a></h3>
        <span>|</span>
        <h3 data-id=".bhd-page-faq" ><a href="#">FAQ</a></h3>
        <span>|</span>
        <h3 data-id=".bhd-page-quydinh"><a href="#">{{ trans('message.rules') }}</a></h3>
    </div>
    
    <div class="row bhd-page-register bhd-page-user">
        <div class="col-md-6">
            <div class="widget--right">
                <h4 class="title--member">{{ trans('message.title.login') }}</h4>
                <div class="member--login">
                    <form class="form--inside"  method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <label class="controls"><span class="txt--label">{{ trans('message.column.email') }} (*)</span><input name="email" type="email" class="inp--text"></label>
                        <label class="controls"><span class="txt--label">{{ trans('message.column.password') }} (*)</span><input name="password" type="password" class="inp--text"></label>
                        <div class="clearfix form--last">
                            <input type="submit" value="{{ trans('message.title.login') }}" class="btn--yolo">
                            <a href="../quen-mat-khau/index.html" class="forgot--link">{{ trans('message.action.forgot_password') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h4 class="title--member">{{ trans('message.title.register') }}</h4>
            <div class="member--register-new">
                <form class="form--inside" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.email') }} (*)</span>
                        <input name="email" value="" type="email" class="inp--text" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.password') }} (*)</span>
                        <input name="password" type="password" class="inp--text" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.confirm_password') }} (*)</span>
                        <input name="password_confirmation" type="password" class="inp--text" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.name') }} (*)</span>
                        <input type="text" value="" name="name" class="inp--text" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.address') }} (*)</span>
                        <input type="text" value="" name="address" class="inp--text" required>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.gender') }} (*)</span>
                        <select name="gender" class="js__heapbox" data-placeholder="Chọn" required>
                            <option value="{{ config('custom.male') }}">{{ trans('message.config.male') }}</option>
                            <option  value="{{ config('custom.female') }}">{{ trans('message.config.female') }}</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </label>
                    <div class="form--last">
                        <input type="submit" value="{{ trans('message.title.register') }}" class="btn--yolo">
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