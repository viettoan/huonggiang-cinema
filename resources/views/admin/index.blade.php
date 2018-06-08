@extends('admin.master')

@section('content-admin')
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">{{ $user }} {{ trans('message.title.users') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('user.index') }}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">{{ $cinema }} {{ trans('message.title.cinemas') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('cinema.index') }}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">{{ $movie }} {{ trans('message.title.movies') }}</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{ route('movie.index') }}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart</div>
        <div class="card-body">
          <div class="row header-custom">
            <div class="col-md-2">
              <input type="text" placeholder="Year" class="form-control year">
            </div>
            <div class="col-md-3 form-group">
              <select class="quater form-control">
                  <option>Select quater</option>
                  <option value="1">Quater 1</option>
                  <option value="2">Quater 2</option>
                  <option value="3">Quater 3</option>
                  <option value="4">Quater 4</option> 
              </select>
            </div>
            <div class="col-md-1">
              <button class="btn btn-primary view"  type="button">{{ trans('message.action.view') }}</button>
            </div>
          </div>
          <div id="container" style="height: 400px; width: 100%;"></div>
        </div>
      </div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/dashboard.js') }}"></script>
@endsection