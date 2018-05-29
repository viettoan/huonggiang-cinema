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
     <div class="col-md-5">
      <input type="text" name="search" placeholder="Search ..." class="form-control search">
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th class="text-center ">{{ trans('message.column.cinema') }}</th>
                <th class="text-center ">{{ trans('message.column.movie') }}</th>
                <th class="text-center">{{ trans('message.column.schedule') }}</th>  
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
        @if (isset($schedules))
        @foreach ($schedules as $schedule)
            <tr>
                <th class="text-center ">{{ $schedule->cinema->name }}</th>
                <th class="text-center ">{{ $schedule->movie->name }}</th>
                <th class="text-center">
                    <a class="cinema-schedule" data-movie="{{ $schedule->movie_id }}" data-cinema="{{ $schedule->cinema_id }}">
                        <i class="fas fa-edit"></i>
                    </a>
                </th> 
                <th>
                    <a data-id="{{ $schedule->id}}" class="delSchedule">
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
                <div class="admin-schedule">
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('message.action.close') }}</button>
            </div>
        </div>
        </div>
    </div>
  @if (isset($schedules)) 
      {{ $schedules->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/schedule.js') }}"></script>
@endsection