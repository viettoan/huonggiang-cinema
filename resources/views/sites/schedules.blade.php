@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="showtimes section--product-view">
        <ul>
            <li class="product--title">
                <h3 class="js__tab js__active" data-target="#movies-schedule">{{ trans('message.title.schedule') }}</h3>
                <h3 class="js__tab" data-target="#cinemas-schedule">{{ trans('message.title.cinema_schedule') }}</h3>
            </li>
            <li id="movies-schedule" class="list--film js__tab_content js__active">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__list_film_slider">
                        <ul class="slides bhd-lich-chieu-chon-phim">
                        @if (isset($movies))
                            @foreach($movies as $movie)
                                <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                    <div class="film--item">
                                        <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">{{ trans('message.trailer') }}</a>
                                        <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                        <a href="">
                                            <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
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
            <li id="cinemas-schedule" class="list--film js__tab_content">
                <div class="scroll--wrapper ">
                <div class="flexslider">
                    <ul class="list--news row js__isotope">
                        @if (isset($cinemas))
                            @foreach($cinemas as $cinema)
                            <li class="col-md-3 col-sm-6 col-xs-12 js__isotope_item">
                                <div class="news--item">
                                    <a href="../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html"> <img width="247" height="330" src="../wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-247x330.jpg" class="attachment-news-thumb size-news-thumb wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-247x330.jpg 247w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-245x327.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-184x245.jpg 184w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-470x627.jpg 470w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-77x103.jpg 77w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-268x357.jpg 268w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01.jpg 1313w" sizes="(max-width: 247px) 100vw, 247px" /></a>
                                    <a class="news-title" href="../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html">{{ $cinema->name }}</a>
                                    <span>299.011 Thích</span>
                                    <a href="javascript:fbShare('../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--share">{{ trans('message.action.share') }}</a>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>    
                </div>
            </li>
        </ul>
    </div><!-- .section- -product-view -->
</div>
@endsection