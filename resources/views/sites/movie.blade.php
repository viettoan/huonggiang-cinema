@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="film--wrapper">
    <div class="container">
        <div class="film--detail-title">
            <h3><a href="{{ route('index') }}">Trang chủ</a></h3>
            <h3 class="active">|
                <a href="" rel="tag">
                @if ($movie->status == config('custom.movie.status.new_release'))
                    <button class="btn btn-primary">New Release</button>
                @elseif ($movie->status == config('custom.movie.status.now_showing'))
                    <button class="btn btn-success">Now Showing</button>
                @else
                    <button class="btn btn-danger">Stop Showing</button>
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
                            <span class="col-left">Đạo diễn</span>
                            <span class="col-right">{{ $movie->directors }}</span>
                        </li>
                        <li>
                            <span class="col-left">Diễn viên</span>
                            <span class="col-right">{{ $movie->actors }}</span>
                        </li>
                        <li>
                            <span class="col-left">Thể loại</span>
                            <span class="col-right">
                                @foreach ($movieTypes as $type)
                                    {{ $type->type->name }}
                                @endforeach
                            </span>
                        </li>
                        <li>
                            <span class="col-left">Khởi chiếu</span>
                            <span class="col-right">{{ $movie->release_date }}</span>
                        </li>
                        <li>
                            <span class="col-left">Thời lượng</span>
                            <span class="col-right">{{ $movie->time }}</span>
                        </li>
                    </ul>
                    <div class="button--green">
                        <a class="btn--green bhd-trailer" href="https://www.youtube.com/watch?v=CAP97QEQAJA">XEM TRAILER</a>
                    </div>
                    <div class="button--share">
                        <a href="javascript:fbShare('index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--fb-share"><i class="fa fa-facebook"></i> Chia sẻ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="film--detail-bottom clearfix">
            <div class="comment--film">
                <h3>BÌNH LUẬN</h3>
                <div class="background-fff">
                    <div class="fb-comments" data-href="http://www.bhdstar.vn/movies/798muoi/" data-width="100%" data-numposts="5"></div>
                </div>
            </div>
        </div><!-- film--detail-bottom -->
    </div>
</div>
@endsection