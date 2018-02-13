@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--wrapper">
    <div class="container">
        <div class="about--us-content">
            <h3 class="content--title">{!! $post->title !!}</h3>
            <div class="text--content">
                {!! $post->content !!}
            </div>
            <div class="tag--list">
                <i class="fa fa-tags"></i>
            </div>
            <div class="button--share">
                <a href="javascript:fbShare('index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--fb-share"><i class="fa fa-facebook"></i> Chia sẻ</a>
            </div>
            <div class="comment">
                <h3>BÌNH LUẬN</h3>
                <div class="fb-comments" data-href="http://www.bhdstar.vn/cinemas/bhd-star-bitexco/" data-width="100%" data-numposts="5"></div>
            </div>
        </div>
    </div>
</div>
@include('layouts.promotion')
@endsection