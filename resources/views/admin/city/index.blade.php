@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_cities') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('city.create') }}">
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
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($cities))
      @foreach ($cities as $city)
        <tr>
            <th class="text-center">{{ $city->id }}</th>
            <th>{{ $city->name }}</th>
            <th>
                <a href = "{{ route('city.edit', ['id' => $city->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $city->id}}" class="delPost">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($cities)) 
      {{ $cities->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/city.js') }}"></script>
@endsection