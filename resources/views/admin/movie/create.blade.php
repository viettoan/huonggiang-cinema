@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('movie.index') }}">Manage Movies</a></li>
    <li class="breadcrumb-item active">Create Movie</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Create Movie</div>
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
    <form method="POST" action="{{route('movie.store')}}" enctype="multipart/form-data">
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
            <label for="exampleInputEmail1">Time</label>
            <input class="form-control" type="number" name="time" value="{{ old('time') }}" placeholder="Time" required>
            @if ($errors->has('time'))
                <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Release Date</label>
            <input class="form-control" type="date" name="release_date" value="{{ old('release_date') }}" required>
            @if ($errors->has('release_date'))
                <span class="help-block">
                        <strong>{{ $errors->first('release_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Directors</label>
            <input class="form-control" type="text" name="directors" value="{{ old('directors') }}" placeholder="Directors" required>
            @if ($errors->has('directors'))
                <span class="help-block">
                        <strong>{{ $errors->first('directors') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Actors</label>
            <input class="form-control" type="text" name="actors" value="{{ old('actors') }}" placeholder="Actors" required>
            @if ($errors->has('actors'))
                <span class="help-block">
                        <strong>{{ $errors->first('actors') }}</strong>
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
            <label for="exampleInputEmail1">Movie Poster</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $m)
                <option value="{{ $m->id }}">{{ $m->description }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <select class="js-example-basic-multiple form-control" name="type_id[]" multiple="multiple">
                @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->description }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Status</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.new_release') }}" checked>New Release
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.now_showing') }}">Now Showing
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Save</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/movie.js') }}"></script>
@endsection