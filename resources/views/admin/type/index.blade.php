@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_types') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('type.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center">{{ trans('message.column.name') }}</th>
          <th class="text-center">{{ trans('message.column.description') }}</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($types))
      @foreach ($types as $type)
      <tr>
          <th class="text-center">{{ $type->id }}</th>
          <th>{{ $type->name }}</th>
          <th>{{ $type->description }}</th>
          <th>
            <a href = "{{ route('type.edit', ['id' => $type->id]) }}">
              <i class="fas fa-edit"></i>
            </a>
            <a data-id="{{ $type->id}}" class="delType">
              <i class="fas fa-trash-alt"></i>
            </a>
          </th>
      </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($types)) 
      {{ $types->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/type.js') }}"></script>
@endsection