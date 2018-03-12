$(document).ready(function() {

    //delete movie
    $(document).on('click', '.delMovie', function () {
        var id = $(this).data('id');
        var selector = $(this);
        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '/admin/schedule/delete/' + id,
                    type: 'GET',
                    success: function (res) {
                        swal(
                            'Deleted!',
                            'Your imaginary file has been deleted.',
                            'success'
                          )
                        selector.parents('tr').remove();
                    }
                });
              
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

    //get movie by cinema
    $(document).on('change', '#cinema_id', function () {
        var cinema_id = $(this).val();
        var element = $(this);

        $.ajax({
            url: '/admin/get-movie',
            type: 'GET',
            data: {'cinema_id': cinema_id},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.movies.length; i++) {
                    html += `<option value="${res.movies[i].id}">${res.movies[i].name}</option>`;
                }
                element.parents('form').find('#movie_id').html(html);
            }
        });
    });

    //click btn-next in create schedule page
    $(document).on('click', '.btn-save-schedule', function() {
        var cinema_id = $('#cinema_id').val();
        var movie_id = $('#movie_id').val();
        var element = $(this);
        if (movie_id != null) {
            $.ajax({
                url: '/admin/create-schedule',
                method: 'GET',
                data: {'cinema_id': cinema_id, 'movie_id': movie_id},
                success: function (res) {
                    $('#schedule-id').val(res.schedule.id);
                    $('#create-schedule').modal('show');
                }
            })
        } else {
            swal('Cinema or movie must be selected!');
        }
    });

    $(document).on('click', '.cinema-schedule', function () {
        var cinema_id = $(this).data('cinema');
        var movie_id = $(this).data('movie');

        $.ajax({
            url: '/admin/get-schedules',
            method: 'GET',
            data: {'cinema_id': cinema_id, 'movie_id': movie_id},
            success: function (res) {
                console.log(res.scheduleTimes);
                // for (var i = 0 ; i < res.schedules.schedule_time.length; i++) {
                //     var html = `
                //     <div class="room col-md-12" data-index='${i}'>
                //         <input class="form-control" type="hidden" id="schedule-id" required>
                //         <div class="form-group">
                //             <label for="exampleInputEmail1">Date</label>
                //             <input class="form-control date" type="date" name="date" value="${res.schedules.schedule_time[i].date}" required>
                //         </div>
                //         <div class="form-group">
                //             <label for="exampleInputEmail1">Time</label>
                //             <select class="time-multiple-${i} form-control time_id" name="time_id[]" multiple="multiple">

                //             </select>
                //         </div>
                //         <div class="col-md-12 text-center">
                //             <button type="button" class="btn btn-primary col-md-2 btn-save-schedule-time">{{ trans('message.action.save') }}</button>
                //             <button type="button" class="btn btn-danger col-md-2 btn-remove-schedule-time">{{ trans('message.action.remove') }}</button>
                //         </div>
                //     </div>
                //     `
                // }
            }
        })
    })
    //get time by date
    $(document).on('change', '.date', function(){
        var date = $(this).val();
        var schedule_id = $('#schedule-id').val();
        var element = $(this);
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
    })
    //click save schedule time
    $('.btn-remove-schedule-time').hide();
    $(document).on('click', '.btn-save-schedule-time', function (){
        var date = $(this).parents('.room').find('.date').val();
        var schedule_id = $('#schedule-id').val();
        var time = $(this).parents('.room').find('.time_id').val();
        var element = $(this);
        $.ajax({
            url: '/admin/store-schedule-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id, 'time': time},
            success: function (res) {
                element.hide();
                element.parent().find('.btn-remove-schedule-time').show();
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
    });

    //click remove schedule time
    $(document).on('click', '.btn-remove-schedule-time', function (){
        var date = $(this).parents('.room').find('.date').val();
        var schedule_id = $('#schedule-id').val();
        var time = $(this).parents('.room').find('.time_id').val();
        var element = $(this);
        $.ajax({
            url: '/admin/remove-schedule-time',
            method: 'GET',
            data: {'date': date, 'schedule_id': schedule_id, 'time': time},
            success: function (res) {
                element.parents('.room').remove();
            }
        });
    });

});