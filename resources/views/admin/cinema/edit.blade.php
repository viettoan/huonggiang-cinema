@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('cinema.index') }}">{{ trans('message.title.manage_cinemas') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_cinema') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_cinema') }}</div>
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
            <label for="exampleInputEmail1">{{ trans('message.column.name') }}</label>
            <input class="form-control" type="text" name="name" value="{{ $cinema->name }}" placeholder="Name" required>
            @if ($errors->has('name'))
                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.address') }}</label>
            <input class="form-control" type="text" name="address" value="{{ $cinema->address }}" placeholder="Address" required>
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.location') }}</label>
            <input class="form-control" type="text" name="location" value="{{ $cinema->location }}" placeholder="Location" required>
            @if ($errors->has('location'))
                <span class="help-block">
                        <strong>{{ $errors->first('location') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.description') }}</label>
            <textarea class="form-control" rows="5" name="description" required>{{ $cinema->description }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.banner') }}</label>
            <input class="form-control" id="file-media" type="file" name="media" value="{{ $cinema->media }}">
            @if ($errors->has('media'))
                <span class="help-block">
                        <strong>{{ $errors->first('media') }}</strong>
                </span>
            @endif
            </div>
            <img class="col-md-12 img-responsive review-file-media" src="{{ $cinema->media }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.city') }}</label>
            <select name="city_id" class="form-control">
            @foreach ($cities as $city)
            <option value="{{ $city->id }}" @if ($cinema->city->id == $city->id) selected @endif>{{ $city->name }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema_system') }}</label>
            <select name="cinema_system_id" class="form-control">
            @foreach ($cinemaSystems as $cinemaSystem)
            <option value="{{ $cinemaSystem->id }}"  @if ($cinema->cinemaSystem->id == $cinemaSystem->id) selected @endif>{{ $cinemaSystem->name }}</option>
            @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.active') }}" @if ($cinema->status == config('custom.cinema.status.active')) checked @endif>{{ trans('message.config.active') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.cinema.status.block') }}" @if ($cinema->status == config('custom.cinema.status.block')) checked @endif>{{ trans('message.config.block') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/admin/cinema.js') }}"></script>
@endsection