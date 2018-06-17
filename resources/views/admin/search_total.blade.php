<li class="list-brand">
    <b>{{ trans('message.title.users') }}</b>
    <ul class="list-group">
        @foreach($users as $user)
            <li>
                <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                <table>
                    <tr>
                        <td><img src="{{ $user->avatar }}" class="img-responsive img-search"></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                </table>
                </a>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.posts') }}</b>
    <ul class="list-group">
        @foreach($posts as $post)
            <li>
                <a  href="{{ route('post.edit', ['id' => $post->id]) }}">
                    <table>
                        <tr>
                            <td><img src="{{ $post->media }}" class="img-responsive img-search"></td>
                            <td>{{ $post->title }}</td>
                        </tr>
                    </table>
                </a>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.movies') }}</b>
    <ul class="list-group">
        @foreach($movies as $movie)
            <li>
                <a href="{{ route('movie.edit', ['id' => $movie->id]) }}">
                    <table>
                        <tr>
                            <td><img src="{{ $movie->media }}" class="img-responsive img-search"></td>
                            <td>{{ $movie->name }}</td>
                        </tr>
                    </table>
                </a>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.cinemas') }}</b>
    <ul class="list-group">
        @foreach($cinemas as $cinema)
            <li>
                <a href="{{ route('cinema.edit', ['id' => $cinema->id]) }}">
                    <table>
                        <tr>
                            <td><img src="{{ $cinema->media }}" class="img-responsive img-search"></td>
                            <td>{{ $cinema->name }}</td>
                        </tr>
                    </table>
                </a>
            </li>
        @endforeach
    </ul>
</li>