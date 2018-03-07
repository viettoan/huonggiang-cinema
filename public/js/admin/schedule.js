$(document).ready(function() {
    $('.js-example-basic-multiple').select2();

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
    //get room by date
    $('.admin-schedule').hide();
    $(document).on('change', '#date', function () {
        $('.admin-schedule').show();
    });

    $(document).on('change', '.room_id', function () {
        var room_id = $(this).val();
        var date = $('#date').val();
        var element = $(this);

        $.ajax({
            url: '/admin/get-time',
            type: 'GET',
            data: {'date': date, 'room_id': room_id},
            success: function (res) {
                var html = '';
                for (var i = 0; i < res.times.length; i++) {
                    html += `<option value="${res.times[i].id}">${res.times[i].time}</option>`;
                }
                element.parents('.room').find('.time_id').html(html);
            }
        });
    });

    //show cinema schedule 
    $(document).on('click', '.cinema-schedule', function () {
        var movie_id = $(this).data('movie');
        var cinema_id = $(this).data('cinema');

        $.ajax({
            url: '/admin/get-schedules',
            method: 'GET',
            data: {'movie_id': movie_id, 'cinema_id': cinema_id},
            success: function (res) {
                var html = ``;
                html += `<tr>`;
                html += `<th class='text-center schedule-date'>${ res.schedules[0].schedule.date }</th>`;
                html += `<th class='text-center schedule-room'>${ res.schedules[0].schedule.room.name }</th>`;
                html += `<th class='text-center'>`;
                for (var i = 0; i < res.schedules[0].schedule.schedule_time.length; i++ ) {
                    html += ` <button class="btn btn-primary schedule-time">${ res.schedules[0].schedule.schedule_time[i].time.time }</button>`
                }
                html += `</th>`;
                html += `<th class="schedule-action">
                            <a class="edit-schedule-action">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a data-id="" class="">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </th>`;
                html += `</tr>`;
                $('#schedule tbody').html(html);
                $('#schedule').modal('show');
            }
        });
    });

    //click edit schedule button
    $(document).on('click', '.edit-schedule-action', function () {
        var schedule_date = $(this).parents('tr').find('.schedule-date').text();
        var schedule_room = $(this).parents('tr').find('.schedule-room').text();
        var schedule_time_element = $(this).parents('tr').find('.schedule-time');
        var schedule_time = [];
        $.each( schedule_time_element , function( key, value ) {
            schedule_time.push($(this).text());
        });
        var html = ``;
        html += `<th class='text-center schedule-date'><input class="form-control" type="date" name="date" id="date" value="${ schedule_date }" required></th>`;
        html += `<th class='text-center schedule-room'>
                    <select name="room_id" class="form-control room_id">
                            <option selected>${ schedule_room }</option>
                    </select>
                </th>`;
        html += `<th class='text-center'>`;
        html += `</th>`;
        html += `<th class="schedule-action">
                    <a class="update-schedule-action">
                        <i class="fas fa-upload"></i>
                    </a>
                    <a data-id="" class="cancel-schedule-action">
                        <i class="fas fa-times"></i>
                    </a>
                </th>`;
        $(this).parents('tr').html(html);
    });

    //click cancel update schedule button
    $(document).on('click', '.cancel-schedule-action', function () {
        var schedule_date = $(this).parents('tr').find('.schedule-date input').val();
        var schedule_room = $(this).parents('tr').find('.schedule-room select option:selected').val();

        var html = ``;
        html += `<th class='text-center schedule-date'>${ schedule_date }</th>`;
        html += `<th class='text-center schedule-room'>${ schedule_room }</th>`;
        html += `<th class='text-center'>`;
        html += `</th>`;
        html += `<th class="schedule-action">
                    <a class="edit-schedule-action">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a data-id="" class="">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </th>`;
        $(this).parents('tr').html(html);
    });
});