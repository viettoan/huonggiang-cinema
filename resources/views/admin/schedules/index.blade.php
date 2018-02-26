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
            <th class="text-center"></th> 
            <th>
                <a href = "{{ route('schedule.edit', ['id' => $cinemaSchedule->id]) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a data-id="{{ $cinemaSchedule->id}}" class="delCinemaSchedule">
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