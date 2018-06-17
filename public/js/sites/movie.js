$(document).ready(function () {
    
    $('#rating').barrating({
        theme: 'fontawesome-stars',
        initialRating: $('#rating').data('current-rating')
      });
    /**
     * EVENT
     */

    getDate();
    

    $(document).on('click', '.schedule-date button', function (e) {
        var movie_id = $('.movie-schedules').data('movie');
        var date = $(this).data('date');
        $('.schedule-date').find('.active').removeClass('active');
        $(this).addClass('active');
        getSchedule(movie_id, date);
    })

     /**
      * FUNCTION
      */
    

    //get Schedule by movie
    function getSchedule(movie_id, date) {
        $.ajax({
            url: '/get-movie-schedule',
            type: 'GET',
            data: {'movie_id': movie_id, 'date': date},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.schedules.length; i++) {
                    var schedule_time = res.schedules[i].schedule_time;
                    if (schedule_time.length > 0) {
                        html += `
                        <div class="schedule-time row">
                            <div class="col-md-3">
                                <img src="${ res.schedules[i].cinema.media }">
                            </div>
                            <div class="col-md-9">
                                <h4>${ res.schedules[i].cinema.name }</h4>
                                <a href="${ (typeof res.schedules[i].cinema.booking_movies !== 'undefined') ? res.schedules[i].cinema.booking_movies[0].link : '' }" class="btn--green booking-button"><i class="fa fa-ticket"></i>Buy Ticket</a>
                                <div class="times">`;
                        for (var j = 0; j < schedule_time.length; j++) {
                            html += `<button class="btn col-md-2 btn-default">${ schedule_time[j].time.time }</button>`;
                        }
                        html += `</div>
                            </div>
                        </div>
                        `;
                    }
                }
                $('.cinema-schedule').html(html);
            }
        });
    }

    function getDate() {
        $.ajax({
            url: '/get-dates',
            type: 'GET',
            success: function (res) {
                var scheduleDate = '';
                for(var i = 0 ; i < res.dates.length; i++) {
                    var date = new Date(res.dates[i]);
                    var week = ['Sun','Mon','Tuey','Wed','Thu','Fri','Sat'];
                    var months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
                    if (i == 0) {
                        scheduleDate += `
                        <div class="col-md-2 text-center">
                            <button class="btn btn-rounded btn btn-icon btn-success date active text-center" data-date="${ res.dates[i] }">
                                <div class="col-md-6">
                                    <span>${ months[date.getMonth()] }</span><br>
                                    <small>${ week[date.getDay()] }</small>
                                </div>
                                <strong class="col-md-6">${ date.getDate() }</strong>
                            </button>
                        </div>
                        `;
                    } else {
                        scheduleDate += `
                        <div class="col-md-2 text-center">
                            <button class="btn btn-rounded btn btn-icon btn-success date text-center" data-date="${ res.dates[i] }">
                                <div class="col-md-6">
                                    <span>${ months[date.getMonth()] }</span><br>
                                    <small>${ week[date.getDay()] }</small>
                                </div>
                                <strong class="col-md-6">${ date.getDate() }</strong>
                            </button>
                        </div>
                        `;
                    }
                }
                $('.schedule-date').html(scheduleDate);
                getSchedule($('.movie-schedules').data('movie'), $('.schedule-date').find('.active').data('date'));
            }
        });
    }

    //rating
    $(document).on('change', '#rating', function () {
        var value = $(this).val();
        var movie_id = $(this).data('movie');
        var user_id = $(this).data('user');
        $.ajax({
            url: '/movie/get-rating',
            method: 'GET',
            data: {
                'value': value,
                'movie_id': movie_id,
                'user_id': user_id
            },
            success: function(res) {
                if (res != null) {
                    location.reload();
                }
            }
        })
    })
});