$(document).ready(function() {

    /**
     * EVENT
     */
    //click delete schedule
    $(document).on('click', '.delSchedule', function () {
        var id = $(this).data('id');
        var element = $(this);
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                deleteSchedule(id, element);
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
        });    
    });

    //get movie by cinema event
    $(document).on('change', '#cinema_id', function () {

        var cinema_id = $(this).val();
        var element = $(this);
        getMovie(cinema_id, element);
    });

    //get technology by movie event
    $(document).on('change', '#movie_id', function () {
        var movie_id = $(this).val();
        var cinema_id = $('#cinema_id').val();
        var element = $(this);
        console.log(cinema_id);
        getTechnology(cinema_id, movie_id, element);
    });

    //click btn-next in create schedule page
    $(document).on('click', '.btn-save-schedule', function() {
        var cinema_id = $('#cinema_id').val();
        var movie_id = $('#movie_id').val();
        var movie_technology_id = $('#movie_technology_id').val();
        if (movie_id == null) {
            swal('Movie must be selected!');
        }
        if (cinema_id == null) {
            swal('Cinema must be selected!');
        }
        if (movie_technology_id != null) {
            getScheduleTimeModal(cinema_id, movie_id, movie_technology_id);
        } else {
            swal('Technology must be selected!');
        }
    });

    //click show list schedule
    $(document).on('click', '.cinema-schedule', function () {
        var cinema_id = $(this).data('cinema');
        var movie_id = $(this).data('movie');
        getListSchedule(cinema_id, movie_id);
    })
    //get time by date event
    $(document).on('change', '.date', function(){
        var date = $(this).val();
        var schedule_id = $('#schedule-id').val();
        var element = $(this);
        getTimeByDate(date, schedule_id, element);
    })
    //click save schedule time
    $('.btn-remove-schedule-time').hide();
    $('.btn-edit-schedule-time').hide();
    $(document).on('click', '.btn-save-schedule-time', function (){
        var date = $(this).parents('.room').find('.date').val();
        var schedule_id = $('#schedule-id').val();
        var time = $(this).parents('.room').find('.time_id').val();
        var element = $(this);
        saveScheduleTime(date, schedule_id, time, element)
    });

    //click remove schedule time
    $(document).on('click', '.btn-remove-schedule-time', function (){
        var date = $(this).parents('.room').find('.date').val();
        var schedule_id = $('#schedule-id').val();
        var time = $(this).parents('.room').find('.time_id').val();
        var element = $(this);
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                removeScheduleTime(date, schedule_id, time, element)
            // result.dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
            } else if (result.dismiss === 'cancel') {
              swal(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
        });  
        
        
    });

    //click edit schedule time
    $(document).on('click', '.btn-edit-schedule-time', function () {
        var date = $(this).parents('.room').find('.date').val();
        var schedule_id = $('#schedule-id').val();
        var time = $(this).parents('.room').find('.time_id').val();
        var element = $(this);
        editScheduleTime(date, schedule_id, time, element);
    })


    /**
     * FUNCTION
     */

    // delete schedule function
    function deleteSchedule (id, element) {
        $.ajax({
            url: '/admin/schedule/delete/' + id,
            type: 'GET',
            success: function (res) {
                swal(
                    'Deleted!',
                    'Your imaginary file has been deleted.',
                    'success'
                  )
                element.parents('tr').remove();
            }
        });
    }

    // get movie by cinema function
    function getMovie (cinema_id, element) {
        $.ajax({
            url: '/admin/get-movie',
            type: 'GET',
            data: {'cinema_id': cinema_id},
            success: function (res) {
                var html = '';
                html += `<option>Choose one Movie</option>`;
                for (var i = 0; i < res.movies.length; i++) {
                    html += `<option value="${res.movies[i].id}">${res.movies[i].name}</option>`;
                }
                element.parents('form').find('#movie_id').html(html);
            }
        });
    }

    // get technology by movie function
    function getTechnology (cinema_id, movie_id, element) {
        console.log(cinema_id);
        $.ajax({
            url: '/admin/get-technology',
            type: 'GET',
            data: {'movie_id': movie_id, 'cinema_id': cinema_id},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.movieTechnologies.length; i++) {
                    html += `<option value="${res.movieTechnologies[i].id}">${res.movieTechnologies[i].technology.name}</option>`;
                }
                element.parents('form').find('#movie_technology_id').html(html);
            }
        });
    }

    //btn-next in create schedule page function
    function getScheduleTimeModal(cinema_id, movie_id, movie_technology_id) {
        $.ajax({
            url: '/admin/create-schedule',
            method: 'GET',
            data: {'cinema_id': cinema_id, 'movie_id': movie_id, 'movie_technology_id': movie_technology_id},
            success: function (res) {
                $('#schedule-id').val(res.schedule.id);
                $('#create-schedule').modal('show');
            }
        })
    }

    // show list schedule function
    function getListSchedule(cinema_id, movie_id) {
        $.ajax({
            url: '/admin/get-schedules',
            method: 'GET',
            data: {'cinema_id': cinema_id, 'movie_id': movie_id},
            success: function (res) {
                $('.admin-schedule').html(res.html);
                $('#schedule').modal('show');
            }
        })
    }

    //get time by date function
    function getTimeByDate(date, schedule_id, element) {
        $.ajax({
            url: '/admin/get-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id},
            success: function (res) {
                if (res.status == 0) {
                    swal('This day has a schedule!');
                } else {
                    var html = '';
                    for (var i = 0; i < res.times.length; i++) {
                        html += `<option value="${res.times[i].id}">${res.times[i].time}</option>`;
                    }
                    element.parents('.room').find('.time_id').html(html);
                }
            }
        });
    }

    // save schedule function
    function saveScheduleTime(date, schedule_id, time, element) {
        $.ajax({
            url: '/admin/store-schedule-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id, 'time': time},
            success: function (res) {
                element.hide();
                element.parent().find('.btn-remove-schedule-time').show();
                element.parent().find('.btn-edit-schedule-time').show();
                var index = parseInt(element.parents('.room').data('index')) + 1;
                $.ajax({
                    url: '/admin/get-time-ui',
                    method: 'GET',
                    data: {'index': index},
                    success: function (res) {
                        element.parents('.admin-schedule').append(res.html);
                    }
                });
            }
        });
    }

    // remove schedule time function
    function removeScheduleTime(date, schedule_id, time, element) {
        $.ajax({
            url: '/admin/remove-schedule-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id, 'time': time},
            success: function (res) {
                swal(
                    'Deleted!',
                    'Your imaginary file has been deleted.',
                    'success'
                  )
                element.parents('.room').remove();
            }
        });
    }

    // edit schedule time function
    function editScheduleTime(date, schedule_id, time, element) {
        $.ajax({
            url: '/admin/edit-schedule-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id, 'time': time},
            success: function (res) {
                swal('Your schedule time has been edited.');
            }
        });
    }

    $(document).on('keyup', '.search', function() {
        var keyd = $(this).val();
        $.ajax({
            url: '/admin/search-schedule',
            method: 'GET',
            data: {keyword: keyd},
            success: function (response) {
                console.log(response);
                $('.table-responsive').html(response.schedules);
            }
        });
    });
});