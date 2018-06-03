@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item"><a href="{{ route('promotion.index') }}">{{ trans('message.title.manage_promotions') }}</a></li>
    <li class="breadcrumb-item active">{{ trans('message.title.edit_promotion') }}</li>
</ol>
<div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ trans('message.title.edit_promotion') }}</div>
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
    <form method="POST" action="{{route('promotion.update', ['id' => $promotion->id])}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.cinema') }}</label>
            <select name="cinema_id" class="form-control">
                @foreach ($cinemas as $cinema)
                <option value="{{ $cinema->id }}" @if ($promotion->cinema->id == $cinema->id) @endif>{{ $cinema->name }}</option>
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
            <input class="form-control" id="file-media" type="file" name="media" value="{{ $promotion->media }}">
            @if ($errors->has('media'))
                <span class="help-block">
                        <strong>{{ $errors->first('media') }}</strong>
                </span>
            @endif
            </div>
            <img class="col-md-12 img-responsive review-file-media" src="{{ $promotion->media }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.title') }}</label>
            <input class="form-control" type="text" name="title" value="{{ $promotion->title }}" placeholder="Title" required>
            @if ($errors->has('title'))
                <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.description') }}</label>
            <textarea class="form-control" rows="5" name="description" required>{{ $promotion->description }}</textarea>
            @if ($errors->has('description'))
                <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.content') }}</label>
            <textarea class="form-control" rows="5" name="content" required>{{ $promotion->content }}</textarea>
            @if ($errors->has('content'))
                <span class="help-block">
                        <strong>{{ $errors->first('content') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.sale') }}</label>
            <input class="form-control" type="number" name="sale" value="{{ $promotion->sale }}" placeholder="Time" required>
            @if ($errors->has('sale'))
                <span class="help-block">
                        <strong>{{ $errors->first('sale') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.start_date') }}</label>
            <input class="form-control" type="date" name="start" value="{{ $promotion->start }}" required>
            @if ($errors->has('start'))
                <span class="help-block">
                        <strong>{{ $errors->first('start') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">{{ trans('message.column.end_date') }}</label>
            <input class="form-control" type="date" name="end" value="{{ $promotion->end }}" required>
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
                <input type="radio" name="status" value="{{ config('custom.promotion.status.show') }}"
                    @if ($promotion->status == config('custom.promotion.status.show'))
                    checked
                    @endif 
                >{{ trans('message.config.show') }}
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="{{ config('custom.promotion.status.hide') }}"
                    @if ($promotion->status == config('custom.promotion.status.hide'))
                        checked
                    @endif 
                >{{ trans('message.config.hide') }}
            </label>
        </div>
    </div>
        <button type="submit" class="btn btn-primary btn-block">{{ trans('message.action.edit') }}</button>
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