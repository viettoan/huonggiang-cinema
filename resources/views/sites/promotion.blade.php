@extends('layouts.app')

@section('content')
<div class="warper-content">
<div class="page--wrapper">
    <div class="container">
        <h1 class="about--us-title">{{ trans('message.title.promotions') }}</h1>
        <div class="about--us-content">
            <h3 class="content--title">
                {{ ($promotion->title) ? $promotion->title : '' }}</h3>
            <div class="text--content">
                {!! ($promotion->content) ? $promotion->content : '' !!}
            </div>
        </div>
    </div>
</div>
@include('layouts.promotion')
@endsection