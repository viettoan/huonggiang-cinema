@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_times') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('time.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center">{{ trans('message.column.time') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($times))
      @foreach ($times as $key=>$time)
      <tr>
          <th class="text-center">{{ (($times->currentPage()-1)*10)+($key+1) }}</th>
          <th class="text-center">{{ $time->time }}</th>
          <th>
            <a href = "{{ route('time.edit', ['id' => $time->id]) }}">
              <i class="fas fa-edit"></i>
            </a>
            <a data-id="{{ $time->id}}" class="delTime">
              <i class="fas fa-trash-alt"></i>
            </a>
          </th>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($times)) 
      {{ $times->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/time.js') }}"></script>
@endsection