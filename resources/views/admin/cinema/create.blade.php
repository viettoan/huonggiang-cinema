@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('cinema.index') }}">{{ trans('message.title.manage_cinemas') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_cinema') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_cinema') }}</div>
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
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="{{ trans('message.column.name') }}" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.address') }}</label>
            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="{{ trans('message.column.address') }}" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.location') }}</label>
            <input class="form-control" type="text" name="location" value="{{ old('location') }}" placeholder="{{ trans('message.column.location') }}" required>
            @if ($errors->has('location'))
                <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
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
            <label for="exampleInputEmail1">{{ trans('message.column.banner') }}</label>
            <input class="form-control" id="file-media" type="file" name="media" value="{{ old('media') }}">
            @if ($errors->has('media'))
                <span class="help-block">
                        <strong>{{ $errors->first('media') }}</strong>
                </span>
            @endif
            <img class="col-md-12 img-responsive review-file-media">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.city') }}</label>
            <select name="city_id" class="form-control">
            @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema_system') }}</label>
            <select name="cinema_system_id" class="form-control">
            @foreach ($cinemaSystems as $cinemaSystem)
            <option value="{{ $cinemaSystem->id }}">{{ $cinemaSystem->name }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.active') }}" checked>{{ trans('message.config.active') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.block') }}">{{ trans('message.config.block') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/cinema.js') }}"></script>
@endsection