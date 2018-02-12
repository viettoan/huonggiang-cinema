@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Movies</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('movie.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">Movie poster</th>
          <th class="text-center ">Name</th>
          <th class="text-center ">Time</th>
          <th class="text-center ">Release Date</th>
          <th class="text-center">Status</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($movies))
        @foreach ($movies as $movie)
        <tr>
            <th class="text-center">{{ $movie->id }}</th>
            <th><img class="media-file" src="{{ $movie->media->path }}"></th>
            <th>{{ $movie->name }}</th>
            <th>{{ $movie->time }}</th>
            <th>{{ $movie->release_date }}</th>
            <th class="text-center">
                @if ($movie->status == config('custom.movie.status.new_release'))
                    <button class="btn btn-primary">New Release</button>
                @elseif ($movie->status == config('custom.movie.status.now_showing'))
                    <button class="btn btn-success">Now Showing</button>
                @else
                    <button class="btn btn-danger">Stop Showing</button>
                @endif
            <th>
                <a href = "{{ route('movie.edit', ['id' => $movie->id]) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a data-id="{{ $movie->id}}" class="delMovie">
                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                </a>
            </th>
        </tr>
        @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($movies)) 
      {{ $movies->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/movie.js') }}"></script>
@endsection