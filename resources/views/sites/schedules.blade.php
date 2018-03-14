@extends('layouts.app')
@section('css')
<style>
    .list-option {
        background: #151f28;
        color:#fff;
        float:left;
        font-size: 20px;
        box-shadow: 3px 5px 21px 0px rgba(5, 12, 17, 1);
        margin-left: 15px;
        margin-bottom: 15px;
        padding: 10px;
    }

    .list-cinema {
        width:400px;
    }
    .list-city {
        width:300px;
    }
</style>
@endsection
@section('content')
<div class="warper-content">
        <div class="showtimes showtimes-2 section--product-view">
		<div class="container">
			<ul>
				<li class="product--title">
					<h3><a class="js__tab js__active" data-target="#movie-schedule">LỊCH CHIẾU THEO PHIM</a></h3>
					<span>|</span>
					<h3 class="js__tab" data-target="#cinema-schedule">LỊCH CHIẾU THEO RẠP</h3>
				</li>
                <li class="list--film js__tab_content js__active" id="movie-schedule">
					<div class="scroll--wrapper js__film">
						<div class="flexslider  js__list_film_slider">
							<ul class="slides bhd-lich-chieu-chon-phim">
                                @if (isset($movies))
                                    @foreach($movies as $movie)
                                        <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                            <div class="film--item">
                                                <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.share') }}</a>
                                                <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                                <a href="{{ route('movie', ['id' => $movie->id]) }}">
                                                    <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
                                                <a href="{{ route('movie', ['id' => $movie->id]) }}"><span class="movie--name">{{ $movie->name }}</span></a>
                                            </div>
                                            <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>{{ trans('message.action.buy_ticket') }}</a>
                                        </li>
                                    @endforeach
                                @endif
							</ul>
						</div>
					</div>
				</li>

                <li class="list--film js__tab_content" id="cinema-schedule">
                    <select class="list-option list-cinema clearfix" style="">
                        <option>CGV</option>
                        <option>Lotte</option>
                    </select>
                    <select class="list-option list-city clearfix" style="">
                        <option>Hà Nội</option>
                        <option>Thái Bình</option>
                    </select>
                    <div class="clearfix"></div>
                    <ul class="list--info clearfix bhd-lich-chieu-chon-rap">
                        @if (isset($cinemas))
                            @foreach($cinemas as $cinema)
                            <li class="post-848 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ha-noi" id="rap-0000000007" >
                                <div class="info">
                                    <div class="inside" data-id="0000000007">
                                        <h4 class="title">{{ $cinema->name }}</h4>
                                        <p>{{ $cinema->address }}</p>
                                    </div>
                                    <a href="{{ $cinema->location }}" target="_blank" class="btn--location"><i class="fa fa-map-marker"></i>{{ trans('message.action.view_location') }}</a>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
			</ul>
			
		</div><!-- .container -->
	</div><!-- .section- -product-view -->
    @include('layouts.promotion')
</div>
@endsection