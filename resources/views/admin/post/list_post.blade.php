<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center ">{{ trans('message.column.title') }}</th>
            <th class="text-center ">{{ trans('message.column.description') }}</th>
            <th class="text-center">{{ trans('message.column.status') }}</th>
            <th class="text-center"></th>
        </tr>
    </thead>
    <tbody>
    @if (isset($posts))
      @foreach ($posts as $post)
        <tr>
            <th class="text-center">{{ $post->id }}</th>
            <th>{{ $post->title }}</th>
            <th>{{ $post->description }}</th>
            <th class="text-center">
                @if ($post->status == config('custom.post.status.hide'))
                    <button class="btn btn-warning">{{ trans('message.config.hide') }}</button>
                @else
                <button class="btn btn-primary">{{ trans('message.config.show') }}</button>
                @endif
            </th> 
            <th>
                <a href = "{{ route('post.edit', ['id' => $post->id]) }}">
                    <i class="fas fa-edit"></i>
                </a>
                <a data-id="{{ $post->id}}" class="delPost">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </th>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  @if (isset($posts)) 
      {{ $posts->links() }}
  @endif