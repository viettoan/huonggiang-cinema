@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_movies') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('movie.create') }}">
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
          <th class="text-center ">{{ trans('message.column.movie_poster') }}</th>
          <th class="text-center ">{{ trans('message.column.name') }}</th>
          <th class="text-center ">{{ trans('message.column.time') }}</th>
          <th class="text-center ">{{ trans('message.column.release_date') }}</th>
          <th class="text-center">{{ trans('message.column.status') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($movies))
        @foreach ($movies as $key=>$movie)
        <tr>
            <th class="text-center">{{ (($movies->currentPage()-1)*10)+($key+1) }}</th>
            <th><img class="media-file" src="{{ $movie->media }}"></th>
            <th>{{ $movie->name }}</th>
            <th>{{ $movie->time }}</th>
            <th>{{ $movie->release_date }}</th>
            <th class="text-center">
                @if ($movie->status == config('custom.movie.status.new_release'))
                    <button class="btn btn-primary">{{ trans('message.config.new_release') }}</button>
                @elseif ($movie->status == config('custom.movie.status.now_showing'))
                    <button class="btn btn-success">{{ trans('message.config.now_showing') }}</button>
                @else
                    <button class="btn btn-danger">{{ trans('message.config.stop_showing') }}</button>
                @endif
            <th>
                <a class="booking-cinema" data-movie={{ $movie->id }}>
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <a href = "{{ route('movie.edit', ['id' => $movie->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-movie="{{ $movie->id }}" class="delMovie">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
        @endforeach
    @endif
    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="booking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.title.cinema_schedule') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="booking-movie">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.action.close') }}</button>
            </div>
        </div>
        </div>
    </div>
  @if (isset($movies)) 
      {{ $movies->links() }}
  @endif
</div>

<!-- Modal -->
<div class="modal fade" id="booking_cinema_system" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.title.add_booking_cinema') }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.action.close') }}</button>
        </div>
    </div>
    </div>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/movie.js') }}"></script>
@endsection