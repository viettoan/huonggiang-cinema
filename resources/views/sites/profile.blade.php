@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--member cinema--background">
<div class="container">
    <div class="product--title">
        <h3 class="current" data-id=".bhd-page-register" ><a href="#">{{ trans('message.member') }}</a></h3>
    </div>
    
    <div class="row bhd-page-register bhd-page-user">
        <div class="col-md-6">
            <div class="member-card">
                <h3>{{ trans('message.title.profile') }}</h3>
                <ul>
                    <li>ID: {{ $user->id }}</span></li>
                    <li>Username: {{ $user->name }}</li>
                    <li>Ngày đăng ký: {{ $user->created_at }} </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="member--edit">
                <div class="member--info">
                    <div class="avatar">
                        <span><i class="fas fa-camera"></i> Đổi avatar</span>
                        <img src="{{  $user->avatar }}" alt="">
                    </div>
                        <p style="color: #bfc9d2;">Vui lòng đăng ảnh chân dung, thấy rõ mặt có kích thước: ngang 150 pixel và dọc 200 pixel</p>
                    <h4 class="title">{{ $user->name }}</h4>
                </div>
                <form class="form--inside" method="POST" enctype="multipart/form-data" action="{{ route('profile.update', ['id' => $user->id]) }}">
                    @if (session('error'))
                        <div class="alert alert-success">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <input type="hidden" name="_method" value="PUT" >
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    {{ csrf_field() }}
                    <input type="file" id="upload_avatar" name="media" accept="" />
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.email') }} (*)</span>
                        <input name="email" value="{{ $user->email }}" type="email" class="inp--text" required>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </label>
                    <div class="controls">
                        <label class="change--password">
                            <span class="txt--label">Mật khẩu</span>
                            <input type="password" class="inp--text" value="**********" disabled>
                        </label>
                        <input type="button" value="ĐỔI MẬT KHẨU" class="change--password-button js__dropdown" data-target="#change-password" />
                    </div>
                    <div id="change-password" class="hide--pro" style="display: none;">
                        <label class="controls"><span class="txt--label">Mật khẩu cũ</span><input name="old_password"  type="password" class="inp--text"></label>
                        <label class="controls"><span class="txt--label">Mật khẩu mới</span><input name="password" type="password" class="inp--text"></label>
                        <label class="controls"><span class="txt--label">Nhập lại mật khẩu</span><input name="confirm_password" type="password" class="inp--text"></label>
                    </div>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.name') }} (*)</span>
                        <input type="text" value="{{ $user->name }}" name="name" class="inp--text" required>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.address') }} (*)</span>
                        <input type="text" value="{{ $user->address }}" name="address" class="inp--text" required>
                        @if ($errors->has('address'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </label>
                    <label class="controls">
                        <span class="txt--label">{{ trans('message.column.gender') }} (*)</span>
                        <select name="gender" class="js__heapbox" data-placeholder="Chọn" required>
                            <option value="{{ config('custom.male') }}" @if($user->gender == config('custom.male')) selected @endif>{{ trans('message.config.male') }}</option>
                            <option  value="{{ config('custom.female') }}" @if($user->gender == config('custom.female')) selected @endif>{{ trans('message.config.female') }}</option>
                        </select>
                        @if ($errors->has('gender'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif
                    </label>
                    <div class="form--last">
                        <input type="submit" value="{{ trans('message.action.edit') }}" class="btn--yolo">
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
@section('script')
<script src="{{ asset('js/sites/profile.js') }}"></script>
@endsection