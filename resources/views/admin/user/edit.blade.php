@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ trans('message.title.manage_users') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_user') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_user') }}</div>
    <div class="card-body">
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
    <form method="POST" action="{{ route('user.update', ['id' => $user->id]) }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="{{ $user->id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">{{ trans('message.column.name') }}</label>
                <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Enter name" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.email') }}</label>
            <input class="form-control" type="email" name="email" value="{{ $user->email }}" placeholder="Enter email" required>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.address') }}</label>
            <input class="form-control" type="text" name="address" value="{{ $user->address }}" placeholder="Enter Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.gender') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" @if ($user->gender == 1) checked @endif>{{ trans('message.config.male') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="0" @if ($user->gender == 0) checked @endif>{{ trans('message.config.female') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.role') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="1" @if ($user->role == 1) checked @endif >{{ trans('message.config.admin') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="0" @if ($user->role == 0) checked @endif >{{ trans('message.config.user') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection