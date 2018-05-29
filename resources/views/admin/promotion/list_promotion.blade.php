<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.cinema') }}</th>
            <th class="text-center ">{{ trans('message.column.title') }}</th>
            <th class="text-center">{{ trans('message.column.start_date') }}</th>
            <th class="text-center">{{ trans('message.column.end_date') }}</th>
            <th class="text-center">{{ trans('message.column.sale') }}</th>
            <th class="text-center">{{ trans('message.column.status') }}</th>
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
                    <button class="btn btn-warning">{{ trans('message.config.hide') }}</button>
                @else
                <button class="btn btn-primary">{{ trans('message.config.show') }}</button>
                @endif
            </th>
            <th>
                <a href = "{{ route('promotion.edit', ['id' => $promotion->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $promotion->id}}" class="delPromotion">
                    <i class="fas fa-trash-alt"></i>
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
