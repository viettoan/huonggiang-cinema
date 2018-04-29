@if (isset($comments))
    @foreach ($comments as $comment)
    <li>
        <img class="img-responsive comment-avatar col-md-2" src="{{ $comment->user->avatar }}">
        <div class="form-group col-md-10" >
            <p><b>{{ $comment->user->name }}</b></p>
            <p>{{ $comment->content }}</p>
        </div>
    </li>
    @endforeach
@endif