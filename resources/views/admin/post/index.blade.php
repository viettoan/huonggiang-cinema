@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_posts') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('post.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
     <div class="col-md-5">
      <input type="text" name="search" placeholder="Search ..." class="form-control search">
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.title') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>
            <th class="text-center">{{ trans('message.column.status') }}</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($posts))
      @foreach ($posts as $key=>$post)
        <tr>
            <th class="text-center">{{ $key+1 }}</th>
            <th>{{ $post->title }}</th>
            <th>{{ $post->description }}</th>
            <th class="text-center">
                @if ($post->status == config('custom.post.status.hide'))
                    <button class="btn btn-warning">{{ trans('message.config.hide') }}</button>
                @else
                <button class="btn btn-primary">{{ trans('message.config.show') }}</button>
                @endif
            </th> 
            <th>
                <a href = "{{ route('post.edit', ['id' => $post->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $post->id}}" class="delPost">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($posts)) 
      {{ $posts->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/post.js') }}"></script>
@endsection