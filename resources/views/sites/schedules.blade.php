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
    #scheduleTime {
        z-index: 99999999999 !important;
    }

    .date {
        width: 90px;
        border: 2px solid #222;
    }
    .btn-rounded strong {
        font-size: 24px;
        margin-left: -10px;
    }
    .btn-rounded > div {
        padding-left:5px;
    }

    .schedule-time {
        margin-bottom: 30px;
    }

    .schedule-time img{
        width: 165px;
        height: 245px;
        margin-left: 20px;
    }
    .schedule-time .times button{
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .schedule-time .times button:hover{
        background-color: #449d44;
        color: #fff;
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
                            <li class="post-848 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ha-noi" id="rap-0000000007" data-toggle="modal" data-target="#scheduleTime" >
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
    <div class="section--promotion">
	</div>
    <!-- Modal -->
<div class="modal fade" id="scheduleTime" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">{{ trans('message.title.cinema_schedule') }}</h4>
      </div>
      <div class="modal-body ">
        <div class="schedule-date row">
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
            <div class="col-md-2 text-center">
                <a class="btn btn-rounded btn btn-icon btn-success date active text-center">
                    <div class="col-md-6">
                        <span>03</span><br>
                        <small>Thu</small>
                    </div>
                    <strong class="col-md-6">15</strong>
                </a>
            </div>
        </div>
        <hr>
        <div>
            <div class="schedule-time row">
                <div class="col-md-3">
                    <img src="http://www.bhdstar.vn/wp-content/uploads/2018/03/BHD-Star-Tomb-Rider-470x700-poster.jpg-2-165x245.jpg">
                </div>
                <div class="col-md-9">
                    <h4>TOMB RAIDER: HUYỀN THOẠI BẮT ĐẦU</h4>
                    <div class="times">
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                    </div>
                </div>
            </div>
            <div class="schedule-time row">
                <div class="col-md-3">
                    <img src="http://www.bhdstar.vn/wp-content/uploads/2018/03/BHD-Star-Tomb-Rider-470x700-poster.jpg-2-165x245.jpg">
                </div>
                <div class="col-md-9">
                    <h4>TOMB RAIDER: HUYỀN THOẠI BẮT ĐẦU</h4>
                    <div class="times">
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                    </div>
                </div>
            </div>
            <div class="schedule-time row">
                <div class="col-md-3">
                    <img src="http://www.bhdstar.vn/wp-content/uploads/2018/03/BHD-Star-Tomb-Rider-470x700-poster.jpg-2-165x245.jpg">
                </div>
                <div class="col-md-9">
                    <h4>TOMB RAIDER: HUYỀN THOẠI BẮT ĐẦU</h4>
                    <div class="times">
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                    </div>
                </div>
            </div>
            <div class="schedule-time row">
                <div class="col-md-3">
                    <img src="http://www.bhdstar.vn/wp-content/uploads/2018/03/BHD-Star-Tomb-Rider-470x700-poster.jpg-2-165x245.jpg">
                </div>
                <div class="col-md-9">
                    <h4>TOMB RAIDER: HUYỀN THOẠI BẮT ĐẦU</h4>
                    <div class="times">
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                        <button class="btn col-md-2 btn-default">14:00</button>
                    </div>
                </div>
            </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/sites/schedule.js') }}"></script>
<script>

</script>
@endsection