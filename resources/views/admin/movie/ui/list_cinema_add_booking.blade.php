@foreach ($cinemas as $cinema)
    <div class="form-group">
        <label for="exampleInputEmail1">{{ $cinema->name }}</label>
        <input class="form-control add_link_booking_movie" data-cinema="{{ $cinema->id }}" data-movie="{{ $movieId }}" type="text"
            @if (isset($cinema->bookingMovies))
                @foreach ($cinema->bookingMovies as $key => $bookingMovie)
                    @if ($key == 0)
                    value="{{ $bookingMovie->link }}"
                    @endif
                @endforeach
            @endif
            placeholder="Add booking link to {{ $cinema->name }}">
    </div>
@endforeach