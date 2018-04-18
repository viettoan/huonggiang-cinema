@extends('layouts.app')

@section('content')
@include('layouts.slider')
<div class="index">
    <div class="section--product-view">
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
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.action.share') }}</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="{{ route('movie', ['id' => $movie->id]) }}">
                                                <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
                                            <a href="{{ route('movie', ['id' => $movie->id]) }}"><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
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
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.action.share') }}</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="{{ route('movie', ['id' => $movie->id]) }}">
                                                <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>        </a>
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
    @include('layouts.hot-news')
    @include('layouts.member')
    @include('layouts.promotion')
    </div>
</div>
@endsection