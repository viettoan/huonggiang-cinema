@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Cinema</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('cinema.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">Banner</th>
          <th class="text-center ">Name</th>
          <th class="text-center ">Address</th>
          <th class="text-center">Description</th>
          <th class="text-center">Status</th>
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
          <th>{{ $cinema->description }}</th>
          <th>
            @if ($cinema->status == config('custom.cinema.status.active'))
                <button class="btn btn-primary">Active</button>
            @else
              <button class="btn btn-danger">Block</button>
            @endif
          <th>
            <a href = "{{ route('cinema.edit', ['id' => $cinema->id]) }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
  <script src="{{ asset('js/admin/cinema.js') }}"></script>
@endsection