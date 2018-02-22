@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('promotion.index') }}">{{ trans('message.title.manage_promotions') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.create_promotion') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.create_promotion') }}</div>
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
    <form method="POST" action="{{route('promotion.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema') }}</label>
            <select name="cinema_id" class="form-control">
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}">{{ $cinema->name }}</option>
                @endforeach 
            </select>
            @if ($errors->has('cinema_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('cinema_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.banner') }}</label>
            <select name="media_id" class="form-control">
            @foreach ($media as $m)
                <option value="{{ $m->id }}">{{ $m->description }}</option>
            @endforeach 
            </select>
            @if ($errors->has('media_id'))
                <span class="help-block">
                        <strong>{{ $errors->first('media_id') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.title') }}</label>
            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required>
            @if ($errors->has('title'))
                <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
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
            <label for="exampleInputEmail1">{{ trans('message.column.content') }}</label>
            <textarea class="form-control" rows="5" name="content" required>{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.sale') }}</label>
            <input class="form-control" type="number" name="sale" value="{{ old('sale') }}" placeholder="Sale" required>
            @if ($errors->has('sale'))
                <span class="help-block">
                        <strong>{{ $errors->first('sale') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.start_date') }}</label>
            <input class="form-control" type="date" name="start" value="{{ old('start') }}" required>
            @if ($errors->has('start'))
                <span class="help-block">
                        <strong>{{ $errors->first('start') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.end_date') }}</label>
            <input class="form-control" type="date" name="end" value="{{ old('end') }}" required>
            @if ($errors->has('end'))
                <span class="help-block">
                        <strong>{{ $errors->first('end') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.status') }}</label>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.promotion.status.show') }}" checked>{{ trans('message.config.show') }}
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="{{ config('custom.promotion.status.hide') }}">{{ trans('message.config.hide') }}
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.save') }}</button>
    </form>
    </div>
</div>
@endsection
@section('script')
  <script>
      var editor = CKEDITOR.replace('content',{
        language:'vi',
        filebrowserBrowseUrl :'/js/plugin/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/js/plugin/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/js/plugin/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/js/plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/js/plugin /ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    });
  </script>
@endsection