$(document).ready(function () {
    /**
     * EVENT
     */

    getCinemas($('.list-cinema').val(), $('.list-city').val(), );
    getDate();
    //change cinema system event
    $(document).on('change', '.list-cinema', function (e) {
        var cinemaSystem = $(this).val();
        var city = $('.list-city').val();
        getCinemas(cinemaSystem, city);
    })

    //change city system event
    $(document).on('change', '.list-city', function (e) {
        var cinemaSystem = $('.list-cinema').val();
        var city = $(this).val();
        getCinemas(cinemaSystem, city);
    })

    //show modal schedule 
    $(document).on('click', '.list--info li', function (e) {
        var cinema_id = $(this).data('cinema');
        var date = $('.schedule-date').find('.active').data('date');
        getSchedule(cinema_id, date);
    })

     /**
      * FUNCTION
      */
    
    // get cinemas by cinema system and city
    function getCinemas(cinemaSystem, city) {
        $.ajax({
            url: '/get-cinemas',
            type: 'GET',
            data: {'cinemaSystem': cinemaSystem, 'city': city},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.cinemas.length; i++) {
                    html += `
                    <li class="post-848 cinemas type-cinemas status-publish has-post-thumbnail hentry category-city-tp-ha-noi" data-cinema="${ res.cinemas[i].id }" data-toggle="modal" data-target="#scheduleTime" >
                        <div class="info">
                            <div class="inside" data-id="0000000007">
                                <h4 class="title">${ res.cinemas[i].name }</h4>
                                <p>${ res.cinemas[i].address }</p>
                            </div>
                            <a href="${ res.cinemas[i].location }" target="_blank" class="btn--location"><i class="fa fa-map-marker"></i>View Location</a>
                        </div>
                    </li> 
                    `;
                }
                $('.list--info').html(html);
            }
        })
    }

    //get Schedule by cinema
    function getSchedule(cinema_id, date) {
        $.ajax({
            url: '/get-cinema-schedule',
            type: 'GET',
            data: {'cinema_id': cinema_id, 'date': date},
            success: function (res) {
                var scheduleDate = '';
                
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
                            <button class="btn btn-rounded btn btn-icon btn-success date text-center">
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
            }
        });
    }
});