@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('media.index') }}">{{ trans('message.title.manage_media') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_media') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_media') }}</div>
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
    <form method="POST" action="{{route('media.store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-12">
                    <label for="exampleInputName">{{ trans('message.column.file') }}</label>
                    <input class="form-control" id="file-media" type="file" name="path" value="{{ old('path') }}">
                    @if ($errors->has('path'))
                        <span class="help-block">
                                <strong>{{ $errors->first('path') }}</strong>
                        </span>
                    @endif
                    <img class="col-md-12 img-responsive review-file-media">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.description') }}</label>
            <input class="form-control" type="text" name="description" value="{{ old('description') }}" placeholder="Description" required>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0" >{{ trans('message.config.hide') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="1" checked>{{ trans('message.config.show') }}
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Type</label>
            <select name="type" class="form-control">
                @if (config('custom.media.type') != null)
                    @foreach(config('custom.media.type') as $key => $type)
                        <option value="{{ $type }}">{{ $key }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/media.js') }}"></script>
@endsection