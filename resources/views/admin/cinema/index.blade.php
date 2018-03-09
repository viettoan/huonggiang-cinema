@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_cinemas') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('cinema.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">{{ trans('message.column.banner') }}</th>
          <th class="text-center ">{{ trans('message.column.name') }}</th>
          <th class="text-center ">{{ trans('message.column.address') }}</th>
          <th class="text-center">{{ trans('message.column.city') }}</th>
          <th class="text-center">{{ trans('message.column.cinema_system') }}</th>
          <th class="text-center">{{ trans('message.column.status') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($cinemas))
      @foreach ($cinemas as $cinema)
      <tr>
          <th class="text-center">{{ $cinema->id }}</th>
          <th><img class="img-responsive media-file" src="{{ $cinema->media->path }}"></th>
          <th>{{ $cinema->name }}</th>
          <th>{{ $cinema->address }}</th>
          <th>{{ $cinema->city->name }}</th>
          <th>{{ $cinema->cinemaSystem->name }}</th>
          <th>
            @if ($cinema->status == config('custom.cinema.status.active'))
                <button class="btn btn-primary">{{ trans('message.config.active') }}</button>
            @else
              <button class="btn btn-danger">{{ trans('message.config.block') }}</button>
            @endif
          <th>
            <a href = "{{ route('cinema.edit', ['id' => $cinema->id]) }}">
              <i class="fas fa-edit"></i>
            </a>
          </th>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($cinemas)) 
      {{ $cinemas->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/cinema.js') }}"></script>
@endsection