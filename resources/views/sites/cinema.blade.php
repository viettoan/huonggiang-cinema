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
            <div class="comment">
                <h3>{{ trans('message.action.comment') }}</h3>
                <div class="fb-comments" data-href="http://www.bhdstar.vn/cinemas/bhd-star-bitexco/" data-width="100%" data-numposts="5"></div>
            </div>
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