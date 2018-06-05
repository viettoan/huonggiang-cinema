<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ route('index') }}">Huonggiang_Cinema</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('dashboard')}}">
          <i class="fas fa-arrow-circle-down"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('profile.show', ['id' => Auth::user()->id ])}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.profile') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('user.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_users') }}</span>
          </a>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('movie.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_movies') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('cinema.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_cinemas') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('cinema_system.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_cinema_systems') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('type.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_types') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('post.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_posts') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('promotion.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_promotions') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('time.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_times') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('schedule.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_schedules') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('technology.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_technologies') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('trailer.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_trailers') }}</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="{{route('city.index')}}">
            <i class="fas fa-fw fa-area-chart"></i>
            <span class="nav-link-text">{{ trans('message.title.manage_cities') }}</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fas fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav" style="margin-left: 900px;">
        <li class="nav-item" style="width:500px;">
          <form class="form-inline my-4 my-lg-2 mr-lg-4" >
            <div class="input-group">
              <input class="form-control col-md-12" id="search-total" type="text" placeholder="Search for..." style="width:500px;">
            </div>
          </form>
            <ul class="search-total-result">

            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link my-4 my-lg-2 mr-lg-4" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out"></i>Logout</a>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
        </li>
      </ul>
    </div>
  </nav>