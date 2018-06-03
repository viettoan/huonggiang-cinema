@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_trailers') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('trailer.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.movie') }}</th>
            <th class="text-center ">{{ trans('message.column.code') }}</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($trailers))
      @foreach ($trailers as $key=>$trailer)
        <tr>
            <th class="text-center">{{ $key+1 }}</th>
            <th>{{ $trailer->movie->name }}</th>
            <th>{!! $trailer->embedded_code !!}</th>
                        
            <th>
                <a href = "{{ route('trailer.edit', ['id' => $trailer->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $trailer->id}}" class="delTrailer">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($trailers)) 
      {{ $trailers->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/trailer.js') }}"></script>
@endsection