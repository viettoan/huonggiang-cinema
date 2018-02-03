@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Media</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('media.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
      <tr>
          <th class="text-center">#</th>
          <th class="text-center ">File</th>
          <th class="text-center">Description</th>
          <th class="text-center">Status</th>
          <th class="text-center">Type</th>
          <th class="text-center"></th>
      </tr>
    </thead>
    <tbody>
    @if (isset($media))
      @foreach ($media as $m)
      <tr>
          <th class="text-center">{{ $m->id }}</th>
          <th><img class="img-responsive media-file" src="{{ $m->path }}"></th>
          <th>{{ $m->description }}</th>
          <th class="text-center">
            @if ($m->status == config('custom.media.status.show'))
                <button class="btn btn-primary">Show</button>
            @else
            <button class="btn btn-warning">Hide</button>
            @endif
          </th>
          <th class="text-center">
            @if (config('custom.media.type') != null)
                @foreach(config('custom.media.type') as $key => $type)
                    @if($m->type == $type)
                    <button class="btn btn-primary">{{ $key }}</button>
                    @endif
                @endforeach
            @endif
          </th>
          <th>
            <a href = "{{ route('media.edit', ['id' => $m->id]) }}">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
            <a data-id="{{ $m->id}}" class="delMedia">
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
  <script src="{{ asset('js/admin/media.js') }}"></script>
@endsection