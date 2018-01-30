@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Manage Users</a></li>
    <li class="breadcrumb-item active">Create User</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Create User</div>
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
    <form method="POST" action="{{route('user.store')}}">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">Name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter name" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required>
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Enter Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Gender</label>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="1" checked>Nam
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="gender" value="0">Nữ
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Role</label>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="1">Admin
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="role" value="0" checked>User
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>
    </div>
</div>
@endsection