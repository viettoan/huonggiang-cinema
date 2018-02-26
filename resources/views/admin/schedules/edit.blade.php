@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('schedule.index') }}">{{ trans('message.title.manage_schedules') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_schedule') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_schedule') }}</div>
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
    <form method="POST" action="{{route('schedule.update', ['id' => $cinemaSchedule->id])}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema') }}</label>
            <select name="cinema_id" class="form-control">
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}" @if ($cinema->id == $cinemaSchedule->cinema->id) selected @endif>{{ $cinema->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.movie') }}</label>
            <select name="movie_id" class="form-control">
                @foreach ($movies as $movie)
                <option value="{{ $movie->id }}" @if ($movie->id == $cinemaSchedule->movie->id) selected @endif>{{ $movie->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.day') }}</label>
            <select name="day" class="form-control">
                @if (config('custom.days') != null)
                    @foreach(config('custom.days') as $key => $day)
                        <option value="{{ $day }}" @if ($day == $cinemaSchedule->schedule->day) selected @endif>{{ $key }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
            <select class="js-example-basic-multiple form-control" name="time_id[]" multiple="multiple">
                @foreach ($times as $time)
                <option value="{{ $time->id }}"
                    @if (in_array($time->id, $scheduleTimes))
                        selected
                    @endif
                >{{ $time->time }}</option>
                @endforeach 
            </select>
            @if ($errors->has('time'))
                <span class="help-block">
                        <strong>{{ $errors->first('time') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection