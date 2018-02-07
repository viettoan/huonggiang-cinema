@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('movie.index') }}">Manage Movies</a></li>
    <li class="breadcrumb-item active">Edit Movie</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">Edit Movie</div>
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
    <form method="POST" action="{{route('movie.update', ['id' => $movie->id])}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $movie->name }}" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Time</label>
            <input class="form-control" type="number" name="time" value="{{ $movie->time }}" placeholder="Time" required>
            @if ($errors->has('time'))
                <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Release Date</label>
            <input class="form-control" type="date" name="release_date" value="{{ $movie->release_date }}" required>
            @if ($errors->has('release_date'))
                <span class="help-block">
                        <strong>{{ $errors->first('release_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Directors</label>
            <input class="form-control" type="text" name="directors" value="{{ $movie->directors }}" placeholder="Directors" required>
            @if ($errors->has('directors'))
                <span class="help-block">
                        <strong>{{ $errors->first('directors') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Actors</label>
            <input class="form-control" type="text" name="actors" value="{{ $movie->actors }}" placeholder="Actors" required>
            @if ($errors->has('actors'))
                <span class="help-block">
                        <strong>{{ $errors->first('actors') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea class="form-control" rows="5" name="description" required>{{ $movie->description }}</textarea>
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
                <option value="{{ $m->id }}" @if ($movie->media->id == $m->id) selected @endif>{{ $m->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <select class="js-example-basic-multiple form-control" name="type_id[]" multiple="multiple">
                @foreach ($types as $type)
                <option value="{{ $type->id }}"
                    @if (in_array($type->id, $movieTypes))
                        selected
                    @endif
                >{{ $type->description }}</option>
                @endforeach 
            </select>
            @if ($errors->has('type_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('type_id') }}</strong>
                </span>
            @endif
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
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.stop_showing') }}">Stop Showing
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