<footer id="footer">
	<div class="logo"><img src="{{ asset('wp-content/uploads/2016/05/logo-footer.png') }}" alt=""></div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<h3 class="title">{{ trans('message.about') }}</h3>
				<div class="menu-gioi-thieu-container">
					<ul id="menu-gioi-thieu" class="menu">
						<li id="menu-item-83" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-83"><a href="{{ route('schedules') }}">{{ trans('message.title.schedule') }}</a></li>
						<li id="menu-item-84" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-84"><a href="{{ route('cinemas') }}">{{ trans('message.title.cinema_systems') }}</a></li>
						<li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85"><a href="{{ route('promotions') }}">{{ trans('message.title.promotions') }}</a></li>
						@if (!Auth::guest())
		                    @if (Auth::user()->role == config('custom.admin'))
		                        <li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85">
		                            <a href="{{ route('dashboard') }}">{{ trans('message.title.admin') }}</a>
		                        </li>
		                    @endif
		                    <li id="menu-item-85" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-85">
		                        <a href="{{ route('logout') }}"
		                            onclick="event.preventDefault();
		                                        document.getElementById('logout-form').submit();">{{ trans('message.title.logout') }}
		                        </a>
		                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
		                            {{ csrf_field() }}
		                        </form>
		                    </li>
		                @endif
					</ul>
				</div>
			</div>			
		</div>
		<div class="copyright">&copy; 2018 Huonggiang_cinema</div>
	</div>
</footer>