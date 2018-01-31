@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('media.index') }}">Manage Media</a></li>
    <li class="breadcrumb-item active">Edit Media</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Edit Media</div>
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
    <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">File</label>
                <input class="form-control" type="file" name="name" value="{{ old('path') }}">
                @if ($errors->has('path'))
                    <span class="help-block">
                            <strong>{{ $errors->first('path') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Description" required>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0" >Hide
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" checked>Show
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Edit</button>
    </form>
    </div>
</div>
@endsection