@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('schedule.index') }}">{{ trans('message.title.manage_schedules') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_schedule') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_schedule') }}</div>
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
    <form method="POST" action="{{route('schedule.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema') }}</label>
            <select name="cinema_id" class="form-control">
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.movie') }}</label>
            <select name="movie_id" class="form-control">
                @foreach ($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.date') }}</label>
            <input class="form-control" type="date" name="date" id="date" value="{{ old('date') }}" required>
            @if ($errors->has('date'))
                <span class="help-block">
                        <strong>{{ $errors->first('date') }}</strong>
                </span>
            @endif
        </div>
        <div class="admin-schedule row">
            <div class="col-md-12 row">
                <div class="room col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ trans('message.column.room') }}</label>
                        <select name="room_id" class="form-control room_id">
                            <option>{{ trans('message.action.select_room') }}</option>
                            @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->name }}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
                        <select class="js-example-basic-multiple form-control time_id" name="time_id[]" multiple="multiple">
                        </select>
                        @if ($errors->has('time'))
                            <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection