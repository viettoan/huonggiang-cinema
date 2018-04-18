@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('trailer.index') }}">{{ trans('message.title.manage_trailers') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_trailer') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_trailer') }}</div>
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
    <form method="POST" action="{{route('trailer.update', ['id' => $trailer->id])}}">
        <input trailer="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">{{ trans('message.column.movie') }}</label>
                <input class="form-control" type="trailer" name="movie" value="{{ $trailer->movie }}" placeholder="Enter movie" required>
                @if ($errors->has('movie'))
                    <span class="help-block">
                            <strong>{{ $errors->first('movie') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.code') }}</label>
            <input class="form-control" type="text" name="code" value="{{ $trailer->code }}" placeholder="Code" required>
            @if ($errors->has('code'))
                <span class="help-block">
                        <strong>{{ $errors->first('code') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection