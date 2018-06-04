@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('movie.index') }}">{{ trans('message.title.manage_movies') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_movie') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_movie') }}</div>
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
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
            <input class="form-control" type="number" name="time" value="{{ old('time') }}" placeholder="Time" required>
            @if ($errors->has('time'))
                <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.release_date') }}</label>
            <input class="form-control" type="date" name="release_date" value="{{ old('release_date') }}" required>
            @if ($errors->has('release_date'))
                <span class="help-block">
                        <strong>{{ $errors->first('release_date') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.directors') }}</label>
            <input class="form-control" type="text" name="directors" value="{{ old('directors') }}" placeholder="Directors" required>
            @if ($errors->has('directors'))
                <span class="help-block">
                        <strong>{{ $errors->first('directors') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.actors') }}</label>
            <input class="form-control" type="text" name="actors" value="{{ old('actors') }}" placeholder="Actors" required>
            @if ($errors->has('actors'))
                <span class="help-block">
                        <strong>{{ $errors->first('actors') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.description') }}</label>
            <textarea class="form-control" rows="5" name="description" required>{{ old('description') }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.movie_poster') }}</label>
            <input class="form-control" id="file-media" type="file" name="media" value="{{ old('media') }}">
            @if ($errors->has('media'))
                <span class="help-block">
                        <strong>{{ $errors->first('media') }}</strong>
                </span>
            @endif
            <img class="col-md-12 img-responsive review-file-media">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.type') }}</label>
            <select class="js-example-basic-multiple form-control" name="type_id[]" multiple="multiple">
                @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach 
            </select>
            @if ($errors->has('type_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.technology') }}</label>
            <select class="js-example-basic-multiple form-control" name="technology_id[]" multiple="multiple">
                @foreach ($technologies as $technology)
                <option value="{{ $technology->id }}">{{ $technology->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.new_release') }}" checked>{{ trans('message.config.new_release') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.now_showing') }}">{{ trans('message.config.now_showing') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.movie.status.sneak_show') }}">{{ trans('message.config.sneak_show') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/movie.js') }}"></script>
@endsection