@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.manage_schedules') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('schedule.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.cinema') }}</th>
            <th class="text-center ">{{ trans('message.movie') }}</th>
            <th class="text-center">{{ trans('message.price') }}</th>
            <th class="text-center">{{ trans('message.schedule') }}</th>  
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($posts))
      @foreach ($posts as $post)
        <tr>
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
  <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection