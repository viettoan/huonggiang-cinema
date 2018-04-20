@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
<link rel='stylesheet' href="{{ asset('bower/jquery-bar-rating/dist/themes/fontawesome-stars.css') }}" type='text/css' />

@endsection
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
                        <table>
                            <tr>
                                <th>
                                    <select id="example">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </th>
                                <th>
                                    <button class="btn btn-rounded btn-success rating-point">3.5</button>
                                </th>
                            </tr>
                        </table>
                        
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
                                @foreach ($movie->movieTypes as $type)
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
        <div class="movie-schedules" id="scheduleTime" data-movie = "{{ $movie->id }}">
            <h3 class="text-center">{{ trans('message.title.schedule') }}</h3>
            <div class="schedule-date row">
            
            </div>
            <hr>
            <div class="cinema-schedule">

            </div>
        </div>
        <div class="film--detail-bottom clearfix">
            <div class="comment--film">
                <h3>{{ trans('message.action.comment') }}</h3>
                <div class="background-fff clearfix">
                    <div class="comment-form">
                        <img class="img-responsive comment-avatar col-md-2" src="{{ asset('images/default-avatar.jpeg') }}">
                        <div class="form-group col-md-10" >
                            <textarea class="form-control" rows="5" id="comment-text"></textarea>
                        </div>
                    </div>
                    <div class="comment-content">
                        <div class="col-md-12 comment-option">
                            <p class="col-md-3"><b>1 bình luận</b></p>
                            <div class="col-md-3 col-md-offset-6 form-group">
                                <div>
                                    <select class="form-control" >
                                        <option>Mới nhất</option>
                                        <option>Cũ nhất</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <ul>
                                <li>
                                    <img class="img-responsive comment-avatar col-md-2" src="{{ asset('images/default-avatar.jpeg') }}">
                                    <div class="form-group col-md-10" >
                                        <p><b>Viet Toan</b></p>
                                        <p>comment</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- film--detail-bottom -->
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars'
      });
   });
</script>
<script src="{{ asset('js/sites/movie.js') }}"></script>
@endsection