<div class="main_header">
    <div class="main_header_innor">
        <div id="menu">
            <button class="btn--menu js__dropdown" data-target="#dropdown--menu-1">
                <span><img alt="" src="{{ asset('wp-content/themes/bhd/assets/images/bg-button-menu.jpg') }}"/></span>
                <span><img alt="" src="{{ asset('wp-content/themes/bhd/assets/images/bg-button-menu.jpg') }}"/></span>
                <span><img alt="" src="{{ asset('wp-content/themes/bhd/assets/images/bg-button-menu.jpg') }}"/></span>
                <span class="txt--menu"></span>
            </button>
            <ul id="dropdown--menu-1" class="dropdown--menu js__dropdown_target">
                <li id="menu-item-239" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-239"><a href="{{ route('schedules') }}">{{ trans('message.title.schedule') }}</a></li>
                <li id="menu-item-250" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-250"><a href="{{ route('cinemas') }}">{{ trans('message.title.cinema_system') }}</a></li>
                <li id="menu-item-241" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-241"><a href="{{ route('promotions') }}">{{ trans('message.title.promotions') }}</a></li>
                <li id="menu-item-272" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-272"><a href="{{ route('advertisement') }}">{{ trans('message.title.advertisement') }}</a></li>
                <li id="menu-item-260" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-260"><a href="{{ route('recruitment') }}">{{ trans('message.title.recruitment') }}</a></li>
                <li id="menu-item-3316" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-3316"><a href="morathegioi/index.html">{{ trans('message.title.open_world') }}</a></li>
                @if (!Auth::guest())
                    @if (Auth::user()->role == config('custom.admin'))
                        <li class="menu-item menu-item-type-custom menu-item-object-custom">
                            <a href="{{ route('dashboard') }}">{{ trans('message.title.admin') }}</a>
                        </li>
                    @endif
                    <li class="menu-item menu-item-type-custom menu-item-object-custom">
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
        <div id="header">
            <div class="header--top">
                <a href="{{ route('index') }}" class="logo"><img alt="" class="logo" src="{{ asset('wp-content/uploads/2016/05/logo.png') }}"/></a>
                <ul class="list--social">
                    <li><a target="_blank" href="https://www.facebook.com/BHDStar"><img src="{{ asset('wp-content/themes/bhd/assets/images/fb_logo.png') }}" alt="fb bhd" /></a></li>
                    <li><a href="{{ route('schedules') }}"><img src="{{ asset('wp-content/themes/bhd/assets/images/lc.png') }}" alt="lich chieu" /></a></li>
                    <li><img class="search-mvtr" src="{{ asset('wp-content/themes/bhd/assets/images/mvtr.png') }}" alt="lich chieu rap" /></li>
                    <li><img class="search-mvtp" src="{{ asset('wp-content/themes/bhd/assets/images/mvtp.png') }}" alt="lich chieu phim" /></li>
                    <li><a target="_blank" href="morathegioi/index.html"><img src="{{ asset('wp-content/themes/bhd/assets/images/mrtg1.png') }}" alt="lich chieu" /></a></li>
                </ul>
                <div class="language">
                    <a class="@if (Session::get('locale') == 'vi') active @endif" href="{{ route('localization', ['lang' => 'vi']) }}">VN</a>
                    | <a class="@if (Session::get('locale') == 'en') active @endif" href="{{ route('localization', ['lang' => 'en']) }}">EN</a>
                </div>
                <a class="hotline" href="he-thong-rap/index.html"><span><img src="{{ asset('wp-content/themes/bhd/assets/images/phone.png') }}"  alt="hotline bhd"/> : </span>1900 2099</a>
                <div class="header--right">
                    <a target="_blank" href="movie365/index.html" class="top--link" style="margin-right: 15px;"> 
                        <img src="{{ asset('wp-content/themes/bhd/assets/images/movie-365.png') }}" alt="365">
                    </a>
                    <a href="tai-khoan/index.html" class="top--link">
                        <img src="{{ asset('wp-content/themes/bhd/assets/images/bhdstar-member.png') }}" alt="MEMBER">
                    </a>
                    <a href="tai-khoan/index.html" class="top--link-mobile"><img src="{{ asset('wp-content/themes/bhd/assets/images/user.png') }}" alt="user" /></a>
                    @if (Auth::guest())
                    <div class="btn--dropdown-menu js__dropdown" data-target="#dropdown--menu-2">
                    {{ trans('message.title.login') }}
                    </div>
                    <div id="dropdown--menu-2" class="box--login js__dropdown_target">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="controls"><input name="email" type="email" placeholder="Email" class="inp--text"></div>
                            <div class="controls"><input name="password" type="password" placeholder="Password" class="inp--text"></div>
                            <div class="clearfix controls--submit"><input type="submit" value="{{ trans('message.title.login') }}" class="inp--submit" /><a href="quen-mat-khau/index.html" class="forgot--link">{{ trans('message.action.forgot_password') }}</a></div>
                            <a class="bhd-dang-ky" href="{{ route('register') }}">{{ trans('message.title.register') }}</a>
                        </form>
                    </div>
                    @else
                        <div class="btn--dropdown-menu js__dropdown" data-target="#dropdown--menu-3">
                            {{ Auth::user()->name }} 
                        </div>
                    @endif
                </div>
                <img alt="" class="line-header" src="{{ asset('wp-content/themes/bhd/assets/images/line-header1.png') }}"/>
            </div>
            <div class="header-seach-v3">
                <a class="close_header" href="#"><img alt="colose" src="{{ asset('wp-content/themes/bhd/assets/images/close.png') }}" /></a>
                <div class="main-search" style="display: none;">
                    <div class="row tab-search-phim">
                        <div class="col-md-3">
                            <div class="title-search">Phim hot</div>
                            <div>
                                <a href="movies/jumanji-tro-choi-ky-ao/index.html"><img width="470" height="700" src="{{ asset('wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3.jpg') }}" class="attachment-full size-full wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3.jpg 470w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-222x330.jpg 222w" sizes="(max-width: 470px) 100vw, 470px" /></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="search-title-container">
                                <li><a href="#" class="title-search title-now active" >Phim đang chiếu</a></li>
                                <li><a href="#" class="title-search title-soon">Phim Bán Vé Sớm</a></li>
                            </ul>
                            <div class="container-search-header container-search-header-now">
                                <ul>
                                    <li class="isotope_selector post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/jumanji-tro-choi-ky-ao/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> JUMANJI: TRÒ CHƠI KỲ ẢO</span></a>
                                    </li><li class="isotope_selector post-4260 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/loi-bao/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> LÔI BÁO</span></a>
                                    </li><li class="isotope_selector post-4614 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/ton-ngo-khong-dai-nao-new-york/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> TÔN NGỘ KHÔNG ĐẠI NÁO NEW YORK</span></a>
                                    </li><li class="isotope_selector post-4776 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/lanh-dia-ma/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> LÃNH ĐỊA MA</span></a>
                                    </li><li class="isotope_selector post-3393 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/ferdinand-phieu-luu-ky/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> FERDINAND PHIÊU LƯU KÝ</span></a>
                                    </li><li class="isotope_selector post-4288 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/star-wars-jedi-cuoi-cung/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> STAR WARS: JEDI CUỐI CÙNG</span></a>
                                    </li><li class="isotope_selector post-4609 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/giac-mo-my-2/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> GIẤC MƠ MỸ</span></a>
                                    </li><li class="isotope_selector post-4405 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                        <a href="movies/vung-dat-linh-hon/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> COCO</span></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="container-search-header container-search-header-soon hidden">
                                <ul>
                                    <li class="isotope_selector post-4629 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-ban-ve-som category-movies-phim-sap-chieu">
                                        <a href="movies/khi-con-la-nha/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/11/BHD-Star-Khi-Con-La-nha-poster-470x700-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> KHI CON LÀ NHÀ</span></a>
                                    </li><li class="isotope_selector post-3521 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-ban-ve-som category-movies-phim-sap-chieu">
                                        <a href="movies/bac-thay-cua-nhung-giac-mo/index.html"><img width="60" height="60" src="{{ asset('wp-content/uploads/2017/06/BHD-Star-Bac-thay-Nhung-Giac-Mo-poster-470x700.jpg-3-60x60.jpg') }}" class="attachment-movie_icon size-movie_icon wp-post-image" alt="" /> <span> BẬC THẦY CỦA NHỮNG ƯỚC MƠ</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-search-rap hidden">
                        <div class="col-md-3">
                            <div class="title-search">Hot News</div>
                            <div>
                                <a href="deals/postcard-trao-tay-nhan-qua-may-man/index.html"><img width="315" height="420" src="{{ asset('wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB.jpg') }}" class="attachment-full size-full wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB.jpg 315w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB-245x327.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB-184x245.jpg 184w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB-77x103.jpg 77w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB-268x357.jpg 268w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHD-Star-Postcard-315x420-WEB-248x330.jpg 248w" sizes="(max-width: 315px) 100vw, 315px" /></a>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <ul class="search-title-container">
                                <li><a href="#" class="title-search active" data-filter="*">Tất Cả</a></li>
                                                        <li><a href="#" class="title-search" data-filter=".category-city-tp-ho-chi-minh">TP HỒ CHÍ MINH</a></li>
                                                        <li><a href="#" class="title-search" data-filter=".category-city-tp-ha-noi">TP HÀ NỘI</a></li>
                                                </ul>
                            <div class="container-search-header">
                                <ul>
                                    <li class="isotope_selector post-848 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ha-noi">
                                        <a href="lich-chieu/indexc4e2.html?id_cinema=848"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> PHẠM NGỌC THẠCH &#8211; HÀ NỘI</span></a>
                                    </li>
                                    <li class="isotope_selector post-54 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/indexe5c7.html?id_cinema=54"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR LÊ VĂN VIỆT</span></a>
                                    </li>
                                    <li class="isotope_selector post-52 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/index38ab.html?id_cinema=52"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR THẢO ĐIỀN</span></a>
                                    </li>
                                    <li class="isotope_selector post-51 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/index4ad7.html?id_cinema=51"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR QUANG TRUNG</span></a>
                                    </li>
                                    <li class="isotope_selector post-50 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/index6936.html?id_cinema=50"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR PHẠM HÙNG</span></a>
                                    </li>
                                    <li class="isotope_selector post-49 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/index738a.html?id_cinema=49"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR BITEXCO</span></a>
                                    </li>
                                    <li class="isotope_selector post-48 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ho-chi-minh">
                                        <a href="lich-chieu/index4c3a.html?id_cinema=48"><img src="{{ asset('wp-content/themes/bhd/assets/images/logo.png') }}" alt="" /> <span> BHD STAR 3/2</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>		
        </div>
    </div>
</div>