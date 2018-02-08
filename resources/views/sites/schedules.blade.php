@extends('layouts.app')

@section('content')
<div class="warper-content">
    <div class="showtimes section--product-view">
        <ul>
            <li class="product--title">
                <h3 class="js__tab js__active" data-target="#movies-schedule">LỊCH CHIẾU THEO PHIM</h3>
                <h3 class="js__tab" data-target="#cinemas-schedule">LỊCH CHIẾU THEO RẠP</h3>
            </li>
            <li id="movies-schedule" class="list--film js__tab_content js__active">
                <div class="scroll--wrapper js__film">
                    <div class="flexslider  js__list_film_slider">
                        <ul class="slides bhd-lich-chieu-chon-phim">
                        @if (isset($movies))
                            @foreach($movies as $movie)
                                <li class="post-3542 movies type-movies status-publish has-post-thumbnail hentry category-movies-phim-dang-chieu">
                                    <div class="film--item">
                                        <a class="bhd-trailer-box bhd-trailer" href="https://www.youtube.com/watch?v=jSnzO3v1iD0">Trailer</a>
                                        <span class="meta-box-type"><span class="film--rating">C 13</span> <span class="tech--2d">2D</span></span>
                                        <a href="">
                                            <img width="245" height="365" src="{{ $movie->media->path }}" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""  />        </a>
                                        <a href=""><span class="movie--name">{{ $movie->name }}</span></a>
                                    </div>
                                    <a href="movies/jumanji-tro-choi-ky-ao/index.html" class="btn--green"><i class="fa fa-ticket"></i>MUA VÉ</a>
                                </li>
                            @endforeach
                        @endif
                        </ul>
                    </div>
                </div>
            </li>
            <li id="cinemas-schedule" class="list--film js__tab_content">
                <div class="scroll--wrapper ">
                <div class="flexslider">
                    <ul class="list--news row js__isotope">
                        @if (isset($cinemas))
                            @foreach($cinemas as $cinema)
                            <li class="col-md-3 col-sm-6 col-xs-12 js__isotope_item">
                                <div class="news--item">
                                    <a href="../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html"> <img width="247" height="330" src="../wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-247x330.jpg" class="attachment-news-thumb size-news-thumb wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-247x330.jpg 247w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-245x327.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-184x245.jpg 184w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-470x627.jpg 470w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-77x103.jpg 77w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01-268x357.jpg 268w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star_HeThongRap-01.jpg 1313w" sizes="(max-width: 247px) 100vw, 247px" /></a>
                                    <a class="news-title" href="../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html">{{ $cinema->name }}</a>
                                    <span>299.011 Thích</span>
                                    <a href="javascript:fbShare('../cinemas/bhd-star-vincom-pham-ngoc-thach/index.html', 'Fb Share', 'Facebook share popup', '', 520, 350)" class="btn--share">Chia sẻ</a>
                                </div>
                            </li>
                            @endforeach
                        @endif
                    </ul>
                </div>    
                </div>
            </li>
        </ul>
        <div class="border-bottom" id="hastag"></div>
            <div class="film--intro clearfix text-left phimdangchieu-4776 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/lanh-dia-ma/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/12/BHDS-Lanh-Dia-Ma-poster-470x700.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>LÃNH ĐỊA MA</h3>
                        <span class="film--rating">C 18</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Chuyện phim bắt đầu với một vụ cướp ngân hàng tại Thái Lan do bộ đôi kẻ cướp quốc tế&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-4614 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/ton-ngo-khong-dai-nao-new-york/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/11/BHD-Star-Monkey-King-Reloaded-poster-470x700.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>TÔN NGỘ KHÔNG ĐẠI NÁO NEW YORK</h3>
                        <span class="film--rating">P</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Sunny, một chú khỉ tinh nghịch lớn lên trong vườn thú ở Tứ Xuyên luôn tin rằng mình có quyền&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-4609 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/giac-mo-my-2/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/11/bhd-star-giac-mo-My-poster-470x700.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>GIẤC MƠ MỸ</h3>
                        <span class="film--rating">C 13</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Giấc mơ Mỹ là bộ phim điện ảnh Việt Nam đầu tiên khai thác về đề tài y khoa với&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-4405 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/vung-dat-linh-hon/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Vung-Dat-Linh-Hon-poster-470x700.jpg-2.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>COCO</h3>
                        <span class="film--rating">P</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span><span class="tech--3d">3D</span>
                    </div>
                    <div class="film--detail">
                        <p>Vùng đất linh hồn là bộ phim hoạt hình âm nhạc kể về Miguel, một cậu bé say mê những giai điệu&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-4288 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/star-wars-jedi-cuoi-cung/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Star-Wars-poster-470x700.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>STAR WARS: JEDI CUỐI CÙNG</h3>
                        <span class="film--rating">C 13</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Star Wars: Jedi Cuối Cùng là phần thứ 8 trong series kinh điển Star Wars, nối tiếp phần 7 Star&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-4260 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/loi-bao/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/10/BHD-Star-Loi-Bao-poster-470x700.jpg-2.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>LÔI BÁO</h3>
                        <span class="film--rating">C 16</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Câu chuyện bắt đầu khi Tâm (Cường Seven) – một họa sỹ truyện tranh đang sống hạnh phúc cùng gia&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-3542 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/jumanji-tro-choi-ky-ao/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/06/bhd-star-jumanji-poster-470x700-3.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>JUMANJI: TRÒ CHƠI KỲ ẢO</h3>
                        <span class="film--rating">C 13</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>Jumanji: Welcome to the Jungle là phần tiếp theo của bộ phim viễn tưởng hành động kinh điển Jumanji (1995)&#8230;.</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="film--intro clearfix text-left phimdangchieu-3393 lich-chieu-phim-dang-chieu hide">
                <a href="../movies/ferdinand-phieu-luu-ky/index.html"><img width="165" height="245" src="../wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-165x245.jpg" class="product--img wp-post-image" alt="" srcset="http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-165x245.jpg 165w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-245x365.jpg 245w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-69x103.jpg 69w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-266x396.jpg 266w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2-222x330.jpg 222w, http://www.bhdstar.vn/wp-content/uploads/2017/06/BHD-Star-Ferdinan-470x700.jpg-2.jpg 470w" sizes="(max-width: 165px) 100vw, 165px" /></a>

                <div class="product--view">
                    <div class="product--name">
                        <h3>FERDINAND PHIÊU LƯU KÝ</h3>
                        <span class="film--rating">P</span>
                    </div>
                    <div class="film--tech">
                        <span class="tech--2d">2D</span>
                    </div>
                    <div class="film--detail">
                        <p>FERDINAND là câu chuyện về một chú bò to xác trong một thế giới nhỏ bé. Vì ngoại hình quá&#8230;</p>
                    </div>
                </div>

            </div><!-- .film- -intro -->
            <div class="list--times hide">
                <ul class="tab--showtimes-controls">
                    <li>
                        <a class="tab--control js__tab_time_control js__active" href="#" data-time="2017-12-26"><span class="week">Thứ 3</span><span class="day">26-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2017-12-27"><span class="week">Thứ 4</span><span class="day">27-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2017-12-28"><span class="week">Thứ 5</span><span class="day">28-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2017-12-29"><span class="week">Thứ 6</span><span class="day">29-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2017-12-30"><span class="week">Thứ 7</span><span class="day">30-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2017-12-31"><span class="week">Chủ nhật</span><span class="day">31-12</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2018-01-01"><span class="week">Thứ 2</span><span class="day">01-01</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2018-01-02"><span class="week">Thứ 3</span><span class="day">02-01</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2018-01-03"><span class="week">Thứ 4</span><span class="day">03-01</span></a>
                    </li>
                    <li>
                        <a class="tab--control js__tab_time_control not_active" href="#" data-time="2018-01-04"><span class="week">Thứ 5</span><span class="day">04-01</span></a>
                    </li>
                </ul>
                <div class="loading-rap hide">    
                    <span class="cssload-loader loading"><span class="cssload-loader-inner"></span></span>
                </div>
                <div class="bhd-notfound hide">
                    Phim chưa bán vé
                </div>
                <div class="tab--showtimes-contents">
                    <div class="tab--content js__tab_time_content conatiner-rap js__active">

                    </div><!-- .tab- -content -->
                </div><!-- .tab- -showtimes-contents -->
            </div><!-- .list- -times -->

    </div><!-- .section- -product-view -->
    @include('layouts.promotion')
</div>
@endsection