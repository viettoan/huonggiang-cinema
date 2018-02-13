@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="section--promotion">
    <h1 class="title"><strong class="js__active js__promotion_tab" data-target="#promotion-1"><span data-text="Khuyến mãi">Khuyến mãi</span></strong> <span data-text="|">|</span> <strong data-target="#promotion-2" class="js__promotion_tab"><span data-text="Sự kiện">Sự kiện</span></strong></h1>
    <div class="container">
        <div id="promotion-1" class="flexslider js__flexslider_promotion js__promotion_tab_content js__active">
            <ul class="slides">
                @if (isset($promotions))
                    @foreach ($promotions as $promotion)
                        <li><a href="{{ route('promotion', ['id' => $promotion->id]) }}"><img src="{{ $promotion->media->path }}" alt="" /></a></li>
                    @endforeach
                @endif
            </ul>
        </div>

        <div id="promotion-2" class="flexslider js__flexslider_promotion js__promotion_tab_content">
            <ul class="slides">
            @if (isset($events))
                @foreach ($events as $event)
                    <li><a href="{{ route('post', ['id' => $event->id]) }}"><img src="{{ $event->media->path }}" alt="" /></a></li>
                @endforeach
            @endif
            </ul>
        </div>
    </div>
    </div>

    <div class="section--product-view news-product-view">
        <ul>
            <li class="product--title">
                <h3 class="js__tab js__active" data-target="#film-1">PHIM ĐANG CHIẾU</h3>
                <h3 class="js__tab" data-target="#film-2">PHIM SẮP CHIẾU</h3>
                <h3 class="js__tab" data-target="#film-3">VÉ BÁN TRƯỚC</h3>
            </li>
            <li id="film-1" class="list--film js__tab_content js__active">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__film_slider">
                        <ul class="slides">
                            @if (isset($nowShowing))
                                @foreach($nowShowing as $movie)
                                    <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <div class="film--item">
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">Trailer</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="">
                                                <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
                                            <a href=""><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
                                        <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>MUA VÉ</a>
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
                                            <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">Trailer</a>
                                            <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                            <a href="">
                                                <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""/>        </a>
                                            <a href=""><span class="movie--name">{{ $movie->name }}</span></a>
                                        </div>
                                        <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>MUA VÉ</a>
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