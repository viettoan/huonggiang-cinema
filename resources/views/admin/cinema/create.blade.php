@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('cinema.index') }}">Manage Cinema</a></li>
    <li class="breadcrumb-item active">Create Cinema</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Create Cinema</div>
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
    <form method="POST" action="{{route('cinema.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="5" name="description" required>{{ old('description') }}</textarea>
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
            <option value="{{ $m->id }}">{{ $m->description }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.active') }}" checked>Active
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.block') }}">Block
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>
    </div>
</div>
@endsection