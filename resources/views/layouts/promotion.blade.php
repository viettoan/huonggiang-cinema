<div class="section--promotion">
		<h1 class="title"><strong class="js__active js__promotion_tab" data-target="#promotion-1"><span data-text="Khuyến mãi">Khuyến mãi</span></strong> <span data-text="|">|</span> <strong data-target="#promotion-2" class="js__promotion_tab"><span data-text="Sự kiện">Sự kiện</span></strong></h1>
		<div class="container">
			<div id="promotion-1" class="flexslider js__flexslider_promotion js__promotion_tab_content js__active">
				<ul class="slides">
					@if (isset($promotions))
						@foreach ($promotions as $promotion)
							<li><a href="{{ route('promotion', ['id' => $promotion->id]) }}"><img src="{{ $promotion->media->path }}" alt="" /></a></li>
						@endforeach
					@endif
				</ul>
			</div>

			<div id="promotion-2" class="flexslider js__flexslider_promotion js__promotion_tab_content">
				<ul class="slides">
				@if (isset($events))
					@foreach ($events as $event)
						<li><a href="{{ route('post', ['id' => $event->id]) }}"><img src="{{ $event->media->path }}" alt="" /></a></li>
					@endforeach
				@endif
				</ul>
			</div>
		</div>
	</div>