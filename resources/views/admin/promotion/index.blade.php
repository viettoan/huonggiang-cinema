@extends('admin.master')

@section('content-admin')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Manage Promotions</li>
</ol>
<div class="row header-custom">
    <div class="col-md-1">
    <a class="btn btn-primary" href = "{{ route('promotion.create') }}">
      New
    </a>
    </div>
</div>
<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">Cinema</th>
            <th class="text-center ">Title</th>
            <th class="text-center">Start Date</th>
            <th class="text-center">End Date</th>
            <th class="text-center">Sale</th>
            <th class="text-center">Status</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($promotions))
      @foreach ($promotions as $promotion)
        <tr>
            <th class="text-center">{{ $promotion->id }}</th>
            <th>{{ $promotion->cinema->name }}</th>
            <th>{{ $promotion->title }}</th>
            <th>{{ $promotion->start }}</th>
            <th>{{ $promotion->end }}</th>
            <th>{{ $promotion->sale }}</th>
            <th>
                @if ($promotion->status == config('custom.promotion.status.hide'))
                    <button class="btn btn-warning">Hide</button>
                @else
                <button class="btn btn-primary">Show</button>
                @endif
            </th>
            <th>
                <a href = "{{ route('promotion.edit', ['id' => $promotion->id]) }}">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </a>
                <a data-id="{{ $promotion->id}}" class="delPromotion">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
            </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($promotions)) 
      {{ $promotions->links() }}
  @endif
</div>
@endsection
@section('script')
  <script src="{{ asset('js/admin/promotion.js') }}"></script>
@endsection