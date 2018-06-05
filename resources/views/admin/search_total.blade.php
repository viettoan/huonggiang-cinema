<li class="list-brand">
    <b>{{ trans('message.title.users') }}</b>
    <ul class="list-group">
        <li></li>
        @foreach($users as $user)
            <li>
                <table>
                    <tr>
                        <td><img src="{{ $user->avatar }}" class="img-responsive img-search"></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                </table>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.posts') }}</b>
    <ul class="list-group">
        <li></li>
        @foreach($posts as $post)
            <li>
                <table>
                    <tr>
                        <td><img src="{{ $post->media }}" class="img-responsive img-search"></td>
                        <td>{{ $post->title }}</td>
                    </tr>
                </table>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.movies') }}</b>
    <ul class="list-group">
        <li></li>
        @foreach($movies as $movie)
            <li>
                <table>
                    <tr>
                        <td><img src="{{ $movie->media }}" class="img-responsive img-search"></td>
                        <td>{{ $movie->name }}</td>
                    </tr>
                </table>
            </li>
        @endforeach
    </ul>
</li>
<li class="list-brand">
    <b>{{ trans('message.title.cinemas') }}</b>
    <ul class="list-group">
        <li></li>
        @foreach($cinemas as $cinema)
            <li>
                <table>
                    <tr>
                        <td><img src="{{ $cinema->media }}" class="img-responsive img-search"></td>
                        <td>{{ $cinema->name }}</td>
                    </tr>
                </table>
            </li>
        @endforeach
    </ul>
</li>