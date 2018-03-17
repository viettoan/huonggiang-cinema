@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--wrapper">
    <div class="container">
        <h1 class="about--us-title">{{ trans('message.title.cinema_system') }}</h1>
        <div class="about--us-content col-md-8">
            <h3 class="content--title">{{ $cinema->name }}</h3>
            <div class="text--content">
                {{ $cinema->description }}
            </div>
            <div class="tag--list">
                <i class="fa fa-tags"></i>
            </div>
            <div class="button--share">
                <a href="javascript:fbShare('index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--fb-share"><i class="fa fa-facebook"></i>{{ trans('message.action.share') }}</a>
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
            <div class="comment">
                <h3>{{ trans('message.action.comment') }}</h3>
                <div class="fb-comments" data-href="http://www.bhdstar.vn/cinemas/bhd-star-bitexco/" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
        <div class="about--us-sidebar col-md-4">
            <ul class="list-cinema">
                <li>
                    <a class="item--cinema" href="../bhd-star-vincom-pham-ngoc-thach/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>PHẠM NGỌC THẠCH &#8211; HÀ NỘI</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="../bhd-star-vincom-le-van-viet/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR LÊ VĂN VIỆT</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="../bhd-star-vincom-thao-dien/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR THẢO ĐIỀN</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="../bhd-star-vincom-quang-trung/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR QUANG TRUNG</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="../bhd-star-pham-hung/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR PHẠM HÙNG</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR BITEXCO</span>
                    </a>
                </li>
                <li>
                    <a class="item--cinema" href="../bhd-star-maximark-32/index.html">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>BHD STAR 3/2</span>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>
@include('layouts.promotion')
@endsection