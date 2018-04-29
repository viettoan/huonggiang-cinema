@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('city.index') }}">{{ trans('message.title.manage_cities') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_city') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_city') }}</div>
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
    <form method="POST" action="{{route('city.update', ['id' => $city->id])}}">
        <input city="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">{{ trans('message.column.name') }}</label>
                <input class="form-control" type="city" name="name" value="{{ $city->name }}" placeholder="Enter name" required>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
                </div>
            </div>
               <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection