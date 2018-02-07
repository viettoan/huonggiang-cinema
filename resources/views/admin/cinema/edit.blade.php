@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('cinema.index') }}">Manage Cinemas</a></li>
    <li class="breadcrumb-item active">Edit Cinema</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Edit Cinema</div>
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
    <form method="POST" action="{{route('cinema.update', ['id' => $cinema->id])}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $cinema->name }}" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input class="form-control" type="text" name="address" value="{{ $cinema->address }}" placeholder="Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="5" name="description" required>{{ $cinema->description }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Banner</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $m)
            <option value="{{ $m->id }}" @if ($cinema->media->id == $m->id) selected @endif>{{ $m->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.active') }}" @if ($cinema->status == config('custom.cinema.status.active')) checked @endif>Active
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.block') }}" @if ($cinema->status == config('custom.cinema.status.block')) checked @endif>Block
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Edit</button>
    </form>
    </div>
</div>
@endsection