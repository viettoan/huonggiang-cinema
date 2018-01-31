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
          <th class="text-center ">Time</th>
          <th class="text-center">Description</th>
          <th class="text-center">Status</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/cinema.js') }}"></script>
@endsection