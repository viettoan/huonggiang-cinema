$(document).ready(function () {
    /**
     * EVENT
     */

    getDate();
    

    $(document).on('click', '.schedule-date button', function (e) {
        var cinema_id = $('.movie-schedules').data('cinema');
        var date = $(this).data('date');
        $('.schedule-date').find('.active').removeClass('active');
        $(this).addClass('active');
        getSchedule(cinema_id, date);
    })

     /**
      * FUNCTION
      */
    

    //get Schedule by cinema
    function getSchedule(cinema_id, date) {
        $.ajax({
            url: '/get-cinema-schedule',
            type: 'GET',
            data: {'cinema_id': cinema_id, 'date': date},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.schedules.length; i++) {
                    var schedule_time = res.schedules[i].schedule_time;
                    if (schedule_time.length > 0) {
                        html += `
                        <div class="schedule-time row">
                            <div class="col-md-3">
                                <img src="${ res.schedules[i].movie.media.path }">
                            </div>
                            <div class="col-md-9">
                                <h4>${ res.schedules[i].movie.name }</h4>
                                <a href="${ (res.schedules[i].cinema.booking_movies) ? res.schedules[i].movie.booking_movies.link : ''}" class="btn--green"><i class="fa fa-ticket"></i>Buy Ticket</a>
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
                getSchedule($('.movie-schedules').data('cinema'), $('.schedule-date').find('.active').data('date'));
            }
        });
    }
});