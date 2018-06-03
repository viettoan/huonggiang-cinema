@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">{{ trans('message.title.manage_technologies') }}</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('technology.create') }}">
    {{ trans('message.action.new') }}
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.name') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($technologies))
      @foreach ($technologies as $key=>$technology)
        <tr>
            <th class="text-center">{{ $key+1 }}</th>
            <th>{{ $technology->name }}</th>
            <th>{{ $technology->description }}</th>
                        
            <th>
                <a href = "{{ route('technology.edit', ['id' => $technology->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $technology->id}}" class="delTechnology">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($technologies)) 
      {{ $technologies->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/technology.js') }}"></script>
@endsection