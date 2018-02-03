@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Categories</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('type.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center">Name</th>
          <th class="text-center">Description</th>
          <th class="text-center">Type</th>
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
          <th class="text-center">
            @if (config('custom.types.type') != null)
                @foreach(config('custom.types.type') as $key => $value)
                    @if($type->type == $value)
                    <button class="btn btn-primary">{{ $key }}</button>
                    @endif
                @endforeach
            @endif
          </th>
          <th>
            <a href = "{{ route('type.edit', ['id' => $type->id]) }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a data-id="{{ $type->id}}" class="delType">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
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
  <script src="{{ asset('js/admin/type.js') }}"></script>
@endsection