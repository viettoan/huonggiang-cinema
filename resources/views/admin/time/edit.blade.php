@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('time.index') }}">{{ trans('message.title.manage_times') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_time') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_time') }}</div>
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
    <form method="POST" action="{{route('time.update', ['id' => $time->id])}}">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                <label for="exampleInputName">{{ trans('message.column.time') }} - </label><span class="text-muted"> hh:mm</span>
                <input class="form-control" type="text" name="time" value="{{ $time->time }}" placeholder="Enter time" required>
                @if ($errors->has('time'))
                    <span class="help-block">
                            <strong>{{ $errors->first('time') }}</strong>
                    </span>
                @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
    </form>
    </div>
</div>
@endsection