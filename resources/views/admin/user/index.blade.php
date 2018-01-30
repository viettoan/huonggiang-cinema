@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Users</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('user.create') }}">
      New
    </a>
    </div>
    <div class="col-md-5"><input type="text" name="search" id="search" placeholder="Search ..." class="form-control"></div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">Avatar</th>
          <th class="text-center">Name</th>
          <th class="text-center">Email</th>
          <th class="text-center">Role</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($users))
      @foreach ($users as $user)
      <tr>
          <th class="text-center">{{ $user->id }}</th>
          <th class="user-column"><img class="img-responsive avatar-user" src="{{ $user->avatar }}"></th>
          <th>{{ $user->name }}</th>
          <th>{{ $user->email }}</th>
          <th>{{ $user->role }}</th>
          <th>
            <a data-toggle="modal" data-target="#editUser">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a data-toggle="modal">
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