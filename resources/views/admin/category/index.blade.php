@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <td>ID</td>
      <td>Avatar</td>
      <td>Name</td>
      <td>Email</td>
    </thead>
  </table>
</div>
      
@endsection