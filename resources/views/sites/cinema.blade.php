@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--wrapper">
    <div class="container">
        <h1 class="about--us-title">{{ trans('message.title.cinema_systems') }}</h1>
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
            <div class="movie-schedules" id="scheduleTime" data-cinema="{{ $cinema->id }}">
                <h3 class="text-center">{{ trans('message.title.schedule') }}</h3>
                <div class="schedule-date row">
                    
                </div>
                <hr>
                <div class="cinema-schedule">
                
                </div>
            </div>
            <div class="film--detail-bottom clearfix">
            <div>
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
        <div class="about--us-sidebar col-md-4">
            <ul class="list-cinema">
                @foreach ($cinema->cinemaSystem->cinemas as $cinema)
                <li>
                    <a class="item--cinema" href="{{ route('cinema', ['id' => $cinema->id]) }}">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <span>{{ $cinema->name }} &#8211; {{ $cinema->city->name }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@include('layouts.promotion')
@endsection
@section('script')
<script src="{{ asset('js/sites/cinema.js') }}"></script>
@endsection