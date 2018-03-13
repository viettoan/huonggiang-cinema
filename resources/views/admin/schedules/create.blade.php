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
            <select name="cinema_id" class="form-control" id="cinema_id">
                <option>{{ trans('message.choose_one_cinema') }}</option>
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                @endforeach 
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.movie') }}</label>
            <select name="movie_id" class="form-control" id="movie_id">
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.technology') }}</label>
            <select name="movie_technology_id" class="form-control" id="movie_technology_id">
            </select>
        </div>
        <button type="button" class="btn btn-primary btn-block btn-save-schedule">{{ trans('message.action.next') }}</button>
    </form>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="create-schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.title.schedule_time') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="admin-schedule">
                <input class="form-control" type="hidden" id="schedule-id" value="" required>
                    <div class="room col-md-12" data-index='0'>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('message.column.date') }}</label>
                            <input class="form-control date" type="date" name="date" value="{{ old('date') }}" required>
                            @if ($errors->has('date'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">{{ trans('message.column.time') }}</label>
                            <select class="time-multiple-0 form-control time_id" name="time_id[]" multiple="multiple">
                            </select>
                            @if ($errors->has('time'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary col-md-2 btn-save-schedule-time">{{ trans('message.action.save') }}</button>
                            <button type="button" class="btn btn-primary col-md-2 btn-edit-schedule-time">{{ trans('message.action.edit') }}</button>
                            <button type="button" class="btn btn-danger col-md-2 btn-remove-schedule-time">{{ trans('message.action.remove') }}</button>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.action.close') }}</button>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
            $('.time-multiple-0').select2();
    </script>
    <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection