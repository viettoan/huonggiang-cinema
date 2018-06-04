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
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.movie') }}</label>
            <select name="movie_id" class="form-control">
            @foreach ($movies as $movie)
                <option value="{{ $movie->id }}" @if($trailer->movie_id == $movie->id) selected @endif>{{ $movie->name }}</option>
            @endforeach 
            </select>
            @if ($errors->has('movie_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('movie_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.code') }}</label>
            <input class="form-control" type="text" name="embedded_code" value="{{ $trailer->embedded_code }}" placeholder="embedded_code" required>
            @if ($errors->has('embedded_code'))
                <span class="help-block">
                        <strong>{{ $errors->first('embedded_code') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection