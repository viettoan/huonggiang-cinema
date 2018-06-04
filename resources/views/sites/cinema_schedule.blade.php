@extends('layouts.app')

@section('content')
<div class="warper-content">
        <div class="showtimes showtimes-2 section--product-view">
		<div class="container">
			<ul>
				<li class="product--title">
					<h3 class="js__tab js__active" data-target="#cinema-schedule">LỊCH CHIẾU THEO RẠP</h3>
				</li>
                <li class="list--film js__tab_content js__active" id="cinema-schedule">
                    <select class="list-option list-cinema clearfix">
                        @if (isset($cinemaSystems))
                            @foreach ($cinemaSystems as $cinemaSystem)
                                <option value = "{{ $cinemaSystem->id }}">{{ $cinemaSystem->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <select class="list-option list-city clearfix" style="">
                        @if (isset($cities))
                            @foreach ($cities as $city)
                                <option value = "{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="clearfix"></div>
                    <ul class="list--info clearfix bhd-lich-chieu-chon-rap">
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
            
        </div>
        <hr>
        <div class="cinema-schedule">
            <p>{{ trans('message.none_schedule') }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/sites/schedule.js') }}"></script>
@endsection