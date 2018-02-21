@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('time.index') }}">Manage Times</a></li>
    <li class="breadcrumb-item active">Create Time</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Create Time</div>
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
    <form method="POST" action="{{route('time.store')}}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">Time - </label><span class="text-muted"> hh:mm</span>
                <input class="form-control" type="text" name="time" value="{{ old('time') }}" placeholder="Enter time" required>
                @if ($errors->has('time'))
                    <span class="help-block">
                            <strong>{{ $errors->first('time') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>
    </div>
</div>
@endsection