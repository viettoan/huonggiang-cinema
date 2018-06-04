@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="page--news cinema--background">
        <div class="container">
            @if (isset($cinemaSystems))
                @foreach ($cinemaSystems as $cinemaSystem)
                <h1 class="about--us-title-title">{{ $cinemaSystem->name }}</h1><hr>
                <div>
                    <ul class="list--news row js__isotope">
                        @foreach ($cinemaSystem->cinemas as $cinema)
                            <li class="col-md-3 col-sm-6 col-xs-12 js__isotope_item">
                            <div class="news--item">
                                    <a href="{{ route('cinema', ['id' => $cinema->id]) }}">
                                        <img width="247" height="330" src="{{ $cinema->media }}" class="attachment-news-thumb size-news-thumb wp-post-image" alt="" sizes="(max-width: 247px) 100vw, 247px" />
                                    </a>
                                    <a class="news-title" href="{{ route('cinema', ['id' => $cinema->id]) }}">{{ $cinema->name }}</a>
                                    <span>299.011 Thích</span>
                                    <a href="javascript:fbShare('{{ route('cinema', ['id' => $cinema->id]) }}', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--share">{{ trans('message.action.share') }}</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            @endif
        </div><!-- .container -->
    </div><!-- .section- -product-view -->

    <div class="section--product-view news-product-view">
        <ul>
            <li class="product--title">
                <h3 class="js__tab js__active" data-target="#film-1">{{ trans('message.config.now_showing') }}</h3>
                <h3 class="js__tab" data-target="#film-2">{{ trans('message.config.new_release') }}</h3>
                <h3 class="js__tab" data-target="#film-3">{{ trans('message.config.sneak_show') }}</h3>
            </li>
            <li id="film-1" class="list--film js__tab_content js__active">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__film_slider">
                        <ul class="slides">
                            @if (isset($nowShowing))
                                @foreach($nowShowing as $movie)
                                    <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <div class="film--item">
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.trailer') }}</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="">
                                                <img width="245" height="365" src="{{ $movie->media }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
                                            <a href=""><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
                                        <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>{{ trans('message.action.buy_ticket') }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </li>
            <li id="film-2" class="list--film js__tab_content">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__film_slider">
                        <ul class="slides">
                            @if (isset($newRelease))
                                @foreach($newRelease as $movie)
                                    <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <div class="film--item">
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.trailer') }}</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="">
                                                <img width="245" height="365" src="{{ $movie->media }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>        </a>
                                            <a href=""><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
                                        <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>{{ trans('message.action.buy_ticket') }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </li>
            <li id="film-3" class="list--film js__tab_content">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__film_slider">
                        <ul class="slides">
                            @if (isset($sneakShow))
                                @foreach($sneakShow as $movie)
                                    <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <div class="film--item">
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.action.share') }}</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="{{ route('movie', ['id' => $movie->id]) }}">
                                                <img width="245" height="365" src="{{ $movie->media }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>        </a>
                                            <a href="{{ route('movie', ['id' => $movie->id]) }}"><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </li>
        </ul>  
    </div>
</div>
@endsection