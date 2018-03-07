@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_schedules') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('schedule.create') }}">
        {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center ">{{ trans('message.column.cinema') }}</th>
                <th class="text-center ">{{ trans('message.column.movie') }}</th>
                <th class="text-center">{{ trans('message.column.schedule') }}</th>  
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
        @if (isset($cinemaSchedules))
        @foreach ($cinemaSchedules as $cinemaSchedule)
            <tr>
                <th class="text-center">{{ $cinemaSchedule->id }}</th>
                <th class="text-center ">{{ $cinemaSchedule->cinema->name }}</th>
                <th class="text-center ">{{ $cinemaSchedule->movie->name }}</th>
                <th class="text-center">
                    <a class="cinema-schedule" data-movie="{{ $cinemaSchedule->movie_id }}" data-cinema="{{ $cinemaSchedule->cinema_id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </th> 
                <th>
                    <a href = "{{ route('schedule.edit', ['id' => $cinemaSchedule->id]) }}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a data-id="{{ $cinemaSchedule->id}}" class="delCinemaSchedule">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </th>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('message.title.cinema_schedule') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center ">{{ trans('message.column.date') }}</th>
                            <th class="text-center ">{{ trans('message.column.room') }}</th>
                            <th class="text-center">{{ trans('message.column.time') }}</th>  
                            <th class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.action.close') }}</button>
            </div>
        </div>
        </div>
    </div>
  @if (isset($posts)) 
      {{ $posts->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection