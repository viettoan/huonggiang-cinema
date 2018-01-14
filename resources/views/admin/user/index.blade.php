@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <button class="btn btn-primary" data-toggle="modal" data-target="#createUser">
      New
    </button>
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
      <tr>
          <th class="text-center">1</th>
          <th class="user-column"><img class="img-responsive avatar-user" src="{{ asset('images/default-avatar.jpeg') }}"></th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>
            <a data-toggle="modal" data-target="#editUser">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a data-toggle="modal">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
          </th>
      </tr>
    </tbody>
  </table>
</div>

<!-- create new user -->
@include('admin.user.create')
<!-- edit user -->
@include('admin.user.edit')
@endsection