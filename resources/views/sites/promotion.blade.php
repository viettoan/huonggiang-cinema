@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--wrapper">
    <div class="container">
        <h1 class="about--us-title">{{ trans('message.title.promotions') }}</h1>
        <div class="about--us-content">
            <h3 class="content--title">{{ $promotion->title }}</h3>
            <div class="text--content">
                {!! $promotion->content !!}
            </div>
            <div class="tag--list">
                <i class="fa fa-tags"></i>
            </div>
            <div class="button--share">
                <a href="javascript:fbShare('index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--fb-share"><i class="fa fa-facebook"></i>{{ trans('message.share') }}</a>
            </div>
            <div class="comment">
                <h3>{{ trans('message.action.comment') }}</h3>
                <div class="fb-comments" data-href="http://www.bhdstar.vn/cinemas/bhd-star-bitexco/" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</div>
@include('layouts.promotion')
@endsection