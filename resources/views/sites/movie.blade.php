@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="film--wrapper">
    <div class="container">
        <div class="film--detail-title">
            <h3><a href="{{ route('index') }}">{{ trans('message.title.home') }}</a></h3>
            <h3 class="active">|
                <a href="" rel="tag">
                @if ($movie->status == config('custom.movie.status.new_release'))
                    <button class="btn btn-primary">{{ trans('message.config.new_release') }}</button>
                @elseif ($movie->status == config('custom.movie.status.now_showing'))
                    <button class="btn btn-success">{{ trans('message.config.now_showing') }}</button>
                @else
                    <button class="btn btn-danger">{{ trans('message.config.stop_showing') }}</button>
                @endif
                </a>
            </h3>
        </div>
        <div class="film--detail-content-top clearfix">
            <div class="row">
                <div class="col-thubnail-bhd col-md-5">
                    <a href="#"><img width="470" height="700" src="{{ $movie->media->path }}" class="product--img wp-post-image" alt=""/></a>
                </div>
                <div class="product--view col-md-7">
                    <div class="product--name">
                        <h3>{{ $movie->name }}</h3>
                    </div>
                    <div class="film--tech">
                    </div>
                    <div class="film--detail">
                        <p>{{ $movie->description }}</p>
                    </div>
                    <span>
                    <ul class="film--info">
                        <li>
                            <span class="col-left">{{ trans('message.column.directors') }}</span>
                            <span class="col-right">{{ $movie->directors }}</span>
                        </li>
                        <li>
                            <span class="col-left">{{ trans('message.column.actors') }}</span>
                            <span class="col-right">{{ $movie->actors }}</span>
                        </li>
                        <li>
                            <span class="col-left">{{ trans('message.column.type') }}</span>
                            <span class="col-right">
                                @foreach ($movieTypes as $type)
                                    {{ $type->type->name }}
                                @endforeach
                            </span>
                        </li>
                        <li>
                            <span class="col-left">{{ trans('message.column.release_date') }}</span>
                            <span class="col-right">{{ $movie->release_date }}</span>
                        </li>
                        <li>
                            <span class="col-left">{{ trans('message.column.time') }}</span>
                            <span class="col-right">{{ $movie->time }}</span>
                        </li>
                    </ul>
                    <div class="button--green">
                        <a class="btn--green bhd-trailer" href="https://www.youtube.com/watch?v=CAP97QEQAJA">{{ trans('message.trailer') }}</a>
                    </div>
                    <div class="button--share">
                        <a href="javascript:fbShare('index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--fb-share"><i class="fa fa-facebook"></i>{{ trans('message.action.share') }}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="movie-schedules">
            <h3 class="text-center">{{ trans('message.title.schedule') }}</h3>
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
        <div class="film--detail-bottom clearfix">
            <div class="comment--film">
                <h3>{{ trans('message.action.comment') }}</h3>
                <div class="background-fff">
                    <div class="fb-comments" data-href="http://www.bhdstar.vn/movies/798muoi/" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
        </div><!-- film--detail-bottom -->
    </div>
</div>
@endsection