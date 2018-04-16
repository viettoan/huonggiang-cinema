@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_cinema_systems') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('cinema_system.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">{{ trans('message.column.name') }}</th>
          <th class="text-center ">{{ trans('message.column.description') }}</th>
          <th class="text-center ">{{ trans('message.column.status') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($cinemaSystems))
      @foreach ($cinemaSystems as $cinemaSystem)
      <tr>
          <th class="text-center">{{ $cinemaSystem->id }}</th>
          <th>{{ $cinemaSystem->name }}</th>
          <th>{{ $cinemaSystem->description }}</th>
          <th>
            @if ($cinemaSystem->status == config('custom.cinema_system.status.active'))
                <button class="btn btn-primary">{{ trans('message.config.active') }}</button>
            @else
              <button class="btn btn-danger">{{ trans('message.config.block') }}</button>
            @endif
          <th>
            <a href = "{{ route('cinema_system.edit', ['id' => $cinemaSystem->id]) }}">
              <i class="fas fa-edit"></i>
            </a>
          </th>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/cinema_system.js') }}"></script>
@endsection