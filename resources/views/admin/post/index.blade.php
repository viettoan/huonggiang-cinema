@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Posts</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('post.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">Title</th>
            <th class="text-center ">Description</th>
            <th class="text-center">Status</th>
            <th class="text-center">Type</th>  
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($posts))
      @foreach ($posts as $post)
        <tr>
            <th class="text-center">{{ $post->id }}</th>
            <th>{{ $post->title }}</th>
            <th>{{ $post->description }}</th>
            <th class="text-center">
                @if ($post->status == config('custom.post.status.hide'))
                    <button class="btn btn-warning">Hide</button>
                @else
                <button class="btn btn-primary">Show</button>
                @endif
            </th> 
            <th class="text-center">
                @if (config('custom.post.type') != null)
                    @foreach(config('custom.post.type') as $key => $value)
                        @if($post->type == $value)
                        <button class="btn btn-primary">{{ $key }}</button>
                        @endif
                    @endforeach
                @endif
            </th>
            <th>
                <a href = "{{ route('post.edit', ['id' => $post->id]) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a data-id="{{ $post->id}}" class="delPost">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
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