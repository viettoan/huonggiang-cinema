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
    <a class="btn btn-primary" href = "{{ route('category.create') }}">
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
          <th class="text-center">Parent</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($categories))
      @foreach ($categories as $category)
      <tr>
          <th class="text-center">{{ $category->id }}</th>
          <th>{{ $category->name }}</th>
          <th>{{ $category->description }}</th>
          <th>
          @if ($category->parentCategories != null)
            {{ $category->parentCategories->name }}
          @endif
          </th>
          <th>
            <a href = "{{ route('category.edit', ['id' => $category->id]) }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a data-id="{{ $category->id}}" class="delCategory">
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
  <script src="{{ asset('js/admin/category.js') }}"></script>
@endsection